
<?php if ( have_posts() ) while ( have_posts() ) : the_post();// старт цикла 
$main_id = get_the_ID();?>
<!DOCTYPE html>
    <?php
    global $wp;
    $obj_id = get_queried_object_id();
$current_url = get_permalink( $obj_id );
     ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://localhost/wordpress/wp-content/themes/my_theme/assets/css/page.css">
    <title><?php the_title()?></title>
</head>
<body>
  <div class="principal-container-page">
  <?php get_header() ?>
  <div class="container-new-page">
        <h2><?php the_title_attribute();?></h2>
        <?php $attach = get_attached_media( 'image');
        if (!empty($attach)): ?>
          <div class="slide-contenedor">
            <?php $check = get_the_author();
            if ( $check != "" ): ?>
              <span class="white-background"></span>
              <span class="span-slider">Источник:  <span class="span-value"><?php the_author();?></span></span>
            <?php endif;?>
            <?php foreach ($attach as $at){
              $image_url = $at->guid;?>
            <?php
            if ( $at) {
              echo '<div class="miSlider fade"><img src="'. $image_url .'"alt="">
              </div>';
            }
        }
      ?>
               <?php if(count($attach)>1){ echo' <div class="direcciones">
            <a href="#" class="atras" onclick="avanzaSlide(-1)">&#10094;</a>
            <a href="#" class="adelante" onclick="avanzaSlide(1)">&#10095;</a>
        </div>
    </div>';}?>
           <?php endif ?>
           <div class="info-new-date">
             <div class="date-info">
             <?php if(has_category('students_life')){?>
                    <img class="logo-tema-new" src="http://localhost/wordpress/wp-content/uploads/2022/07/ic_ictis_stud.png" alt="" /><?php }?>
                    <?php if(has_category('jumbo')){?>
                    <img class="logo-tema-new" src="http://localhost/wordpress/wp-content/uploads/2022/07/ic_ictis_important.png" alt="" /><?php }?>
                    <?php if(has_category('announcement')){?>
                    <img class="logo-tema-new" src="http://localhost/wordpress/wp-content/uploads/2022/07/ic_ictis_ads.png" alt="" /><?php }
                  else{?><img class="logo-tema-new" src="http://localhost/wordpress/wp-content/uploads/2022/07/ic_ictis.png" alt="" /><?php }?>
                   <span><?php the_date();?></span>
             </div>
             <div class="views-info">
              <span><?php echo get_post_meta ($post->ID,'views',true); ?></span>
              <img src="http://localhost/wordpress/wp-content/uploads/2022/07/Ellipse-66.png" alt="">
             </div>
            </div>
        </section>
        <section class="text-new">
          <p class="text1">
<?php $text = strip_tags(apply_filters('the_content',get_the_content()),"<p><a><br><b><u><i><strong><span><div>");
$pieces = explode("***",$text);
if (count($pieces)==3){echo $pieces[0];
echo '        <div class="container-assetat">

            <div class="border-left"></div>

            <div class="border-right"></div><p>'. $pieces[1] . '</p></div>';
echo $pieces[2];}
else{echo $text;}

?>
          </p>
          <?php $pdfs = get_attached_media("application");
          $docum = get_attached_media('vnd.openxmlformats-officedocument.wordprocessingml.document');
           if(!empty($pdfs)):
            foreach ($pdfs as $pd){?>
          <div class="files-to-download">
            <div class="file">
              <img src="http://localhost/wordpress/wp-content/uploads/2022/07/document.png" alt="">
              <a href="<?php echo $pd["guid"] ?>" ><?php echo $pd["post_title"]; ?></a>
            </div>
          </div>
        <?php  }
    endif;
    ?>

         
            <?php $posttags = get_the_tags();
if ($posttags) {
   echo '<div class="hashtags">';
  foreach($posttags as $tag) {
    echo '<a href="'. get_tag_link($tag->term_id).'">#'.$tag->name . '</a>'; 
  }
}echo '</div>'; ?>
          
          <div class="share-container">
            <div class="share-bottom">
              <a>Поделиться</a>
              <img src="http://localhost/wordpress/wp-content/uploads/2022/07/share.png" alt="arrow">
            </div>

            <p class="shareds"><a id="clicks"><?php echo get_post_meta($post->ID,'download',true); ?></a></p>
            <div class="share-options">
                          <a  href="https://vk.com/share.php?url=<?php echo $current_url?>"><img class="vk-share" src="http://localhost/wordpress/wp-content/uploads/2022/07/VK-1.png" onClick="onClick()" alt="vkshare"></a>
             <a href="https://telegram.me/share/url?url=<?php echo $current_url?>"> <img class="tel-share" src="http://localhost/wordpress/wp-content/uploads/2022/07/Telegram-1.png" onClick="onClick()" alt="telegramshare"></a>
            </div>
          </div>
        </section>

<?php
$tt = get_the_tags();
$c = get_the_category();
$args = array(
    'post_type'      => 'post',
    'posts_per_page' => 4,
    'orderby'        => 'date',
    'order'          => 'DESC',
    'category_id' => $c[0] -> slug,
    'tag_id' => $tt[0]->term_id

);
$och = new WP_Query($args);
?>
<?php if ( $och->have_posts()&& !empty($tt) ) : ?>
    <section class="also-see-container">
          <h2>Смотрите также</h2>
              <div class="another-news-container">
              <?php $i=0;
              while ( $och->have_posts() ) : $och->the_post();
                if(get_the_ID()!=$main_id):
                  if($i<3):
                    $i++; ?>
                  <div class="new1 new">
                    <div class="img-new">
                      <?php if ( has_post_thumbnail()) { ?>
                      <a class="href-img" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                      <?php the_post_thumbnail();} ?>
                      </a>
                    </div>
                    <div class="new-date">
                    <?php if(has_category('students_life')){?>
                    <img class="logo-tema-new" src="http://localhost/wordpress/wp-content/uploads/2022/07/ic_ictis_stud.png" alt="" /><?php }?>
                    <?php if(has_category('jumbo')){?>
                    <img class="logo-tema-new" src="http://localhost/wordpress/wp-content/uploads/2022/07/ic_ictis_important.png" alt="" /><?php }?>
                    <?php if(has_category('announcement')){?>
                    <img class="logo-tema-new" src="http://localhost/wordpress/wp-content/uploads/2022/07/ic_ictis_ads.png" alt="" /><?php }
                  else{?><img class="logo-tema-new" src="http://localhost/wordpress/wp-content/uploads/2022/07/ic_ictis.png" alt="" /><?php }?>
                    <span><?php the_date();?></span>
                    </div>
                    <a  class="title-new" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                 </div>
            <?php 
            else:break;
          endif;

          endif;
          endwhile;?>

               </div>
            <?php endif; ?>
      </section>
      <div class="div-footer">

      <?php wp_reset_postdata(); ?>
<?php get_footer() ?>
      </div>
  </div>
  </div>
</body>
</html>
<?php endwhile; // конец цикла ?>

<script>
  let indice = 1;
muestraSlides(indice);
function avanzaSlide(n){
    muestraSlides( indice+=n );
}
// setInterval(function tiempo(){
//     muestraSlides(indice+=1)
// },4000);
function muestraSlides(n){
    let i;
    let slides = document.getElementsByClassName('miSlider');
    let barras = document.getElementsByClassName('barra');
    if(n > slides.length){
        indice = 1;
    }
    if(n < 1){
        indice = slides.length;
    }
    for(i = 0; i < slides.length; i++){
        slides[i].style.display = 'none';
    }
    for(i = 0; i < barras.length; i++){
        barras[i].className = barras[i].className.replace(" active", "");
    }
    slides[indice-1].style.display = 'block';
    barras[indice-1].className += ' active';
}

 // Share functionality
    const shareButton = document.querySelector('.share-bottom');
    shareButton.addEventListener('click', (e)=>{
      e.preventDefault();
      const shareOptions = document.querySelector('.share-options');
      shareOptions.style.display = 'block';
    })

    let clicks = 0;
    function onClick() {
        var clicks += 1;
        document.getElementById("clicks").innerHTML = clicks;
    };
</script>

  <script>
   
        $( ".vk-share" ).click(function() { 
    $.ajax({ 
     type:"POST", 
     url: 'http://localhost/wordpress/wp-admin/admin-ajax.php', 
     data: { 
        'action':'update_counter', 
        'post_id' : <?php global $post; echo $post->ID; ?> 
     } 
     });  
    }); 

        $( ".tel-share" ).click(function() { 
    $.ajax({ 
     type:"POST", 
     url: 'http://localhost/wordpress/wp-admin/admin-ajax.php', 
     data: { 
        'action':'update_counter', 
        'post_id' : <?php global $post; echo $post->ID; ?> 
     } 
     });  
    }); 
</script>