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

<aside id="sidebar"  class="hidden md:block max-w-md w-full" style="background: #1F1F1F">
    <div>
        <?php
        // check for rows (parent repeater)
        if( have_rows('sidebar_block_repeater', 'option') ): ?>
            <?php
            // loop through rows (parent repeater)
            while( have_rows('sidebar_block_repeater', 'option') ): the_row(); ?>
                <h3 class="flex items-center text-white text-2xl h-16 bg-black pl-12">
                    <img class="mr-3 w-6 h-6" src="<?php echo get_template_directory_uri(); ?>/custom-assets/img/bot2.png" alt="bot">
                    <?php the_sub_field('title'); ?>
                </h3>
                    <?php
                    // check for rows (sub repeater)
                    if( have_rows('link_repeater', 'option') ): ?>
                        <ul class="pl-12" style="background: #1F1F1F">
                            <?php
                            // loop through rows (sub repeater)
                            while( have_rows('link_repeater', 'option') ): the_row();
                                $link = get_sub_field('link');
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                $isActive = $link_url == "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] || $link_url == "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ? 'active' : '';
                                ?>
                                <li class="relative z-10 bg-sidebar-hover text-2xl <?php echo $isActive; ?>" style="color: #B6B6B6">
                                    <a href="<?php echo esc_url( $link_url ); ?>" title="<?php echo esc_html( $link_title ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="block relative z-20 py-4"><?php echo esc_html( $link_title ); ?></a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php
                endif;
            endwhile;
        endif;?>
    </div>
</aside>
