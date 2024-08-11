<?php

/**
 * Template Name: Certifications & Accreditations
 */


get_header(); ?>
<?php if (have_posts()) : ?>
    <?php
    while (have_posts()) : the_post();
        $postType = 'accreditations';
    ?>

        <!-- Page banner -->
        <?php include(locate_template('template-parts/parts/short_banner.php', false, false)); ?>

        <?php
        $response = accreditations_filter_ajax(true);
        ?>

        <?php if ($response['success'] && $response['data']->have_posts()) {
            $query = $response['data']; ?>
            <section class="accreditations-list img-hover-block type-one py-[6.25rem] px-16 max-xl:px-5 max-md:py-12  text-black fade-in">
                <div class="max-container">
                    <div class="flex gap-5 hover-slide-block first-item-open">
                        <?php get_template_part('template-parts/parts/accreditations/image_col'); ?>

                        <div class="flex flex-col w-[65%] max-sl:w-[68%] max-md:w-full border-t-[1px] border-black/10 accreditations-items">
                            <?php
                            while ($query->have_posts()) : $query->the_post();
                                get_template_part('template-parts/parts/accreditations/year_row');
                            endwhile;
                            wp_reset_postdata();
                            ?>

                            <a class="load-more primary-btn mt-20 max-md:mt-10" <?php if (!$response['hasNextPage']) { ?>style="display: none;" <?php } ?>>
                                <span class="btn-text"><span>Load More</span></span>
                                <span class="btn-arrow"><span class="icon-arrow-right"></span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Certification Block Popup-->
            <section class="certificates-pop-up group fixed size-full inset-0  z-[60]  certificate-slider transition-all duration-1000 [clip-path:polygon(0_0,0_0,0_100%,0_100%)] invisible [&.active]:[clip-path:polygon(0_0,100%_0%,100%_100%,0_100%)] [&.active]:visible">
                <div class="w-1/2 max-lg:w-3/4 max-md:w-full bg-white h-full absolute right-0 top-0 z-10 swiper ">

                    <div class="swiper-wrapper accreditations-popup">
                        <?php
                        while ($query->have_posts()) : $query->the_post();
                            get_template_part('template-parts/parts/accreditations/popup');
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>

                    <div class="close-btn rounded-btn rounded-full cursor-pointer transition-all duration-700 delay-0 bg-white w-11 h-11  flex items-center justify-center hover:opacity-50 absolute right-10 top-10 max-md:right-5 max-md:top-5  z-20">
                        <img data-src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/close.svg" alt="Close icon" class="lazy-image w-3 h-3" />
                    </div>

                    <div class="btn-wrap  flex justify-start gap-3 absolute z-20 left-16 bottom-16 max-lg:left-10 max-lg:bottom-10 max-md:left-5 max-md:bottom-5">
                        <button class="swiper-btn-prev flex items-center justify-center border-darkblue border-solid border rounded-full w-[2.8rem] h-[2.8rem] transition-all duration-700 hover:bg-darkblue hover:text-white [&amp;.swiper-button-disabled]:pointer-events-none swiper-button-disabled" aria-label="left slide arrow" disabled="">
                            <span class="icon-arrow-left"></span>
                        </button>
                        <button class="swiper-btn-next flex items-center justify-center border-darkblue border-solid border rounded-full w-[2.8rem] h-[2.8rem] transition-all duration-700 hover:bg-darkblue hover:text-white [&amp;.swiper-button-disabled]:pointer-events-none" aria-label="right slide arrow">
                            <span class="icon-arrow-right"></span>
                        </button>
                    </div>

                </div>
                <div class="overlay-blurred close-btn size-full inset-0 absolute backdrop-blur-[0.5rem] bg-black/10 ">

                </div>
            </section>
            <!-- Certification Block Popup Ends-->
        <?php } ?>

        <!-- Modules -->
        <?php include(locate_template('template-parts/modules.php', false, false)); ?>
<?php
    endwhile;
endif;
?>

<?php get_footer(); ?>