<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cs
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png" type="image/png" sizes="16x16">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@700&family=Open+Sans:wght@400;600;800&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'cs' ); ?></a>

	<header id="masthead" class="site-header">
        <div style="background-image: url('<?php echo get_template_directory_uri(); ?>/custom-assets/img/cover.jpg')" class="bg-no-repeat bg-center bg-cover">
            <div class="container">
                <div class="bg-black md:bg-transparent flex justify-between items-center py-4 md:pt-12 md:pb-6 -mx-6 md:mx-0 px-6 md:px-0">
                    <a href="" class="w-56 md:w-full md:max-w-md">
                        <img src="<?php echo get_template_directory_uri(); ?>/custom-assets/img/logo.png" alt="logo">
                    </a>
                    <div class="flex">
                        <a href="https://www.facebook.com/csdownload.lt/" target="_blank" class="mr-4 md:mr-6">
                            <img class="w-8 h-8 md:w-10 md:h-10" src="<?php echo get_template_directory_uri(); ?>/custom-assets/img/fb.svg" alt="facebook">
                        </a>
                        <a href="https://twitter.com/CsdownloadLt" target="_blank">
                            <img class="w-8 h-8 md:w-10 md:h-10" src="<?php echo get_template_directory_uri(); ?>/custom-assets/img/twit.svg" alt="twitter">
                        </a>
                    </div>
                </div>
                <h1 class="text-5xl md:text-60 mt-4 md:mt-0 mb-4 md:mb-16 font-extrabold leading-none" style="color:#DDDDDD; font-family: 'Open Sans', sans-serif">
                    DOWNLOAD <span style="color:#D80B16">FREE</span> <br> COUNTER STRIKE
                </h1>
                <div class="flex pb-10 md:pb-24">
                    <a href="#" class="bg-btn-red flex max-w-xs rounded-md text-white mr-10">
                        <div class="flex items-center border-r border-dashed border-white border-opacity-75 p-2 md:p-4">
                            <div>
                                <img class="w-12 h-12 md:w-16 md:h-16" src="<?php echo get_template_directory_uri(); ?>/custom-assets/img/bot.svg" alt="bot">
                            </div>
                            <div class="leading-none">
                            <span class="font-semibold text-xl md:text-17">
                                Download
                            </span>
                                <br>
                                <span class="text-base md:text-xl">Setup</span>
                            </div>
                        </div>
                        <div class="px-4 md:px-6 flex justify-center items-center">
                            <img class="w-4 h-4" src="<?php echo get_template_directory_uri(); ?>/custom-assets/img/arrow.svg" alt="arrow">
                        </div>
                    </a>
                    <a href="#" class="bg-btn-trans flex max-w-xs rounded-md text-white border border-white">
                        <div class="flex items-center border-r border-dashed border-white border-opacity-75 p-2 md:p-4">
                            <div>
                                <img class="w-12 h-12 md:w-16 md:h-16" src="<?php echo get_template_directory_uri(); ?>/custom-assets/img/bot.svg" alt="bot">
                            </div>
                            <div class="leading-none">
                            <span class="font-semibold text-xl md:text-17">
                                Download
                            </span>
                                <br>
                                <span class="text-base md:text-xl">Torrent file</span>
                            </div>
                        </div>
                        <div class="px-4 md:px-6 flex justify-center items-center">
                            <img class="w-4 h-4" src="<?php echo get_template_directory_uri(); ?>/custom-assets/img/arrow.svg" alt="arrow">
                        </div>
                    </a>
                </div>
            </div>
        </div>

<!--        first nav-->
        <nav class="hidden md:block">
            <div style="background: #353535">
                <div class="container">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu_class'        => 'flex flex-wrap',
                            'walker'         => new Walker_Nav_Primary()
                        )
                    );
                    ?>
                </div>
            </div>
        </nav>
<!--        first nav mobile -->
        <div class="block md:hidden">
            <div class="flex justify-end pr-6 py-2">
                <p class="mb-0 mr-4">Choose version &rarr;</p>
                <div id="burger" class="hamburger hamburger--vortex outline-none" style="padding-top: 0.25rem" tabindex="0"
                     aria-label="Menu" role="button" aria-controls="navigation">
                    <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                    </div>
                </div>
            </div>
            <nav id="mob-nav" class="mob-nav">
                <div>
                    <h3 class="flex items-center text-white text-2xl h-16 bg-black pl-12">
                        <img class="mr-3 w-6 h-6" src="custom-assets/img/bot2.png" alt="menu-icon">
                        RELEASES:
                    </h3>
                    <ul class="pl-12" style="background: #1F1F1F">
                        <li class="relative z-10 bg-sidebar-hover text-2xl" style="color: #B6B6B6">
                            <a href="#" class="block relative z-20 py-4">Cs 1.6</a>
                        </li>
                        <li class="relative z-10 bg-sidebar-hover text-2xl" style="color: #B6B6B6">
                            <a href="#" class="block relative z-20 py-4">Cs 1.6 Latest version</a>
                        </li>
                        <li class="relative z-10 bg-sidebar-hover text-2xl" style="color: #B6B6B6">
                            <a href="#" class="block relative z-20 py-4">Cs 1.6 Original</a>
                        </li>
                    </ul>
                    <h3 class="flex items-center text-white text-2xl h-16 bg-black pl-12">
                        <img class="mr-3 w-6 h-6" src="custom-assets/img/bot2.png" alt="menu-icon">
                        RELEASES:
                    </h3>
                    <ul class="pl-12" style="background: #1F1F1F">
                        <li class="relative z-10 bg-sidebar-hover text-2xl" style="color: #B6B6B6">
                            <a href="#" class="block relative z-20 py-4">Cs 1.6</a>
                        </li>
                        <li class="relative z-10 bg-sidebar-hover text-2xl" style="color: #B6B6B6">
                            <a href="#" class="block relative z-20 py-4">Cs 1.6 Latest version</a>
                        </li>
                        <li class="relative z-10 bg-sidebar-hover text-2xl" style="color: #B6B6B6">
                            <a href="#" class="block relative z-20 py-4">Cs 1.6 Original</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!--        second nav-->
        <nav class="hidden md:block">
            <div class="container">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-1',
                        'menu_class'        => 'flex flex-wrap',
                        'walker'         => new Walker_Nav_Secondary()
                    )
                );
                ?>
            </div>
        </nav>

	</header><!-- #masthead -->
