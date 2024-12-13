<?php
global $post;
$bg_img_src = get_the_post_thumbnail_url($post->ID, 'large');
$background_style = $bg_img_src ? 
    "style='background:url($bg_img_src)';" : '';
?>
<!doctype html>
<html lang="en">
	<?= get_header() ?>
	<body>
		<div class="container" style="min-height: 100vh">
            <div class="row">
                <div class="col-lg-12">
                    <div class="m-3">
                        <?php if($bg_img_src){?>
                        <div <?= $background_style ?> class="p-3 single-hero-background"></div>
                        <?php }?>
                    </div>
				</div>
                <div class="col-lg-4">
                    <div class="m-3">
                        <div class="single-menu-side-fixed">
                                <h1><?= $post->post_title ?></h1>
                                <p class="h5"><em><?= get_the_date(); ?></em></p>
                                <div class="row">
                                    <div class="col-6 text-left">
                                        <p class="m-0 p-0"><small>Previous post</small></p>
                                        <span class="h5">
                                            <?= get_previous_post_link() ?>
                                        </span>
                                    </div>
                                    <div class="col-6 text-right" style="text-align:right!important">
                                        <p class="m-0 p-0"><small>Next post</small></p>
                                        <span class="h5">
                                            <?= get_next_post_link() ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 post-card-container">
                                        <div class="outline single-site-card site-card">
                                            <div class="d-flex align-items-center h-50 w-75 justify-content-center" style="border: 2px solid">
                                                <h1 class="h1 blogtitle"><a class="blog-link-card" href="<?= home_url() ?>"><?= get_bloginfo("name") ?></a></h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="m-3">
                        <div class="outline">
                            <div class="p-3 single-post-contents">
                                <?= apply_filters('the_content', $post->post_content) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <?php /* get_template_part('comments');
                $comments = get_comments(array(
                    'post_id' => $post->ID,
                    'status' => 'approve' //Change this to the type of comments to be displayed
                ));
        
                //Display the list of comments
                wp_list_comments(array(
                    'per_page' => 10, //Allow comment pagination
                    'reverse_top_level' => false //Show the oldest comments at the top of the list
                ), $comments);*/
                ?>
        </div>
		<?= get_footer() ?>
	</body>

</html>
