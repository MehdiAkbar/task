

<?php get_header(); ?>
<?php get_sidebar(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
<?php
$wpb_all_query= new WP_Query(array('post_type'=>'custom_projects','post_status'=>'publish'));?>

<?php if ($wpb_all_query->have_posts()): ?>
<ul>
    <?php
    while($wpb_all_query->have_posts()):
        $wpb_all_query->the_post();
        ?>
  
<li>
    <a href="<?php the_permalink();?>"><?php the_title();?></a>
    <p><?php the_content();?></p>

</li> 
<?php endwhile;?>

</ul> 
<?php else :?>
    <p><?php _e('Sorry no post found');?></p>
<?php endif;?>    


<?php
$wpb_all_query= new WP_Query(array('post_type'=>'post','post_status'=>'publish'));?>

<?php if ($wpb_all_query->have_posts()): ?>
<ul>
    <?php
    while($wpb_all_query->have_posts()):
        $wpb_all_query->the_post();
        ?>
  
<li>
    <a href="<?php the_permalink();?>"><?php the_title();?></a>
    <p><?php the_content();?></p>

</li> <br>
<?php endwhile;?>

</ul> 
<?php else :?>
    <p><?php _e('Sorry no post found');?></p>
<?php endif;?>    


 <?php if (is_active_sidebar( 'sidebar-1' )):?>
    <div>
        <div>
            <?php dynamic_sidebar( 'sidebar-1');?>
        </div>
    </div>
    <?php endif;
    ?>

   
    
    

    
</body>
</html>


    

<?php get_footer(); ?>

    