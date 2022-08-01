
<?php add_theme_support( 'post-thumbnails' );?>
<?php add_theme_support( 'html5', array( 'search-form' ) ); ?>
<?php
  register_nav_menus(
			array(
				'primary'   => __( 'Top primary menu', 'twentyfourteen' ),
				'secondary' => __( 'Secondary menu in left sidebar', 'twentyfourteen' ),
			)
		);
?>
<?php 
add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		) );
?>

<?php 
register_sidebar( array(
        'name'          => __( 'Sidebar', 'twentyseventeen' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyseventeen' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h6 class="widget-title">',
        'after_title'   => '</h6>',
    ) );
    
    register_sidebar( array(
        'name' => __( 'Шапка.справа', '' ),
        'id' => 'top-area',
        'description' => __( 'Шапка', '' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
?>
<?php function my_excerpt_length( $length ) {
    return 10; // Указываем количество слов
}
add_filter( 'excerpt_length', 'my_excerpt_length' );
add_filter( 'excerpt_more', fn() => '...' );
 ?>

<?php 
add_action('wp_head', 'kama_postviews');
function kama_postviews() {
/* ------------ Настройки -------------- */
$meta_key = 'views'; // Ключ мета поля, куда будет записываться количество просмотров.
$who_count = 2; // Чьи посещения считать? 0 — Всех. 1 — Только гостей. 2 — Только зарегистрированных пользователей.
$exclude_bots = 1; // Исключить ботов, роботов, пауков и прочую нечесть :)? 0 — нет, пусть тоже считаются. 1 — да, исключить из подсчета.
global $user_ID, $post;
if(is_singular()) {
$id = (int)$post->ID;
static $post_views = false;
if($post_views) return true; // чтобы 1 раз за поток
$post_views = (int)get_post_meta($id,$meta_key, true);
$should_count = false;
switch( (int)$who_count ) {
case 0: $should_count = true;
break;
case 1:
if( (int)$user_ID == 0 )
$should_count = true;
break;
case 2:
if( (int)$user_ID > 0 )
$should_count = true;
break;
}
if( (int)$exclude_bots==1 && $should_count ){
$useragent = $_SERVER['HTTP_USER_AGENT'];
$notbot = "Mozilla|Opera"; //Chrome|Safari|Firefox|Netscape — все равны Mozilla
$bot = "Bot/|robot|Slurp/|yahoo"; //Яндекс иногда как Mozilla представляется
if ( !preg_match("/$notbot/i", $useragent) || preg_match("!$bot!i", $useragent) )
$should_count = false;
}
if($should_count)
if( !update_post_meta($id, $meta_key, ($post_views+1)) ) add_post_meta($id, $meta_key, 1, true);
}
return true;
}?>

<?php function change_wp_search_size($query) {
    if ( $query->is_search )
        $query->query_vars['posts_per_page'] = 15;
    return $query;
}
add_filter('pre_get_posts', 'change_wp_search_size');?>

<?php function title_limit($count, $after) {
$title = get_the_title();
if (mb_strlen($title) > $count) $title = mb_substr($title,0,$count);
else $after = '';
echo $title . $after;
} ?>
<?php
function my_jquery_scripts() {
  wp_deregister_script( 'jquery' );
  wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js');
  wp_enqueue_script( 'jquery' ); 
}
add_action( 'wp_enqueue_scripts', 'my_jquery_scripts' );
?>

<?php function misha_my_load_more_scripts() {
 
    global $wp_query; 
 
    // In most cases it is already included on the page and this line can be removed
    wp_enqueue_script('jquery');
 
    // register our main script but do not enqueue it yet
    wp_register_script( 'my_loadmore', get_stylesheet_directory_uri() . '/js/myloadmore.js', array('jquery') );
 
    // now the most interesting part
    // we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
    // you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
    wp_localize_script( 'my_loadmore', 'misha_loadmore_params', array(
        'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
        'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
        'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
        'max_page' => $wp_query->max_num_pages
    ) );
 
    wp_enqueue_script( 'my_loadmore' );
}
 
add_action( 'wp_enqueue_scripts', 'misha_my_load_more_scripts' );

function misha_loadmore_ajax_handler(){
 
    // prepare our arguments for the query
    $args = json_decode( stripslashes( $_POST['query'] ), true );
    $args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
    $args['post_status'] = 'publish';
 
    // it is always better to use WP_Query but not here
    query_posts( $args );
 
    if( have_posts() ) :
 
        // run the loop
        while( have_posts() ):?>
 
          <section class="conteiner-groupnews">
               <?php  for($i =0 ; $i < 5; $i++) { the_post(); ?>
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
       <?php endwhile;
 
    endif;
    die; // here we exit the script and even no wp_reset_query() required!
}
 
 
 
add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}?>

<?php function update_counter_ajax() { 
$postID = trim($_POST['post_id']); 
$count_key = 'download'; 
$counter = get_post_meta($postID, $count_key, true); 
    if($counter==''){ 
        $count = 1; 
        delete_post_meta($postID, $count_key); 
        add_post_meta($postID, $count_key, '1'); 
    }else{ 
        $counter++; 
        update_post_meta($postID, $count_key, $counter); 
    } 
wp_die(); 
} 
add_action('wp_ajax_update_counter', 'update_counter_ajax'); 
add_action('wp_ajax_nopriv_update_counter', 'update_counter_ajax');  