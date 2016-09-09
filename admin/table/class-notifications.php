<?php
/**
 * A sub-class of WP_Posts_List_Table
 *
 * @package WordPress
 * @subpackage CoursePress
 **/
if ( ! class_exists( 'WP_Posts_List_Table' ) ) {
	require_once ABSPATH . 'wp-admin/includes/class-wp-posts-list-table.php';
}

class CoursePress_Admin_Table_Notifications extends WP_Posts_List_Table {
	private $count = array();
	private $post_type;
	private $_categories;

	public function __construct() {
		$post_format = CoursePress_Data_Notification::get_format();
		parent::__construct( array(
			'singular' => $post_format['post_args']['labels']['singular_name'],
			'plural' => $post_format['post_args']['labels']['name'],
			'ajax' => false,
		) );

		$this->post_type = CoursePress_Data_Notification::get_post_type_name();
		$this->count = wp_count_posts( CoursePress_Data_Notification::get_post_type_name() );
	}

	public function prepare_items() {
		global $wp_query;

		$post_status = 'any';
		$per_page = $this->get_items_per_page( 'coursepress_notifications_per_page', 20 );
		$current_page = $this->get_pagenum();
		$offset = ( $current_page - 1 ) * $per_page;
		$s = isset( $_POST['s'] )? mb_strtolower( trim( $_POST['s'] ) ):false;

		$post_args = array(
			'post_type' => $this->post_type,
			'post_status' => $post_status,
			'posts_per_page' => $per_page,
			'offset' => $offset,
			's' => $s,
		);

		$course_id = isset( $_GET['course_id'] ) ? sanitize_text_field( $_GET['course_id'] ) : '';

		if ( ! empty( $course_id ) && 'all' !== $course_id ) {
			$post_args['meta_query'] = array(
				array(
					'key' => 'course_id',
					'value' => (int) $course_id,
				),
			);
		} else {
			// Only show notifications where the current user have access with.
			$courses = CoursePress_View_Admin_Communication_Notification::get_courses();
			$courses_ids = array_map( array( __CLASS__, 'get_course_id' ), $courses );
			// Include notification for all courses
			$courses_ids[] = 'all';
			$post_args['meta_query'] = array(
				array(
					'key' => 'course_id',
					'value' => (array) $courses_ids,
					'compare' => 'IN',
				),
			);
		}

		// @todo: Add permissions
		$wp_query = new WP_Query( $post_args );
		$this->items = $wp_query->posts;
		$total_items = $wp_query->found_posts;

		$this->set_pagination_args(
			array(
			'total_items' => $total_items,
			'per_page'	=> $per_page,
			'total_pages' => ceil( $total_items / $per_page ),
			)
		);
	}

	/** No items */
	public function no_items() {
		echo __( 'No notifications found.', 'cp' );
	}

	public function column_cb( $item ) {
		return sprintf(
			'<input type="checkbox" name="bulk-actions[]" value="%s" />', $item->ID
		);
	}

	public function get_columns() {
		$columns = array(
			'cb' => '<input type="checkbox" />',
			'notification' => __( 'Notification', 'cp' ),
			'course' => __( 'Course', 'cp' ),
			'status' => __( 'Status', 'cp' ),
		);

		return $columns;
	}

	public function column_notification( $item ) {
		// create a nonce
		// $duplicate_nonce = wp_create_nonce( 'duplicate_course' );
		$title = '<strong>' . $item->post_title . '</strong>';
		$excerpt = CoursePress_Helper_Utility::truncate_html( $item->post_content );

		$edit_page = CoursePress_View_Admin_Communication_Notification::$slug;

		$actions = array();

		/**
		 * check current_user_can update?
		 */
		if ( CoursePress_Data_Capabilities::can_update_notification( $item ) ) {
			$edit_url = add_query_arg(
				array(
					'action' => 'edit',
					'id' => $item->ID,
				)
			);
			$actions['edit'] = sprintf( '<a href="%s">%s</a>', esc_url( $edit_url ), __( 'Edit', 'cp' ) );
		}

		if ( CoursePress_Data_Capabilities::can_delete_notification( $item ) ) {
			$delete_url = add_query_arg(
				array(
					'action' => 'delete2',
					'id' => $item->ID,
				)
			);
			$actions['delete'] = sprintf( '<a href="%s">%s</a>', esc_url( $delete_url ), __( 'Delete', 'cp' ) );
		}

		return $title . '<br />' . $excerpt . $this->row_actions( $actions );
	}

