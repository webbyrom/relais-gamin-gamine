<?php
$fields = array(
	'title' => 'Event Title',
	'color' => 'Event Color',
	'onclick' => 'On Click',
	'media_type' => 'Media Type',
	'custom_class' => 'Custom Class',
	'meta_fields' => 'Custom Fields',
	'description_inline' => 'Short Description',
	'description' => 'Description',	
);

foreach($fields as $field_key => $field_title) {
	$field_key_long = 'event_editable_fields_title';
	$check = 1;
	if(isset($event['timeslot_fields'][$field_key]) && $event['timeslot_fields'][$field_key] == 0) {
		$check = 1;
	}else {
		$check = 0;
	}
	?>
	<div class="sched-a-checkbox-row"><?php echo SCHED_HTML::checkbox('event_editable_fields_'.$field_key, $check); ?><strong><?php echo $field_title; ?></strong></div>
<?php } ?>