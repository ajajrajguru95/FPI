<?php

/**
 * Template Name: Elementor
 */

get_header(); ?>


<?php if (have_posts()) : ?>
    <?php
    while (have_posts()) : the_post();

    
    the_content();       



    endwhile;
endif;
?>

<?php get_footer(); ?>