  <html>
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Swiper CSS -->
            <link rel="stylesheet" href="http://localhost/wordpress/wp-content/themes/my_theme/assets/css/swiper-bundle.min.css" />
            <!-- CSS -->
            <link rel="stylesheet" href="http://localhost/wordpress/wp-content/themes/my_theme/assets/css/style.css" />
            <link rel="stylesheet" href="http://localhost/wordpress/wp-content/themes/my_theme/assets/css/index.css"> 
        </head>
  <body>
      <div class="principal-container">
          <?php
            /**
             * Главная страница (index.php)
             * @package WordPress
             * @subpackage your-clean-template-3
             */
            get_header(); // подключаем header.php ?>
          <div class="container-content">
                 <?php
                $arg = array(
                    'post_type'      => 'post',
                    'posts_per_page' => 4,
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                    'category_name' => 'jumbo'
                );
                $gal = new WP_Query($arg);
                ?>
              <div class="container-slider">
                  <?php if ( $gal->have_posts() ) : ?>
                  <?php while ( $gal->have_posts() ) : $gal->the_post(); ?>
                  <div class="mySlides">
                      <?php if ( has_post_thumbnail()) { ?>
                      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                          <div class="img-container-slider">
                              <?php the_post_thumbnail(); ?>
                              <div class="title-img-slider">
                                <span class="span-title-slider"><?php title_limit(50, '...'); ?></span>
                              </div>
                          </div>
                      </a>
                      <?php } ?>
                  </div>
                  <?php endwhile; ?>
                  <?php endif; ?>
                  <div class="elements">
                      <span class="quadrate" onclick="currentSlide(1)"></span>
                      <span class="quadrate" onclick="currentSlide(2)"></span>
                      <span class="quadrate" onclick="currentSlide(3)"></span>
                      <span class="quadrate" onclick="currentSlide(4)"></span>
                  </div>
              </div>
              <?php wp_reset_postdata(); ?>
              <div class="container-calendar">
                     <h2>Календарь</h2>
                     <?php echo do_shortcode('[my_calendar format="mini"]'); ?>
                     <?php  echo do_shortcode('[my_calendar_upcoming]'); ?>
              </div>
              <?php
            $argum = array(
                'post_type'      => 'post',
                'posts_per_page' => 7,
                'orderby'        => 'date',
                'order'          => 'DESC',
                'category_name' => 'jumbo'
            );
            $qu = new WP_Query($argum);
            ?>
          <?php    if ( $qu->have_posts() ) : ?>
              <div class="container-announcement">
                  <section class="title-container-an">
                      <h2>Объявления</h2>
                  </section>
                  <section class="announcements-container">
                      <?php while ( $qu->have_posts() ) : $qu->the_post(); ?>
                      <div class="an-container">
                          <a class="an-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                          <p class="an-paragraph"><?php the_excerpt() ?></p>
                          <span class="an-date"><?php the_date();?></span>
                      </div>
                      <?php endwhile; ?>
                  </section>
              </div>
              <?php endif; ?>
              <?php wp_reset_postdata(); ?>
              <?php
                $args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => 6,
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                    'category_name' => 'featured'
                );
                $q = new WP_Query($args);
                ?>
              <?php
                $category_link = get_category_link( 5 );
                if ( $q->have_posts() ) : ?>
              <h2 class="news-title"><a href="<?php echo $category_link?>">Новости</a></h2>
              <div class="container-news">
                  <?php while ( $q->have_posts() ) : $q->the_post(); ?>
                  <div class="new">
                      <div class="img-new">
                          <?php if ( has_post_thumbnail()) { ?>
                          <a class="href-img" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">

                              <?php the_post_thumbnail();?>
                          </a>
                          <?php } else { ?>
                          <a class="href-img" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                              <img src="http://localhost/wordpress/wp-content/uploads/2022/07/newnoimage.png">
                          </a>
                          <?php }?>
                      </div>
                      <div class="new-date">
                          <?php if (has_category('students_life')){?>
                          <img class="logo-date"
                              src="http://localhost/wordpress/wp-content/uploads/2022/07/ic_ictis_stud.png"
                              alt="logo-date"><?php }
                   else{?> <img class="logo-date"
                              src="http://localhost/wordpress/wp-content/uploads/2022/07/ic_ictis.png"
                              alt="logo-date"><?php } ?>
                          <span><?php the_date();?></span>
                      </div>
                      <a class="title-new" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  </div>
                  <?php endwhile; ?>
              </div>
              <?php endif; ?>
              <?php wp_reset_postdata(); ?>
              <?php
                $ar = array(
                    'post_type'      => 'post',
                    'posts_per_page' => 7,
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                    'category_name' => 'media-gallery'
                );
                $que = new WP_Query($ar);
                ?>
              <?php if ( $que->have_posts() ) : ?>
              <h2 class="gallery-title">Галерея</h2>
              <div class="gallery-container">
                  <div class="slide-container swiper">
                      <div class="slide-content">
                          <div class="shadow shadow-left"></div>
                          <div class="shadow shadow-right"></div>
                          <div class="card-wrapper swiper-wrapper">
                              <?php while ( $que->have_posts() ) : $que->the_post(); ?>
                              <div class="card swiper-slide">
                                  <div class="image-content">
                                      <div class="card-image">
                                          <div class="card-img">
                                              <?php if ( has_post_thumbnail()) { ?>
                                              <a href="<?php the_permalink(); ?>"
                                                  title="<?php the_title_attribute(); ?>">
                                                  <?php the_post_thumbnail();  ?>
                                              </a>
                                              <?php } else { ?>
                                              <a href="<?php the_permalink(); ?>"
                                                  title="<?php the_title_attribute(); ?>">
                                                  <img
                                                      src="http://localhost/wordpress/wp-content/uploads/2022/07/newnoimage.png">
                                              </a>
                                              <?php }?>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <?php endwhile; ?>
                          </div>
                      </div>
                      <div class="swiper-button-next swiper-navBtn arrow-class"></div>
                      <div class="swiper-button-prev swiper-navBtn arrow-class"></div>
                  </div>
              </div>
              <?php endif; ?>
          </div>
          <?php wp_reset_postdata(); ?>
          <?php get_footer(); // подключаем footer.php ?>
      </div>
  </body>
  </html>
  <!-- JS  -->
    <script src="http://localhost/wordpress/wp-content/themes/my_theme/assets/js/swiper-bundle.min.js"></script>;
    <script src="http://localhost/wordpress/wp-content/themes/my_theme/assets/js/index.js"></script>