<?php
while ( have_posts() ) : the_post();// старт цикла 
if ( in_category( 'media-gallery' ) ) { //ID категории
    include( TEMPLATEPATH.'/single-media-gallery.php' );
} else {
    include( TEMPLATEPATH.'/single-default.php' );
}
endwhile;?>