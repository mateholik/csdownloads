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
        $posts = get_posts(array(
            'posts_per_page'	=> -1,
            'category_name'	=> 'Tag posts',
            'post_type'			=> 'post'
        ));

        if( $posts ): ?>
            <ul id="tag-cloud" class="flex flex-wrap">

                <?php foreach( $posts as $post ):
                    $link_url = get_permalink();
                    $isActive = $link_url == "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] || $link_url == "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ? 'text-white bg-menu1-hover' : '';
                    ?>
                    <li>
                        <a href="<?php the_permalink(); ?>" class="block font-semibold text-base py-3 px-4 mr-4 mb-4 border rounded-full hover:text-white hover:bg-menu1-hover <?php echo $isActive; ?>"><?php the_title(); ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </nav>
</div>