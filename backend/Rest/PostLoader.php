<?php

namespace Theme\Rest;

use WP_REST_Controller;
use WP_REST_Server;
use WP_Error;
use WP_Query;
use Theme\Constants;

/**
 * @deprecated No longer in use, but still functional
 */

class PostLoader extends WP_REST_Controller
{
    public function __construct()
    {
        $this->namespace = Constants::REST_API_NAMESPACE;
        $this->rest_base = Constants::REST_API_BASE_POST;
    }

    public function registerRoutes() {
        register_rest_route($this->namespace, '/' . $this->rest_base . '/', [
            [
                'methods'  => WP_REST_Server::READABLE,
                'callback' => [$this, 'getPost'],
                'args'     => [
                    'context' => $this->get_context_param(['default' => 'view']),
                ],
                'schema' => [$this, 'get_public_item_schema'],
                'permission_callback' => '__return_true'
            ],
        ]);
    }
    
    public function getPost()
    {
        $contents = [
            "posts" => ''
        ];
        $slug_to_get = isset($_GET['slug']) ? sanitize_title($_GET['slug']) : '';
        $contents["posts"] = \Theme\PostLoader::loadPostBySlug($slug_to_get);
        return $contents;
    }
}