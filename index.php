<!DOCTYPE html>
<html lang='ja'>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <title>
    <?php
    if ( is_single() ){ wp_title('::', true, 'right'); }
    bloginfo('name');
    ?>
  </title>
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url');echo'?'.filemtime(get_stylesheet_directory().'/style.css');?>" media="screen" />
  <link href="http://fonts.googleapis.com/css?family=Josefin+Sans:400,600,700" rel="stylesheet" />
  <?php
  if ( is_singular() ) {
    wp_enqueue_script( "comment-reply" );
  }
  ?>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <header>
    <h1 id="siteTitle"><a href="<?php echo home_url('/'); ?>"><span><?php bloginfo('name'); ?></span></a></h1>
    <p id="description"><?php bloginfo('description'); ?></p>
  </header>

  <nav id="siteNavigator">
    <?php wp_nav_menu( 'theme_location = header-navi' ); ?>
  </nav>

  <main>

    <article>

    <?php
    if (have_posts()) : // WordPress Loop
      while (have_posts()) : the_post(); ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

          <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
          <p class="post-meta">
            <span class="post-date"><?php the_date(); ?></span>
            <span class="category">Category - <?php the_category(', ') ?></span>
            <span class="comment-num"><?php comments_popup_link('Comment : 0', 'Comment : 1', 'Comments : %'); ?></span>
          </p>

          <?php the_content('続きを読む &raquo;', true); ?>

        </div>
      <?php
      endwhile;
    else : ?>
        <div class="post">
          <h2>Article Not Found!</h2>
          <p>お探しの記事は見つかりませんでした。</p>
        </div>
    <?php
    endif;

    if ( $wp_query->max_num_pages > 1 ) : ?>
      <div class="navigation">
        <div class="alignleft"><?php next_posts_link('&laquo; PREV'); ?></div>
        <div class="alignright"><?php previous_posts_link('NEXT &raquo;'); ?></div>
      </div>
    <?php
    endif;
    ?>

    </article>

    <aside>

      <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
          <?php dynamic_sidebar( 'sidebar-1' ); ?>
      <?php else: ?>

      <div class="widget">
        <h2>Recent posts</h2>
        <ul>
          <?php $args = array(
            'type' => 'postbypost',
            'limit' => 5
          );
          wp_get_archives($args); ?>
        </ul>
      </div>

      <div class="widget">
        <h2>Meta</h2>
      <ul>
        <?php wp_register(); ?>
        <li><?php wp_loginout(); ?></li>
        <?php wp_meta(); ?>
      </ul>
      </div>

    <?php endif; ?>
    </aside>

  </main>

  <footer>
      <p id="copyright" class="wrapper">&copy <?php bloginfo('name'); ?> All Rights Reserved.</p>
  </footer>

  <?php wp_footer(); ?>

</body>

</html>
