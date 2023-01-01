<?php
global $post;
$args = [
        'post_content' => $post->post_content,
        'post_date' => $post->post_date,
        'post_title' => $post->post_title,
        'post_id' => $post->ID
    ];
extract($args);
?>
<div class="container lh-lg overflow-auto h-100">
    <div class="col-md-8 mx-auto pb-4">
        <a class="h2 pb-2" data-post-link="main-post-list" href="<?= home_url() ?>"><<</a>
            <div class="pb-4">
                <h1><?= $post_title ?></h1>
                <p><em><?= $post_date ?></em></p>
            </div>
            <div>
                <?= wpautop($post_content) ?>
            </div>
            <hr>
            <div class="row mx-auto pb-4">
                <div class="col-sm-4 text-left">
                    <span class="h5">
                        <a href="#"><< Next post</a>
                    </span>
                </div>
                <div class="col-sm-4 text-center">
                    <span class="h5">
                        <a data-post-link="main-post-list" href="#">[ / ] Home</a>
                    </span>
                </div>
                <div class="col-sm-4 text-right" style="text-align:right!important">
                    <span class="h5">
                        <a href="#">>> Previous post</a>
                    </span>
                </div>
            </div>
            <?php get_template_part('comments');
            
            $comments = get_comments(array(
                'post_id' => $post_id,
                'status' => 'approve' //Change this to the type of comments to be displayed
            ));
    
            //Display the list of comments
            wp_list_comments(array(
                'per_page' => 10, //Allow comment pagination
                'reverse_top_level' => false //Show the oldest comments at the top of the list
            ), $comments);
            ?>
    </div>
</div>
<span type="text" class="d-none" data-post-id="<?= $post_id ?>"></span>