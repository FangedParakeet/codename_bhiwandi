<?php 
	$data['current_view']='Users';
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>GES Turbine Inspection - Admin</title>

<link rel="stylesheet" href="<?php echo base_url()?>assets/styles/style.css" type="text/css" media="screen"  />
<link rel="stylesheet" type="text/css" href="<?=$this->config->item('base_url');?>styles/admin/form.css" />
<style type='text/css'>
#flex1 {
	font-size: 14px;
}
.ui-widget {
    font-family: Verdana,Arial,sans-serif;
    font-size: 12px;
}
</style>
</head>
<body>
	<div id="main">
		<div id="wrapper">
			<?php include APPPATH . "/views/header.php"?>
			<br>
			<div class="block-border">	
				<div class="mDiv">
					<button class="grey button">Change Password</button>
				</div>
				<form class="block-content form" id="frmPassword" method="post" action="<?php echo base_url()?>auth/change_password">
<?php if(isset($user_id)) { ?>
					<input type="hidden" name="user_id" value="<?php echo $user_id?>">
<?php } ?>
					<?php if($message != "") { ?>
					<div id="infoMessage">
						<ul class="message error no-margin">
							<li><?php echo $message;?></li>
						</ul>
					</div>
					<?php } ?>
					<fieldset class="grey-bg required">
						<table cellpadding="5px" cellspacing="5px">
							<tr>
								<td><label for="old_password">Old Password</label></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td><?php echo form_input($old_password);?></td>
							</tr>			
							<tr>
								<td><label for="simple-required">New Password</label></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td><?php echo form_input($new_password);?></td>
							</tr>
							<tr>
								<td><label for="simple-required">Confirm Password</label></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td><?php echo form_input($new_password_confirm);?></td>
							</tr>
							<tr>
								<td colspan="3">&nbsp;</td>
							</tr>
							<tr>
								<td colspan="3" align="right">
									<button type="reset" class="grey" id="btnReset">Reset Data</button>&nbsp;&nbsp;
									<button type="submit" id="btnChange">Change Password</button>
								</td>
							</tr>
						</table>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</body>
<script>
$(document).ready(function()
	{
/*
		$("#btnReset").click(function(){
			this.form.reset();	
		});
		
		$("#btnChange").click(function() {
			$("#frmPassword").submit();	
		});
*/	
	});
</script>