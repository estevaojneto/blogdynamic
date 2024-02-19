<?php
/**
 * Template Name: Main BlogDynamic page
 */
global $post;
$background_custom_image = get_option('custom_person_image', false);
$background_custom_image_style = '';
if($background_custom_image)
{
  $background_custom_image_style = "style='background-image:url($background_custom_image)'";
}
?>
<!doctype html>
<html lang="en">
	<?= get_header() ?>
	<body>
		<div class="container" style="min-height: 100vh">
			<div class="row card-row" style="display: flex;flex-direction: row;align-items: stretch;">
				<div class="col-md-6 mb-4 mt-3 post-card-container">
					<div class="outline post-card-outline site-card p-0 m-0">
						<div class="d-flex align-items-center h-50 w-50 justify-content-center" style="border: 2px solid">
							<h1 class="h1 blogtitle"><?= get_bloginfo("name") ?></h1>
						</div>
					</div>
				</div>
        <?php if (!empty($background_custom_image_style)){  ?>
				<div class="col-md-2 mb-3 mt-3 post-card-container">
					<div class="outline post-card-outline p-0 m-0">
						<div class="d-flex align-items-center h-100 justify-content-center">
              <div class="card-background w-100 h-100" <?= $background_custom_image_style ?>></div>
						</div>
					</div>
				</div>
        <?php } ?>
				<?= Theme\PostLoader::loadPostByObject($post) ?>
			</div>
		</div>
		<?= get_footer() ?>
	</body>

</html>