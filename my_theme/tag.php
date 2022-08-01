<html>
    <head>
        <link rel="stylesheet" href="http://localhost/wordpress/wp-content/themes/my_theme/assets/css/tag.css">
    </head>
    <body>
        <div class="principal-container-tag">
            <?php global $wp_query;
             get_header();
            ?>
            <div class="conteiner-allnews">
                <h2 class="title-allnews"><?php echo "#";single_tag_title( '', true ) ?></h2>
                <div class="news-container">
                    <?php if( have_posts() ){ while ( have_posts() ) : ?>
                    <section class="conteiner-groupnews">
                        <?php  for($i =0 ; $i < 5; $i++) { the_post();
                            if( $wp_query->current_post == $wp_query->post_count ) {
                                break;
                            }               	
                        ?>
                        <div class="new">
                            <?php if ( has_post_thumbnail()) { ?>
                                <a class="img-new" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"> <?php the_post_thumbnail(); ?></a>
                                <?php  } else {?>
                                    <a class="img-new" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="http://localhost/wordpress/wp-content/uploads/2022/07/newnoimage.png">
                                    </a><?php }?>
                            <div class="info-date-container">
                                <?php if(has_category('students_life')){?>
                                <img class="logo-tema-new"
                                    src="http://localhost/wordpress/wp-content/uploads/2022/07/ic_ictis_stud.png"
                                    alt="" /><?php }?>
                                <?php if(has_category('jumbo')){?>
                                <img class="logo-tema-new"
                                    src="http://localhost/wordpress/wp-content/uploads/2022/07/ic_ictis_important.png"
                                    alt="" /><?php }?>
                                <?php if(has_category('announcement')){?>
                                <img class="logo-tema-new"
                                    src="http://localhost/wordpress/wp-content/uploads/2022/07/ic_ictis_ads.png" alt="" /><?php }
                        else{?><img class="logo-tema-new"
                                    src="http://localhost/wordpress/wp-content/uploads/2022/07/ic_ictis.png"
                                    alt="" /><?php }?>
                                <span><?php the_date()?></span>
                            </div>
                            <div class="textnew-p">
                                <a href="<?php the_permalink(); ?>"><?php the_title()?></a>
                            </div>
                        </div>
                        <?php  }?>
                    </section>
                    <?php endwhile;}
                    else{echo "Tags not found";}
                    ?>
                </div>
            </div>
            <?php wp_reset_postdata(); ?>
            <?php get_footer(); // подключаем footer.php ?>
        </div>
    </body>
</html>