	protected function get_bulk_actions() {
		$actions = array(
			'publish' => __( 'Visible', 'cp' ),
			'unpublish' => __( 'Private', 'cp' ),
			'delete' => __( 'Delete', 'cp' ),
		);
		return $actions;
	}

	public function column_course( $item ) {
		$attributes = CoursePress_Data_Notification::attributes( $item->ID );

		$output = sprintf( '<div data-course="%s">%s</div>',
			$attributes['course_id'],
			$attributes['course_title']
		);

		return $output;
	}

	public function column_status( $item ) {
		/**
		 * check permissions
		 */
		if ( ! CoursePress_Data_Capabilities::can_change_status_notification( $item ) ) {
			return ucfirst( $item->post_status );
		}
		// Publish Course Toggle
		$d_id = $item->ID;
		$status = get_post_status( $d_id );
		$ui = array(
			'label' => '',
			'left' => '<i class="fa fa-key"></i>',
			'left_class' => '',
			'right' => '<i class="fa fa-globe"></i>',
			'right_class' => '',
			'state' => 'publish' === $status ? 'on' : 'off',
			'data' => array(
				'nonce' => wp_create_nonce( 'publish-notification' ),
			),
		);
		$ui['class'] = 'notification-' . $d_id;
		$publish_toggle = ! empty( $d_id ) ? CoursePress_Helper_UI::toggle_switch( 'publish-notification-toggle-' . $d_id, 'publish-notification-toggle-' . $d_id, $ui ) : '';

		return $publish_toggle;
	}

	public static function get_course_id( $course ) {
		return is_object( $course ) ? $course->ID : null;
	}

	protected function course_filter( $which = '' ) {
		if ( 'top' !== $which ) {
			return;
		}

		if ( is_null( $this->_categories ) ) {
			$this->_categories = CoursePress_Data_Course::get_course_categories();

			$two = '';
		} else {
			$two = '2';
		}

		if ( empty( $this->_categories ) ) {
			return;
		}

		$page = get_query_var( 'page', 'coursepress_notifications' );

		$s = isset( $_GET['s'] ) ? sanitize_text_field( $_GET['s'] ) : '';
		$course_id = isset( $_GET['course_id'] ) ? sanitize_text_field( $_GET['course_id'] ) : '';

		echo '<form method="GET">';
		echo '<input type="hidden" name="page" value="' . $page . '" />';
		echo '<input type="hidden" name="s" value="' . $s . '" />';
		echo "<label for='course-category-selector-" . esc_attr( $which ) . "' class='screen-reader-text'>" . __( 'Select course category', 'cp' ) . '</label>';

		$options = array();
		$options['value'] = $course_id;
		$options['first_option'] = array(
			'text' => __( 'All courses', 'cp' ),
			'value' => 'all',
		);
		$courses = CoursePress_Data_Capabilities::can_add_notification_to_all() ? false : CoursePress_View_Admin_Communication_Notification::get_courses();
		echo CoursePress_Helper_UI::get_course_dropdown( 'course_id' . $two, 'course_id' . $two, $courses, $options );

		submit_button( __( 'Filter', 'cp' ), 'category-filter', '', false, array( 'id' => "filter-courses$two" ) );
		echo '</form>';
		echo "\n";
	}

	public function extra_tablenav( $which ) {
		if ( 'top' !== $which ) {
			return;
		}

		?>
		<div class="alignleft actions category-filter">
			
		</div>
		<?php
	}
}