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
        while ( $bio_and_music_query->have_posts() ) {
            global $post;
            $bio_and_music_query->the_post();
            if (get_the_title() == 'Biography') {
                $bio_and_music['biography'] = $post;
                continue;
            }
            if ($post->post_type == 'music') {
                // var_dump($post);
                $format = wp_get_post_terms($post->ID, 'format');
                if ($format[0]->slug == 'album' || $format[0]->slug == '7inch') {
                    $bio_and_music['discography'][$format[0]->slug][] = $post;
                } else {
                    $bio_and_music['movie'][] = $post;
                }
            }
        }
        ksort($bio_and_music);

        wp_reset_postdata();

        return $bio_and_music;
    }

}
