<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.google.com
 * @since      1.0.0
 *
 * @package    Woo_Plugin
 * @subpackage Woo_Plugin/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Woo_Plugin
 * @subpackage Woo_Plugin/admin
 * @author     mehdi akbar <mohdmehdiakbar@cedcommerce.com.com>
 */
class Woo_Plugin_Admin {

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
		 * defined in Woo_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Woo_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/woo-plugin-admin.css', array(), $this->version, 'all' );

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
		 * defined in Woo_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Woo_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/woo-plugin-admin.js', array( 'jquery' ), $this->version, false );

	}

	function pippin_admin_notices() {
		if ( class_exists( 'WooCommerce' ) ) {
			echo "<div class='primary'>
			<p><strong>Sucess</strong>: WooCommerce  activated</p>
		</div>";
		  } else {
			echo  "<div class='error'>
			<p><strong>Error</strong>: WooCommerce not activated</p>
		</div>";
		  }
	}

	//custom metabox


	

    function hcf_register_meta_boxes() {
		add_meta_box( 'hcf-1', __( 'Hello Custom Field', 'hcf' ), array($this,'hcf_display_callback'), 'product' );
	}
	
	function hcf_display_callback() {
		global $post;
		include plugin_dir_path( __FILE__ ) . 'form.php';	
 	}
	
	function hcf_save_meta_box( $post_id ) {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
		if ( $parent_id = wp_is_post_revision( $post_id ) ) {
			$post_id = $parent_id;
		}
		$fields = [
			'hcf_author',
			'hcf_published_date',
			'hcf_price',
		];
		foreach ( $fields as $field ) {
			if ( array_key_exists( $field, $_POST ) ) {
				update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
			}
		 }
	
	
	$the_slug = 'my_slug';
	$args = array(
		'name' => $the_slug,
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => 1,
	);
	$my_posts = get_posts( $args );
	$my_post = current( $my_posts );
	if ( $my_post ) {
		echo get_post_meta( $my_post->ID, 'hcf_author', true );
	}
}
function display(){
	echo esc_attr( get_post_meta( get_the_ID(), 'hcf_author', true ) );
	
  }
  
}

