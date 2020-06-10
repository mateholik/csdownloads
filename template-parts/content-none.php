<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cs
 */

?>
<div class="content relative bg-white w-full">
    <div class="article w-full md:px-24 py-12">
    <div class="flex">
        <div>
            <h2 class="text-3xl md:text-6xl text-black mb-8 mt-32">Page doesn't exist</h2>
            <a href="<?php echo home_url(); ?>" class="hover:text-black">Back to homepage</a>
        </div>
        <div>
            <img class="" src="<?php echo get_template_directory_uri(); ?>/custom-assets/img/404.png" alt="not found">
        </div>
    </div>

    </article>

</div>