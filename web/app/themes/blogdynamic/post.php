<?php
extract($args);
?>
<div class="container lh-lg overflow-auto h-100">
    <div class="col-md-8 mx-auto pb-4">
        <a class="h2 pb-2" data-post-link="main-post-list" href="#"><<</a>
            <div class="pb-4">
                <h1><?= $post_title ?></h1>
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
                        <a data-post-link="main-post-list" href="#">[_] Home</a>
                    </span>
                </div>
                <div class="col-sm-4 text-right" style="text-align:right!important">
                    <span class="h5">
                        <a href="#">>> Previous post</a>
                    </span>
                </div>
            </div>
    </div>
</div>
<span type="text" class="d-none" data-post-id="<?= $post_id ?>"></span>