<!-- Activity List -->
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Today's activities</h3>
	</div>														
	<div class="" id="">
		<div class="body bg-gray">
			<div class="col-xs-2 form-group">
				<label>Start Time</label>
			</div>
			<div class="col-xs-2 form-group">
				<label>End Time</label>
			</div>
			<div class="col-xs-3 form-group">
				<label>Client</label>
			</div>
			<div class="col-xs-3 form-group">
				<label>Activity</label>
			</div>
			<div class="col-xs-2 form-group">
				<label>Remarks</label>
			</div>	
		</div>
		<div class="body bg-gray">
		<?php foreach($activities as $key => $activity){ ?>
			<div class="col-lg-2 form-group">
				<?php echo $activity['start']; ?>
			</div>
			<div class="col-lg-2 form-group">
				<?php echo $activity['end']; ?>
			</div>
			<div class="col-lg-2 form-group">
				<?php echo $activity['client']; ?>
			</div>
			<div class="col-lg-2 form-group">
				<?php echo $activity['description']; ?>
			</div>
			<div class="col-lg-2 form-group">
				<?php echo $activity['remarks']; ?>
			</div>	
			<div class="col-lg-2">
				<?php echo $activity['duration']; ?> hours
			</div>
			<div class="progress col-sm-2" style="padding:0">
				<div class="progress-bar progress-bar-green" style="width: <?php echo (intval($activity['duration']) / 8) * 100; ?>%;"></div>
			</div>
			<?php } ?>
		</div>
		<div class="footer">  
			&nbsp;
		</div>
	</form>
</div>
</div><!-- /.box -->
