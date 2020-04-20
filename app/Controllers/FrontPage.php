<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class FrontPage extends Controller
{

    public static function homePosts()
    {
        $category_posts = [];
        while ( have_posts() ) {
            global $post;
            the_post();
            $cat = App::getPostCategorySlug(get_the_ID());
            $category_posts[$cat][] = $post;
        }

        return $category_posts;
    }
}
