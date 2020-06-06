<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cs
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary"  class="hidden md:block max-w-md w-full" style="background: #1F1F1F">
    <div>
        <h3 class="flex items-center text-white text-2xl h-16 bg-black pl-12">
            <img class="mr-3 w-6 h-6" src="<?php echo get_template_directory_uri(); ?>/custom-assets/img/bot2.png" alt="bot">
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
</aside>
