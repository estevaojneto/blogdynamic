<?php declare(strict_types=1);

namespace Theme\Facades;

/**
 * Provides a useful facade for getting posts according
 * to certain parameters (slug, etc),
 */
class GetPosts
{
    public static function loadPostInfoBySlug($slug_to_get)
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
        $latest_posts = RecentPosts::getMostRecentPosts();
        foreach ($latest_posts as $post) {
            $contents[] = self::adjustPostObject($post);
        }
        return $contents;
    }

    public static function adjustPostObject(\WP_Post $post)
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