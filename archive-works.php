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
                  <h2 class="hero__page-tit">WORKS ARCHIVE</h2>
                  <h3 class="hero__page-tit-ja">制作実績一覧</h3>
            </div>
      </div>
      <!-- /.hero -->
      <div class="post">
            <div class="card">
                  <ul class="card__list">
                        <?php if (have_posts()) :
                              while (have_posts()) :
                                    the_post();
                        ?>


                                    <?php if (has_post_thumbnail()) :
                                          $thumbnailID = get_post_thumbnail_id($postID);
                                          $alt = get_post_meta($thumbnailID, '_wp_attachment_image_alt', true);
                                    ?>
                                          <li class="card__item mb-50">

                                                <a href="<?php the_permalink(); ?>"><img class="card__img border" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo $alt ?>"></a>
                                          <?php endif; ?>
                                          <h2 class="card__tit "><?php the_title(); ?></h2>


                                          </li>
                              <?php
                              endwhile;
                        endif;
                              ?>

                  </ul>
                  <?php the_posts_pagination(
                        array(
                              'mid_size'      => 2, // 現在ページの左右に表示するページ番号の数
                              'prev_next'     => true, // 「前へ」「次へ」のリンクを表示する場合はtrue
                              'prev_text'     => __('&larr; ' .  '前へ'), // 「前へ」リンクのテキスト
                              'next_text'     => __('次へ ' . '&rarr;'), // 「次へ」リンクのテキスト
                              'type'          => 'list', // 戻り値の指定 (plain/list)
                        )
                  ); ?>
            </div>
      </div>
      <footer>
            <?php get_footer(); ?>
      </footer>
      <?php get_template_part('includes/js'); ?>
</body>

</html>