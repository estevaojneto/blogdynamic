<?php

namespace Theme;

class SiteLoader
{
    static $currInstance = null; // only one instance per load, no reason for more
    public function __construct()
    {
        if (self::$currInstance === null) {
            add_filter( 'wp_enqueue_scripts', [get_class(), 'removeJqueryQueue']);
            add_filter('xmlrpc_enabled', '__return_false');
            remove_filter( 'the_title', 'capital_P_dangit', 11 );
            remove_filter( 'the_content', 'capital_P_dangit', 11 );
            remove_filter( 'comment_text', 'capital_P_dangit', 31 );
            add_filter('excerpt_length', function () { return 50; }, 999);
            remove_action('wp_head', 'print_emoji_detection_script', 7);
            add_action('get_footer', [get_class(), 'queueThemeStyles'], PHP_INT_MAX);
            add_action('get_footer', [get_class(), 'queueThemeScripts'], PHP_INT_MAX);
            add_filter('template_include', [get_class(), 'redirectMainTemplate'], 99);
            self::$currInstance = $this;
        }
    }

    public static function removeJqueryQueue()
    {
        wp_dequeue_script( 'jquery');
        wp_deregister_script( 'jquery');   
    }
    public static function redirectMainTemplate($template) {
        if (is_404()) {
            wp_redirect(home_url()); die;
        }
        if (is_single()) {
            $new_template = locate_template(['template-main-dynamic.php']);
            if ('' != $new_template) {
                return $new_template ;
            }
        }
        return $template;
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
