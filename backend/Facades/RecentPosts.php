<?php declare(strict_types=1);

namespace Theme\Facades;

/**
 * Provides a useful facade to get the most recent posts (array) or
 * the single most recent post.
 * You can still use get_posts directly, but I recommend using this
 * function as it caches recent post calls.
 */
class RecentPosts
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
}