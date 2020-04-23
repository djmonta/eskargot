<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class FrontPage extends Controller
{

    public static function homePosts()
    {
        $category_posts = ['news' => [], 'live' => []];
        while ( have_posts() ) {
            global $post;
            the_post();
            $cat = App::getPostCategorySlug(get_the_ID());
            $category_posts[$cat][] = $post;
        }

        return $category_posts;
    }

    public static function categoryDescFromSlug($slug)
    {
        return category_description(get_category_by_slug($slug)->term_id);
    }
}
