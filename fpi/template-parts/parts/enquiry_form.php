     <section class="form-pop-up default-form blue  group fixed size-full inset-0 z-[60]  transition-all duration-1000 [clip-path:polygon(0_0,0_0,0_100%,0_100%)] invisible [&.active]:[clip-path:polygon(0_0,100%_0%,100%_100%,0_100%)] [&.active]:visible ">
         <div class="w-1/2 max-lg:w-3/4 max-md:w-full bg-darkblue h-full overflow-scroll absolute right-0 top-0 z-10">
             <div class="form-block px-14 py-16 max-md:p-5 relative">
                 <h2 class="text-[2.5rem] max-md:text-2xl mb-7 text-white"><?= _e('Make Enquiry', T_PREFIX); ?></h2>
                 <div class="close-btn rounded-btn rounded-full cursor-pointer transition-all duration-700 delay-0 bg-white w-11 h-11  flex items-center justify-center hover:opacity-50 absolute right-14 top-10 max-md:top-3 max-md:right-5">
                     <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/close.svg" alt="Close Icon" class=" w-3 h-3" />
                 </div>
                 <?php //if ($gravity_forms_select) :

                    echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true"]');

                    //endif;
                    ?>
             </div>
         </div>
         <div class="overlay-blurred close-btn size-full inset-0 absolute backdrop-blur-[0.5rem] bg-black/10 ">

         </div>
     </section>