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
}