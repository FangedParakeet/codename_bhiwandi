<?php
	$this->set_css($this->default_theme_path.'/flexigrid/css/flexigrid.css');
	$this->set_js_lib($this->default_theme_path.'/flexigrid/js/jquery.form.js');
	$this->set_js_config($this->default_theme_path.'/flexigrid/js/flexigrid-edit.js');

	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/jquery.noty.js');
	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/config/jquery.noty.config.js');
	$this->set_js($this->default_theme_path.'/flexigrid/js/jquery.maskedinput-1.3.1-min.js');
?>
<div class="flexigrid crud-form" style='width: 100%;' data-unique-hash="<?php echo $unique_hash; ?>">
	<div class="mDiv">
		<div class="ftitle">
			<div class='ftitle-left'>
				<?php echo $this->l('form_edit'); ?> <?php echo $subject?>
			</div>
			<div class='clear'></div>
		</div>
		<div title="<?php echo $this->l('minimize_maximize');?>" class="ptogtitle">
			<span></span>
		</div>
	</div>
<div id='main-table-box'>
	<?php echo form_open( $update_url,  'class="form-horizontal form-bordered" method="post" id="crudForm" autocomplete="off" enctype="multipart/form-data"'); ?>
	<div class='form-div'>
		<?php
		$counter = 0;
			foreach($fields as $field)
			{
				$even_odd = $counter % 2 == 0 ? 'odd' : 'even';
				$counter++;
		?>
			<div class='form-field-box <?php echo $even_odd?>' id="<?php echo $field->field_name; ?>_field_box">
				<div class='form-display-as-box' id="<?php echo $field->field_name; ?>_display_as_box">
					<?php echo $input_fields[$field->field_name]->display_as?><?php echo ($input_fields[$field->field_name]->required)? "<span class='required'>*</span> " : ""?> :
				</div>
				<div class='form-input-box' id="<?php echo $field->field_name; ?>_input_box">
					<?php echo $input_fields[$field->field_name]->input?>
					<?php if(array_key_exists($field->field_name, $tips)) { ?>
					&nbsp;<span class="tips"><?php echo $tips[$field->field_name]?></span>
					<?php } ?>
				</div>
				<div class='clear'></div>
			</div>
		<?php }?>
		<?php if(!empty($hidden_fields)){?>
		<!-- Start of hidden inputs -->
			<?php
				foreach($hidden_fields as $hidden_field){
					echo $hidden_field->input;
				}
			?>
		<!-- End of hidden inputs -->
		<?php }?>
		<?php if ($is_ajax) { ?><input type="hidden" name="is_ajax" value="true" /><?php }?>
		<div id='report-error' class='report-div error'></div>
		<div id='report-success' class='report-div success'></div>
	</div>
	<div class="form-actions" style="margin-left:20px; margin-top:-20px">
		<div class='form-button-box'>
			<input class='btn btn-primary' id="form-button-save" type='submit' value='<?php echo $this->l('form_update_changes'); ?>' class="btn btn-large"/>
		</div>
<?php 	if(!$this->unset_back_to_list) { ?>
		<div class='form-button-box'>
			<input class='btn btn-darkblue' type='button' value='<?php echo $this->l('form_update_and_go_back'); ?>' id="save-and-go-back-button" class="btn btn-large"/>
		</div>
		<div class='form-button-box'>
			<input class='btn btn-danger' type='button' value='<?php echo $this->l('form_cancel'); ?>' class="btn btn-large" id="cancel-button" />
		</div>
<?php 	} 
	if(isset($buttons) && is_array($buttons) && count($buttons) > 0) {
		$n=1;
		foreach ($buttons as $formName => $frmConfig) {
			if(array_key_exists('class', $frmConfig)) {
				$class = $frmConfig['class'];
			} else {
				$class = 'btn btn-large';
			}
	?>
			<div class='form-button-box'>
				<input class='<?php echo $class?>' type='button' onclick="<?php echo 'javascript:' . $frmConfig['js_call'] . '()'?>"
				value='<?php echo $formName; ?>' id="user-button_<?php echo $n?>" />
			</div>		
<?php }
} ?>
		<div class='form-button-box'>
			<div class='small-loading' id='FormLoading'><?php echo $this->l('form_update_loading'); ?></div>
		</div>
		<div class='clear'></div>
	</div>
	<?php echo form_close(); ?>
</div>
</div>
<script>
	var validation_url = '<?php echo $validation_url?>';
	var list_url = '<?php echo $list_url?>';

	var message_alert_edit_form = "<?php echo $this->l('alert_edit_form')?>";
	var message_update_error = "<?php echo $this->l('update_error')?>";

	$(document).ready(function() {
		<?php 
		if(isset($masks) && is_array($masks) && count($masks) >0) {
				foreach ($masks as $_field=>$_mask) {
		?>
		$("#field-<?php echo $_field?>").mask("<?php echo $_mask?>");
		<?php 	} 
			}
		?>
	});	
</script>