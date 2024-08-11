<?php

/**
 * Template Name: Sectors Archive
 */

get_header(); ?>


<?php if (have_posts()) : ?>
    <?php
    while (have_posts()) : the_post();

    ?>
        <!-- Banner and breadcrumb include -->
        <?php include(locate_template('template-parts/parts/section_banner.php', false, false)); ?>

        <!-- Display categories -->
        <?php
        // Get the terms (categories) for the custom taxonomy 'sectors_categories'
        $terms = get_terms(array(
            'taxonomy' => 'sectors_category',
            'hide_empty' => false, // Set to true if you want to hide empty categories
        ));

        $termsArray = array();
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $args = array(
                    'post_type' => 'sectors',
                    'posts_per_page' => -1, // -1 to fetch all posts
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'sectors_category',
                            'field'    => 'slug',
                            'terms'    => $term->slug,
                            'operator' => 'IN', // Use 'AND' if you want posts that match all terms
                        ),
                    ),
                );
                $sectors_query = new WP_Query($args);

                if ($sectors_query->have_posts()) {
                    $termObject = new stdClass();
                    $termObject->name = $term->name;
                    $termObject->slug = $term->slug;
                    $termObject->description = $term->description;
                    $termObject->sectors = $sectors_query;

                    $termsArray[] = $termObject;
                }
            }
        }

        if (!empty($termsArray) && !is_wp_error($termsArray)) { ?>
            <section class="page-nav-postion h-16">
                <div class="page-nav px-40 max-lg:px-5  bg-darkblue w-full top-0 z-50">
                    <div class="page-nav-slider flex gap-3 justify-between">
                        <div class="swiper-wrapper justify-center max-lg:justify-start">
                            <?php
                            foreach ($termsArray as $term) { ?>
                                <div class="swiper-slide w-max">
                                    <a href="#<?= $term->slug; ?>" class="flex-1 py-5 block w-max text-white/50 text-base font-medium transition-all duration-700  relative after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[0.1rem] after:bg-orange after:transition-all after:duration-700 lg:hover:after:w-full lg:hover:text-white  [&.active]:text-white [&.active]:after:w-full">
                                        <?= $term->name; ?>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>


            <div class="sectors-listing">
                <?php foreach ($termsArray as $term) {
                ?>
                    <section class="py-[6.25rem]   max-md:py-12 overflow-hidden section-block" id="<?= $term->slug; ?>">
                        <div class="max-container">
                            <div class="news-slider  fade-in">
                                <div class="flex gap-20 max-lg:gap-10 max-lg:flex-col">
                                    <div class="flex flex-col justify-between  w-[40%] max-lg:w-2/3 max-md:w-full  h-auto z-20 relative  flex-wrap  max-6xl:ml-16 max-lg:m-0 max-lg:px-5">

                                        <div class="line-bar w-[1px] h-[calc(100%+12.5rem)] -top-[6.25rem]  absolute bg-darkblue opacity-10 z-20 -right-12 max-lg:hidden"></div>
                                        <div>
                                            <h2 class="lg:mt-5 text-4xl font-medium leading-10 text-black max-md:max-w-full"><?= $term->name; ?></h2>
                                            <p class="mt-5 max-md:mt-3 text-xl max-md:text-base leading-8 max-md:leading-6 text-black">
                                                <?= $term->description; ?>
                                            </p>
                                        </div>
                                        <div class="flex flex-col items-start gap-10 max-lg:hidden">
                                            <p class="relative flex pt-2 overflow-hidden text-darkblue"><span class="count-item text-[6.875rem] max-lg:text-[3rem]  leading-[4.875rem] max-lg:leading-[3rem] inline-block text-darkblue/20">01</span><span class="opacity-10 text-md relative -top-2 text-3xl max-lg:text-2xl font-medium t-count">/<?= $term->count; ?></span></p>
                                            <div class="btn-wrap  flex justify-end gap-3 mb-8">
                                                <button class="swiper-btn-prev flex items-center justify-center border-darkblue border-solid border rounded-full w-[2.8rem] h-[2.8rem] transition-all duration-700 hover:bg-darkblue hover:text-white [&.swiper-button-disabled]:pointer-events-none" aria-label="left slide arrow">
                                                    <span class="icon-arrow-left"></span>
                                                </button>
                                                <button class="swiper-btn-next flex items-center justify-center border-darkblue border-solid border rounded-full w-[2.8rem] h-[2.8rem] transition-all duration-700 hover:bg-darkblue hover:text-white [&.swiper-button-disabled]:pointer-events-none" aria-label="right slide arrow">
                                                    <span class="icon-arrow-right"></span>
                                                </button>
                                            </div>
                                            <div class="swiper-pagination !top-auto bottom-0 !w-[95%] max-lg:hidden"></div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col w-[60%] hover-slide-block max-lg:w-full  swiper  z-10 max-md:w-full max-lg:pl-5 h-block-wrap">
                                        <div class="swiper-wrapper">
                                            <?php
                                            // Define the custom query parameters
                                            $counter = 0;
                                            if ($term->sectors->have_posts()) :
                                                while ($term->sectors->have_posts()) : $term->sectors->the_post();
                                                    // $caption = get_field('caption');
                                            ?>
                                                    <div class="swiper-slide  w-[29rem] max-md:w-[20rem]  hover-block type-one">
                                                        <a href="<?php the_permalink(); ?>" class="flex overflow-hidden relative flex-col justify-end p-8  max-lg:p-4 text-black h-[31.25rem] max-md:h-[20rem] w-full bg-aliceblue  group transition-all  delay-200 cursor-pointer">
                                                        <?php
                                                        if (get_field('post_thumbnail')) {
                                                            $post_featured_img = wp_get_attachment_image_url(get_field('post_thumbnail'), "full");
                                                        }
                                                        else{
                                                            if (has_post_thumbnail()) {
                                                                $post_featured_img = wp_get_attachment_image_url(get_post_thumbnail_id(), "full");
                                                            }
                                                            else{
                                                                $post_featured_img = get_stylesheet_directory_uri(). '/assets/images/placeholder.jpg';
                                                            }
                                                        }
                                                        ?>
                                                            <img data-src="<?php echo $post_featured_img; ?>" alt="<?php the_title(); ?>" class="object-cover absolute max-lg:size-full max-lg:left-0 max-lg:top-0  aspect-square left-[1.875rem] w-[10rem] h-[10rem] top-[2.2rem] transition-all duration-1000  group-hover:left-0 group-hover:top-0 group-hover:h-full group-hover:w-full lazy-image" />

                                                            <div class="overlay !opacity-0 max-md:!opacity-40 group-hover:delay-500 transition-all duration-700  group-hover:!opacity-40"></div>
                                                            <div class="relative z-10 group-hover:lg:p-2 max-lg:p-4   transition-all duration-700 delay-100 after:transition-all after:duration-700 after:delay-100 after:absolute after:content[''] after:bg-white/0 after:w-[calc(100%+1.5rem)] after:h-[calc(100%+1.5rem)] after:-left-3 after:-top-3 after:-z-10 lg:group-hover:after:bg-white max-lg:bg-white">
                                                                <h3 class="relative  mb-5 max-md:mb-2 text-3xl max-md:text-[1.25rem] max-md:leading-7 font-medium leading-9 capitalize line-clamp-2"><?php the_title(); ?></h3>
                                                                <p class="text-base leading-6 lg:group-hover:mb-8  line-clamp-3 max-md:line-clamp-2 desc  overflow-hidden max-lg:!h-auto max-lg:mb-5 max-md:mb-3"><?= get_the_excerpt();?></p>
                                                                <div class="primary-btn">
                                                                    <span class="btn-text"><span>learn more</span></span>
                                                                    <span class="btn-arrow">
                                                                        <span class="icon-arrow-right"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                            <?php
                                                    $counter++;
                                                endwhile;
                                                wp_reset_postdata();
                                            endif;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php } ?>

            </div>

        <?php } ?>


<?php
    endwhile;
endif;
?>

<?php get_footer(); ?>