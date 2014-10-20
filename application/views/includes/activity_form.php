<!-- Activity List -->
<div class="box box-primary">
								<div class="box-header">
    <h3 class="box-title">Add Activity</h3>
  </div>														
								<div class="" id="">
										<form action="<?php echo base_url(); ?>index.php/activities/add" method="post">
												<div class="body bg-gray">
													<div class="col-xs-6 form-group">
                <label>Start Time</label>
			</div>
													<div class="col-xs-6 form-group">
                <label>End Time</label>
			</div>
			<div class="col-xs-3 form-group">
                <select class="form-control" name="start_hours">
					<option value="none">Hour</option>
                    <option value="00">00</option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                </select>																						
			</div>
			<div class="col-xs-3 form-group">
                <select class="form-control" name="start_mins">
					<option value="none">Mins</option>
                    <option value="00">00</option>
                    <option value="05">05</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                    <option value="30">30</option>
                    <option value="35">35</option>
                    <option value="40">40</option>
                    <option value="45">45</option>
                    <option value="50">50</option>
                    <option value="55">55</option>
                </select>																						
			</div>
			<div class="col-xs-3 form-group">
                <select class="form-control" name="end_hours">
					<option value="none">Hour</option>
                    <option value="00">00</option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                </select>																						
			</div>
			<div class="col-xs-3 form-group">
                <select class="form-control" name="end_mins">
					<option value="none">Mins</option>
                    <option value="00">00</option>
                    <option value="05">05</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                    <option value="30">30</option>
                    <option value="35">35</option>
                    <option value="40">40</option>
                    <option value="45">45</option>
                    <option value="50">50</option>
                    <option value="55">55</option>
                </select>																						
				
			</div>
												
													<div class="col-xs-4 form-group">
														<label>For Client</label>
														<select class="form-control" name="client">
																<option value="0">Select client</option>
																<?php
																foreach($clients as $client){
																	?>
																	<option value="<?php echo $client['id']; ?>"><?php echo ucfirst($client['name']); ?></option>
																	<?php
																}
																
																?>
														</select>	
            </div>
													<div class="col-xs-4 form-group">
              <label>Activity Done</label>
                <input type="text" class="form-control" placeholder="Activity" name="activity">
            </div>		
													<div class="col-xs-4 form-group">
															<label>Remarks</label>																																								
                <input type="text" class="form-control" placeholder="Remarks" name="remarks">
            </div>																					
												</div>
												<div class="footer">  
														<button type="submit" class="btn bg-olive btn-block">Add to my Timesheet</button>
												</div>
										</form>
								</div>
							</div><!-- /.box -->
