<?php

namespace Theme;

class PostLoader
{
    static $mostRecentPosts = null; // only one instance per load, no reason for more
    public static function setHooks()
    {
        add_action('rest_api_init', [PostLoader::class, 'registerRoutes']);
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
            ), OBJECT);
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

    public static function loadPostBySlug($slug_to_get)
    {
        global $post;
        $contents = [];
        if (empty($slug_to_get)) {
            $contents = self::loadFrontpagePostList();
        } else {
            $post = get_page_by_path($slug_to_get, OBJECT, 'post');            
            $contents[] = self::adjustPostObject($post);
        }
        return $contents;
    }

    public static function loadFrontpagePostList()
    {
        $contents = [];
        $latest_posts = self::getMostRecentPosts();
        foreach ($latest_posts as $post) {
            $contents[] = self::adjustPostObject($post);
        }
        return $contents;
    }

    private static function adjustPostObject(\WP_Post $post)
    {
        $post_result = [];
        $post_result['date_gmt'] = strtotime($post->post_date_gmt);
        $post_result['author'] = get_the_author_meta('first_name', $post->post_author).' '.get_the_author_meta('last_name', $post->post_author);
        $post_result['contents'] = $post->post_content;
        $post_result['title'] = $post->post_title;
        $post_result['name'] = $post->post_name;
        return $post_result;
    }
}