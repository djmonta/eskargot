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
            if ($cat == 'live') {
                if (count($category_posts['live']) > 2) continue;
                if (empty(get_field('show_on_top', false, false))) continue;
            }

            $category_posts[$cat][] = $post;
        }

        return $category_posts;
    }

    public static function homeBioAndMusic()
    {
        $args = [
            'post_type' => array('page', 'music'),
            'nopaging'  => true,
        ];

        $bio_and_music_query = new \WP_Query( $args );

        $bio_and_music = [];
        $disco_sort = [];
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
                if ($format[0]->name == 'Album' || $format[0]->name == '7 Inch') {
                    $bio_and_music['discography'][$format[0]->name][] = $post;
                    $disco_sort[$format[0]->name][] = get_field('release_date', false, false);
                } else {
                    $bio_and_music['movie'][] = $post;
                }
            }
        }

        $bio_and_music_query->rewind_posts();

        global $wp_query;
        $wp_query = $bio_and_music_query;

        wp_reset_postdata();

        ksort($bio_and_music);
        krsort($bio_and_music['discography']);
        foreach ($disco_sort as $format => $sort) {
            array_multisort($sort, SORT_DESC, $bio_and_music['discography'][$format]);
        }

        return $bio_and_music;
    }

}
