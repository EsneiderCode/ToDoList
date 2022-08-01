
<!--<?php
/**
 * Шаблон шапки (header.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */
?>
<!DOCTYPE html>
<div>
  <?php dynamic_sidebar( 'top-area' ); ?>
      <?php
        wp_nav_menu( array( 'theme_location' => 'secondary' ) );
        ?>
</div>
<html <?php language_attributes(); // вывод атрибутов языка ?>>
<head>
  <link rel="stylesheet" href="/var/www/cloudindevs/wordpress/wp-content/themes/my_theme/style.css"/>
  <meta charset="<?php bloginfo( 'charset' ); // кодировка ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php /* RSS и всякое */ ?>
  <link rel="alternate" type="application/rdf+xml" title="RDF mapping" href="<?php bloginfo('rdf_url'); ?>">
  <link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo('rss_url'); ?>">
   <link rel="alternate" type="application/rss+xml" title="Comments RSS" href="<?php bloginfo('comments_rss2_url'); ?>">
   
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  
  <?php /* Все скрипты и стили теперь подключаются в functions.php */ ?>

  [if lt IE 9]>
  <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  
  <!--<?php get_search_form(); ?>-->
<!--</head>
<body <?php body_class(); // все классы для body ?>>
  <header>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="navbar navbar-default">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topnav" aria-expanded="false">
                <span class="sr-only">Меню</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="collapse navbar-collapse" id="topnav">
              <?php $args = array( // опции для вывода верхнего меню, чтобы они работали, меню должно быть создано в админке
                'theme_location' => 'top', // идентификатор меню, определен в register_nav_menus() в functions.php
                'container'=> false, // обертка списка, тут не нужна
                  'menu_id' => 'top-nav-ul', // id для ul
                  'items_wrap' => '<ul id="%1$s" class="nav navbar-nav %2$s">%3$s</ul>',
                'menu_class' => 'top-menu', // класс для ul, первые 2 обязательны       
                  );
              ?>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>-->



  <?php dynamic_sidebar( 'top-area' ); ?>
      <?php
        wp_nav_menu( array( 'theme_location' => 'secondary' ) );
        ?>
<html>
  <?php wp_head(); ?>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="http://localhost/wordpress/wp-content/themes/my_theme/assets/css/header.css">
</head>
  <body>
    <div class="principal-container-header">
      <header>
        <div class="header-bg">
            <a href="https://sfedu.ru/" title="" >
            <img class="png_sfedu"  src="http://localhost/wordpress/wp-content/uploads/2022/07/ic_logo_sfedu_ru_1.png" alt="SFEDU">
            </a>
            <a href="<?php echo get_site_url();?>" title="" >
            <img class="png_ictis" src="http://localhost/wordpress/wp-content/uploads/2022/07/ic_logo_ictis_ru_2.png" alt="ICTIS">
            </a>
        </div>
        <div class="header">
            <?php get_search_form(); ?>
        </div>
      </header>
    </div>
  </body>
</html>

<!-- FUNCTIONALITY FOR THE MENU -->
<script src="http://localhost/wordpress/wp-content/themes/my_theme/assets/js/header.js"></script> 


