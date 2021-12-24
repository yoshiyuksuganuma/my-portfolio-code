<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php get_header(); ?>
</head>
<body <?php body_class(); ?>>
<?php get_template_part('includes/loader_orientation'); ?>
<header>
<?php get_template_part('includes/logo'); ?>
<nav>
 <?php get_template_part('includes/navigation'); ?>
</nav>
</header>
<div class="post-container">
<?php $cat = get_the_category(); 
              $cat = $cat[0];
            
        ?>
<h2 class="wf-page-title"><?php echo $cat->cat_name; ?></h2>
 

<?php if(have_posts() ) :
      while(have_posts() ) :
      the_post();
?>
 
<div class="post-archive-blog">
<?php if(has_post_thumbnail()) : 
      $thumbnailID = get_post_thumbnail_id( $postID );
      $alt = get_post_meta($thumbnailID, '_wp_attachment_image_alt', true);
      ?>
        
       <a href="<?php the_permalink(); ?>"><img class="thumbnail" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo $alt; ?>"></a>
       <?php else : ?>
        <a href="<?php the_permalink(); ?>"><img class="thumbnail" src="<?php echo get_template_directory_uri(); ?>/images/noimage.png" alt="noimage"></a>
       <?php endif; ?>
        
         
<p class="archive-blog-ex"><?php echo get_the_excerpt(); ?></p>
 
</div>
<?php 
      endwhile;
      endif;
?>
 <?php
//Pagenation 
if ( function_exists( "pagination" ) ) {
        pagination( $additional_loop->max_num_pages );
}
?>
</div>
 
 <footer>
<?php get_footer(); ?>
</footer>
<?php get_template_part('includes/js'); ?>
</body>
</html>