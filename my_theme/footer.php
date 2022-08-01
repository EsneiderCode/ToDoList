
<?php
/**
 * Шаблон подвала (footer.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */
?>
<html>


<head>
    <link rel="stylesheet" href="http://localhost/wordpress/wp-content/themes/my_theme/assets/css/footer.css">
</head>	
<div class="footer-container">
    <div class="footer">
        <section class="footer-contact">
            <figure class="footer-contact-logo">
                <p><img class="icon-ictib" src="http://localhost/wordpress/wp-content/uploads/2022/07/логотип-SVG-1.png" alt="logoictis"/></p>
           <!-- <figcaption>Софийский собор</figcaption> -->
            </figure>
            <div class="footer-contact-address-container">
                <span >Ул. Чехова 2, ауд. И-201</span>
                <span>г. Таганрог, 347922 Ростовская область, Россия </span>
                <a href="https://ictis.sfedu.ru/onthemap/" class="footer-contact-map">На карте</a>
            </div>
            <div class="footer-contact-container">
                <span>
                  Телефон: 8 (8634) 360-450
                </span>
                <span>
                    E-Mail: info@ictis.sfedu.ru
                </span>
            </div>
        </section>
        <hr>
        <section class="footer-credits">
            <div class="footer-credits-company">
                <span>Ответственный за сайт: <span class="footer-web-dev"><a href="https://sfedu.ru/www/stat_pages22.show?p=UNI/s1/D&params=(p_per_id=>-3001872)">Алексей Целых</a></span></span>
                <span>Сайт разработан ИКТИБ</span>
                <br>
                <br>
                <p class="footer-copyright">© 2015-2022, Институт компьютерных технологий и информационной  безопасности ИТА ЮФУ</p>
            </div>
            <div class="footer-social-network">
                <a target="_blank" href="https://vk.com/ictis_sfedu"><img src="http://localhost/wordpress/wp-content/uploads/2022/07/ic_vk.png" alt="vk"></a>
				<a target="_blank" class="teleg-icon"  href="#"><img src="http://localhost/wordpress/wp-content/uploads/2022/07/ic_telegram.png" alt="telegram"></a>
            </div>
        </section>
    </div>
</div>
<?php wp_footer(); ?>
</html>