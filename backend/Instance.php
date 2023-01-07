<?php declare(strict_types=1);

namespace Theme;

use Theme\Rest\RestControllerCollection;

class Instance
{
    static $currInstance = null; // only one instance per load, no reason for more

    public function __construct()
    {
        if (self::$currInstance === null) {
            remove_action('wp_head', 'print_emoji_detection_script', 7);
            remove_action('admin_print_scripts', 'print_emoji_detection_script');
            remove_action('wp_print_styles', 'print_emoji_styles');
            remove_action('admin_print_styles', 'print_emoji_styles'); 
            remove_filter('the_content_feed', 'wp_staticize_emoji');
            remove_filter('comment_text_rss', 'wp_staticize_emoji'); 
            remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
            add_filter('xmlrpc_enabled', '__return_false');
            remove_filter('the_title', 'capital_P_dangit', 11);
            remove_filter('the_content', 'capital_P_dangit', 11);
            remove_filter('comment_text', 'capital_P_dangit', 31);
            add_filter('excerpt_length', function () { return 50; }, 999);
            self::$currInstance = $this;
            add_action('rest_api_init', function () {
                RestAPI::getInstance()->init(
                    new RestControllerCollection(
                        [
                            new \Theme\Rest\PostEndpointController(),
                            new \Theme\Rest\SitemetaEndpointController()
                        ]    
                    )
                );
            });
        }
    }
}
