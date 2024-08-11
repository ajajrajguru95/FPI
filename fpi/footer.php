    <div class="push"></div> <!-- Push div for making fixed footer -->

    </div> <!-- closing of wrapper div from header_top.php -->


    <?php
    // Question and Social Network
    $footer_logo = get_field('footer_logo', 'option');
    $question = get_field('question', 'option');
    $follow = get_field('follow_us', 'option');
    ?>

    <footer class="pt-[6.25rem] pb-[3.75rem] px-16 max-xl:px-5 max-md:pt-12 max-md:pb-12 bg-darkblue ">
        <div class="max-container">
            <?php
            if ($question || $follow) :
            ?>
                <!-- Question and follow block -->
                <div class="flex gap-[1.875rem] max-lg:flex-col">
                    <!-- Question block -->
                    <?php if ($question) :
                        $question_subtitle = $question['sub_title'];
                        $heading = $question['heading'];
                        $question_btn = $question['action_button'];
                        if (!empty($question_btn)) {
                            $question_target = $question_btn['target'] ? $question_btn['target'] : '_self';
                        }
                        if ($question_subtitle || $heading) :
                    ?>
                            <div class="flex flex-col w-6/12 max-lg:w-full">
                                <div class="flex flex-col grow px-8 py-9 max-md:p-5 w-full bg-white bg-opacity-10">
                                    <?php if ($question_subtitle) : ?>
                                        <p class="text-base leading-4 text-white uppercase"><?= $question_subtitle; ?></p>
                                    <?php endif; ?>
                                    <?php if ($heading || $question_btn) : ?>
                                        <div class="flex gap-5 justify-between mt-4 w-full max-md:flex-col">
                                            <?php if ($heading) : ?>
                                                <h3 class="my-auto text-3xl max-md:text-2xl font-medium leading-9 text-white capitalize"><?= $heading; ?></h3>
                                            <?php endif; ?>
                                            <?php if ($question_btn) : ?>
                                                <div class="flex gap-1.5">
                                                    <a href="<?= $question_btn['url']; ?>" class="primary-btn white">
                                                        <span class="btn-text"><span><?= $question_btn['title']; ?></span></span>
                                                        <span class="btn-arrow">
                                                            <span><span class="icon-arrow-right"></span></span>
                                                        </span>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                    <?php endif;
                    endif; ?>

                    <!-- Follow block -->
                    <?php if ($follow) :
                        $follow_subtitle = $follow['sub_title'];
                        $heading = $follow['heading'];
                        $social_links = $follow['social_links'];
                        $instagram = $social_links['instagram'];
                        $facebook = $social_links['facebook'];
                        $linkedin = $social_links['linkedin'];
                        $twitter = $social_links['twitter'];
                        if ($follow_subtitle || $heading) :
                    ?>
                            <div class="flex flex-col w-6/12 max-lg:w-full">

                                <div class="flex flex-col grow px-8 py-9 max-md:p-5 w-full bg-white bg-opacity-10">
                                    <?php if ($follow_subtitle) : ?>
                                        <p class="text-base leading-4 text-white uppercase"><?= $follow_subtitle; ?></p>
                                    <?php endif; ?>
                                    <?php if ($heading || $social_links) : ?>
                                        <div class="flex gap-5 justify-between mt-4 w-full max-md:flex-col">

                                            <?php if ($heading) : ?>
                                                <h3 class="my-auto text-3xl max-md:text-2xl font-medium leading-9 text-white capitalize"><?= $heading; ?></h3>
                                            <?php endif; ?>

                                            <?php if ($social_links) : ?>
                                                <div class="flex gap-[1.125rem] py-0.5 text-white">
                                                    <?php if ($instagram) : ?>
                                                        <a aria-label="Instagram" href="<?= $instagram ?>" target="_blank" class="flex justify-center items-center p-2.5 bg-white bg-opacity-20 h-[2.625rem] rounded-full w-[2.625rem] text-[1.125rem] group transition-all duration-700 hover:bg-white hover:text-darkblue">
                                                            <span class="icon-instagram"></span>
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php if ($facebook) : ?>
                                                        <a aria-label="facebook" href="<?= $facebook ?>" target="_blank" class="flex justify-center items-center p-2.5 bg-white bg-opacity-20 h-[2.625rem] rounded-full w-[2.625rem] text-[1.125rem] group transition-all duration-700 hover:bg-white hover:text-darkblue">
                                                            <span class="icon-facebook"></span>
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php if ($linkedin) : ?>
                                                        <a aria-label="linkedin" href="<?= $linkedin ?>" target="_blank" class="flex justify-center items-center p-2.5 bg-white bg-opacity-20 h-[2.625rem] rounded-full w-[2.625rem] text-[1.125rem] group transition-all duration-700 hover:bg-white hover:text-darkblue">
                                                            <span class="icon-linkedin"></span>
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php if ($twitter) : ?>
                                                        <a aria-label="twitter" href="<?= $twitter ?>" target="_blank" class="flex justify-center items-center p-2.5 bg-white bg-opacity-20 h-[2.625rem] rounded-full w-[2.625rem] text-[1.125rem] group transition-all duration-700 hover:bg-white hover:text-darkblue">
                                                            <span class="icon-twitter"></span>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                            </div><!-- Follow block ends -->
                    <?php endif;
                    endif; ?>

                </div>
            <?php endif; ?>
            <!-- Question and follow block ends -->

            <!-- Navigation -->
            <?php if (has_nav_menu('footer-menu_1') || has_nav_menu('footer-menu_2') || has_nav_menu('footer-menu_3') || has_nav_menu('footer-menu_4')) : ?>
                <div class="flex gap-5 justify-between mt-20 max-md:flex-col">
                    <div class="flex flex-col  w-[38rem] max-lg:w-full">

                        <h2 class="text-3xl max-md:text-2xl font-medium leading-9 text-white capitalize mb-12 max-md:mb-10">Quick Links</h2>

                        <div class="block">
                            <div class="flex md:gap-5 max-lg:flex-col">
                                <!-- Menu1 -->
                                <?php if (has_nav_menu('footer-menu_1')) :
                                    $theme_location = 'footer-menu_1';
                                ?>
                                    <div class="flex flex-col w-[33%] max-lg:w-full">
                                        <?php
                                        echo transient_footerMenu($theme_location);
                                        ?>
                                    </div>
                                <?php endif; ?>
                                <!-- Menu 1 ends -->
                                <!-- Menu2 -->
                                <?php if (has_nav_menu('footer-menu_2')) :
                                    $theme_location = 'footer-menu_2';
                                ?>
                                    <div class="flex flex-col  w-[33%] max-lg:w-full">
                                        <?php
                                        echo transient_footerMenu($theme_location);
                                        ?>
                                    </div>
                                <?php endif; ?>
                                <!-- Menu 2 ends -->

                                <!-- Menu3-->
                                <?php if (has_nav_menu('footer-menu_3')) :
                                    $theme_location = 'footer-menu_3';
                                ?>
                                    <div class="flex flex-col  w-[33%] max-lg:w-full">
                                        <?php
                                        echo transient_footerMenu($theme_location);
                                        ?>
                                    </div>
                                    <!-- Menu 3 ends -->
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>

                    <div class="block max-lg:w-full max-md:mt-10">
                        <!-- Menu3-->
                        <?php if (has_nav_menu('footer-menu_4')) :
                            $theme_location = 'footer-menu_4';
                        ?>

                            <h2 class="text-3xl max-md:text-2xl font-medium leading-9 capitalize text-white mb-12 max-md:mb-10"><?php _e(wp_get_nav_menu_name($theme_location)); ?></h2>
                            <?= transient_footerMenu($theme_location); ?>

                        <?php endif; ?>

                    </div>
                </div>
            <?php endif; ?>

            <!-- Copyright -->
            <?php
            $footer_logo = get_field('footer_logo', 'option');
            $terms = get_field('terms', 'option');
            $policy = get_field('policy', 'option');
            if (!empty($terms)) {
                $terms_target = $terms['target'] ? $terms['target'] : '_self';
            }
            if (!empty($policy)) {
                $policy_target = $policy['target'] ? $policy['target'] : '_self';
            }
            if (!empty($terms) || !empty($policy)) :
            ?>
                <div class="flex max-sl:flex-col max-sl:gap-10 gap-5 justify-between sl:items-end  mt-[12.5rem] max-md:mt-20 text-sm leading-4 text-white">

                    <ul class="mt-16 flex gap-4 sl:hidden max-sl:mt-0">
                        <?php if (!empty($terms)) : ?>
                            <li class="after:content-['|'] after:absolute after:right-[-0.7rem] relative last:after:content-['']"><a href="<?= $terms['url'] ?>" target="<?= $terms_target; ?>"><?= $terms['title']; ?></a></li>
                        <?php endif; ?>
                        <?php if (!empty($policy)) : ?>
                            <li class="after:content-['|'] after:absolute after:right-[-0.7rem] relative last:after:content-['']"><a href="<?= $policy['url'] ?>" target="<?= $policy_target; ?>"><?= $policy['title']; ?></a></li>
                        <?php endif; ?>
                    </ul>
                    <?php if ($footer_logo) : ?>
                        <a href="<?= get_home_url(); ?>"><img loading="lazy" src="<?= $footer_logo; ?>" alt="<?php bloginfo('name'); ?>" class="shrink-0 self-stretch max-w-full aspect-[1.85] w-[8.75rem]  !opacity-100"></a>
                    <?php endif; ?>
                    <p class="mt-16 sl:text-right max-sl:mt-0">© <?php echo date("Y"); ?> Future Pipe Industries &nbsp;|&nbsp; All Rights Reserved</p>

                    <ul class="mt-16 flex gap-4 max-sl:hidden max-sl:mt-0 prose-a:transition-all prose-a:duration-700 [&>li>a:hover]:opacity-50">
                        <?php if (!empty($terms)) : ?>
                            <li class="after:content-['|'] after:absolute after:right-[-0.7rem] relative last:after:content-['']"><a href="<?= $terms['url'] ?>" target="<?= $terms_target; ?>"><?= $terms['title']; ?></a></li>
                        <?php endif; ?>
                        <?php if (!empty($policy)) : ?>
                            <li class="after:content-['|'] after:absolute after:right-[-0.7rem] relative last:after:content-['']"><a href="#"><a href="<?= $policy['url'] ?>" target="<?= $policy_target; ?>"><?= $policy['title']; ?></a></li>
                        <?php endif; ?>
                    </ul>

                </div>
            <?php endif; ?>


        </div>
    </footer>

    <?php //endif;
    ?>

    <!-- Go to top button -->

    <div id="gotoTop" class="fixed z-30 right-2 bottom-14 w-10 h-10 text-xl leading-10 text-center opacity-0 invisible bg-black bg-opacity-50 rounded-full cursor-pointer transition-all duration-700 [&.active]:opacity-100 [&.active]:visible text-white hover:bg-black">
        <span class="icon-arrow-right -rotate-90 block translate-y-1.5 text-lg" aria-hidden="true"></span>
    </div>

    <!-- For Landscape Alert -->
    <div class="landscape-alert">
        <p>For better web experience, please use the website in portrait mode</p>
    </div>

    <div id="magic-cursor" class="absolute z-50 left-0 top-0 pointer-events-none max-lg:hidden">
        <div class="cursor flex items-center justify-center  fixed w-12 h-12 bg-darkblue text-white rounded-full scale-0">
            <span class="icon-arrow-right "></span>
        </div>
    </div>

    <script>
