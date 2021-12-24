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
      <div class="hero hero--bg-pc">
            <div class="hero__inner">
                  <h2 class="hero__page-tit">WORKS</h2>
                  <h3 class="hero__page-tit-ja">制作実績</h3>
            </div>
      </div>
      <!-- /.hero -->

      <?php if (have_posts()) :
            while (have_posts()) :
                  the_post();
      ?>
                  <div class="post post--single">
                        <div class="card">
                              <h2 class="card__tit card__tit--single txt-left"><?php the_title(); ?></h2>
                              <time class="card__time"><i class="fa fa-refresh"></i><?php the_modified_date("Y年m月d日"); ?></time>
                              <time class="card__time">(<i class="fa fa-clock-o"></i>公開日: <?php the_date("Y年m月d日"); ?>)</time>
                              <?php if (has_post_thumbnail()) :
                                    $thumbnailID = get_post_thumbnail_id($postID);
                                    $alt = get_post_meta($thumbnailID, '_wp_attachment_image_alt', true);
                              ?>

                                    <a href="<?php the_field('link'); ?>"><img class="card__img card__img--single" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo $alt; ?>"></a>
                              <?php else : ?>
                                    <img class="card__img card__img--single" src="<?php echo get_template_directory_uri(); ?>/images/noimage.png" alt="noimage">

                              <?php endif; ?>

                              <div class="post__content"><?php the_content(); ?></div>

                        </div>


            <?php endwhile;
      endif;
            ?>

            <div class="post__link clearfix">
                  <?php $prev =  get_previous_post_link('%link', '<span><i class="fas fa-angle-double-left"></i></span> %title');
                  if ($prev) {
                        $prev = str_replace('<a', '<a class="post__prev-btn post__link-btn"', $prev);
                        echo $prev;
                  }
                  ?>

                  <?php $next =  get_next_post_link('%link', '%title <span><i class="fas fa-angle-double-right"></i></span>');
                  if ($next) {
                        $next = str_replace('<a', '<a class="post__next-btn post__link-btn"', $next);
                        echo $next;
                  }

                  ?>

            </div>

            <a href="<?php echo get_post_type_archive_link('works'); ?>" class="post__archive-back">制作実績一覧へ戻る</a>
                  </div>
                  </div>

                  <footer>
                        <?php get_footer(); ?>
                  </footer>
                  <?php get_template_part('includes/js'); ?>
</body>

</html>