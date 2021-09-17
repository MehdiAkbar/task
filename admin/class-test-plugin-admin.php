<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.google.com
 * @since      1.0.0
 *
 * @package    Test_Plugin
 * @subpackage Test_Plugin/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Test_Plugin
 * @subpackage Test_Plugin/admin
 * @author     mehdi akbar <mohdmehdiakbar@cedcommerce.com.com>
 */
class Test_Plugin_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Test_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Test_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/test-plugin-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Test_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Test_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/test-plugin-admin.js', array( 'jquery' ), $this->version, false );

	}
	public function menu_method(){
		 add_menu_page( 'dynamic menu', 'dynamic menu', 'manage_options', 'test-plugin', array($this,"menu_dashboard"));

		 add_submenu_page("test-plugin", "sub", "sub", "manage_options", "test-plugin", array($this,"menu_dashboard"));
		 add_submenu_page("test-plugin", "sub2", "sub2", "manage_options", "sub-menu", array($this,"submenu_dashboard"));
	}
	public function menu_dashboard(){
		global $wpdb ;
		// $user_email=$wpdb->get_var("SELECT user_email from wp_users");
		// echo $user_email;
		// $user=$wpdb->get_row("SELECT * from wp_users WHERE ID=1",ARRAY_A);
		// echo "<pre>";
		// print_r($user);

		$usercol=$wpdb->get_col("SELECT post_title from wp_posts ");
		echo "<pre>";
		print_r($usercol);

	}
	public function submenu_dashboard(){
		echo"<h3>This is sub menu</h3>";


	}

	
	
	
}

	