<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">User Profile</h1>

		<div class="row">
			<div class="col-md-4">
				<div class="card mb-3">
					<div class="card-header">
						<h5 class="card-title mb-0">Profile Details</h5>
					</div>
					<div class="card-body text-center">
						<img src="<?=base_url();?>assets/img/blank_profile.png" alt="Marie Salter" class="img-fluid rounded-circle mb-2" width="128" height="128" />
						<h4 class="card-title mb-0">Felix Ogucha Nyabwari</h4>
						<div class="text-muted mb-2">Senior Software Engineer</div>
						<div class="text-muted mb-2">Payroll No. <b>4001</b></div>
					</div>
					<hr class="my-0" />
					<div class="card-body">
						<h5 class="h6 card-title">About</h5>
						<ul class="list-unstyled mb-0">
							<li class="mb-1"><span data-feather="phone" class="feather-sm mr-1"></span> 0723293349</li>
							<li class="mb-1"><span data-feather="message-square" class="feather-sm mr-1"></span> felix.nyabwari@mediamax.co.ke</li>
						</ul>
					</div>
					<hr class="my-0" />
					<?php
					if($this->session->userdata('group_id') == "2") {
						?>
						<div class="card-body">
							<center><button class="btn btn-primary" id="btn-reset-password">Reset Password</button></center>
						</div>
						<hr class="my-0" />
						<?php
					}
					?>
				</div>
			</div>

			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Personal Details</h5>
					</div>
					<div class="card-body h-100">

						<form id="edit-modal-form">
							<input type="hidden" class="form-control" id="edit-key_id" value="<?=$this->uri->segment(4);?>">
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="field-first_name">First name</label>
									<input type="text" class="form-control" id="field-first_name" name="first_name" value="" placeholder="First name">
								</div>
								<div class="form-group col-md-6">
									<label for="field-last_name">Last name</label>
									<input type="text" class="form-control" id="field-last_name" name="last_name" value="" placeholder="Last name">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="field-id_number">ID Number</label>
									<input type="text" class="form-control" id="field-id_number" name="id_number" value="" placeholder="ID Number">
								</div>
								<div class="form-group col-md-6">
									<label for="field-id_number">D.O.B</label>
									<input type="date" class="form-control" id="field-date_of_birth" name="date_of_birth" value="" placeholder="Date of Birth">
								</div>
							</div>
							
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="field-id_number">Primary Phone</label>
									<input type="text" class="form-control" id="field-primary_phone" name="primary_phone" value="" placeholder="Primary Phone No.">
								</div>
								<div class="form-group col-md-6">
									<label for="field-phone_number">Secondary Phone</label>
									<input type="text" class="form-control" id="field-secondary_phone" name="secondary_phone" value="" placeholder="Secondary Phone No.">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="field-id_number">Primary Email</label>
									<input type="email" class="form-control" id="field-primary_email" name="primary_email" value="" placeholder="Primary Email">
								</div>
								<div class="form-group col-md-6">
									<label for="field-phone_number">Secondary Email</label>
									<input type="email" class="form-control" id="field-secondary_email" name="secondary_email" value="" placeholder="Secondary Email">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="field-email">Work Email</label>
									<input type="email" class="form-control" id="field-email" name="work_email" value="" placeholder="Work Email Address">
								</div>
							</div>
							<div class="form-group">
								<label for="field-group_id">Department</label>
								<select class="form-control" name="group_id" id="field-group_id" required>
									<option value="">---Select Department---</option>
								</select>
							</div>

							<?php
							if($this->session->userdata("group_id") == 1) {
								?>
								<div class="form-group">
								<label for="field-status_id">Status</label>
								<select class="form-control" name="status_id" id="field-status_id" required>
									<option value="" selected disabled>---Select Status---</option>
									<option value="0" <?=($item->active == "0") ? "selected": "";?>>Inactive</option>
									<option value="1" <?=($item->active == "1") ? "selected": "";?>>Active</option>
								</select>
							</div>
								<?php
							}
							?>
							
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
	
	$("#btn-reset-password").click(function() {
		if(confirm("Are you sure you want to reset the user's password?")) {
			var form_data = {
				identifier: "<?=$item->identifier;?>"
			};
			$.ajax({
                url: submit_reset_url,
                type: 'POST',
                data: form_data,
                success: function(result) {
                    if(result["status"] == "00") {
                        toastr["success"]("Your password has been changed.", "Success!", {closeButton: true, progressBar: true, timeOut: 2000 });
						location.reload();
                    } else if(result["status"] == "95"){
                        toastr["error"]("Invalid Password", "Sorry!", {closeButton: true, progressBar: true, timeOut: 5000 });
                    } else if(result["status"] == "98"){
                        toastr["error"]("Your session has expired.", "Sorry!", {closeButton: true, progressBar: true, timeOut: 5000 });
                        location.reload();
                    } else {
                        toastr["error"]("Please try again.", "Sorry!", {closeButton: true, progressBar: true, timeOut: 5000 });
                    }
    
                }
            });
		}
	});	
</script>