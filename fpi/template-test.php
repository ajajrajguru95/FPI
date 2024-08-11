<?php

/**
 * Template Name: Test Template
 */

 get_header();

?>

<style>
    .swiper {
  width: 600px;
  height: 300px;
  background: orange;
  color: #fff;
}
</style>


<section class="home-banner scale-125 [clip-path:polygon(0%_100%,100%_100%,100%_100%,0%_100%)]">
    <div class="absolute top-60 left-40">
        <h1 class="text-7xl text-white banner-title">Lorem ipsum <br> dollar amet sit</h1>
    </div>
    <img src="<?= get_stylesheet_directory_uri();?>/assets/images/temp/banner-1.jpg" alt="home-banner" />
</section>


<div class="about-us fadeUp py-12">
    <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis veritatis necessitatibus sunt a impedit fugit.</h2>
</div>

<div class="flex fadeUp">
    <div class="flex-1">
        <img src="<?= get_stylesheet_directory_uri();?>/assets/images/temp/banner-3.jpg" />
    </div>
    <div class="flex-1 parallax-item">
        <img src="<?= get_stylesheet_directory_uri();?>/assets/images/temp/banner-4.jpg" />
    </div>
</div>


<div class="custom-slider">
    <div class="overflow-hidden">
        <h4 class="text-4xl slide-count">1</h4>
    </div>
<div class="swiper">
  
  <div class="swiper-wrapper">
    
    <div class="swiper-slide !opacity-0 [&.swiper-slide-active]:!opacity-100">Slide 1</div>
    <div class="swiper-slide !opacity-0 [&.swiper-slide-active]:!opacity-100">Slide 2</div>
    <div class="swiper-slide !opacity-0 [&.swiper-slide-active]:!opacity-100">Slide 3</div>
    
  </div>
  
  <div class="swiper-pagination"></div>

  
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>


</div>
</div>


<section class="sticky-section flex my-20 px-20">
    <div class="flex-1">
        <h3 class="count text-9xl font-medium text-slate-600 overflow-hidden">0<span class="inline-block">1</span></h3>
    </div>
    <div class="flex-1 flex flex-col gap-18">
        <div class="value-row py-24 first:pt-0 last:pb-0 border-b border-slate-400 last:border-0 opacity-50 [&.active]:opacity-100" data-number="1">
            <h3 class="font-medium text-7xl mb-7">Value One</h3>
            <p class="text-2xl text-slate-400">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Saepe dolor aspernatur quisquam, consequatur pariatur at!</p>
        </div>
        <div class="value-row py-24 first:pt-0 last:pb-0 border-b border-slate-400 last:border-0 opacity-50 [&.active]:opacity-100" data-number="2">
            <h3 class="font-medium text-7xl mb-7">Value One</h3>
            <p class="text-2xl text-slate-400">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Saepe dolor aspernatur quisquam, consequatur pariatur at!</p>
        </div>
        <div class="value-row py-24 first:pt-0 last:pb-0 border-b border-slate-400 last:border-0 opacity-50 [&.active]:opacity-100" data-number="3">
            <h3 class="font-medium text-7xl mb-7">Value One</h3>
            <p class="text-2xl text-slate-400">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Saepe dolor aspernatur quisquam, consequatur pariatur at!</p>
        </div>
    </div>
</section>

<section class="btn-wrapper">
    <a href="#">
        <span>View all</span>
        <span class="arrow"></span>
    </a>
</section>


<section class="list-hover my-20 px-20 relative">
    <div class="imageGroup absolute -top-8 left-[18rem] h-[300px] aspect-square">
        <img src="<?= get_stylesheet_directory_uri();?>/assets/images/temp/banner-4.jpg" alt="Banner" class="w-full h-full object-cover" />
    </div>
    <ul>
        <li class="flex pl-5 pr-[6rem] group transition-all duration-700 [&:hover]:bg-amber-600 py-8">
            <span class="flex-1">01</span>
            <div class=" w-[30vw] gap-7 transition-colors duration-500 group-hover:text-white">
                <h3 class="text-5xl">Flexstrong</h3>
                <div class="desc hidden">
                    <p class="text-xl pt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque cupiditate rem excepturi perferendis facilis odit. Iste voluptas commodi nobis atque.</p>
                </div>
            </div>
        </li>
        <li class="flex pl-5 pr-[6rem] group transition-all duration-700 [&:hover]:bg-amber-600 py-8">
            <span class="flex-1">01</span>
            <div class=" w-[30vw] gap-7 transition-colors duration-500 group-hover:text-white">
                <h3 class="text-5xl">Flexstrong</h3>
                <div class="desc hidden">
                    <p class="text-xl pt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque cupiditate rem excepturi perferendis facilis odit. Iste voluptas commodi nobis atque.</p>
                </div>
            </div>
        </li>
        <li class="flex pl-5 pr-[6rem] group transition-all duration-700 [&:hover]:bg-amber-600 py-8">
            <span class="flex-1">01</span>
            <div class=" w-[30vw] gap-7 transition-colors duration-500 group-hover:text-white">
                <h3 class="text-5xl">Flexstrong</h3>
                <div class="desc hidden">
                    <p class="text-xl pt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque cupiditate rem excepturi perferendis facilis odit. Iste voluptas commodi nobis atque.</p>
                </div>
            </div>
        </li>
        
    </ul>
</section>








<?php
get_footer();
?>
