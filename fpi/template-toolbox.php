<?php

/**
 * Template Name: Engineering Toolbox
 */

get_header(); ?>
<?php if (have_posts()) : ?>
    <?php
    while (have_posts()) : the_post();


    ?>


        <!-- Page banner -->
        <?php include(locate_template('template-parts/parts/short_banner.php', false, false)); ?>

        <section class="tab-section-block  fade-in py-[6.25rem] max-md:py-12">

            <div class="max-container">
                <div class="flex flex-col lg:w-max max-6xl:pl-16 max-xl:pl-5">
                    <div class="flex flex-col grow ">
                        <div class="free-slider flex gap-3 justify-between items-start   text-base text-center   max-xxl:gap-3 max-xxl:text-[0.875rem] ">
                            <div class="swiper-wrapper  w-max  border border-black/10 p-2 rounded-md max-md:border-r-0 max-md:rounded-r-none">
                                <div class="swiper-slide last:!m-0 w-max flex justify-between  hover:cursor-pointer  relative p-3 rounded-md  transition-colors duration-700  active group [&.active]:bg-darkblue [&.active]:text-white  max-md:after:!w-0 hover:bg-darkblue hover:text-white">
                                    <h3 class="flex-1 my-auto font-medium capitalize leading-[120%]">Calculation Sheet</h3>
                                </div>
                                <div class="swiper-slide last:!m-0 w-max flex justify-between  hover:cursor-pointer relative p-3 rounded-md  transition-colors duration-700  group [&.active]:bg-darkblue [&.active]:text-white  max-md:after:!w-0 hover:bg-darkblue hover:text-white">
                                    <h3 class="flex-1 my-auto font-medium capitalize leading-[120%]">Product Drawings</h3>
                                </div>
                                <div class="swiper-slide last:!m-0 w-max flex justify-between  hover:cursor-pointer relative p-3 rounded-md  transition-colors duration-700  group [&.active]:bg-darkblue [&.active]:text-white  max-md:after:!w-0 hover:bg-darkblue hover:text-white">
                                    <h3 class="flex-1 my-auto font-medium capitalize leading-[120%]">Engineering Guides</h3>
                                </div>
                                <div class="swiper-slide last:!m-0 w-max flex justify-between  hover:cursor-pointer relative p-3 rounded-md  transition-colors duration-700  group [&.active]:bg-darkblue [&.active]:text-white  max-md:after:!w-0 hover:bg-darkblue hover:text-white">
                                    <h3 class="flex-1 my-auto font-medium capitalize leading-[120%]">AI Corner / Interaction / AVE Interaction</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tab-content  fade-in ">
                    <div class="swiper-wrapper">
                        <!-- First slide -->

                        <div class="swiper-slide max-6xl:px-16 max-xl:px-5 !opacity-0 [&.swiper-slide-active]:!opacity-100 [&.swiper-slide-active]:!delay-700">

                            <?php if (have_rows('lists_heading')) : ?>
                                <div class="grid grid-cols-2 max-md:grid-cols-1 md:gap-5 pt-14 max-md:pt-10">
                                    <div class="flex flex-col">
                                        <?php
                                        $counter = 0;
                                        while (have_rows('lists_heading')) : the_row();
                                            $counter++;
                                            if ($counter == 7) : // Start new column after 6 items
                                        ?>
                                    </div>
                                    <div class="flex flex-col">
                                    <?php endif; ?>

                                    <div class="col flex items-center gap-7 border-b-[1px] border-lightblue py-10 max-md:py-7 md:pr-[10%]">
                                        <span class="w-14 h-14 bg-lightblue flex-none flex items-center justify-center font-medium">
                                            <?php echo str_pad($counter, 2, '0', STR_PAD_LEFT); ?>
                                        </span>
                                        <p class="text-xl max-md:text-base leading-7 max-md:leading-6 font-medium">
                                            <?php the_sub_field('list_item'); ?>
                                        </p>
                                    </div>

                                <?php endwhile; ?>
                                    </div>

                                </div>
                            <?php endif; ?>


                        </div>
                        <?php


                        $image_gallery = get_field('image_gallery');
                        //  foreach ($tabs as $key => $tab) {

                        ?>

                        <!-- Second slide -->
                        <div class="swiper-slide max-6xl:px-16 max-xl:px-5 !opacity-0 [&.swiper-slide-active]:!opacity-100 [&.swiper-slide-active]:!delay-700">
                            <?php if ($image_gallery) : ?>
                                <div class="gallery-slider pt-14 max-md:pt-10">
                                    <h2 class="text-[2.5rem] max-md:text-2xl leading-[3rem]">Gallery</h2>
                                    <div class="gallery pt-14 max-md:pt-8 swiper overflow-visible">
                                        <div class="swiper-wrapper">
                                            <?php foreach ($image_gallery as $image) : ?>
                                                <div class="swiper-slide text-center opacity-50 transition-all duration-700 [&.swiper-slide-active]:!opacity-100">
                                                    <div class="img aspect-[1.97]">
                                                        <img data-src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="object-cover lazy-image w-full h-full" />
                                                    </div>
                                                    <?php if ($image['caption']) : ?>
                                                        <p class="opacity-50 text-[0.875rem] mt-5"><?php echo esc_html($image['caption']); ?></p>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="btn-wrap  flex justify-center gap-3 mt-10 max-md:mt-7">
                                        <button class="swiper-btn-prev flex items-center justify-center border-darkblue border-solid border rounded-full w-[2.8rem] h-[2.8rem] transition-all duration-700 hover:bg-darkblue hover:text-white [&.swiper-button-disabled]:pointer-events-none" aria-label="left slide arrow">
                                            <span class="icon-arrow-left"></span>
                                        </button>
                                        <button class="swiper-btn-next flex items-center justify-center border-darkblue border-solid border rounded-full w-[2.8rem] h-[2.8rem] transition-all duration-700 hover:bg-darkblue hover:text-white [&.swiper-button-disabled]:pointer-events-none" aria-label="right slide arrow">
                                            <span class="icon-arrow-right"></span>
                                        </button>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php
                        $collapsable_items = get_field('collapsable_items');
                        if ($collapsable_items) :
                        ?>
                            <div class="swiper-slide !opacity-0 [&.swiper-slide-active]:!opacity-100 [&.swiper-slide-active]:!delay-700">
                                <section class="accordion-section pt-14 max-md:pt-10">
                                    <div class="max-container">
                                        <div class="list-block accordion-block">
                                            <?php foreach ($collapsable_items as $key =>  $collapse) {
                                                $heading = $collapse['heading'];
                                                $content = $collapse['content'];
                                                if ($heading || $content) :
                                            ?>
                                                    <div class="item-block relative accordion-item group  px-16 max-xl:px-5  transition-all duration-700 delay-0 [&.active]:bg-aliceblue [&.active]:-bottom-[1px] [&.active]:z-10">
                                                        <div class="border-t-[1px]  group-first:border-none group-last:border-b-[1px] flex max-md:flex-col max-md:gap-4 justify-between group-[&.active]:border-none  py-10 max-md:py-5">
                                                            <p class="text-xl max-md:text-base leading-6 transition-all duration-700 text-black ">0<?= $key + 1; ?></p>
                                                            <div class="content-wrap relative w-[75vw] 6xl:w-[40vw] max-md:w-full">
                                                                <div class="content md:pr-[12vw]">
                                                                    <h3 class="text-4xl max-md:text-xl max-md:leading-7 leading-10 max-md:max-w-full  pr-16 cursor-pointer text-black  capitalize transition-all duration-700 hover:opacity-80"><?= $heading; ?></h3>
                                                                    <div class="accordion-content text-white hidden mt-10 max-md:mt-5">
                                                                        <div class="prose prose-p:text-base prose-p:leading-6   max-w-full">
                                                                            <p>
                                                                                <?= $content; ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="absolute pointer-events-none top-0 max-md:-top-2 right-0    transition-all duration-700">
                                                                    <div class="plus-minus w-[2.85rem] h-[2.85rem] absolute right-0 top-0 rounded-full bg-lightblue transition-all duration-700 group-[&.active]:bg-darkblue "><span class="line-1 w-[0.9rem] h-[1px] bg-darkblue block top-1/2 left-1/2 -translate-x-[50%] absolute group-[&.active]:bg-white"></span><span class="line-1 w-[0.9rem] h-[1px] bg-darkblue block top-1/2 left-1/2 -translate-x-[50%] absolute rotate-90 transition-all duration-700 group-[&.active]:opacity-0"></span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        <?php endif; ?>

                        <div class="swiper-slide pt-20 max-md:pt-10  !opacity-0 [&.swiper-slide-active]:!opacity-100 [&.swiper-slide-active]:!delay-700">

                            <!-- Full banner conent -->
                            <?php if (have_rows('full_banner')) : ?>
                                <?php while (have_rows('full_banner')) : the_row(); ?>

                                    <?php
                                    $banner = get_sub_field('banner');
                                    $video_url = get_sub_field('video_url');
                                    $sub_title = get_sub_field('sub_title');
                                    $heading = get_sub_field('heading');
                                    $content = get_sub_field('content');
                                    $illustration = get_sub_field('illustration');

                                    $cta = get_sub_field('cta');
                                    if (!empty($cta)) {
                                        $cta_target = $cta['target'] ? $cta['target'] : '_self';
                                    }


                                    if ($banner || $heading || $content) :

                                    ?>
                                        <!-- Full banner Content -->
                                        <section class="pb-[12.5rem] relative max-md:mb-[-3.125rem] max-md:pb-0 max-container group">
                                            <?php
                                            if ($banner || $video_url) :
                                            ?>
                                                <div class="image relative fade-up">

                                                    <?php if ($banner || $video_url) : ?>
                                                        <img loading="lazy" class="object-cover size-full min-h-[46.8rem] max-md:min-h-[15.625rem] lazy-image" data-src="<?= wp_get_attachment_image_url($banner, 'full') ?>" alt="<?= esc_attr(get_post_meta($banner, '_wp_attachment_image_alt', true)) ?: 'Section Image'; ?>" />
                                                    <?php endif; ?>

                                                    <?php if ($video_url) : ?>
                                                        <div class=" absolute bottom-[3.75rem] left-[3.75rem] max-sl:left-5 z-1  max-md:top-1/2 max-md:left-1/2 max-md:-translate-x-1/2 max-md:-translate-y-1/2">
                                                            <a data-fancybox href="<?= $video_url; ?>" class="fancy-box flex items-center gap-1.5 text-base font-medium leading-5 uppercase whitespace-nowrap bg-white  rounded-full text-darkblue cursor-pointer px-16 py-2.5 max-md:px-12 transition-all duration-700 group hover:bg-darkblue hover:text-white">
                                                                <span class="icon-play"></span>
                                                                <div class="flex-1">Play</div>
                                                            </a>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>

                                            <?php if ($heading || $content) : ?>
                                                <div class="flex absolute flex-col justify-between pt-12 pb-12 pl-12 top-auto bottom-0 bg-darkblue group-[&.light-bg]:bg-aliceblue text-white group-[&.light-bg]:text-black right-16 max-sl:right-5  min-h-[42rem] h-[70vh] w-[51%] max-sl:w-[64%] max-md:bottom-auto max-md:top-[-3.7rem] max-md:w-[calc(100%-2.5rem)] max-md:left-0 max-md:mx-auto max-md:p-[1.875rem] max-md:relative max-md:min-h-[20rem] max-md:h-auto <?php if (!wp_is_mobile()) { ?> parallax-item translate-y-[16%]<?php } ?>">
                                                    <div class="flex  flex-col w-[68%] max-md:w-full">
                                                        <?php if ($sub_title) : ?>
                                                            <p class="text-xl leading-5  uppercase max-md:text-base"><?= $sub_title; ?></p>
                                                        <?php endif; ?>

                                                        <?php if ($heading) : ?>
                                                            <h2 class="mt-5 max-md:mt-2 text-7xl max-xl:text-[4rem] max-xl:leading-[4rem] max-sl:text-[3rem] max-sl:leading-[3rem] max-md:text-[2rem] max-md:leading-[2rem] font-medium capitalize leading-[4.5rem] max-md:max-w-full ">
                                                                <?= $heading; ?>
                                                            </h2>
                                                        <?php endif; ?>

                                                        <?php if ($content) : ?>
                                                            <p class="mt-8 max-md:mt-5 text-base leading-6  opacity-80">
                                                                <?= $content; ?>
                                                            </p>
                                                        <?php endif; ?>

                                                    </div>

                                                    <?php if ($cta) : ?>
                                                        <div class="max-md:mt-10 ">
                                                            <a href="<?= $cta['url'] ?>" target="<?= $cta_target; ?>" class="primary-btn <?php echo ($transparent) ? 'white' : ''; ?> <?php echo ($block_selection == 'more_content') ? 'mt-10' : ''; ?>">
                                                                <span class="btn-text"><span><?= $cta['title']; ?></span></span>
                                                                <span class="btn-arrow">
                                                                    <span><span class="icon-arrow-right"></span></span>
                                                                </span>
                                                            </a>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if ($illustration) : ?>
                                                        <div class="absolute bottom-0 right-0 w-[66%] max-md:hidden">
                                                            <img class="w-full lazy-image" loading="lazy" data-src="<?= $illustration; ?>" alt="Illustration">
                                                        </div>
                                                    <?php endif; ?>

                                                </div>
                                            <?php endif; ?>
                                        </section>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            <?php endif; ?>



                            <!-- About Us block -->
                            <?php if (have_rows('about_us')) : ?>
                                <?php while (have_rows('about_us')) : the_row();
                                    $about_subtitle = get_sub_field('sub_title');
                                    $heading = get_sub_field('heading');
                                    $content = get_sub_field('content');
                                    if ($about_subtitle || $heading || $content) :
                                ?>
                                        <section class="flex flex-col py-[6.25rem] px-16 max-xl:px-5 max-md:py-12">
                                            <div class="flex gap-28 max-xl:flex-col max-xl:gap-10 max-md:gap-7 justify-between max-container">
                                                <?php if ($about_subtitle || $heading) : ?>
                                                    <div class="flex flex-col w-6/12 max-xl:w-full  max-w-[50%] max-xl:max-w-[100%]">
                                                        <?php if ($about_subtitle) : ?>
                                                            <p class="text-xl leading-5 uppercase  max-md:mb-[1rem] mb-5 max-md:text-[1rem]"><?= $about_subtitle; ?></p>
                                                        <?php endif; ?>
                                                        <?php if ($heading) : ?>
                                                            <h2 class="text-6xl leading-[4rem] max-md:text-[2.5rem] max-md:leading-[3rem]  font-medium capitalize ">
                                                                <?= $heading; ?>
                                                            </h2>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if ($content) : ?>
                                                    <div class="flex flex-col w-6/12 max-xl:w-full mt-10 max-xl:mt-0 text-darkgray  max-w-[50%] max-xl:max-w-[100%]">
                                                        <div class="prose prose-p:text-xl prose-p:leading-8   max-md:prose-p:text-[1rem] max-md:prose-p:leading-[1.5rem] max-w-full">
                                                            <p><?= $content; ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </section>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            <?php endif; ?>


                            <!-- Image block -->

                            <?php
                                $full_image = get_field('full_image');
                                if($full_image):
                            ?>

                                    <section class="full-image-block">
                                        <img loading="lazy" class="object-cover size-full min-h-[46.8rem] max-md:min-h-[15.625rem] lazy-image" data-src="<?= wp_get_attachment_image_url($banner, 'full') ?>" alt="<?= esc_attr(get_post_meta($banner, '_wp_attachment_image_alt', true)) ?: 'Banner Image' ?>" />
                                    </section>


                            <?php endif; ?>



                        </div>





                    </div>
                </div>
            </div>

        </section>




<?php
    endwhile;
endif;
?>

<?php get_footer(); ?>