<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="pb-2">
            <h1><a class="h1" href="<?= home_url() ?>/<?= $args['post_name'] ?>" data-post-link="<?= $args['post_name'] ?>"><?= $args['post_title'] ?></a></h1>
            <p><em><?= $args['post_date'] ?></em></p>
        </div>
        <div class="pt-2">
            <?= wp_trim_excerpt('', $args['ID']) ?>
        </div>
        <br>
        <a class="h4" href="<?= home_url() ?>/<?= $args['post_name'] ?>" data-post-link="<?= $args['post_name'] ?>"><?= __('View Post', 'blogdynamic') ?></a>
        <hr>
    </div>
</div>