<?php

/**
 * Fired during plugin activation
 *
 * @link       www.google.com
 * @since      1.0.0
 *
 * @package    Test_Plugin
 * @subpackage Test_Plugin/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Test_Plugin
 * @subpackage Test_Plugin/includes
 * @author     mehdi akbar <mohdmehdiakbar@cedcommerce.com.com>
 */
class Test_Plugin_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public  function activate() {
		$query="CREATE TABLE `data` (
			`username` varchar(255) NOT NULL,
			`email` varchar(50) NOT NULL,
			`mobile` int(50) NOT NULL,
			`created at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
			`id` int(50) NOT NULL AUTO_INCREMENT,
			PRIMARY KEY (`id`)
		   ) ENGINE=InnoDB DEFAULT CHARSET=utf8";

		require_once(ABSPATH.'wp-admin/includes/upgrade.php');
		dbDelta( $query);


		//create a page on plugin activation
		$get_data=$wpdb->get_row(
			$wpdb->prepare("SELECT * from wp_posts WHERE post_name=%s",
			'page')
		);

		if(!empty($get_data)){

		}else{
			$post_data= array(
				"post_title"=>"page title",
				"post_name"=>"page",
				"post_status"=>"publish",
				"post_author"=>1,
			"post_content"=>"simple page content",
		"post_type"=>"page");
		wp_insert_post( $post_data);

		}
		
	}
	

}



