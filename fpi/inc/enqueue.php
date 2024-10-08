<?php
/*
=============================================================
1.0 - Theme Enqueue
=============================================================
*/

function theme_enqueue_scripts() {
if ( is_admin() ) return false;
    // Config version cache
    // $json_file_path = __DIR__ . '/../config/version.json';
    // $data = file_get_contents($json_file_path);
    // $data = json_decode($data, true);
    // $fileversion = $data['version'];
    $fileversion = json_decode(file_get_contents(__DIR__ . '/../config/version.json'), true)['version'];


//  Styles
wp_enqueue_style('theme-style', get_template_directory_uri() . '/dist/css/app.min.css', '', $fileversion);

    // Scripts
    // wp_enqueue_script( 'FontAwesome', 'https://kit.fontawesome.com/c6e0cd704f.js');

    // wp_register_script('intl-js', get_stylesheet_directory_uri() . '/src/lib/build/js/intlTelInput.min.js', [], '', true);
    // wp_enqueue_script('intl-js');

wp_enqueue_script('app-script', get_template_directory_uri() . '/dist/js/app-' . $fileversion . '.min.js', array('jquery'), $fileversion, true);

// wp_register_script('wp_plugin', get_stylesheet_directory_uri() . '/dist/js/wp_plugin_overrides-' . $fileversion . '.min.js', array('jquery'), $fileversion, true);
// wp_enqueue_script('wp_plugin');

wp_localize_script('app-script', 'adminajax', array(
    'ajax_url' => admin_url('admin-ajax.php'),
    'nonce' => wp_create_nonce('load_more_nonce')
));

}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );


// Defer javascript files
add_filter('script_loader_tag', 'async_scripts', 10, 3);
function async_scripts($tag, $handle, $src)
{
    // The handles of the enqueued scripts we want to defer
    $defer_scripts = array(
        'app-script',
    );
    if (in_array($handle, $defer_scripts)) {
        return '<script src="' . $src . '" defer="defer"></script>' . "\n";
    }
    return $tag;
}

// Preload styles
// add_filter('style_loader_tag', 'async_styles', 10, 4);

// function async_styles($tag, $handle, $href, $media)
// {
//     // The handles of the enqueued styles we want to preload
//     $defer_scripts = array(
//         'theme-style',
//     );
//     if (in_array($handle, $defer_scripts)) {
//         return '<link rel="preload" href="' . $href . '" as="style" media="' . $media . '" type="text/css" onload="this.onload = null;this.rel=\'stylesheet\'">' . "\n";
//     }
//     return $tag;
// }


/*
======================================
 1.1  Dequeue
======================================
*/

function prefix_remove_core_block_styles()
{
    wp_dequeue_style('wp-block-columns');
    wp_dequeue_style('wp-block-column');
    wp_dequeue_style('classic-theme-styles');
}
add_action('wp_enqueue_scripts', 'prefix_remove_core_block_styles');

function prefix_remove_global_styles()
{
    wp_dequeue_style('global-styles');
}
add_action('wp_enqueue_scripts', 'prefix_remove_global_styles', 100);

function smartwp_remove_wp_block_library_css()
{
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    //wp_dequeue_style('wc-blocks-style');
}
add_action('wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100);


/*
======================================
 1.2  For Admin Backend
======================================
*/
add_action('admin_enqueue_scripts', 'load_admin_style');
function load_admin_style()
{
    wp_enqueue_style('admin_css', get_template_directory_uri() . '/dist/css/admin.min.css', false, '1.0.0');
}