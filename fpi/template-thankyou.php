<?php

/**
 * Template Name: Thank you
 */


get_header(); ?>
<?php if (have_posts()) : ?>
    <?php
    while (have_posts()) : the_post();

        $heading = get_field('thank_heading', 'option');
        $message = get_field('thank_message', 'option');
        $cover_image = get_field('cover_image', 'option');

    ?>

        <!-- Thank you block -->
        <section class="thank-you-block flex max-sl:flex-col-reverse fade-in max-container">
            <div class="col content sl:w-1/2 flex flex-col  justify-center max-sl:py-10  px-16 max-xl:px-5 text-black">

                <!-- Breadcrumbs -->
                <?php include(locate_template('template-parts/parts/breadcrumbs.php', false, false)); ?>

                <h1 class="text-[6.25rem] max-lg:text-7xl max-md:text-5xl leading-[6.6rem] capitalize md:mt-12">
                    <?php if ($heading) : ?>
                        <?= $heading; ?>
                    <?php else : ?>
                        <?= _e('Thank you!', T_PREFIX); ?>
                    <?php endif; ?>

                </h1>

                <p class="text-xl max-md:text-base mt-6 max-md:mt-3">
                    <?php if ($message) : ?>
                        <?= $message; ?>
                    <?php else : ?>
                        <?= _e('Your enquiry has been submitted successfully', T_PREFIX); ?>
                    <?php endif; ?>
                </p>

                <a href="<?= site_url(); ?>" class="primary-btn mt-20 max-md:mt-10">
                    <span class="btn-text"><span>Go Back to the homepage</span></span>
                    <span class="btn-arrow">
                        <span><span class="icon-arrow-right"></span></span>
                    </span>
                </a>
            </div>
            <div class="col img sl:w-1/2">
                <?php if ($cover_image) : ?>
                    <?php $cover_image = wp_get_attachment_image_url($cover_image, 'full'); ?>
                <?php else : ?>
                    <?php $cover_image = get_stylesheet_directory_uri().'/assets/images/placeholder.jpg'; ?>
                <?php endif; ?>
                <img loading="lazy" class="lazy-image object-cover w-full h-screen max-sl:h-[29.5rem]" data-src="<?php echo $cover_image; ?>" alt="Thank you Cover">
            </div>
        </section>

        <!-- Thank you block ends -->


<?php
    endwhile;
endif;
?>

<?php get_footer(); ?>