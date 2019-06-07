<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">User Profile</h1>

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Personal Details</h5>
					</div>
					<div class="card-body h-100">

						<form id="edit-modal-form">
							<input type="hidden" class="form-control" id="edit-key_id" value="<?=$this->uri->segment(4);?>">
							<div class="form-row">
								<div class="form-group col-md-4">
									<label for="field-first_name">Family Name</label>
									<input type="text" class="form-control" id="field-family_name" name="family_name" value="" placeholder="Family Name">
								</div>
								<div class="form-group col-md-4">
									<label for="field-last_name">First name</label>
									<input type="text" class="form-control" id="field-first_name" name="first_name" value="" placeholder="First name">
								</div>
								<div class="form-group col-md-4">
									<label for="field-last_name">Last name</label>
									<input type="text" class="form-control" id="field-last_name" name="last_name" value="" placeholder="Last name">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-4">
									<label for="field-id_number">Nationality</label>
									<select class="form-control" name="nationality_id" id="field-nationality_id" required>
										<option value="">--- Select Nationality ---</option>
									</select>
								</div>
								<div class="form-group col-md-4">
									<label for="field-id_number">D.O.B</label>
									<input type="date" class="form-control" id="field-date_of_birth" name="date_of_birth" value="" placeholder="Date of Birth">
								</div>
								<div class="form-group col-md-4">
									<label for="field-id_number">ID Number/Passport No.</label>
									<input type="text" class="form-control" id="field-id_number" name="id_number" value="" placeholder="ID Number">
								</div>
							</div>
							
							<div class="form-row">
								<div class="form-group col-md-4">
									<label for="field-id_number">Primary Phone</label>
									<input type="text" class="form-control" id="field-primary_phone" name="primary_phone" value="" placeholder="Primary Phone No.">
								</div>
								<div class="form-group col-md-4">
									<label for="field-phone_number">Secondary Phone</label>
									<input type="text" class="form-control" id="field-secondary_phone" name="secondary_phone" value="" placeholder="Secondary Phone No.">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-4">
									<label for="field-id_number">Primary Email</label>
									<input type="email" class="form-control" id="field-primary_email" name="primary_email" value="" placeholder="Primary Email">
								</div>
								<div class="form-group col-md-4">
									<label for="field-phone_number">Secondary Email</label>
									<input type="email" class="form-control" id="field-secondary_email" name="secondary_email" value="" placeholder="Secondary Email">
								</div>
								<div class="form-group col-md-4">
									<label for="field-email">Work Email</label>
									<input type="email" class="form-control" id="field-email" name="work_email" value="" placeholder="Work Email Address">
								</div>
							</div>

							<fieldset>
								<legend class="pt-3 pb-4">Job Details</legend>
								<div class="form-row">
									<div class="form-group col-md-4">
										<label for="field-id_number">Job Title</label>
										<input type="email" class="form-control" id="field-primary_email" name="primary_email" value="" placeholder="Primary Email">
									</div>
									<div class="form-group col-md-4">
										<label for="field-group_id">Department</label>
										<select class="form-control" name="group_id" id="field-group_id" required>
											<option value="">---Select Department---</option>
										</select>
									</div>
									<div class="form-group col-md-4">
										<label for="field-email">Job Group</label>
										<select class="form-control" name="group_id" id="field-group_id" required>
											<option value="">---Select Job Group---</option>
										</select>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-4">
										<label for="field-id_number">Employment Date</label>
										<input type="date" class="form-control" id="field-date_of_employment" name="date_of_employment" value="" placeholder="Date Employed">
									</div>
									<div class="form-group col-md-4">
										<label for="field-group_id">Service Type</label>
										<select class="form-control" name="service_type_id" id="field-service_type_id" required>
											<option value="">---Select Department---</option>
											<option value="">Permanent & Pensionable</option>
											<option value="">Contract</option>
										</select>
									</div>
								</div>
							</fieldset>

							<fieldset>
								<legend class="pt-3 pb-4">Dependats and Contacts</legend>
								<div class="tab">
									<ul class="nav nav-tabs" role="tablist">
										<li class="nav-item"><a class="nav-link active" href="#dependants" data-toggle="tab" role="tab">Dependants</a></li>
										<li class="nav-item"><a class="nav-link" href="#beneficiaries" data-toggle="tab" role="tab">Beneficiaries</a></li>
										<li class="nav-item"><a class="nav-link" href="#next_of_kin" data-toggle="tab" role="tab">Next of Kin</a></li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane active" id="dependants" role="tabpanel">
											<h4 class="tab-title">Dependants</h4>
											<table class="table table-striped">
												<thead>
													<tr>
														<th>Full Name</th>
														<th>Relationship</th>
														<th>Phone No.</th>
														<th>Email</th>
														<th>Actions</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><input class="form-control" type="text" id="dependant-fullname" name="dependant_fullname"></td>
														<td>
															<select class="form-control" name="dependant_rship" id="dependant_rship">
																<option value="">Select</option>
															</select>
														</td>
														<td><input class="form-control" type="text" id="dependant-phone" name="dependant_phone"></td>
														<td><input class="form-control" type="email" id="dependant-email" name="dependant_email"></td>
														<td class="table-action">
															<a href="#"><i class="align-middle" data-feather="plus"></i></a>
														</td>
													</tr>
													<tr>
														<td>Felix Ogucha</td>
														<td>Son</td>
														<td>0723293349</td>
														<td>fenicfelix@gmail.com</td>
														<td>
														<a href="#"><i class="align-middle" data-feather="edit-2"></i></a>
														<a href="#" data-toggle="modal" data-target="#editModal"><i class="align-middle" data-feather="trash"></i></a>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
										<div class="tab-pane" id="beneficiaries" role="tabpanel">
											<h4 class="tab-title">Beneficiaries</h4>
											<table class="table table-striped">
												<thead>
													<tr>
														<th>Full Name</th>
														<th>Relationship</th>
														<th>Phone No.</th>
														<th>Email</th>
														<th>Actions</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><input class="form-control" type="text" id="dependant-fullname" name="dependant_fullname"></td>
														<td>
															<select class="form-control" name="dependant_rship" id="dependant_rship">
																<option value="">Select</option>
															</select>
														</td>
														<td><input class="form-control" type="text" id="dependant-phone" name="dependant_phone"></td>
														<td><input class="form-control" type="email" id="dependant-email" name="dependant_email"></td>
														<td class="table-action">
															<a href="#"><i class="align-middle" data-feather="plus"></i></a>
														</td>
													</tr>
													<tr>
														<td>Felix Ogucha</td>
														<td>Son</td>
														<td>0723293349</td>
														<td>fenicfelix@gmail.com</td>
														<td>
														<a href="#"><i class="align-middle" data-feather="edit-2"></i></a>
														<a href="#" data-toggle="modal" data-target="#editModal"><i class="align-middle" data-feather="trash"></i></a>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
										<div class="tab-pane" id="next_of_kin" role="tabpanel">
											<h4 class="tab-title">Next of Kin</h4>
											<table class="table table-striped">
												<thead>
													<tr>
														<th>Full Name</th>
														<th>Relationship</th>
														<th>Phone No.</th>
														<th>Email</th>
														<th>Actions</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><input class="form-control" type="text" id="dependant-fullname" name="dependant_fullname"></td>
														<td>
															<select class="form-control" name="dependant_rship" id="dependant_rship">
																<option value="">Select</option>
															</select>
														</td>
														<td><input class="form-control" type="text" id="dependant-phone" name="dependant_phone"></td>
														<td><input class="form-control" type="email" id="dependant-email" name="dependant_email"></td>
														<td class="table-action">
															<a href="#"><i class="align-middle" data-feather="plus"></i></a>
														</td>
													</tr>
													<tr>
														<td>Felix Ogucha</td>
														<td>Son</td>
														<td>0723293349</td>
														<td>fenicfelix@gmail.com</td>
														<td>
														<a href="#"><i class="align-middle" data-feather="edit-2"></i></a>
														<a href="#" data-toggle="modal" data-target="#editModal"><i class="align-middle" data-feather="trash"></i></a>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</fieldset>

							

							<fieldset>
								<legend class="pt-3 pb-4">Preferred Account Details</legend>
								<div class="form-row">
									<div class="form-group col-md-4">
										<label for="field-id_number">Bank Name</label>
										<select class="form-control" name="bank_id" id="field-bank_id" required>
											<option value="">---Select Bank---</option>
										</select>
									</div>
									<div class="form-group col-md-4">
										<label for="field-group_id">Account Number</label>
										<input type="text" class="form-control" id="field-bank_account" name="bank_account" value="" placeholder="Account Number">
									</div>
									<div class="form-group col-md-4">
										<label for="field-email">Account Name</label>
										<input type="text" class="form-control" id="field-bank_account_name" name="bank_account_name" value="" placeholder="Account Name">
									</div>
								</div>
							</fieldset>

							<fieldset>
								<legend class="pt-3 pb-4">Government Obligations</legend>
								<div class="form-row">
									<div class="form-group col-md-4">
										<label for="field-email">KRA PIN</label>
										<input type="text" class="form-control" id="field-kra_pin_number" name="bank_account_name" value="" placeholder="KRA PIN Number">
									</div>
									<div class="form-group col-md-4">
										<label for="field-id_number">NSSF Number</label>
										<input type="text" class="form-control" id="field-nssf_number" name="nssf_number" value="" placeholder="NSSF Number">
									</div>
									<div class="form-group col-md-4">
										<label for="field-group_id">NHIF Number</label>
										<input type="text" class="form-control" id="field-nhif_number" name="nhif_number" value="" placeholder="NHIF Number">
									</div>
								</div>
							</fieldset>

							<div class="col-md-12">
								<div class="ajax-loader" id="edit-loader">
									<div class="spinner-border spinner-border-sm text-warning mr-2" role="status">
										<span class="sr-only"></span> 
									</div>
									Please wait . . .
								</div>
							</div>
							</br>
							<button type="submit" class="btn btn-primary">Save changes</button>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>
</main>

<script>
    var home_url = "<?=site_url('admin/system_users')?>";
	var submit_edit_url = "<?=site_url('api/dboperation/edit/users/identifier/');?>";
	var submit_reset_url = "<?=site_url('api/reset_password');?>";
</script>