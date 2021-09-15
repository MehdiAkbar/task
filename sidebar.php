<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/style.css">
</head>

<body>
    <div id="sidebar">
        <div id="search">
            <h2>Search</h2>
            <?php get_search_form(); ?>
        </div>
		
<div id="recent">
	<h2>Recent Post</h2>
	<?php
    $new_loop = new WP_Query( array(
    'post_type' => 'custom_projects',
        'posts_per_page' => 5 
    ) );
?>

<?php if ( $new_loop->have_posts() ) : ?>
    <?php while ( $new_loop->have_posts() ) : $new_loop->the_post(); ?>
	<ul>
		<li><li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li><br>
</li>
	</ul>


          

    <?php endwhile;?>
<?php else: ?>
<?php endif; ?>
<?php wp_reset_query(); ?>
</div>
<div>
	<h2>Taxonomy</h2>
<?php
    

    $taxonomy = 'Category';
    $terms = get_terms($taxonomy); 
    
    if ( $terms && !is_wp_error( $terms ) ) :
    ?>
        <ul>
            <?php foreach ( $terms as $term ) { ?>
                <li><a href="<?php echo get_term_link($term->slug, $taxonomy); ?>"><?php echo $term->name; ?><?php echo $term->content; ?></a><br></li>
            <?php } ?>
        </ul>
    <?php endif;?>
</div>
        


             
    </div>
    <!-- end #sidebar -->
</body>

</html>