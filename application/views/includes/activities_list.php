<!-- Activity List -->
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Today's activities</h3>
	</div>														
	<div class="" id="">
		<div class="body bg-gray">
			<div class="col-lg-2 col-xs-2 form-group">
				<label>Start Time</label>
			</div>
			<div class="col-lg-2 col-xs-2 form-group">
				<label>End Time</label>
			</div>
			<div class="col-lg-2 col-xs-3 form-group">
				<label>Client</label>
			</div>
			<div class="col-lg-2 col-xs-3 form-group">
				<label>Activity</label>
			</div>
			<div class="col-lg-2 col-xs-2 form-group">
				<label>Remarks</label>
			</div>	
			<div class="col-lg-2 form-group hidden-xs">
				<label>Duration</label>
			</div>	
		</div>
		<div class="body bg-gray">
		<?php foreach($activities as $key => $activity){ ?>
			<div class="col-lg-2 col-xs-2 form-group">
				<p><?php echo $activity['start']; ?></p>
			</div>
			<div class="col-lg-2 col-xs-2 form-group">
				<p><?php echo $activity['end']; ?></p>
			</div>
			<div class="col-lg-2 col-xs-3 form-group">
				<p><?php echo $activity['client']; ?></p>
			</div>
			<div class="col-lg-2 col-xs-3 form-group">
				<p><?php echo $activity['description']; ?></p>
			</div>
			<div class="col-lg-2 col-xs-2 form-group">
				<p><?php echo $activity['remarks']; ?></p>
			</div>	
			<div class="col-lg-2 col-xs-2">
				<p><?php echo $activity['duration']; ?> hours</p>
			</div>
			<div class="progress col-lg-2 col-xs-10" style="padding:0">
				<div class="progress-bar progress-bar-green" style="width: <?php echo (floatval($activity['duration']) / 8) * 100; ?>%;"></div>
			</div>
			<?php } ?>
		</div>
		<div class="footer">  
			<a href="#" id="submit_report"><button class="btn bg-olive btn-block">Submit Report</button>
		</div>
	</form>
</div>
</div><!-- /.box -->
<script>
	
	$('#submit_report').click(function(){
		if(confirm('Are you sure? You can only do this once.')){
			console.log('you is a gaylord');
		};
	});

</script>