var lenis = null;
</script>

    <?php wp_footer(); ?>

    <!-- Custom scripts or code in footer from theme settings -->
    <?php
    if (get_field('footer_code', 'option')) :
        echo the_field('footer_code', 'option');
    endif;
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/23.1.0/js/intlTelInput.min.js" integrity="sha512-nSv4TmHKiFdWKcAEKs+OW4rd9OPo4ZNNVHxhpIQj/dZwLSDrjO8Lq6YJn5AzFeFwqXaA+u9xdVvRbfkfExTkLg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        jQuery(function() {
            var formRenderedOnce = {};
            jQuery(document).bind('gform_post_render', function(event, form_id, current_page) {
                if (formRenderedOnce[form_id]) {
                    console.log('inside form render');

                    const inputs = jQuery('input, textarea').not('[type="checkbox"], [type="radio"]');
                    inputs.bind({
                        focus: e => {
                            const self = jQuery(e.currentTarget);
                            console.log('target');
                            self.closest('.gfield').addClass('active');
                        },
                        blur: e => {
                            const self = jQuery(e.currentTarget);
                            if (self.val() !== '') {
                                self.closest('.gfield').addClass('active');
                            } else {
                                self.closest('.gfield').removeClass('active');
                            }
                        },
                    }).trigger('blur');
                    console.log(inputs);

                    jQuery("select:not(.no-select2), .form-select").select2({
                        minimumResultsForSearch: -1,
                    });

                    const isMobileAndTablet = () => {
                        let check = false;
                        (function(a) {
                            if (
                                /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(
                                    a
                                ) ||
                                /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(
                                    a.substr(0, 4)
                                )
                            )
                                check = true;
                        })(navigator.userAgent || navigator.vendor || window.opera);
                        return check;
                    };

                    let phoneInputs = jQuery('input[type="tel"]');
                    let globalIti = null;


                    phoneInputs.each((i, el) => {
                        globalIti = intlTelInput(el, {
                            initialCountry: "ae",
                            separateDialCode: true,
                            showSelectedDialCode: true,
                            preferredCountries: ["ae"],
                        });

                        //Add country code to hidden input field initailly
                        const dialCode = globalIti.getSelectedCountryData().dialCode;
                        jQuery(el)
                            .parents(".form-group")
                            .find("#" + jQuery(el)[0].id + "-dial-code")
                            .val("+" + dialCode);

                        //Add country code to hidden input field on country change
                        jQuery(el).on("countrychange", (e) => {
                            const dialCode = globalIti.getSelectedCountryData().dialCode;
                            jQuery(e.currentTarget)
                                .parents(".form-group")
                                .find("#" + jQuery(el)[0].id + "-dial-code")
                                .val("+" + dialCode);
                        });

                        //Prevent background scroll on mobile
                        if (isMobileAndTablet()) {
                            jQuery(el).on("open:countrydropdown", () => {
                                jQuery("body").addClass("active");
                            });
                            jQuery(el).on("close:countrydropdown", () => {
                                jQuery("body").removeClass("active");
                            });
                        }

                        jQuery(el).on("input", function(e) {
                            const input = e.target;
                            let value = input.value.replace(/\D/g, ""); // Remove non-numeric characters

                            // Limit the input to 15 characters
                            if (value.length > 15) {
                                value = value.slice(0, 15);
                            }

                            jQuery(input).val(value);

                            //Add phone number to hidden input field on input
                            jQuery("#" + $(input)[0].id + "-number-original").val(value);
                        });
                    });

                } else {
                    // Mark the form as rendered
                    console.log('rendered');
                    formRenderedOnce[form_id] = true;
                }


            });

            jQuery(document).on("gform_confirmation_loaded", function (e, form_id) {
               console.log('confirmation loaded'); 
                if(form_id == 3){
                    var pdfUrl = localStorage.getItem('pdfLink');
                    var link = document.createElement('a');
                    link.href = pdfUrl;
                    link.target = '_blank';

                    // This part is crucial for compatibility with Safari on iOS
                    link.download = pdfUrl.split('/').pop();
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                    localStorage.setItem('pdfLink', '');
                    jQuery('.download-item .primary-btn').removeClass('sign-up');
                    jQuery('.download-item .primary-btn').attr('download', '');
                    // window.location.href = localStorage.getItem('pdfLink');
                }
            // code to run upon successful form submission
            });
            // Read more
            jQuery(document).on('click', '.read-more-btn', function(event) {
                console.log('clicked');
                const btn = jQuery(event.currentTarget);
                console.log(btn);
                const moreContent = btn.closest('.read-more-block').find('.more-content');


                if (moreContent.is(':visible')) {
                    moreContent.slideUp();
                    btn.addClass('mt-5');
                    btn.text('Read More');
                } else {
                    moreContent.slideDown();
                    btn.removeClass('mt-5');
                    btn.text('Read Less');
                }
            })


        });
    </script>
    <!-- <script src="<? //= get_stylesheet_directory_uri();
                        ?>/dist/js/wp_plugin_overrides-1.2.min.js"></script> -->

    </body>

    </html>