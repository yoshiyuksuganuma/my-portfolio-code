 <footer class="footer">
      <nav class="g-nav d-block">
           <ul class="g-nav__list justify-c">
                <?php
                    //menuIDを取得
                    $menu_name = 'footer_menu';
                    $locations = get_nav_menu_locations();
                    $menu = wp_get_nav_menu_object($locations[$menu_name]);
                    $menu_items = wp_get_nav_menu_items($menu->term_id);

                    ?>
                <?php foreach ($menu_items as $item) : ?>
                     <!-- カスタムメニューの説明欄に入力した画像パス用のデータを取得 -->
                     <li class="g-nav__item">
                          <a class="g-nav__link" href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a>
                     </li>
                <?php endforeach; ?>
           </ul>
      </nav>
      <small class="footer__small">MY PORTFOLIO DEVELOPED BY YOSHIYUKI SUGANUMA</small>
      <div class="page-top">
           <i class="fas fa-arrow-up"></i>
      </div>
 </footer>
 <?php wp_footer(); ?>