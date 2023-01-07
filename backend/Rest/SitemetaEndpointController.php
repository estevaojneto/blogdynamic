<?php declare(strict_types=1);

namespace Theme\Rest;

use WP_REST_Controller;
use WP_REST_Server;
use WP_Error;
use WP_Query;
use Theme\Constants;
use Theme\Facades\RecentPosts;

class SitemetaEndpointController extends RestController
{
    public function __construct()
    {
        $this->namespace = Constants::REST_API_NAMESPACE;
        $this->rest_base = Constants::REST_API_BASE_SITEMETA;
    }

    public function registerRoutes() {
        register_rest_route($this->namespace, '/' . $this->rest_base . '/', [
            [
                'methods'  => WP_REST_Server::READABLE,
                'callback' => [$this, 'getSiteInfo'],
                'args'     => [
                    'context' => $this->get_context_param(['default' => 'view']),
                ],
                'schema' => [$this, 'get_public_item_schema'],
                'permission_callback' => '__return_true'
            ],
        ]);
    }
    
    public function getSiteInfo()
    {
        $info = [
            'home_url' => home_url(),
            'site_name' => get_bloginfo('blogname'),
            'latest_post_slug' => RecentPosts::getMostRecentPost() ?
                RecentPosts::getMostRecentPost()->post_name:
                home_url(),
            'latest_post_title' => RecentPosts::getMostRecentPost() ?
                RecentPosts::getMostRecentPost()->post_title :
                'None',
            'privacy_policy_page_url' => get_privacy_policy_url()
        ];
        return $info;
    }
}