<?php
/**
 * Template Name: Main BlogDynamic page
 */
$latest_post_name = Theme\PostLoader::getMostRecentPostName();
$latest_post_link = Theme\PostLoader::getMostRecentPostLink();
global $post;
?>
<!doctype html>
<html lang="en" style="overflow: hidden">
  <?= get_header(); ?>
  <body>
    <div class="container-full">
        <div class="row main-row">
            <div class="col-sm-3 left-column align-content-center" data-function="sidebar">
                <div class="left-column-contents w-75">
                    <!-- -->
                    <h1 class="h4 blogtitle"><a href="<?= home_url(); ?>"><?= get_bloginfo('name') ?></a></h1>
                    <p>
                        <?= __('Latest post:', 'blogdynamic') ?><br>
                        <a href="<?= $latest_post_link ?>"><?= $latest_post_name ?></a>
                    </p>
                    <br>
                    <small><a href="<?= get_privacy_policy_url() ?>"><?= __("Privacy Policy") ?></a></small>
                    <div class="searchbox-container">
                    </div>
                    <div class="history-browser">                     
                    </div>
                </div>
            </div>
            <div class="col-sm-9 right-column">
                <?= Theme\PostLoader::loadPostByObject($post) ?>
            </div>
        </div>
    </div>
    <?= get_footer() ?>
  </body>
</html>