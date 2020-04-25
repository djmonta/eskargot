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

    public static function homeBioAndMusic()
    {
        $args = [
            'post_type' => array('page', 'music'),
        ];

        $bio_and_music_query = new \WP_Query( $args );

        $bio_and_music = [];
        if ( $bio_and_music_query->have_posts() ) {
            foreach ($bio_and_music_query->get_posts() as $post) {
                if ($post->post_title == 'Biography') {
                    $bio_and_music[0] = $post;
                    continue;
                }
                if ($post->post_type == 'music') {
                    $format = wp_get_post_terms($post->ID, 'format');
                    $bio_and_music[$format[0]->slug][] = $post;
                }
            }
            ksort($bio_and_music);
        }

        wp_reset_postdata();

        return $bio_and_music;
    }

}
