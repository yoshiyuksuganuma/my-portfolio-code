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
<?php if(have_posts()):
      while(have_posts()):
      the_post(); 
?>
<?php the_content(); ?>
<?php $name = $_GET['username']; ?>
<?php echo $name; ?>
<?php endwhile; 
      endif; 
?>
<footer>
<?php get_footer(); ?>
</footer>
<?php get_template_part('includes/js'); ?>
</body>
</html>