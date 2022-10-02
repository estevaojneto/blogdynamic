<?php

namespace Theme;

class SiteLoader
{
    static $currInstance = null; // only one instance per load, no reason for more
    public function __construct()
    {
        add_filter('xmlrpc_enabled', '__return_false');
        if (self::$currInstance === null) {
            add_filter('excerpt_length', function () { return 100; }, 999);
            remove_action('wp_head', 'print_emoji_detection_script', 7);
            add_action('get_footer', [get_class(), 'queueThemeStyles'], PHP_INT_MAX);
            add_action('get_footer', [get_class(), 'queueThemeScripts'], PHP_INT_MAX);
            self::$currInstance = $this;
        }
    }

    public static function queueThemeScripts()
    {
        $theme_dir = dirname(get_stylesheet_uri());
        wp_enqueue_script(['jquery']);
        wp_enqueue_script('main', $theme_dir.Constants::FRONTEND_JS_PATH.'/main.js', 'jquery');
    }

    public static function queueThemeStyles()
    {
        $theme_dir = dirname(get_stylesheet_uri());
        wp_enqueue_style('main', $theme_dir.Constants::FRONTEND_CSS_PATH.'/main.css');
        wp_enqueue_style('contents', $theme_dir.Constants::FRONTEND_CSS_PATH.'/contents.css');
        wp_enqueue_style('scrollbar', $theme_dir.Constants::FRONTEND_CSS_PATH.'/scrollbar.css');
    }
}
