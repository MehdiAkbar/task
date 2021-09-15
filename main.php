<?php
/**
 * Plugin Name: My First Plugin
 * Plugin URI: http://www.mywebsite.com/my-first-plugin
 * Description: The very first plugin that I have ever created.
 * Version: 1.0
 * Author: Mohd Mehdi Akbar
 * Author URI: http://www.mywebsite.com
 */
//Add Custom Metabox
function hcf_register_meta_boxes() {
    add_meta_box( 'hcf-1', __( 'Hello Custom Field', 'hcf' ), 'hcf_display_callback', 'custom_projects' );
}
add_action( 'add_meta_boxes', 'hcf_register_meta_boxes' );

function hcf_display_callback( $post ) {
    include plugin_dir_path( __FILE__ ) . './form.php';

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
}
add_action( 'save_post', 'hcf_save_meta_box' );

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


?>
