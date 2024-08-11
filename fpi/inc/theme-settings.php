<?php

/*
=============================================================
1.0 - Theme Support
=============================================================
*/

add_action('after_setup_theme', 'theme_setup');

function theme_setup()
{
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'script', 'style'));
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('custom-header');
    add_theme_support('widgets');
    add_post_type_support('page', 'excerpt');

    // Custom image sizes

    add_image_size('size-1000*1156', 1000, 1156, true);
    add_image_size('size-576*652', 567, 652, true);
    add_image_size('size-876*1026', 876, 1026, true);
    add_image_size('size-560*520', 560, 520, true);

    add_image_size('size-2880*1500', 2880, 1500, true);

    add_image_size('blur',1,1,true);

}

/*
=============================================================
1.1 - Add support for SVG images
=============================================================
*/

define('ALLOW_UNFILTERED_UPLOADS', true);
add_action('upload_mimes', 'add_file_types_to_uploads');
function add_file_types_to_uploads($file_types)
{
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes);
    return $file_types;
}

/*
=============================================================
1.2 - ACF Local JSON setup
=============================================================
*/


add_filter('acf/settings/save_json', 'my_acf_json_save_point');

function my_acf_json_save_point($path)
{
	// update path
	$path = get_stylesheet_directory() . '/acf-json';
	// return
	return $path;
}


/*
=============================================================
1.3 - Pass custom class to logo
=============================================================
*/


function custom_logo_with_class($html)
{
    $html = str_replace('custom-logo', 'w-[8.4rem]', $html);
    return $html;
}
add_filter('get_custom_logo', 'custom_logo_with_class');


/*
=============================================================
1.4 - Disable gutenberg
=============================================================
*/


function disable_gutenberg_for_template($use_block_editor, $post_type)
{
    $use_block_editor = false;
    return $use_block_editor;
}
add_filter('use_block_editor_for_post_type', 'disable_gutenberg_for_template', 10, 2);


/*
=============================================================
1.4 - Populate Gravity forms inside ACF select
=============================================================
*/


function populate_acf_select_box_with_gravity_forms($field)
{
    // Reset choices
    $field['choices'] = array();

    // Get all Gravity Forms
    if (class_exists('GFAPI')) {
        $forms = GFAPI::get_forms();

        // Loop through forms and add them as choices
        if (!empty($forms)) {
            foreach ($forms as $form) {
                $form_id = $form['id'];
                $form_title = $form['title'];
                $field['choices'][$form_id] = $form_title;
            }
        }
    }

    return $field;
}
add_filter('acf/load_field/name=gravity_forms_select', 'populate_acf_select_box_with_gravity_forms');


add_filter('gform_pre_render', 'check_duplicate_gravity_forms');
add_filter('gform_pre_validation', 'check_duplicate_gravity_forms');
add_filter('gform_pre_submission_filter', 'check_duplicate_gravity_forms');
add_filter('gform_admin_pre_render', 'check_duplicate_gravity_forms');

function check_duplicate_gravity_forms($form)
{
    static $rendered_forms = array();

    if (isset($rendered_forms[$form['id']])) {
        // If form ID already exists in the array, it's a duplicate
        add_action('wp_footer', function () use ($form) {
            echo '<script>
                jQuery(".form-pop-up").remove();
                 jQuery(".make-enquiry").click(function (){
                    jQuery(".mobile-nav .mobile-menu").trigger("click");
                    jQuery("html, body").animate({
                        scrollTop: jQuery("#form-block").offset().top
                    }, 2000);
                });
            </script>';
        });
    } else {
        // Otherwise, add it to the array
        $rendered_forms[$form['id']] = true;
    }

    return $form;
}



add_action('rest_api_init', function () {
    register_rest_route('custom/v1', '/menus', array(
        'methods' => 'GET',
        'callback' => 'get_custom_menu_items',
    ));
});

function get_custom_menu_items() {
    $locations = get_nav_menu_locations();
    $menu = wp_get_nav_menu_object($locations['main-menu']); // Replace 'primary' with your menu location slug
    $menu_items = wp_get_nav_menu_items($menu->term_id);

    return new WP_REST_Response($menu_items, 200);
}
