<?php
/**
 * @group coursepress-core
 */
class CoursePress_Data_Course_Test extends CoursePress_UnitTestCase {

	public function __construct() {
		parent::__construct();
	}

	public function test_exists() {
		$this->assertTrue( class_exists( 'CoursePress_Data_Course' ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_format' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_taxonomy' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_message' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_default_messages' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'update' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'add_instructor' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'remove_instructor' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_setting' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'update_setting' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'delete_setting' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'set_setting' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'allow_pages' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'upgrade_settings' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_post_type_name' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_post_category_name' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_terms' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_course_terms' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_course_categories' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_units' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_unit_ids' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_listing_image' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_units_with_modules' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_units_with_modules3' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'uasort_modules' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_unit_modules' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'filter_unit_module_where' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'set_last_course_id' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'last_course_id' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'is_paid_course' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_users' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_students' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_student_ids' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'count_students' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_certified_student_ids' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'student_enrolled' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'enroll_student' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'withdraw_student' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'withdraw_all_students' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'send_invitation' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'is_full' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_time_estimation' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_instructors' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_facilitators' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'structure_visibility' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'previewability' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'can_view_page' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'can_view_module' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'can_view_unit' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_next_accessible_module' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_prev_accessible_module' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_course_navigation_items' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_current_course_id' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'by_name' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_permalink' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'count_courses' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_course' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_course_url' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'is_course_preview' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'time_now' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'strtotime' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'is_course_available' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'reorder_modules' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_course_availability_status' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'can_access' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_course_id' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_courses_by_ids' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'course_class' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_vars' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_units_html_list' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_expired_courses' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_enrollment_ended_courses' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'return_id' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'current_and_upcoming_courses' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'sort_courses' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_course_status' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_enrollment_status' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'check_post_type_by_post' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'save_course_number' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'add_numeric_identifier_to_course_name' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'delete_course_number' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'is_course' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_enrollment_types_array' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_enrollment_type_default' ) ) );
		$this->assertTrue( is_callable( array( 'CoursePress_Data_Course', 'get_defaults_setup_pages_content' ) ) );
	}

	public function test_get_format() {
		$assert = CoursePress_Data_Course::get_format();
		$this->assertNotEmpty( $assert );
		$this->assertEquals( 'course', $assert['post_type'] );
	}

	public function test_get_taxonomy() {
		$assert = CoursePress_Data_Course::get_taxonomy();
		$this->assertNotEmpty( $assert );
		$this->assertEquals( 'course_category', $assert['taxonomy_type'] );
		$this->assertEquals( 'course', $assert['post_type'] );
	}

	/**
	 * set_last_course_id()
	 * last_course_id()
	 * is_paid_course()
	 */
	public function test_course() {
		$post = get_post( $this->course->ID );
		$this->assertInstanceOf( 'WP_Post', $post );
		$this->assertEquals( $post->post_type, CoursePress_Data_Course::get_post_type_name() );
		$keys = array(
			'post_author',
			'post_title',
			'post_excerpt',
			'post_content',
			'ping_status',
			'comment_status',
		);
		foreach ( $keys as $key ) {
			$this->assertEquals( $post->$key, $this->course->$key );
		}

		/**
		 * Settings
		 */
		$stack = CoursePress_Data_Course::update_setting( $this->course->ID, 'test_key', 'test_value' );
		$this->assertTrue( $stack );

		$settings = CoursePress_Data_Course::get_setting( $this->course->ID );
		$this->assertNotEmpty( $settings );

		$settings = CoursePress_Data_Course::get_setting( $this->course->ID, 'test_key' );
		$this->assertEquals( $settings, 'test_value' );

		/**
		 * set/get last_course_id
		 */
		$assert = CoursePress_Data_Course::set_last_course_id( $this->course->ID );
		$this->assertEmpty( $assert );
		$assert = CoursePress_Data_Course::last_course_id();
		$this->assertNotEmpty( $assert );
		$this->assertEquals( $this->course->ID, $assert );

		/**
		 * Paid?
		 */
		$assert = CoursePress_Data_Course::is_paid_course( 'foo' );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );
		$assert = CoursePress_Data_Course::is_paid_course( 0 );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );
		$assert = CoursePress_Data_Course::is_paid_course( array() );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );
		$assert = CoursePress_Data_Course::is_paid_course( $this->course->ID );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );
	}

	/**
	 * get_message( $key, $alternate = '' )
	 * get_default_messages( $key = '' ) {
	 */
	public function test_messages() {
		$keys = array( 'ca', 'cu', 'usc', 'ud', 'ua', 'uu', 'as', 'ac', 'dc', 'us', 'usl', 'is', 'ia' );
		$assert = CoursePress_Data_Course::get_default_messages();
		$this->has_keys( $keys, $assert );
	}

	/**
	 * function update( $course_id, $data )
	 */
	public function test_update() {
		/**
		 * Wrong data
		 */
		$assert = CoursePress_Data_Course::update( 'foo', 'foo' );
		$this->assertNotEmpty( $assert );
		$this->assertInternalType( 'integer', $assert );
		$assert = CoursePress_Data_Course::update( 0, 0 );
		$this->assertNotEmpty( $assert );
		$this->assertInternalType( 'integer', $assert );
		$assert = CoursePress_Data_Course::update( 'bar', array() );
		$this->assertNotEmpty( $assert );
		$this->assertInternalType( 'integer', $assert );
		$assert = CoursePress_Data_Course::update( $this->course->ID, 'foo' );
		$this->assertNotEmpty( $assert );
		$this->assertInternalType( 'integer', $assert );
		$assert = CoursePress_Data_Course::update( $this->course->ID, 0 );
		$this->assertNotEmpty( $assert );
		$this->assertInternalType( 'integer', $assert );
		$assert = CoursePress_Data_Course::update( $this->course->ID, array() );
		$this->assertNotEmpty( $assert );
		$this->assertInternalType( 'integer', $assert );
		/**
		 * Good data
		 */
		$data = (object) array(
			'course_excerpt' => 'foo',
			'course_name' => 'bar',
			'course_description' => 'baz',
		);
		$assert = CoursePress_Data_Course::update( $this->course->ID, $data );
		$this->assertNotEmpty( $assert );
		$this->assertInternalType( 'integer', $assert );
		$this->assertEquals( $this->course->ID, $assert );
		$post = get_post( $assert );
		$this->assertEquals( $data->course_excerpt, $post->post_excerpt );
		$this->assertEquals( $data->course_name, $post->post_title );
		$this->assertEquals( $data->course_description, $post->post_content );
		/**
		 * revert
		 */
		$data->course_excerpt = $this->post_excerpt;
		$data->course_name = $this->post_title;
		$data->course_description = $this->post_content;
		CoursePress_Data_Course::update( $this->course->ID, $data );
	}

	/**
	 * add_instructor( $course_id, $instructor_id )
	 * remove_instructor( $course_id, $instructor_id )
	 */
	public function test_instructor() {
		/**
		 * Wrong data
		 */
		$assert = CoursePress_Data_Course::add_instructor( 'foo', 'bar' );
		$this->assertEmpty( $assert );
		$assert = CoursePress_Data_Course::add_instructor( 0, 0 );
		$this->assertEmpty( $assert );
		/**
		 * Good data
		 */
		$assert = CoursePress_Data_Course::add_instructor( $this->course->ID, $this->admin->ID );
		$this->assertEmpty( $assert );
		$assert = CoursePress_Data_Course::remove_instructor( $this->course->ID, $this->admin->ID );
		$this->assertEmpty( $assert );
	}

	/**
	 * get_setting( $course_id, $key = true, $default = null )
	 * set_setting( &$settings, $key, $value )
	 * delete_setting( $course_id, $key = true )
	 */
	public function test_settings() {
		/**
		 * Wrong data
		 */
		$assert = CoursePress_Data_Course::get_setting( 'foo', 'bar', 'baz' );
		$this->assertNotEmpty( $assert );
		$this->assertEquals( 'baz', $assert );
		$assert = CoursePress_Data_Course::get_setting( 'foo', false );
		$this->assertEmpty( $assert );
		$assert = CoursePress_Data_Course::get_setting( 'foo', array() );
		$this->assertEmpty( $assert );
		$assert = CoursePress_Data_Course::get_setting( 0, 'bar', 'baz' );
		$this->assertNotEmpty( $assert );
		$this->assertEquals( 'baz', $assert );
		$assert = CoursePress_Data_Course::get_setting( 0, false );
		$this->assertEmpty( $assert );
		$assert = CoursePress_Data_Course::get_setting( 0, array() );
		$this->assertEmpty( $assert );
		$settings = 'baz';
		$assert = CoursePress_Data_Course::set_setting( $settings, 'foo', 'bar' );
		$this->assertEmpty( $assert );
		$settings = null;
		$assert = CoursePress_Data_Course::set_setting( $settings, 'foo', 'bar' );
		$this->assertEmpty( $assert );
		/**
		 * Good data
		 */
		$assert = CoursePress_Data_Course::get_setting( $this->course->ID, true );
		$this->assertNotEmpty( $assert );
		$this->assertInternalType( 'array', $assert );
		$assert = CoursePress_Data_Course::get_setting( $this->course->ID, 'foo' );
		$this->assertEmpty( $assert );
		$settings = CoursePress_Data_Course::get_setting( $this->course->ID, true );
		$assert = CoursePress_Data_Course::set_setting( $settings, 'foo', 'bar' );
		$this->assertEmpty( $assert );
		$assert = CoursePress_Data_Course::get_setting( $this->course->ID, 'foo' );
		$this->assertEquals( '', $assert );
		$assert = CoursePress_Data_Course::delete_setting( $this->course->ID, 'foo' );
		$this->assertFalse( $assert );
		$assert = CoursePress_Data_Course::get_setting( $this->course->ID, 'foo' );
		$this->assertEmpty( $assert );

	}

	/**
	 * allow_pages( $course_id )
	 */
	public function test_allow_pages() {
		$test = array(
			'course_discussion' => true,
			'workbook' => true,
			'grades' => true,
		);
		/**
		 * Wrong data
		 */
		$assert = CoursePress_Data_Course::allow_pages( 'foo' );
		$this->assertEqualSetsWithIndex( $test, $assert );
		$assert = CoursePress_Data_Course::allow_pages( 0 );
		$this->assertEqualSetsWithIndex( $test, $assert );
		/**
		 * Good data
		 */
		$assert = CoursePress_Data_Course::allow_pages( $this->course->ID );
		$this->assertEqualSetsWithIndex( $test, $assert );
	}


	/**
	 * get_units( $course_id, $status = array( 'publish' ), $ids_only = false, $include_count = false )
	 * get_unit_ids( $course_id, $status = array( 'publish' ), $include_count = false )
	 */
	public function test_units() {
		/**
		 * Wrong data
		 */
		$assert = CoursePress_Data_Course::get_units( 'foo' );
		$this->assertInternalType( 'array', $assert );
		$assert = CoursePress_Data_Course::get_units( 0 );
		$this->assertInternalType( 'array', $assert );
		$assert = CoursePress_Data_Course::get_unit_ids( 'foo' );
		$this->assertInternalType( 'array', $assert );
		$assert = CoursePress_Data_Course::get_unit_ids( 0 );
		$this->assertInternalType( 'array', $assert );
		/**
		 * Good data
		 */
		$units_ids = array();
		foreach ( $this->course->units as $unit ) {
			$units_ids[] = $unit->ID;
		}
		$assert = CoursePress_Data_Course::get_units( $this->course->ID, array( 'publish' ), true );
		$this->assertInternalType( 'array', $assert );
		$this->assertEqualSets( $units_ids, $assert );
		$assert = CoursePress_Data_Course::get_unit_ids( $this->course->ID );
		$this->assertInternalType( 'array', $assert );
		$this->assertEqualSets( $units_ids, $assert );
		$assert = CoursePress_Data_Course::get_units( $this->course->ID );
		$this->assertInternalType( 'array', $assert );
		foreach ( $assert as $unit ) {
			$this->assertInstanceOf( 'WP_Post', $unit );
		}
		$assert = CoursePress_Data_Course::get_units( $this->course->ID, array( 'publish' ), false, true );
		$this->assertInternalType( 'array', $assert );
		$this->assertArrayHasKey( 'units', $assert );
		$this->assertArrayHasKey( 'found', $assert );
		foreach ( $assert['units'] as $unit ) {
			$this->assertInstanceOf( 'WP_Post', $unit );
		}
		$this->assertEquals( count( $this->course->units ), $assert['found'] );
	}

	/**
	 * get_listing_image( $course_id )
	 */
	public function test_get_listing_image() {
		/**
		 * Wrong data
		 */
		$assert = CoursePress_Data_Course::get_listing_image( 'foo' );
		$this->assertFalse( $assert );
		$assert = CoursePress_Data_Course::get_listing_image( 0 );
		$this->assertFalse( $assert );
		$assert = CoursePress_Data_Course::get_listing_image( array() );
		$this->assertFalse( $assert );
		$assert = CoursePress_Data_Course::get_listing_image( null );
		$this->assertFalse( $assert );
		/**
		 * Good data
		 */
		$assert = CoursePress_Data_Course::get_listing_image( $this->course->ID );
		$this->assertInternalType( 'string', $assert );
		$this->assertEquals( '', $assert );
	}

	/**
	 * get_units_with_modules( $course_id, $status = array( 'publish' ) )
	 */
	public function test_get_units_with_modules() {
		/**
		 * Wrong data
		 */
		$assert = CoursePress_Data_Course::get_units_with_modules( 'foo' );
		$this->assertInternalType( 'array', $assert );
		$this->assertEquals( array(), $assert );
		$assert = CoursePress_Data_Course::get_units_with_modules( 0 );
		$this->assertInternalType( 'array', $assert );
		$this->assertEquals( array(), $assert );
		/**
		 * Good data
		 */
		$assert = CoursePress_Data_Course::get_units_with_modules( $this->course->ID );
		$this->assertInternalType( 'array', $assert );
		foreach ( $assert as $unit_id => $data ) {
			$this->assertInternalType( 'array', $data );
			foreach ( $data['pages'] as $page ) {
				$this->assertInternalType( 'array', $page );
				foreach ( $page['modules'] as $module ) {
					$this->assertInstanceOf( 'WP_Post', $module );
				}
			}
		}
	}

	/**
	 * get_key()
	 */
	public function test_get_key() {
		$assert = CoursePress_Data_Course::get_key();
		$this->assertInternalType( 'string', $assert );
		$this->assertEquals( '', $assert );
		$assert = CoursePress_Data_Course::get_key( false );
		$this->assertInternalType( 'string', $assert );
		$this->assertEquals( '', $assert );
		$assert = CoursePress_Data_Course::get_key( array() );
		$this->assertInternalType( 'string', $assert );
		$this->assertEquals( '', $assert );
		$assert = CoursePress_Data_Course::get_key( 'foo' );
		$this->assertInternalType( 'string', $assert );
		$this->assertEquals( 'foo', $assert );
		$assert = CoursePress_Data_Course::get_key( 'foo', 'bar' );
		$this->assertInternalType( 'string', $assert );
		$this->assertEquals( 'foo_bar', $assert );
	}

	/**
	 * get_unit_modules( $unit_id, $status = array( 'publish' ), $ids_only = false, $include_count = false, $args = array() )
	 */
	public function test_get_unit_modules() {
		/**
		 * Wrong data
		 */
		$assert = CoursePress_Data_Course::get_unit_modules( 'foo' );
		$this->assertInternalType( 'array', $assert );
		$this->assertEquals( array(), $assert );
		$assert = CoursePress_Data_Course::get_unit_modules( 0 );
		$this->assertInternalType( 'array', $assert );
		$this->assertEquals( array(), $assert );
		$assert = CoursePress_Data_Course::get_unit_modules( array() );
		$this->assertInternalType( 'array', $assert );
		$this->assertEquals( array(), $assert );
		/**
		 * Good data
		 */
		$assert = CoursePress_Data_Course::get_unit_modules( 'foo' );
		foreach ( $this->course->units as $unit ) {
			$assert = CoursePress_Data_Course::get_unit_modules( $unit->ID );
			$this->assertInternalType( 'array', $assert );
			foreach ( $assert as $module ) {
				$this->assertInstanceOf( 'WP_Post', $module );
			}
		}
	}

	/**
	 * get_students( $course_id, $per_page = 0, $offset = 0, $fields = 'all' )
	 * get_student_ids( $course_id, $count = false )
	 * count_students( $course_id )
	 * student_enrolled( $student_id, $course_id )
	 * get_certified_student_ids( $course_id )
	 * withdraw_student( $student_id, $course_id )
	 */
	public function test_students() {
		/**
		 * Wrong data
		 */
		$assert = CoursePress_Data_Course::get_students( 'foo', -1 );
		$this->assertInternalType( 'array', $assert );
		$this->assertEquals( array(), $assert );

		$assert = CoursePress_Data_Course::get_students( 0, -1 );
		$this->assertInternalType( 'array', $assert );
		$this->assertEquals( array(), $assert );

		$assert = CoursePress_Data_Course::get_students( 0, 'aaa' );
		$this->assertInternalType( 'array', $assert );
		$this->assertEquals( array(), $assert );

		$assert = CoursePress_Data_Course::get_student_ids( 'foo' );
		$this->assertInternalType( 'array', $assert );
		$this->assertEquals( array(), $assert );

		$assert = CoursePress_Data_Course::get_student_ids( 0 );
		$this->assertInternalType( 'array', $assert );
		$this->assertEquals( array(), $assert );

		$assert = CoursePress_Data_Course::get_student_ids( 'foo', true );
		$this->assertInternalType( 'integer', $assert );
		$this->assertEquals( 0, $assert );

		$assert = CoursePress_Data_Course::get_student_ids( 0, true );
		$this->assertInternalType( 'integer', $assert );
		$this->assertEquals( 0, $assert );

		$assert = CoursePress_Data_Course::get_certified_student_ids( 'foo' );
		$this->assertInternalType( 'array', $assert );
		$this->assertEquals( array(), $assert );

		$assert = CoursePress_Data_Course::get_certified_student_ids( 0 );
		$this->assertInternalType( 'array', $assert );
		$this->assertEquals( array(), $assert );

		$assert = CoursePress_Data_Course::count_students( 'foo', true );
		$this->assertInternalType( 'integer', $assert );
		$this->assertEquals( 0, $assert );

		$assert = CoursePress_Data_Course::count_students( 0 );
		$this->assertInternalType( 'integer', $assert );
		$this->assertEquals( 0, $assert );

		$assert = CoursePress_Data_Course::get_student_ids( 'foo' );
		$this->assertInternalType( 'array', $assert );
		$this->assertEquals( array(), $assert );

		$assert = CoursePress_Data_Course::student_enrolled( 'foo', 'bar' );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );

		$assert = CoursePress_Data_Course::student_enrolled( 'foo', $this->course->ID );
		$this->assertInternalType( 'string', $assert );
		$this->assertEquals( '', $assert );

		$assert = CoursePress_Data_Course::student_enrolled( $this->student->ID, 'bar' );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );
		/**
		 * Good data
		 */
		$assert = CoursePress_Data_Course::get_students( $this->course->ID, -1 );
		$this->assertInternalType( 'array', $assert );
		$this->assertEquals( array(), $assert );

		$assert = CoursePress_Data_Course::get_student_ids( $this->course->ID );
		$this->assertInternalType( 'array', $assert );
		$this->assertEquals( array(), $assert );

		$assert = CoursePress_Data_Course::get_student_ids( $this->course->ID, true );
		$this->assertInternalType( 'integer', $assert );
		$this->assertEquals( 0, $assert );

		$assert = CoursePress_Data_Course::count_students( $this->course->ID );
		$this->assertInternalType( 'integer', $assert );
		$this->assertEquals( 0, $assert );

		$assert = CoursePress_Data_Course::student_enrolled( $this->student->ID, $this->course->ID );
		$this->assertInternalType( 'string', $assert );
		$this->assertEquals( '', $assert );

		$assert = CoursePress_Data_Course::get_certified_student_ids( $this->course->ID );
		$this->assertInternalType( 'array', $assert );
		$this->assertEquals( array(), $assert );

		$assert = CoursePress_Data_Course::withdraw_student( 0, 0 );
		$this->assertEmpty( $assert );
		$assert = CoursePress_Data_Course::withdraw_student( 0, 'bar' );
		$this->assertEmpty( $assert );
		$assert = CoursePress_Data_Course::withdraw_student( 'foo', 0 );
		$this->assertEmpty( $assert );
		$assert = CoursePress_Data_Course::withdraw_student( 'foo', 'bar' );
		$this->assertEmpty( $assert );

		$assert = CoursePress_Data_Course::withdraw_all_students( 'foo' );
		$this->assertEmpty( $assert );
		$assert = CoursePress_Data_Course::withdraw_all_students( 0 );
		$this->assertEmpty( $assert );

		/**
		 * enroll_student
		 */
		$assert = CoursePress_Data_Course::enroll_student( $this->student->ID, $this->course->ID );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertTrue( $assert );

		$assert = CoursePress_Data_Course::get_students( $this->course->ID, -1 );
		$this->assertInternalType( 'array', $assert );
		$assert = $assert[0];
		$this->assertInstanceOf( 'WP_User', $assert );
		$this->assertEquals( $this->student->ID, $assert->ID );

		$assert = CoursePress_Data_Course::get_student_ids( $this->course->ID );
		$this->assertInternalType( 'array', $assert );
		$this->assertEquals( array( $this->student->ID ), $assert );

		$assert = CoursePress_Data_Course::get_student_ids( $this->course->ID, true );
		$this->assertInternalType( 'integer', $assert );
		$this->assertEquals( 1, $assert );

		$assert = CoursePress_Data_Course::count_students( $this->course->ID );
		$this->assertInternalType( 'integer', $assert );
		$this->assertEquals( 1, $assert );

		$assert = CoursePress_Data_Course::student_enrolled( $this->student->ID, $this->course->ID );
		$this->assertInternalType( 'string', $assert );
		$this->assertRegExp( '/^[\d \-\:]+$/', $assert );

		$assert = CoursePress_Data_Course::get_certified_student_ids( $this->course->ID );
		$this->assertInternalType( 'array', $assert );
		$this->assertEquals( array(), $assert );

		/**
		 * withdraw_student
		 */
		$assert = CoursePress_Data_Course::withdraw_student( $this->student->ID, $this->course->ID );
		$this->assertEmpty( $assert );

		$assert = CoursePress_Data_Course::count_students( $this->course->ID );
		$this->assertInternalType( 'integer', $assert );
		$this->assertEquals( 0, $assert );

		/**
		 * enroll_student
		 */
		$assert = CoursePress_Data_Course::enroll_student( $this->student->ID, $this->course->ID );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertTrue( $assert );

		$assert = CoursePress_Data_Course::get_student_ids( $this->course->ID, true );
		$this->assertInternalType( 'integer', $assert );
		$this->assertEquals( 1, $assert );

		/**
		 * withdraw_all_students
		 */
		$assert = CoursePress_Data_Course::withdraw_all_students( $this->course->ID );
		$this->assertEmpty( $assert );

		$assert = CoursePress_Data_Course::count_students( $this->course->ID );
		$this->assertInternalType( 'integer', $assert );
		$this->assertEquals( 0, $assert );
	}

	/**
	 * send_invitation( $email_data )
	 */
	public function test_send_invitation() {
		/**
		 * TODO
		 */
	}

	/**
	 * is_full( $course_id )
	 */
	public function test_is_full() {
		/**
		 * Wrong data
		 */
		$assert = CoursePress_Data_Course::is_full( 0 );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );
		$assert = CoursePress_Data_Course::is_full( 'foo' );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );
		/**
		 * Good data
		 */
		$assert = CoursePress_Data_Course::is_full( $this->course->ID );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );

		CoursePress_Data_Course::enroll_student( $this->student->ID, $this->course->ID );

		$assert = CoursePress_Data_Course::is_full( $this->course->ID );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertTrue( $assert );

		CoursePress_Data_Course::withdraw_all_students( $this->course->ID );
	}

	/**
	 * get_time_estimation( $course_id )
	 */
	public function test_get_time_estimation() {
		/**
		 * Wrong data
		 */
		$assert = CoursePress_Data_Course::get_time_estimation( 'foo' );
		$this->assertInternalType( 'string', $assert );
		$this->assertEquals( '00:00:00', $assert );
		$assert = CoursePress_Data_Course::get_time_estimation( 0 );
		$this->assertInternalType( 'string', $assert );
		$this->assertEquals( '00:00:00', $assert );
		$assert = CoursePress_Data_Course::get_time_estimation( array() );
		$this->assertInternalType( 'string', $assert );
		$this->assertEquals( '00:00:00', $assert );
		/**
		 * Good data
		 */
		$assert = CoursePress_Data_Course::get_time_estimation( $this->course->ID );
		$this->assertInternalType( 'string', $assert );
		$this->assertRegExp( '/^[\d \-\:]+$/', $assert );
	}

	/**
	 * get_instructors( $course_id, $objects = false )
	 */
	public function test_get_instructors() {
		/**
		 * Wrong data
		 */
		$assert = CoursePress_Data_Course::get_instructors( 0 );
		$this->assertInternalType( 'array', $assert );
		$this->assertEquals( array(), $assert );
		$assert = CoursePress_Data_Course::get_instructors( 0, true );
		$this->assertInternalType( 'array', $assert );
		$this->assertEquals( array(), $assert );
		$assert = CoursePress_Data_Course::get_instructors( 'foo' );
		$this->assertInternalType( 'array', $assert );
		$this->assertEquals( array(), $assert );
		$assert = CoursePress_Data_Course::get_instructors( 'foo', true );
		$this->assertInternalType( 'array', $assert );
		$this->assertEquals( array(), $assert );
		/**
		 * Good data
		 */
		$assert_default = CoursePress_Data_Course::get_instructors( $this->course->ID );
		$this->assertInternalType( 'array', $assert_default );
		$assert = CoursePress_Data_Course::get_instructors( $this->course->ID, false );
		$this->assertInternalType( 'array', $assert );
		$this->assertEquals( $assert_default, $assert );
		$this->assertEquals( array( $this->instructor->ID ), $assert );

		$assert = CoursePress_Data_Course::get_instructors( $this->course->ID, true );
		$this->assertInternalType( 'array', $assert );
		foreach ( $assert as $user ) {
			$this->assertInstanceOf( 'WP_User', $user );
		}
	}

	/**
	 * get_facilitators( $course_id, $objects = false )
	 */
	public function test_get_facilitators() {
		/**
		 * Wrong data
		 */
		$assert = CoursePress_Data_Course::get_facilitators( 0 );
		$this->assertInternalType( 'array', $assert );
		$this->assertEquals( array(), $assert );
		$assert = CoursePress_Data_Course::get_facilitators( 0, true );
		$this->assertInternalType( 'array', $assert );
		$this->assertEquals( array(), $assert );
		$assert = CoursePress_Data_Course::get_facilitators( 'foo' );
		$this->assertInternalType( 'array', $assert );
		$this->assertEquals( array(), $assert );
		$assert = CoursePress_Data_Course::get_facilitators( 'foo', true );
		$this->assertInternalType( 'array', $assert );
		$this->assertEquals( array(), $assert );
		/**
		 * Good data
		 */
		$assert_default = CoursePress_Data_Course::get_facilitators( $this->course->ID );
		$this->assertInternalType( 'array', $assert_default );
		$assert = CoursePress_Data_Course::get_facilitators( $this->course->ID, false );
		$this->assertInternalType( 'array', $assert );
		$this->assertEquals( $assert_default, $assert );
		$this->assertEquals( array( $this->facilitator->ID ), $assert );

		$assert = CoursePress_Data_Course::get_facilitators( $this->course->ID, true );
		$this->assertInternalType( 'array', $assert );
		foreach ( $assert as $user ) {
			$this->assertInstanceOf( 'WP_User', $user );
		}
	}

	/**
	 * structure_visibility( $course_id )
	 */
	public function test_structure_visibility() {
		$keys = array( 'structure', 'has_visible' );
		/**
		 * Wrong data
		 */
		$assert = CoursePress_Data_Course::structure_visibility( 'foo' );
		$this->has_keys( $keys, $assert );
		$this->assertEquals( array(), $assert['structure'] );
		$this->assertFalse( $assert['has_visible'] );
		$assert = CoursePress_Data_Course::structure_visibility( 0 );
		$this->has_keys( $keys, $assert );
		$this->assertEquals( array(), $assert['structure'] );
		$this->assertFalse( $assert['has_visible'] );
		/**
		 * Good data
		 */
		$assert = CoursePress_Data_Course::structure_visibility( $this->course->ID );
		$this->has_keys( $keys, $assert );
		foreach ( $this->course->units as $unit ) {
			$this->assertArrayHasKey( $unit->ID, $assert['structure'] );
		}
		$this->assertTrue( $assert['has_visible'] );
	}

	/**
	 * previewability( $course_id )
	 */
	public function test_previewability() {
		$keys = array( 'structure', 'has_previews' );
		/**
		 * Wrong data
		 */
		$assert = CoursePress_Data_Course::previewability( 'foo' );
		$this->has_keys( $keys, $assert );
		$this->assertEquals( array(), $assert['structure'] );
		$this->assertFalse( $assert['has_previews'] );
		$assert = CoursePress_Data_Course::previewability( 0 );
		$this->has_keys( $keys, $assert );
		$this->assertEquals( array(), $assert['structure'] );
		$this->assertFalse( $assert['has_previews'] );
		/**
		 * Good data
		 */
		$assert = CoursePress_Data_Course::previewability( $this->course->ID );
		$this->has_keys( $keys, $assert );
		$this->assertFalse( $assert['has_previews'] );
	}

	/**
	 * can_view_page( $course_id, $unit_id, $page = 1, $student_id = false )
	 */
	public function test_can_view_page() {
		/**
		 * Wrong data
		 */
		$assert = CoursePress_Data_Course::can_view_page( 'foo', 'bar', 'baz', 'quz' );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );
		$assert = CoursePress_Data_Course::can_view_page( 0, 'bar', 'baz', 'quz' );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );
		$assert = CoursePress_Data_Course::can_view_page( 0, 0, 'baz', 'quz' );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );
		$assert = CoursePress_Data_Course::can_view_page( 0, 0, 0, 'quz' );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );
		$assert = CoursePress_Data_Course::can_view_page( 0, 0, 0, 0 );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );
		/**
		 * Good data
		 */
		foreach ( $this->course->units as $unit ) {
			$assert = CoursePress_Data_Course::can_view_page( $this->course->ID, $unit->ID, 1, $this->student->ID );
			$this->assertInternalType( 'boolean', $assert );
			$this->assertFalse( $assert );
		}
		CoursePress_Data_Course::enroll_student( $this->student->ID, $this->course->ID );
		foreach ( $this->course->units as $unit ) {
			$assert = CoursePress_Data_Course::can_view_page( $this->course->ID, $unit->ID, 1, $this->student->ID );
			$this->assertInternalType( 'boolean', $assert );
			$this->assertTrue( $assert );
		}
		CoursePress_Data_Course::withdraw_all_students( $this->course->ID );
	}

	/**
	 * can_view_module( $course_id, $unit_id, $module_id, $page = 1, $student_id = false )
	 */
	public function test_can_view_module() {
		/**
		 * Wrong data
		 */
		$assert = CoursePress_Data_Course::can_view_module( 'foo', 'bar', 'baz', 'quz', 'gaz' );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );
		$assert = CoursePress_Data_Course::can_view_module( 0, 'bar', 'baz', 'quz', 'gaz' );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );
		$assert = CoursePress_Data_Course::can_view_module( 0, 0, 'baz', 'quz', 'gaz' );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );
		$assert = CoursePress_Data_Course::can_view_module( 0, 0, 0, 'quz', 'gaz' );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );
		$assert = CoursePress_Data_Course::can_view_module( 0, 0, 0, 0, 'gaz' );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );
		$assert = CoursePress_Data_Course::can_view_module( 0, 0, 0, 0, 0 );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );
		/**
		 * Good data
		 */
		$modules = $this->get_modules();
		foreach ( $modules as $module ) {
			$assert = CoursePress_Data_Course::can_view_module( $this->course->ID, $module->post_parent, $module->ID, 1, $this->student->ID );
			$this->assertInternalType( 'boolean', $assert );
			$this->assertFalse( $assert );
		}
		CoursePress_Data_Course::enroll_student( $this->student->ID, $this->course->ID );
		foreach ( $modules as $module ) {
			$assert = CoursePress_Data_Course::can_view_module( $this->course->ID, $module->post_parent, $module->ID, 1, $this->student->ID );
			$this->assertInternalType( 'boolean', $assert );
			$this->assertTrue( $assert );
		}
		CoursePress_Data_Course::withdraw_all_students( $this->course->ID );
	}

	/**
	 * can_view_unit( $course_id, $unit_id, $student_id = false )
	 */
	public function test_can_view_unit() {
		/**
		 * Wrong data
		 */
		$assert = CoursePress_Data_Course::can_view_unit( 'bar', 'baz', 'quz' );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );

		$assert = CoursePress_Data_Course::can_view_unit( 0, 'baz', 'quz' );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );

		$assert = CoursePress_Data_Course::can_view_unit( 0, 0, 'quz' );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );

		$assert = CoursePress_Data_Course::can_view_unit( 0, 0, 0 );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );
		/**
		 * Good data
		 */
		foreach ( $this->course->units as $unit ) {
			$assert = CoursePress_Data_Course::can_view_unit( $this->course->ID, $unit->ID, $this->student->ID );
			$this->assertInternalType( 'boolean', $assert );
			$this->assertFalse( $assert );
		}
		CoursePress_Data_Course::enroll_student( $this->student->ID, $this->course->ID );
		foreach ( $this->course->units as $unit ) {
			$assert = CoursePress_Data_Course::can_view_unit( $this->course->ID, $unit->ID, $this->student->ID );
			$this->assertInternalType( 'boolean', $assert );
			$this->assertTrue( $assert );
		}
		CoursePress_Data_Course::withdraw_all_students( $this->course->ID );
	}

	/**
	 *
	 * get_next_accessible_module( $course_id, $unit_id, $current_page = 1, $current_module = 0 )
	 */
	public function test_get_next_accessible_module() {
		wp_set_current_user( $this->student->ID );
		$next = array( 'id' => false );
		/**
		 * Wrong data
		 */
		$assert = CoursePress_Data_Course::get_next_accessible_module( 'foo', 'bar', 'baz', 'qux' );
		$this->assertInternalType( 'array', $assert );
		$this->assertEqualSets( $next, $assert );

		$assert = CoursePress_Data_Course::get_next_accessible_module( 0, 'bar', 'baz', 'qux' );
		$this->assertInternalType( 'array', $assert );
		$this->assertEqualSets( $next, $assert );

		$assert = CoursePress_Data_Course::get_next_accessible_module( 0, 0, 'baz', 'qux' );
		$this->assertInternalType( 'array', $assert );
		$this->assertEqualSets( $next, $assert );

		$assert = CoursePress_Data_Course::get_next_accessible_module( 0, 0, 0, 'qux' );
		$this->assertInternalType( 'array', $assert );
		$this->assertEqualSets( $next, $assert );

		$assert = CoursePress_Data_Course::get_next_accessible_module( 0, 0, 0, 0 );
		$this->assertInternalType( 'array', $assert );
		$this->assertEqualSets( $next, $assert );
		/**
		 * Good data
		 */
		$modules = $this->get_modules();
		foreach ( $modules as $module ) {
			$assert = CoursePress_Data_Course::get_next_accessible_module( $this->course->ID, $module->post_parent, 1, $module->ID );
			$this->assertInternalType( 'array', $assert );
			$this->assertEqualSets( $next, $assert );
		}
	}

	/**
	 *
	 * get_prev_accessible_module( $course_id, $unit_id, $current_page = 1, $current_module = 0 )
	 */
	public function test_get_prev_accessible_module() {
		wp_set_current_user( $this->student->ID );
		$next = array( 'id' => false );
		/**
		 * Wrong data
		 */
		$assert = CoursePress_Data_Course::get_prev_accessible_module( 'foo', 'bar', 'baz', 'qux' );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );

		$assert = CoursePress_Data_Course::get_prev_accessible_module( 0, 'bar', 'baz', 'qux' );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );

		$assert = CoursePress_Data_Course::get_prev_accessible_module( 0, 0, 'baz', 'qux' );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );

		$assert = CoursePress_Data_Course::get_prev_accessible_module( 0, 0, 0, 'qux' );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );

		$assert = CoursePress_Data_Course::get_prev_accessible_module( 0, 0, 0, 0 );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );

		/**
		 * Good data
		 */
		$keys = array( 'id', 'type', 'section', 'unit', 'url', 'course_id' );
		$modules = $this->get_modules();
		foreach ( $modules as $module ) {
			$assert = CoursePress_Data_Course::get_prev_accessible_module( $this->course->ID, $module->post_parent, 1, $module->ID );
			$this->assertInternalType( 'array', $assert );
			$this->has_keys( $keys, $assert );
		}
	}

	/**
	 * get_course_navigation_items( $course_id )
	 */
	public function test_get_course_navigation_items() {
		wp_set_current_user( $this->student->ID );
		/**
		 * Wrong data
		 */
		$assert = CoursePress_Data_Course::get_course_navigation_items( 'foo' );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );

		$assert = CoursePress_Data_Course::get_course_navigation_items( 0 );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );

		$assert = CoursePress_Data_Course::get_course_navigation_items( array() );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );

		$assert = CoursePress_Data_Course::get_course_navigation_items( null );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );

		/**
		 * Good data
		 */
		$keys = array( 'id', 'type', 'section', 'unit', 'url', 'course_id' );
		$assert = CoursePress_Data_Course::get_course_navigation_items( $this->course->ID );
		foreach ( $assert as $data ) {
			$this->assertInternalType( 'array', $data );
			$this->has_keys( $keys, $data );
		}
	}

	/**
	 * get_current_course_id()
	 */
	public function test_get_current_course_id() {
		global $wp;
		$assert = CoursePress_Data_Course::get_current_course_id();
		$this->assertInternalType( 'integer', $assert );
		$this->assertEquals( 0, $assert );

		$wp->set_query_var( 'coursename', 'foo' );
		$this->assertInternalType( 'integer', $assert );
		$this->assertEquals( 0, $assert );

		$wp->set_query_var( 'coursename', 0 );
		$this->assertInternalType( 'integer', $assert );
		$this->assertEquals( 0, $assert );

		$wp->set_query_var( 'coursename', null );
		$this->assertInternalType( 'integer', $assert );
		$this->assertEquals( 0, $assert );

		$wp->set_query_var( 'coursename', array() );
		$this->assertInternalType( 'integer', $assert );
		$this->assertEquals( 0, $assert );

		$wp->set_query_var( 'coursename', $this->course->post_name );
		$assert = CoursePress_Data_Course::get_current_course_id();
		$this->assertInternalType( 'integer', $assert );
		$this->assertEquals( $this->course->ID, $assert );
	}

	/**
	 * get_permalink( $course_id )
	 */
	public function test_get_permalink() {
		/**
		 * Wrong data
		 */
		$assert = CoursePress_Data_Course::get_permalink( 0 );
		$this->assertInternalType( 'string', $assert );

		$assert = CoursePress_Data_Course::get_permalink( array() );
		$this->assertInternalType( 'string', $assert );

		$assert = CoursePress_Data_Course::get_permalink( null );
		$this->assertInternalType( 'string', $assert );

		$assert = CoursePress_Data_Course::get_permalink( 'foo' );
		$this->assertInternalType( 'string', $assert );

		/**
		 * Good data
		 */
		$assert = CoursePress_Data_Course::get_permalink( $this->course->ID );
		$this->assertInternalType( 'string', $assert );
		$re = sprintf( '@%s/$@', $this->course->post_name );
		$this->assertRegExp( $re, $assert );

	}

	/**
	 * count_courses()
	 */
	public function test_count_courses() {
		$assert = CoursePress_Data_Course::count_courses();
		$this->assertInternalType( 'integer', $assert );
		$this->assertEquals( 1, $assert );
	}

	/**
	 * get_course( $course_id = 0 ) {
	 */
	public function test_get_course() {
		/**
		 * Wrong data
		 */
		$assert = CoursePress_Data_Course::get_course( 0 );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );

		$assert = CoursePress_Data_Course::get_course( 'foo' );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );

		$assert = CoursePress_Data_Course::get_course( array() );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );

		$assert = CoursePress_Data_Course::get_course( null );
		$this->assertInternalType( 'boolean', $assert );
		$this->assertFalse( $assert );

		/**
		 * Good data
		 */
		$assert = CoursePress_Data_Course::get_course( $this->course->ID );
		$this->assertInstanceOf( 'WP_Post', $assert );
		$this->assertEquals( $this->course->ID, $assert->ID );
	}

	/**
	 * duplicate_course( $data )
	 */
	public function xxxx_duplicate_course() {
		/** TODO **/
		$data = (object) array( 'data' => array( 'course_id' => 0 ) );
		$values = array( 0, null, array(), 'foo' );
		/**
		 * Wrong data
		 */
		foreach ( $values as $value ) {
			$assert = CoursePress_Data_Course::duplicate_course( $value );
			print_r( array( gettype( $assert ), $assert ) );

			$data->data->course_id = $value;
			$assert = CoursePress_Data_Course::duplicate_course( $data );
			print_r( array( gettype( $assert ), $assert ) );
		}
		/**
		 * Good data
		 */
		$data->data->course_id = $this->course->ID;
		$assert = CoursePress_Data_Course::duplicate_course( $data );
		print_r( array( gettype( $assert ), $assert ) );
	}
}

/**
print_r(array( gettype( $assert ), $assert));
 * Wrong data
 */
/**
 * Good data
 */