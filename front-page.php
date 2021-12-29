 <!DOCTYPE html>
 <html <?php language_attributes(); ?>>

 <head>
   <?php get_header(); ?>
 </head>

 <body id="index" <?php body_class(); ?>>
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
   <div class="hero">
     <div class="hero__filter"></div>
     <div class="hero__parts" id="hero__parts"></div>
     <div class="hero__inner">
       <h2 class="hero__copy">CODING<br class="br-tb"> SPECIALIST</h2>
       <h3 class="hero__sub-copy">デザインに忠実な<br class="br-tb">コーディングを提供します</h3>
       <button class="link-btn link-btn--border"><a href="<?php echo get_page_link(101); ?>">CONTACT</a></button>
     </div>
     <div class="scrollbar">
       <span class="scrollbar__txt">SCROLL</span>
       <span class="scrollbar__line"></span>
     </div>
   </div>
   <!-- /.hero -->

   <!-- service -->
   <section class="service m-section">
     <h2 class="section__tit">SERVICE</h2>
     <h3 class="section__tit-sub">事業内容</h3>
     <div class="card">
       <ul class="card__list">
         <li class="card__item">
           <img class="card__img" src="<?php echo get_template_directory_uri(); ?>/image/service_img1@2x.jpg" alt="">
           <h3 class="card__tit">Webサイト制作</h3>
           <p class="card__txt">新規サイトの制作はもちろんサイトリニューアルやランディングページの制作も承ります。</p>
         </li>
         <li class="card__item">
           <img class="card__img" src="<?php echo get_template_directory_uri(); ?>/image/service_img2@2x.jpg" alt="">
           <h3 class="card__tit">CMS構築</h3>
           <p class="card__txt">更新が必要なサイトにはWordPressをご提案しています。テンプレートを一から設計、または既存の静的なサイトのWordPress化も承っております。</p>
         </li>
         <li class="card__item">
           <img class="card__img" src="<?php echo get_template_directory_uri(); ?>/image/service_img3@2x.jpg" alt="">
           <h3 class="card__tit">スマートフォンサイト制作</h3>
           <p class="card__txt">各モバイル端末の画面幅に合わせて、自動的に画面表示を最適化する「モバイルファースト」のサイトを制作をいたします。</p>
         </li>
       </ul>
     </div>
   </section>
   <!-- /.service -->

   <!-- works -->
   <section class="works l-section">
     <div class="slider">
       <ul class="slider__list">
         <?php
          $args = array(
            'posts_per_page' => '3', //全件表示−１
            'post_type' => 'works',
            'orderby' => 'date',
            'order' => 'DESC' //ASC
          );
          $myposts = get_posts($args);
          ?>
         <?php if ($myposts) : ?>
           <?php foreach ($myposts as $post) : setup_postdata($post); ?>
             <?php if (has_post_thumbnail()) :
                $thumbnailID = get_post_thumbnail_id($postID);
                $alt = get_post_meta($thumbnailID, '_wp_attachment_image_alt', true);
              ?>
               <li class="slider__item">
                 <a href="<?php the_permalink();  ?>">
                   <img class="slider__img" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo $alt ?>">
                   <h3 class="works__item"><?php echo the_title(); ?></h3>
                 </a>
               </li>
             <?php endif; ?>
           <?php endforeach; ?>
           <?php wp_reset_postdata(); ?>
         <?php endif; ?>
       </ul>
     </div>
     <div class="works__inner">
       <h2 class="section__tit">WORKS</h2>
       <h3 class="section__tit-sub">制作実績</h3>
       <p class="works__txt">SPAサイトやCMS構築など、<br>
         様々なジャンルのWebサイト制作が可能です。
       </p>
       <button class="link-btn link-btn--bg"><a href="<?php echo get_post_type_archive_link('works'); ?>">MORE</a></button>
     </div>
   </section>
   <!-- /.works -->

   <!-- principle -->
   <section class=" principle m-section">
     <div class="principle__inner">
       <h2 class="section__tit">PRINCIPLE</h2>
       <h3 class="section__tit-sub">方針</h3>
       <div class="principle__lead"><span class="principle__underline">サイトのゴール = <br class="br-tb">要望に沿うこと</span></div>
       <p class="principle__txt">それがWebサイト制作のゴールであり、<br class="br-tb">私が目指すことです。<br>クオリティとスピード、費用対効果を兼ねた<br>
         コーディング作業をいたします。<br>「納品したら終わり」ではなく、<br class="br-tb">納品後のサポートに関しましても、<br>最後まで責任を持って対応させて頂きます。
       </p>
     </div>
   </section>
   <!-- /.principle -->

   <!-- about -->
   <section class="about m-section">
     <h2 class="section__tit">ABOUT</h2>
     <h3 class="section__tit-sub">私について</h3>
     <div class="about__inner">
       <div class="about__sns">
         <div class="about__img-wrap">
           <div class="about__img"></div>
         </div>
         <div class="about__icons-bg">
           <div class="about__sns-icons">
             <a href="https://twitter.com/yoshisuga4"><i class="fab fa-twitter"></i></a>
             <a href="https://codepen.io/yoshisuga"><i class="fab fa-codepen"></i></a>
             <a href="https://github.com/yoshiyuksuganuma/"><i class="fab fa-github"></i></a>
             <a href="#!"><i class="fab fa-instagram"></i></a>
           </div>
         </div>
       </div>
       <div class="about__profile">
         <h3 class="about__tit">Profile</h3>
         <p class="about__txt">
           氏名: 菅沼 良行（すがぬま よしゆき<br>
           出身地: 東京都<br>
           ポートフォリオをご覧いただき誠にありがとうございます！<br>
           WEBコーダーとして活動している菅沼と申します。<br>
           WEBサイト制作・コーディング等、お客様のご要望に丁寧かつ迅速に、ご満足いただけるまで誠意を持って対応させていただきます。<br>
           githubでこの<a href="https://github.com/yoshiyuksuganuma/my-portfolio-code"><span class="color-red border-b">ポートフォリオサイトのソースコード</span></a>を公開していますので、一度ご覧いただければと思います。

         </p>
       </div>
     </div>
   </section>
   <!-- /.about -->

   <!-- blog -->
   <section class="blog m-section">
     <h2 class="section__tit">BLOG</h2>
     <h3 class="section__tit-sub">ブログ</h3>
     <div class="card">
       <ul class="card__list">
         <?php $args = array("post_type" => "post", "orderby" => "DESC", "posts_per_page" => 3);
          $myposts = get_posts($args); ?>
         <?php if ($myposts) : ?>
           <?php foreach ($myposts as $post) : setup_postdata($post); ?>

             <?php if (has_post_thumbnail()) :
                $thumbnailID = get_post_thumbnail_id($postID);
                $alt = get_post_meta($thumbnailID, '_wp_attachment_image_alt', true);
              ?>
               <li class="card__item">
                 <a href="<?php the_permalink(); ?>"><img class="card__img border" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo $alt; ?>"></a>
               <?php else : ?>
                 <a href="<?php the_permalink(); ?>"><img class="card__img border" src="<?php echo get_template_directory_uri(); ?>/image/about_img@2x.png" alt="noimage"></a>
               <?php endif; ?>
               <p class="card__excerpt"><?php echo get_the_excerpt(); ?></p>
               <time class="card__time"><?php the_time('Y-m-d'); ?></time>
               </li>
             <?php endforeach; ?>
             <?php wp_reset_postdata(); ?>
           <?php endif; ?>
       </ul>
     </div>
     <button class="link-btn link-btn--bg"><a href="<?php echo home_url('/blog/'); ?>">MORE</a></button>
   </section>
   <!-- /.blog -->

   <!-- contact -->
   <div class="contact__bg">
     <section class="contact m-section mb-0">
       <div class="contact__inner">
         <h2 class="section__tit">CONTACT</h2>
         <h3 class="section__tit-sub">お問合せ</h3>
         <p class="contact__lead">Webサイトの制作のご依頼やお見積りなど、<br class="br-tb">お気軽にご相談ください。</p>
         <button class="link-btn link-btn--bg"><a href="<?php echo get_page_link('101'); ?>">MORE</a></button>
       </div>
     </section>
   </div>
   <!-- /.contact -->

   <!-- footer -->
   <?php get_footer(); ?>
   <!-- /.footer -->

   <!-- page-top -->
   <div class="page-top">
     <a href="#"><i class="fas fa-arrow-up"></i></a>
   </div>
   <!-- ./page-top -->

   <?php get_template_part('includes/js'); ?>
 </body>

 </html>