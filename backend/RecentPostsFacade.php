<?php declare(strict_types=1);

namespace Theme;

/**
 * Provides a useful facade around get_posts(),
 * mainly for getting a list of posts, or the most recent post, etc.
 * You can still use get_posts directly, but I recommend using this
 * function as it caches recent post calls.
 */
class RecentPostsFacade
{
    static $mostRecentPosts = null; // run-time caching of the post result list

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