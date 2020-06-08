<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cs
 */

?>
<div class="content relative bg-white w-full">
    <article id="post-<?php the_ID(); ?>" class="article w-full md:px-24 py-12">
        <?php if(is_page()): ?>
            <h1 class="flex items-center font-bold text-4xl md:text-32 mb-6 md:mb-10 text-black leading-tight">
                <img class="mr-3 w-12 h-12 self-start md:self-auto" src="<?php echo get_template_directory_uri(); ?>/custom-assets/img/bot3.png" alt="menu-icon">
                <?php the_title(); ?>
            </h1>
        <?php endif; ?>
        <?php the_content(); ?>
    </article><!-- #post-<?php the_ID(); ?> -->

    <nav class="md:px-24 pb-12">
        <div class="h-px w-full" style="background: #EDEBEB"></div>
        <h3 class="py-10 text-4xl md:text-32 text-center text-black">TAG CLOUD</h3>
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'menu-tags',
                'menu_class'        => 'flex flex-wrap',
                'walker'         => new Walker_Nav_Tags()
            )
        );
        ?>
    </nav>
</div>