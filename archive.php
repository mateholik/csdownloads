<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cs
 */

get_header();
?>

<!--	<main id="primary" class="site-main">-->
    <main class="bg-white md:bg-transparent">
        <div class="container">
            <div class="hidden md:block h-4" style="background: #1F1F1F"></div>
            <div class="flex">
                <?php get_sidebar(); ?>
		<?php
		if ( have_posts() ) :
			/* Start the Loop */
        ?>
            <div class="content relative bg-white w-full md:px-24 py-12">
                <?php
                while ( have_posts() ) :
				the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="block mb-8">
                    <h2 class="mb-4 text-4xl"><?php the_title(); ?></h2>
                    <p> <?php the_excerpt(); ?></p>
                </a>
            <?php
			endwhile;
			?>
            </div>
        <?php

		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
            </div>
        </div>
	</main><!-- #main -->

<?php
get_footer();
