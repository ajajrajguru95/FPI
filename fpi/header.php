<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <script src="https://kit.fontawesome.com/20e2f44b6f.js" crossorigin="anonymous"></script>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <meta name="format-detection" content="telephone=no">
    <meta name="theme-url" content="<?php echo get_template_directory_uri(); ?>">
    <!-- Custom scripts or code in header from theme settings -->
    <?php
    if (get_field('header_code', 'option')) :
        echo the_field('header_code', 'option');
    endif;
    ?>
    <?php wp_head(); ?>
    <style>
        :root{
            --pdfLink: '';
        }
    </style>
</head>


<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="wrapper overflow-hidden <?php if (wp_is_mobile()) { ?> mobile-device <?php } ?>"><!-- opening of wrapper div ends in footer.php -->
        <div class="mobile-nav">
            <div class="top-bar flex justify-between">
                <div class="logo left">
                    <?php
                    // if (function_exists('the_custom_logo')) {
                    //     the_custom_logo();
                    // }
                    ?>

                    <a href="/" class="w-[8.4rem]"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo-blue.svg" class="w-[8.4rem]" alt="Future Pipe Industries"></a>


                </div>
                <div class="right flex items-center gap-0">
                    <div class="search-btn rounded-full bg-white border border-darkblue bg-opacity-20  w-10 h-10 cursor-pointer flex items-center justify-center text-xl ">
                        <span class="icon-search text-darkblue"></span>
                    </div>
                    <div class="mobile-menu relative">
                        <span class="nav-icon"></span>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-list">
                <?php
                if (has_nav_menu('main-menu')) {
                    wp_nav_menu(
                        array(
                            'theme_location' => 'main-menu',
                            'container' => false,
                            'walker'         => new mobile_menu_Navwalker(),
                        )
                    );
                }
                ?>
                <?php
                $enquiry_link = get_field('enquiry_link', 'option');
                if (!empty($enquiry_link)) {
                    $enquiry_target = $enquiry_link['target'] ? $enquiry_link['target'] : '_self';
                }
                if ($enquiry_link) :
                ?>
                    <div class="enq-block">
                        <!-- <a href="<? //= $enquiry_link['url'];
                                        ?>" aria-label="Send Enquiry" role="button" class="full-btn make-enquiry border-solid border border-white bg-white  rounded-full text-darkblue px-5 py-3 capitalize font-medium flex items-center gap-3 leading-3 text-[0.875rem] transition-all duration-700 cursor-pointer hover:bg-transparent hover:text-white max-lg:hidden">
                            <span class="btn-text"><span><? //= $enquiry_link['title']
                                                            ?></span></span>
                            <span class="btn-arrow">
                                <span><span class="icon-arrow-right"></span></span>
                            </span>
                        </a> -->
                        <button aria-label="Send Enquiry" role="button" class="primary-btn make-enquiry mt-20 max-md:mt-10">
                            <span class="btn-text"><span><?= $enquiry_link['title'] ?></span></span>
                            <span class="btn-arrow">
                                <span><span class="icon-arrow-right"></span></span>
                            </span>
                        </button>
                    </div>
                <?php endif; ?>


            </div>
        </div>

        <script type="text/javascript">
            var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
        </script>

        <!-- header start here -->
        <header class="absolute w-full z-50 transition-[top] duration-700 mt-10 max-lg:mt-5 [&.top]:top-[-150px] [&.top]:fixed [&.sticky]:!top-[-20px] group">
            <div class="max-container header-wrap px-16 max-xl:px-5 pb-10  max-lg:pb-10 max-lg:group-[&.top]:px-0 [clip-path:polygon(0%_100%,100%_100%,100%_100%,0%_100%)]">
                <div class="header-inner relative lg:group-[&:not(.top)]:backdrop-blur-[0.625rem] lg:group-[&:not(.top)]:bg-[#D9D9D9] bg-darkblue   lg:group-[&:not(.top)]:bg-opacity-10 group-[&:not(.top)]:border-white/40 group-[&:not(.top)]:border-solid group-[&:not(.top)]:border py-6 max-lg:py-5 px-7 flex justify-between max-lg:bg-opacity-0 max-lg:border-white max-lg:border-solid max-lg:border max-lg:group-[&.top]:bg-darkblue max-lg:group-[&.top]:border-none lg:rounded-3xl">

                    <!-- Site Logo -->
                    <div class="logo left">
                        <?php
                        if (function_exists('the_custom_logo')) {
                            the_custom_logo();
                        }
                        ?>
                    </div>
                    <!-- Navigation -->
                    <div class="right flex items-center gap-5 max-xxl:gap-3  pr-[3.75rem] max-md:pr-12">
                        <?php
                        if (has_nav_menu('main-menu')) {
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'main-menu',
                                    'container' => false,
                                    'menu_class' => 'text-white flex gap-10 mr-10 max-xxl:mr-3  max-xxl:gap-6 max-lg:hidden font-medium',
                                    'add_a_class'     => 'duration-700 transition-all  text-[0.875rem] 4xl:text-base',
                                    'walker'         => new Mega_Menu_Walker(),
                                    // 'depth' => 3,
                                    // 'walker' => new categoryImage_Walker_Menu()
                                )
                            );
                        }
                        ?>

                        <div class="search-btn rounded-full bg-white bg-opacity-20 text-white w-10 h-10 cursor-pointer flex items-center justify-center text-xl transition-all duration-700 hover:bg-opacity-100 hover:text-darkblue ">
                            <span class="icon-search"></span>
                        </div>

                        <?php
                        $enquiry_link = get_field('enquiry_link', 'option');
                        if (!empty($enquiry_link)) {
                            $enquiry_target = $enquiry_link['target'] ? $enquiry_link['target'] : '_self';
                        }
                        if ($enquiry_link) :
                        ?>
                            <button aria-label="Send Enquiry" role="button" class="full-btn make-enquiry border-solid border border-white bg-white  rounded-full text-darkblue px-5 py-3 capitalize font-medium flex items-center gap-3 leading-3 text-[0.875rem] transition-all duration-700 cursor-pointer hover:bg-transparent hover:text-white max-lg:hidden">
                                <?= $enquiry_link['title'] ?> <span class="icon-arrow-right "></span>
                            </button>
                        <?php endif; ?>

                        <div class="mobile-menu ">
                            <span class="nav-icon"></span>
                        </div>

                        <!-- Ham menu -->
                        <?php if (has_nav_menu('ham-menu')) { ?>
                            <div class="ham-menu">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'ham-menu',
                                        'container' => false,
                                        'menu_class' => '',
                                        'add_a_class'     => '',
                                        'walker' => new Ham_Walker_Nav_Menu(),
                                    )
                                );
                                ?>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </header>

        <section class="search-top-block search-bar group fixed size-full inset-0  z-[60] transition-all duration-1000 [clip-path:polygon(0%_0%,100%_0%,100%_0%,0%_0%)] invisible [&.active]:[clip-path:polygon(0%_100%,100%_100%,100%_0%,0%_0%)] [&.active]:visible">
            <?php get_search_form(); ?>
        </section>




        <div class="menu-overlay size-full inset-0 fixed backdrop-blur-[0.5rem] bg-black/10 z-20 transition-all duration-500 opacity-0 pointer-events-none"></div>


        <!-- Gravity forms - Enquiry -->
        <?php include(locate_template('template-parts/parts/enquiry_form.php', false, false)); ?>


        <!-- cookie block -->
        <?php include(locate_template('template-parts/parts/cookie_block.php', false, false)); ?>


        <!-- cookie block ends -->