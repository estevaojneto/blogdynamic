<?php
$bg_img_src = get_the_post_thumbnail_url($args['ID'], 'large');
$background_style = $bg_img_src ? 
    "style='background:url($bg_img_src)'" : '';
$excerpt = apply_filters('the_excerpt', $args["post_excerpt"]);
if(empty($excerpt)){
    $excerpt = wp_trim_excerpt("", $args["ID"]);
}
?>
<div class="col-md-4 mb-3 mt-3 post-card-container post-card-post">
	<div class="outline post-card-outline card-background p-0 m-0" <?= $background_style ?>>
		<a class="h-100 p-3 w-100 d-flex align-items-center <?= $bg_img_src ? 'text-with-bg-text' : '' ?>"  href="/<?= $args["post_name"] ?>">
			<div class="w-100">
				<h2 class="h3"><?= $args["post_title"] ?></h2>
				<div>
					<?= $excerpt ?>
				</div>
				<small><em><?= wp_date(get_option("date_format"), strtotime($args["post_date"])) ?></em></small>
			</div>
		</a>
	</div>
</div>