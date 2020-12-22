        <footer class='footer'>
            <div class='footer__menu'>
                <div class='footer__logo-wrapper'>
                    <a href="#" class='footer__logo'>
                        <span>D</span>
                        <span>J</span>
                    </a>
                </div>
                <?php
                    wp_nav_menu (array(
                        'theme_location' => 'footer_menu',
                    ));
                ?>
            </div>
            <form class='subscribe'>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/mail.png" >
                <input class="subscribe__email" type="email" require placeholder='Enter email'>
                <button class='subscribe__text'>subscribe</button>   
            </form>
        </footer>
        <?php wp_footer() ?>
    </body>
</html>