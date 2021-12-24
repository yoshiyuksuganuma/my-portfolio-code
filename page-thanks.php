 <?php
      /*
Template Name: thanks
*/
      ?>

 <!DOCTYPE html>
 <html <?php language_attributes(); ?>>

 <head>
       <?php get_header(); ?>
 </head>

 <body <?php body_class(); ?>>

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
       <?php if (have_posts()) :
                  while (have_posts()) :
                        the_post();
            ?>
                   <div class="thanks-inner">
                         <?php the_content(); ?>
                         <a class="thanks-inner__link" href="<?php echo esc_url(home_url('/')); ?>">HOMEへ戻る&rarr;</a>
                   </div>

       <?php endwhile;
            endif;
            ?>
       <footer>
             <?php get_footer(); ?>
       </footer>
       <?php get_template_part('includes/js'); ?>
 </body>

 </html>