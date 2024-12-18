<?php
global $post;
$bg_img_src = get_the_post_thumbnail_url($post->ID, 'large');
$next_post_link = get_next_post_link();
$prev_post_link = get_previous_post_link();
$background_style = $bg_img_src ? 
    "style='background:url($bg_img_src)';" : '';
?>
<!doctype html>
<html lang="en"> <?= get_header() ?><body>
    <div class="container" style="min-height: 100vh">
      <div class="row">
        <div class="col-lg-12">
          <div class="m-3"> <?php if($bg_img_src){?><div <?= $background_style ?> class="p-3 single-hero-background"></div> <?php }?></div>
        </div>
        <div class="col-lg-4">
          <div class="single-menu-side-fixed m-3">
            <h1> <?= $post->post_title ?></h1>
            <p class="h5"><em> <?= get_the_date(); ?></em></p>
            <div class="row">
              <div class="col-6 text-left"> <?php if(!empty($prev_post_link)) {?><p class="m-0 p-0"><small>Previous post</small></p><span class="h5"> <?= $prev_post_link ?></span> <?php } ?></div>
              <div class="col-6 text-right" style="text-align:right!important"> <?php if(!empty($next_post_link)) {?><p class="m-0 p-0"><small>Next post</small></p><span class="h5"> <?= $next_post_link ?></span> <?php } ?></div>
            </div>
            <div class="row">
              <div class="col-md-12 post-card-container">
                <div class="outline single-site-card site-card">
                  <div class="d-flex align-items-center h-50 w-75 justify-content-center" style="border: 2px solid">
                    <h1 class="h1 blogtitle"><a class="blog-link-card" href="
<?= home_url() ?>"> <?= get_bloginfo("name") ?></a></h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="m-3">
            <div class="outline">
              <div class="p-3 single-post-contents"> <?= apply_filters('the_content', $post->post_content) ?></div>
            </div>
          </div>
        </div>
      </div>
    </div> <?= get_footer() ?>
  </body>
</html>
