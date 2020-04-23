<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage')
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));

    add_image_size( 'medium_large', '768', '0', false );
    add_image_size( '1536x1536', '1536', '1536', false );
    add_image_size( '2048x2048', '2048', '2048', false );
    add_image_size( '500', '500', '0', false );
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    register_sidebar([
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer', 'sage'),
        'id'            => 'sidebar-footer'
    ] + $config);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});

/**
 * Create Categories
 */
add_action( 'init', function() {
    // create categories
    if (file_exists (ABSPATH.'/wp-admin/includes/taxonomy.php'))
    {
        require_once (ABSPATH.'/wp-admin/includes/taxonomy.php');

        $categories = [
            array(
                'cat_name' => 'News',
                'category_description' => 'お知らせ',
                'category_nicename' => 'news'
            ),
            array(
                'cat_name' => 'Live Info',
                'category_description' => 'Live 情報',
                'category_nicename' => 'live'
            ),
            array(
                'cat_name' => 'Blog',
                'category_description' => 'ブログ',
                'category_nicename' => 'blog'
            )
        ];

        foreach ($categories as $value) {
            // create categories
            $check = get_cat_ID($value['cat_name']);
            if(empty($check)) {
                wp_insert_category($value);
            }
        }
    }
});

/**
 * Create Pages
 */
add_action( 'init', function() {
    // create pages
    $new_page_titles = [
        'Contact',
        'Biography'
    ];

    foreach ($new_page_titles as $title) {
        $page_check = get_page_by_title($title);
        if(!isset($page_check->ID)) {
            $new_page = array(
            'post_type'     => 'page',
            'post_title'    => $title,
            'post_content'  => 'more coming soon',
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_parent'   => '', );

            // create page
            wp_insert_post($new_page);
        }
    }
});


/**
 * Post Type: Music.
 */
add_action( 'init', function() {
    $labels = [
        "name" => __( "Music", "sage" ),
        "singular_name" => __( "Music", "sage" ),
    ];

    $args = [
        "label" => __( "Music", "sage" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => [ "slug" => "music", "with_front" => true ],
        "query_var" => true,
        "menu_icon" => "dashicons-format-audio",
        "supports" => [ "title", "editor", "thumbnail" ],
    ];

    register_post_type( "music", $args );
});

/**
 * Taxonomy: 形式.
 */
add_action( 'init', function() {
    $labels = [
        "name" => __( "形式", "sage" ),
        "singular_name" => __( "形式", "sage" ),
        "menu_name" => __( "形式", "sage" ),
        "all_items" => __( "形式 一覧", "sage" ),
        "edit_item" => __( "形式 を編集", "sage" ),
        "view_item" => __( "表示 形式", "sage" ),
        "update_item" => __( "Update 形式 name", "sage" ),
        "add_new_item" => __( "新規 形式 を追加", "sage" ),
        "new_item_name" => __( "新しい 形式 の名前", "sage" ),
        "parent_item" => __( "親 形式", "sage" ),
        "parent_item_colon" => __( "親 形式:", "sage" ),
        "search_items" => __( "形式 を検索", "sage" ),
        "popular_items" => __( "人気の 形式", "sage" ),
        "separate_items_with_commas" => __( "形式 が複数ある場合はコンマで区切る", "sage" ),
        "add_or_remove_items" => __( "形式 を追加または削除", "sage" ),
        "choose_from_most_used" => __( "最もよく使われている形式から選択", "sage" ),
        "not_found" => __( "No 形式 found", "sage" ),
        "no_terms" => __( "No 形式", "sage" ),
        "items_list_navigation" => __( "形式 list navigation", "sage" ),
        "items_list" => __( "形式 list", "sage" ),
    ];

    $args = [
        "label" => __( "形式", "sage" ),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => [ 'slug' => 'format', 'with_front' => true, ],
        "show_admin_column" => true,
        "show_in_rest" => true,
        "rest_base" => "format",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "show_in_quick_edit" => true,
        ];
    register_taxonomy( "format", [ "music" ], $args );


    // create categories
    if (file_exists (ABSPATH.'/wp-admin/includes/taxonomy.php'))
    {
        require_once (ABSPATH.'/wp-admin/includes/taxonomy.php');

        $categories = [
            'album' => 'Album',
            '7inch' => '7 Inch',
            'movie' => 'Movie',
        ];

        foreach ($categories as $slug => $value) {
            // create categories
            $check = get_cat_ID($value);
            if(empty($check)) {
                $category = [
                    'taxonomy' => 'format',
                    'cat_name' => $value,
                    'category_nicename' => $slug
                ];
                wp_insert_category($category);
            }
        }
    }
});
