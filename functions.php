<?php

function d_post(){
    register_post_type( 'custom_projects', array(
        'labels'=>array(
            'name'=>__('custom posts'),
            'single_name'=>__('custom_projects')
        ),
        'public'=>true,
        'show_in_nav_menu'=>true,
        'has_archive'=>false,
        'supports'=>array(),
    )
    );

}

add_action( "init","d_post");


function sidebar(){
    register_sidebar(array(
        'name'=>__('primary sidebar'),
        'id'=>'sidebar-1',
        'before_widget'=>'<aside id="%1$s" class="widget %2$s>',
        'after_widget'=>'</aside>',
        'before_title'=>'<h1 class="widget-title">',
        'after_title'=>'</h1>',
    ));
}


add_action( "widgets_init",'sidebar');


function create_taxonomy(){
    register_taxonomy(
    'Category',
    'custom_projects',
    array('tags',
        'hierarchical'=> true,
        'label'=>'Category',
        'query_var' => true,
		'has_archive' => true,
		'rewrite' => array('slug' => 'Category')
        
    )
    );
}
 add_action( 'init', 'create_taxonomy' );

