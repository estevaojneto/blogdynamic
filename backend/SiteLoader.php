<?php

namespace Theme;

class SiteLoader
{
    static $currInstance = null; // only one instance per load, no reason for more
    public function __construct()
    {
        if (self::$currInstance === null) {
            new Admin();
			add_theme_support('post-thumbnails');
            remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
            remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
            remove_action( 'wp_print_styles', 'print_emoji_styles' );
            remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
            remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
            remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
            remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
            add_filter( 'wp_enqueue_scripts', [SiteLoader::class, 'removeWpScriptsQueue']);
            add_filter('xmlrpc_enabled', '__return_false');
            remove_filter( 'the_title', 'capital_P_dangit', 11 );
            remove_filter( 'the_content', 'capital_P_dangit', 11 );
            remove_filter( 'comment_text', 'capital_P_dangit', 31 );
            add_filter('excerpt_length', function () { return 50; }, 999);
            remove_action('wp_head', 'print_emoji_detection_script', 7);
            add_action('get_footer', [SiteLoader::class, 'queueThemeStyles'], PHP_INT_MAX);
            add_action('get_footer', [SiteLoader::class, 'queueThemeScripts'], PHP_INT_MAX);
            add_filter('template_include', [SiteLoader::class, 'redirectMainTemplate'], 99);
            self::$currInstance = $this;
        }
    }

    public static function removeWpScriptsQueue()
    {
        wp_dequeue_style( 'wp-block-library' );
        wp_dequeue_style( 'wp-block-library-theme' );
        wp_deregister_style('classic-theme-styles');
        wp_dequeue_style('classic-theme-styles');
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
        //wp_enqueue_script('main', $theme_dir.Constants::FRONTEND_JS_PATH.'/main.js', 'jquery');
    }

    public static function queueThemeStyles()
    {
        $theme_dir = dirname(get_stylesheet_uri());
        wp_enqueue_style('bootstrap', $theme_dir.Constants::FRONTEND_CSS_PATH.'/bootstrap.min.css');
        wp_enqueue_style('bootstrap', $theme_dir.Constants::FRONTEND_JS_PATH.'/bootstrap.min.js');
        wp_enqueue_style('main', $theme_dir.Constants::FRONTEND_CSS_PATH.'/main.css');
    }
}
