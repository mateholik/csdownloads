<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cs
 */

?>
<div class="content relative bg-white">
<article id="post-<?php the_ID(); ?>" class="article w-full md:px-24 py-12">

<!--	--><?php //cs_post_thumbnail(); ?>

	<div class="entry-content">
        <a href="#">
            <h1 class="flex items-center font-bold text-4xl md:text-32 underline mb-6 md:mb-10 text-black leading-tight">
                <img class="mr-3 w-12 h-12 self-start md:self-auto" src="<?php echo get_template_directory_uri(); ?>/custom-assets/img/bot3.png" alt="menu-icon">
                <?php the_title(); ?>
            </h1>
        </a>
		<?php
		the_content();
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
</div>