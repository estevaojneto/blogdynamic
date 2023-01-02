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
                        <!-- <input type="text" class="mw-100" placeholder="Search for a post"> -->
                    </div>
                    <div class="history-browser">                     
                        <!--
                        <div class="accordion-flush p-4" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                <button style="display:contents" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    2022
                                </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <a href="#">Jan</a><br>
                                    <a href="#">Fev</a><br>
                                    <a href="#">Mar</a><br>
                                    <a href="#">Apr</a><br>
                                    <a href="#">May</a><br>
                                    <a href="#">Jun</a><br>
                                    <a href="#">Jul</a><br>
                                </div>
                            </div>
                        </div>
                        -->
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