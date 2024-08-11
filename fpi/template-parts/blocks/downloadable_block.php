<?php

$heading = get_sub_field('heading');
$content = get_sub_field('content');
$enable_category = get_sub_field('enable_category');
$transparent_background = get_sub_field('transparent_background');
$select_downloads = get_sub_field('select_downloads');

$cta = get_sub_field('cta');
if (!empty($cta)) {
    $cta_target = $cta['target'] ? $cta['target'] : '_self';
}

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if (($select_downloads || $enable_category) && !$hide_block) :
?>
    <section class="downloads-sections">

        <section class="downloads-block group py-[6.25rem] px-16 max-xl:px-5 max-md:py-12 fade-in <?php echo (!$transparent_background) ? 'bg-lightblue' : ''; ?>" style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px; <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px; <?php } ?>">
            <div class="max-container flex max-md:flex-col gap-10 max-md:gap-5">
                <?php if ($heading || $cta) : ?>
                    <div class="flex flex-col w-[32%] max-md:w-full max-md:ml-0">
                        <?php if ($heading) : ?>
                            <h2 class="text-4xl max-md:text-2xl font-medium leading-10 text-black "><?= $heading; ?></h2>
                        <?php endif; ?>
                        <?php if ($cta) : ?>
                            <a href="<?= $cta['url']; ?>" target="<?= $cta_target; ?>" class="primary-btn bordered mt-10 max-md:mt-5">
                                <span class="btn-text"><span><?= $cta['title']; ?></span></span>
                                <span class="btn-arrow">
                                    <span class="icon-arrow-right"></span>
                                </span>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <div class="w-[68%] max-md:w-full">
                    <?php
                    if ($enable_category) :
                        // Get the terms (categories) for the custom taxonomy 'sectors_categories'
                        $terms = get_terms(array(
                            'taxonomy' => 'downloads_category',
                            'orderby' => 'name',
			                'order' => 'DESC',
                            'hide_empty' => true, // Set to true if you want to hide empty categories
                        ));

                        $termsArray = array();
                        if (!empty($terms) && !is_wp_error($terms)) {
                            foreach ($terms as $term) {
                                $args = array(
                                    'post_type' => 'downloads',
                                    'posts_per_page' => -1, // -1 to fetch all posts
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'downloads_category',
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
                            <div class="select-block flex max-md:flex-col  gap-5 md:h-16 mb-5">
                                <div class="select-wrap relative bg-aliceblue flex items-center w-full gap-2">
                                    <span class="label h-16 max-md:h-14 flex items-center pl-5 text-base opacity-50 relative -top-[1px] capitalize min-w-fit">Reports for:</span>
                                    <select class="">
                                        <?php foreach ($termsArray as $term) { ?>
                                            <option value="<?= $term->slug; ?>"><?= $term->name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        <?php } ?>

                    <?php endif; ?>

                    <div class="gap-5 grid grid-cols-2 max-sl:grid-cols-1">
                        <!-- If category is enabled -->
                        <?php if ($enable_category) : ?>
                            <?php
                            $download_args = array(
                                'post_type' => 'downloads',
                                'posts_per_page' => -1,
                            );

                            $downloads_query = new WP_Query($download_args);

                            if ($downloads_query->have_posts()) :
                                // Store posts grouped by category
                                $grouped_posts = array();

                                while ($downloads_query->have_posts()) :
                                    $downloads_query->the_post();
                                    $download_id = get_the_ID();

                                    // Get the terms for 'downloads_category' taxonomy
                                    $terms = get_the_terms($download_id, 'downloads_category');

                                    if (!empty($terms) && !is_wp_error($terms)) {
                                        foreach ($terms as $term) {
                                            if (!isset($grouped_posts[$term->term_id])) {
                                                $grouped_posts[$term->term_id] = array(
                                                    'term' => $term,
                                                    'posts' => array()
                                                );
                                            }
                                            $grouped_posts[$term->term_id]['posts'][] = get_post($download_id);
                                        }
                                    }
                                endwhile;

                                // Display grouped posts by category
                                $i = 0;
                                foreach ($grouped_posts as $group) :
                                    $term = $group['term'];
                            ?>
                                    <div class="slides grid lg:grid-cols-2 col-span-2 gap-5 <?= ($i != 0) ? 'hidden': '';?>" id="<?= $term->slug;?>">
                                        <?php foreach ($group['posts'] as $post) : setup_postdata($post); ?>
                                            <!-- <div class="category-posts"> -->
                                            <?php
                                            // foreach ($post_list as $post) : setup_postdata($post);
                                                include(locate_template('template-parts/parts/downloads-card.php', false, false));
                                            //  endforeach;
                                              wp_reset_postdata(); ?>
                                            <!-- </div> -->
                                        <?php endforeach;
                                         wp_reset_postdata();

                                        ?>
                                    </div>
                            <?php $i++; endforeach;
                            else :
                                echo '<p>No downloads found.</p>';
                            endif;

                            // Restore original Post Data
                            wp_reset_postdata();
                            ?>
                        

                        <?php else: ?>

                        <!-- Normal posts -->
                        <?php foreach ($select_downloads as $post) : setup_postdata($post);
                        ?>
                            <?php include(locate_template('template-parts/parts/downloads-card.php', false, false)); ?>
                        <?php endforeach;
                        wp_reset_postdata(); ?>
                        <?php endif;?>

                    </div>
                </div>
            </div>
            </div>
        </section>


    </section>




    <section class="form-pop-up sign-up-form default-form blue  group fixed size-full inset-0 z-[60]  transition-all duration-1000 [clip-path:polygon(0_0,0_0,0_100%,0_100%)] invisible [&.active]:[clip-path:polygon(0_0,100%_0%,100%_100%,0_100%)] [&.active]:visible ">
         <div class="w-1/2 max-lg:w-3/4 max-md:w-full bg-darkblue h-full overflow-scroll absolute right-0 top-0 z-10">
             <div class="form-block px-14 py-16 max-md:p-5 relative">
                 <h2 class="text-[2.5rem] max-md:text-2xl mb-7 text-white"><?= _e('Make Enquiry', T_PREFIX); ?></h2>
                 <div class="close-btn rounded-btn rounded-full cursor-pointer transition-all duration-700 delay-0 bg-white w-11 h-11  flex items-center justify-center hover:opacity-50 absolute right-14 top-10 max-md:top-3 max-md:right-5">
                     <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/close.svg" alt="Close Icon" class=" w-3 h-3" />
                 </div>
                 <?php //if ($gravity_forms_select) :

                    echo do_shortcode('[gravityform id="3" title="false" description="false" ajax="true"]');

                    //endif;
                    ?>
             </div>
         </div>
         <div class="overlay-blurred close-btn size-full inset-0 absolute backdrop-blur-[0.5rem] bg-black/10 ">

         </div>
     </section>



<?php endif; ?>