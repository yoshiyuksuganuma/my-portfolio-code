  <nav class="g-nav">
    <ul class="g-nav__list">
      <?php
      //menuIDを取得
      $menu_name = 'global_nav';
      $locations = get_nav_menu_locations();
      $menu = wp_get_nav_menu_object($locations[$menu_name]);
      $menu_items = wp_get_nav_menu_items($menu->term_id);

      ?>
      <?php foreach ($menu_items as $item) : ?>
        <!-- カスタムメニューの説明欄に入力した画像パス用のデータを取得 -->
        <li class="g-nav__item ">
          <a class="g-nav__link " href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
    </div>
  </nav>

  <nav class="g-nav-sp">
    <ul class="g-nav-sp__list">
      <?php
      //menuIDを取得
      $menu_name = 'global_nav';
      $locations = get_nav_menu_locations();
      $menu = wp_get_nav_menu_object($locations[$menu_name]);
      $menu_items = wp_get_nav_menu_items($menu->term_id);

      ?>
      <?php foreach ($menu_items as $item) : ?>
        <!-- カスタムメニューの説明欄に入力した画像パス用のデータを取得 -->
        <li class="g-nav-sp__item ">
          <a class="g-nav-sp__link " href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
    </div>
  </nav>