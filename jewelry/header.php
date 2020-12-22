<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,700&display=swap" rel="stylesheet">
    <script defer src="<?= bloginfo('template_directory'); ?>/assets/js/common.js"></script>
	<?php wp_head() ?>
</head>
<body <?php body_class( $class ); ?>>
<?php wp_body_open(); ?>
<div class='wrapper'>
    <header class='header'>
        <div class='header__logo-wrapper'>
            <a href="/" class='header__logo'>
                <span>D</span>
                <span>J</span>
            </a>
            <div class='header__text'>
                <p class='top-text'>jaydi</p>
                <p class='bottom-text'>Jewerly</p>
            </div>
        </div>
        <?php
            wp_nav_menu (array(
                'theme_location' => 'header_menu',
            ));
        ?>
        <button class="hamburger">
            <span class='hamburger__line-one'></span>
            <span class='hamburger__line-two'></span>
            <span class='hamburger__line-three'></span>
        </button>
        </header>