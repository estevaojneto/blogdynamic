<div class="row p-2">
    <div class="col-md-8 mx-auto pb-3 container-postlist-post">
        <div class="pb-3">
            <h1><a class="h1" href="<?= home_url() ?>/<?= $args['post_name'] ?>" data-post-link="<?= $args['post_name'] ?>"><?= $args['post_title'] ?></a></h1>
            <p><em><?= wp_date( get_option('date_format'), strtotime($args['post_date'])); ?></em></p>
            <p><em>By <?= get_the_author_meta('user_firstname', $post->post_author).' '.get_the_author_meta('user_lastname', $post->post_author); ?></em></p>
        </div>
        <div>
            <?= wp_trim_excerpt('', $args['ID']) ?>
        </div>
        <br>
        <a class="h4" href="<?= home_url() ?>/<?= $args['post_name'] ?>" data-post-link="<?= $args['post_name'] ?>"><?= __('View Post', 'blogdynamic') ?></a>
    </div>
</div>