<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cs
 */

?>

<footer>
    <div class="container">
        <div class="md:flex justify-between py-20 md:py-32" style="color: #B6B6B6">
            <div class="w-full md:w-1/3 mb-12 md:mb-0">
                <?php
                $first_col = get_field('first_column', 'option');
                if( $first_col ): ?>
                    <h3 class="text-2xl mb-6 md:mb-10 text-white text-center"><?php echo $first_col['title']; ?></h3>
                    <div><?php echo $first_col['content']; ?></div>
                <?php endif; ?>
            </div>
            <div class="w-full md:w-1/3 mb-12 md:mb-0">
                <?php
                $second_col = get_field('second_column', 'option');
                if( $second_col ): ?>
                    <h3 class="text-2xl mb-6 md:mb-10 text-white text-center"><?php echo $second_col['title']; ?></h3>
                    <div><?php echo $second_col['content']; ?></div>
                <?php endif; ?>
            </div>
            <div class="w-full md:w-1/3">
                <?php
                $third_col = get_field('third_column', 'option');
                if( $third_col ): ?>
                    <h3 class="text-2xl mb-6 md:mb-10 text-white text-center"><?php echo $third_col['title']; ?></h3>
                    <div><?php echo $third_col['content']; ?></div>
                <?php endif; ?>
            </div>
        </div>
        <div class="text-center pb-4">
            Csdownload.lt © <?php echo date("Y"); ?>. All rights reserved
        </div>
    </div>
</footer>


<?php wp_footer(); ?>

</body>
</html>
