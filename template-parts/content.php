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
        // check for rows (parent repeater)
        if( have_rows('tag_posts', 'option') ): ?>
        <ul class="flex flex-wrap">
            <?php
            // loop through rows (parent repeater)
            while( have_rows('tag_posts', 'option') ): the_row();
                $link = get_sub_field('post');
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                $isActive = $link_url == "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] || $link_url == "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ? 'active' : '';
                ?>
                <li>
                    <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="block font-semibold text-base py-3 px-4 mr-4 mb-4 border rounded-full hover:text-white hover:bg-menu1-hover <?php echo $isActive; ?>"><?php echo esc_html( $link_title ); ?></a>
                </li>
                <?php
            endwhile; ?>
        </ul>
        <?php endif;?>
    </nav>
</div>