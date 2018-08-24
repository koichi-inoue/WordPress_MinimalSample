<?php

  // メインカラム幅｜これが定義されていると画像アップの際に最適化される
  if ( ! isset( $content_width ) ) $content_width = 576;

  // カスタムメニュー ON
  add_theme_support('menus');

  register_nav_menus( array(
    'header-navi' => 'ヘッダーのナビゲーション',
    'footer-navi' => 'フッターのナビゲーション',
  ));

  // ダイナミックサイドバー
  register_sidebar( array(
    'name' => 'サイドバーウィジェット01',
    'id' => 'sidebar-1',
    'description' => 'サイドバーのウィジェットエリア（デフォルトのサイドバーと入れ替える場合に使用）',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
  ));

  // ダイナミックサイドバー２
  /*
  register_sidebar(array(
    'name' => 'サイドバーウィジェット02',
    'id' => 'sidebar-2',
    'description' => 'サイドバーのウィジェットのテスト',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
  ));
  */

?>
