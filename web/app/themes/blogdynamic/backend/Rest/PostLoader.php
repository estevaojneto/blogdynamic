<?php

namespace Theme\Rest;

use WP_REST_Controller;
use WP_REST_Server;
use WP_Error;
use WP_Query;
use Theme\Constants;

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
        header('Content-Type: text/html; charset=utf-8');
        $slug_to_get = sanitize_title($_GET['slug']);
        $post = get_page_by_path($slug_to_get, OBJECT, 'post');
        if ($post) {
            echo get_template_part('post', null, ['post_content' => $post->post_content, 'post_title' => $post->post_title]);
        }
    }
}