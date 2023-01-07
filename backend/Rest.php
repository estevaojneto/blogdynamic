<?php declare(strict_types=1);

namespace Theme;

/**
 * @deprecated No longer in use, but still functional
 */
class PostLoader 
{
    static $mostRecentPost = null; // only one instance per load, no reason for more
    public static function setHooks()
    {
        add_action('rest_api_init', [Rest::class, 'registerRoutes']);
    }

    public static function getMostRecentPost()
    {
        if (self::$mostRecentPost === null) {
            self::$mostRecentPost = wp_get_recent_posts(array(
                'numberposts' => 1,
                'post_status' => 'publish'
            ))[0];
        }
        return self::$mostRecentPost;
    }

    public static function getMostRecentPostName()
    {
        if (self::$mostRecentPost === null) {
            self::getMostRecentPost();
        }
        return self::$mostRecentPost['post_title'];
    }

    public static function getMostRecentPostURL()
    {
        if (self::$mostRecentPost === null) {
            self::getMostRecentPost();
        }
        return get_permalink(self::$mostRecentPost['ID']);
    }
}