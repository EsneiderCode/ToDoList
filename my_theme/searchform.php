<head>
    <link rel="stylesheet" href="http://localhost/wordpress/wp-content/themes/my_theme/assets/css/searchform.css">
</head>
<form class="form-search" action="<?php echo home_url( '/' ); ?>" method="get">
    <div class="search">
    <button type="submit" class="btn-mig"><img class="mig" src="http://localhost/wordpress/wp-content/uploads/2022/07/Ellipse-65.png" alt="mig"></button>
      <input type="text" name="s" class="search_input" id="search" placeholder="Поиск по сайту..." value="<?php the_search_query(); ?>" />
    </div>
    <section class="right-options-header">
    <div class="lang">
        <select name="lan" id="lan-select">
            <option value="rus">Русский</option>
            <option value="eng">English</option>
            <option value="spa">Espanol</option>
        </select>
        <img class="flag-lan-img" src="http://localhost/wordpress/wp-content/uploads/2022/07/russianflag.png" alt="img">
    </div>
    <div class="visual-help-container">
        <img class="eye" src="http://localhost/wordpress/wp-content/uploads/2022/07/Для-слабовидящих.png" alt="vis">
    </div>
    </section>
</form>
<script src="http://localhost/wordpress/wp-content/themes/my_theme/assets/js/searchform.js"></script>