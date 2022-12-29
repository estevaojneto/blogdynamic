<?php

namespace Theme;

class Postloader
{
    static $mostRecentPosts = null; // only one instance per load, no reason for more
    public static function setHooks()
    {
        add_action('rest_api_init', [get_class(), 'registerRoutes']);
    }

    public static function registerRoutes()
    {
        (new Rest\PostLoader())->registerRoutes();
    }

    public static function getMostRecentPosts()
    {
        if (self::$mostRecentPosts === null) {
            self::$mostRecentPosts = wp_get_recent_posts(array(
                'numberposts' => 10,
                'post_status' => 'publish',
                'orderby' => 'post_date'
            ));
        }
        return self::$mostRecentPosts;
    }

    public static function getMostRecentPost()
    {
        self::getMostRecentPosts();
        return self::$mostRecentPosts[0];

    }
    public static function getMostRecentPostName()
    {
        $recent = self::getMostRecentPost();
        return $recent['post_title'];
    }

    public static function getMostRecentPostSlug()
    {
        $recent = self::getMostRecentPost();
        return $recent['post_name'];
    }

    public static function getMostRecentPostLink()
    {
        return sprintf('%s', self::getMostRecentPostSlug());
    }

    public static function loadPostByObject(\WP_Post $post)
    {
        $home_id = get_option('page_on_front');
        if ($home_id == $post->ID) {
            self::loadFrontpagePostList();
        } else {
            echo get_template_part('single', null);
        }
    }

    public static function loadPostBySlug($slug_to_get)
    {
        global $post;
        if ($slug_to_get == 'main-post-list') {
            echo self::loadFrontpagePostList();
        } else {
            $post = get_page_by_path($slug_to_get, OBJECT, 'post');            
            if (!$post) {
                $post = get_post(get_option('page_on_front'));
            }
            self::loadPostByObject($post);
        }
    }

    public static function loadFrontpagePostList()
    {
        $latest_posts = self::getMostRecentPosts();
        foreach ($latest_posts as $post) {
            echo get_template_part('template-part/homepage-posts', null, $post);
        }
    }
}