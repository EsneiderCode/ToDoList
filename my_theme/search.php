<html>
<head>
 <link rel="stylesheet" href="http://localhost/wordpress/wp-content/themes/my_theme/assets/css/search.css">
</head>
  <body>
      <div class="principal-container-allnews">
      <?php get_header();?>
      <?php global $wp_query;?>
      <?php if ( have_posts() ) {?>
      <div class="conteiner-allnews">
            <div class="news-container">
              <section class="conteiner-groupnews">
                    <?php  for($i =0 ; $i < 5; $i++) { the_post();
                    if( $wp_query->current_post == $wp_query->post_count ) {
                      break;
                    }?>
                    <div class="new">
                        <div class="img-new" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                        <?php if ( has_post_thumbnail()) { ?>
                        <?php the_post_thumbnail(); ?>
                        <?php } else {?>
                                <img src="http://localhost/wordpress/wp-content/uploads/2022/07/newnoimage.png">
                          <?php }?>
                        </div>
                        <div class="info-date-container">
                        <?php if(has_category('students_life')){?>
                          <img class="logo-tema-new" src="http://localhost/wordpress/wp-content/uploads/2022/07/ic_ictis_stud.png" alt="" /><?php }?>
                          <?php if(has_category('jumbo')){?>
                          <img class="logo-tema-new" src="http://localhost/wordpress/wp-content/uploads/2022/07/ic_ictis_important.png" alt="" /><?php }?>
                          <?php if(has_category('announcement')){?>
                          <img class="logo-tema-new" src="http://localhost/wordpress/wp-content/uploads/2022/07/ic_ictis_ads.png" alt="" /><?php }
                        else{?><img class="logo-tema-new" src="http://localhost/wordpress/wp-content/uploads/2022/07/ic_ictis.png" alt="" /><?php }?>
                        <span ><?php the_date()?></span>
                        </div>
                          <a class="textnew-p" href="<?php the_permalink(); ?>"><?php title_limit(100, '...')?></a>
                    </div>
                    <?php }?>
              </section>
            <?php if (  $wp_query->max_num_pages > 1 )
            echo '<div class="misha_loadmore">Больше новостей</div>'; // you can use <a> as well
            echo " </div>
            </div>";?>
            <?php wp_reset_postdata(); ?>
            <?php get_footer();?>
        <?php  echo "</div>";
        }
        else {?><div class="conteiner-allnews"><div class="news-container"><h2 class="title-allnews">Результаты по данному запросу не найдены.</h2></div></div> <?php }?>
      </div>
  </body>
</html>