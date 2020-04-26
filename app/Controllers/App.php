<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

    public static function getPostCategorySlug($post_id)
    {
        return get_the_category($post_id)[0]->slug;
    }

    public static function getFirstoEmbed($post_id)
    {
        $meta = get_post_custom($post_id);

        foreach ($meta as $key => $value) {
            if (strpos($key, 'oembed') !== false)
                return $value[0];

        }
    }
}
