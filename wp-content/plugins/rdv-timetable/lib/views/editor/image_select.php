<?php
//$name = 'asdasd';

// $image = array(
// 	'id' => 317,
// 	'type' => 'library', // 'url' or 'library'
// 	'size' => 'full',
// 	'url' => 'http://localhost:8888/wordpress/wp-content/uploads/2015/08/photo-1438109491414-7198515b166b.jpeg',
// );

$type = false;
// If no image, empty image, or empty url
if($image === false || $image == '' || (isset($image['url']) && $image['url'] === '')) {
	$attachment = array();
	$image = array(
		'id' => 0,
		'type' => 'library', // 'url' or 'library'
		'size' => '',
		'url' => '',
	);
	$type = false;
}else {
	$type = $image['type'];
}
$attachment = wp_prepare_attachment_for_js($image['id']);

if($attachment == null) {
	$attachment = array();
}

?><div class="sched-image-select">
	<label>Image Source</label><br />
	<select style="width: 100%;" name="<?php echo esc_attr($name.'_source'); ?>" class="sched-image-select-source">
		<option<?php echo $image['type'] == 'library' ? ' selected="selected"' : ''; ?> value="library">Media Library</option>
		<option<?php echo $image['type'] == 'url' ? ' selected="selected"' : ''; ?> value="url">External Link</option>
	</select><br /><br />

	<div class="sched-image-select-source-library" style="display: <?php echo $image['type'] == 'library' ? 'block' : 'none'; ?>">

		<label>Image</label><br />
		<a href="#" class="sched-image-select-button" <?php if($type === 'library') { echo 'style="display: none;"'; } ?>>Select Image</a>
		<div class="sched-image-select-image" <?php if($type === 'library') { echo 'style="display: inline-block;"'; } ?>>
			<a href="<?php echo esc_attr($image['url']); ?>" title="Open in new tab" target="_blank">
				<div class="sched-image-select-image-full-size"><span><i class="fa fa-external-link-square"></i> Full Size</span></div>
				<img src="<?php echo esc_attr($image['url']); ?>" border="0" />
			</a>
			<a href="#" class="sched-image-select-remove"><i class="fa fa-times"></i></a>
		</div><br /><br />

		<label>Image Size</label><br />
		<select style="width: 100%;" class="sched-image-select-size" name="<?php echo esc_attr($name.'_size'); ?>">
			<?php if(isset($attachment['sized'])) { foreach(array_reverse($attachment['sizes']) as $size_name => $size_detail) { ?>
			<option<?php if($image['size'] === $size_name) { echo ' selected="selected"'; } ?> value="<?php echo esc_attr($size_detail['url']); ?>"><?php echo esc_html($size_name); ?> [<?php echo $size_detail['width'] ?>x<?php echo $size_detail['height'] ?>]</option>
			<?php } } ?>
		</select>
		
		<input type="hidden" name="<?php echo esc_attr($name.'_id'); ?>" class="sched-image-select-id" value="<?php echo esc_attr($image['id']); ?>" />

	</div>
	<div class="sched-image-select-source-url" style="display: <?php echo $image['type'] == 'url' ? 'block' : 'none'; ?>">
		<label>Enter External Link</label><br />
		<div class="sched-textbox">
			<input type="text" name="<?php echo esc_attr($name.'_url'); ?>" class="sched-image-select-url" value="<?php echo esc_attr($image['url']); ?>" />
		</div>
	</div>
	
</div>