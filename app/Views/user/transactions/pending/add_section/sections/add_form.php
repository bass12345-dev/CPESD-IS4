<div class="col-lg-6 col-md-6">
	<div class="form-wizard">
		<form id="transactions_form">
			<fieldset class="wizard-fieldset show">
				<h5>Information</h5>
				<div class="form-group">
					<label>PMAS NO</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<input type="text" name="year" class="form-control" value="<?php echo date('Y', time()) ?>" readonly> </div>
						<div class="input-group-prepend">
							<input type="text" name="month" class="form-control" value="<?php echo date('m', time()) ?>" readonly> </div>
						<input type="number" class="form-control  wizard-required input " value="" name="pmas_number" readonly> </div>
					<div class="wizard-form-error"></div>
				</div>
				<div class="form-group clearfix">
					<button type="button" class="form-wizard-next-btn float-right" id="first-next">Next</button>
				</div>
			</fieldset>
			<fieldset class="wizard-fieldset">
				<h5>Information</h5>
				<div class="form-group">
					<div class="col-12">Responsible Section</div>
					<div class="form-group">
						<select class="custom-select input wizard-required" name="type_of_monitoring_id"> 
						<?php 

								foreach ($responsible as $row) : ?>

								<option value="<?php echo $row->responsible_section_id  ?>"><?php echo $row->responsible_section_name ?></option>

								<?php endforeach;?>
                        </select>
					</div>
					<div class="wizard-form-error"></div>
				</div>
				<div class="form-group">
					<div class="col-12">Type of Activity</div>
					<div class="form-group">
						<select class="custom-select input wizard-required" id="myselect" name="type_of_activity_id"> 
						<?php 

								foreach ($activities as $row) :
									

								?>

								<option value="<?php echo $row->type_of_activity_id  ?>"><?php echo $row->type_of_activity_name ?></option>

								<?php 

								endforeach;
								?>
                        </select>
					</div>
					<div class="wizard-form-error"></div>
				</div>
				<div class="form-group" id="under_type_activity_select" hidden>
					<div class="col-12">Type </div>
					<div class="form-group">
						<select class="custom-select input wizard-required" name="under_type_of_activity_id"> 

                        </select>
					</div>
					<div class="wizard-form-error"></div>
				</div>
				<div class="form-group">
					<div class="col-12">Responsibility Center</div>
					<div class="form-group">
						<select class="custom-select input responsibility wizard-required" name="responsibility_center_id" style="width: 100%;">
						<?php 

							foreach ($responsibility_centers as $row) :
							?>
							<option value="<?php echo $row->responsibility_center_id ?>"><?php echo $row->responsibility_center_code ?> - <?php echo $row->responsibility_center_name ?></option>
							<?php 

							endforeach;
							?>       
                        </select>
					</div>
					<div class="wizard-form-error"></div>
				</div>
				<div class="form-group">
					<div class="col-12">Name of CSO</div>
					<div class="form-group">
						<select class="custom-select input cso wizard-required" name="cso_id" style="width: 100%;"> </select>
					</div>
					<div class="wizard-form-error"></div>
				</div>
				<div class="form-group">
					<div class="col-12">Date And Time</div>
					<div class="input-group date" id="id_1">
						<input type="text" value="05/16/2018 12:31:00 AM" class="form-control input" name="date_time" onkeypress="return false;" />
						<div class="input-group-addon input-group-append">
							<div class="input-group-text"> <i class="glyphicon glyphicon-calendar fa fa-calendar"></i> </div>
						</div>
					</div>
					<div class="wizard-form-error"></div>
				</div>
				    <?php echo view('user/transactions/pending/add_section/sections/for_training'); ?>
					<?php echo view('user/transactions/pending/add_section/sections/for_project_monitoring'); ?>
						<div class="form-group clearfix">
							<button type="submit" class="form-wizard-submit float-right btn-add-transaction"> Submit</button> <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a> 
                        </div>
        </fieldset>
		</form>
		</div>
	</div>