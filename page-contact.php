<?php
/* 
Template Name: contact
*/
?>


<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <?php get_header(); ?>
</head>

<body <?php body_class(); ?>>

  <!-- header -->
  <header class="header">
    <?php get_template_part('includes/logo'); ?>
    <button class="burger-btn">
      <span class="burger-btn__bar"></span>
      <span class="burger-btn__bar"></span>
      <span class="burger-btn__bar"></span>
    </button>
    <?php get_template_part('includes/navigation'); ?>
  </header>
  <!-- /.header -->

  <!-- hero -->
  <div class="hero hero--bg-contact">
    <div class="hero__inner">
      <h2 class="hero__page-tit">CONTACT</h2>
      <h3 class="hero__page-tit-ja">お問い合わせ</h3>
    </div>
  </div>
  <!-- /.hero -->

  <h2 class="contact-form__lead">Webサイトの制作のご依頼やお見積りなど、<br class="br-tb">お気軽にご相談ください。</h2>
  <div class="contact-form">
    <div class="contact-form__inner">
      <?php
      if (have_posts()) : while (have_posts()) : the_post(); ?>
          <?php the_content(); ?>
      <?php endwhile;
      endif; ?>
    </div>
  </div>




  <footer>
    <?php get_footer(); ?>
  </footer>
  <?php get_template_part('includes/js'); ?>
</body>

</html>