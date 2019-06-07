
	<main class="main h-100 w-100">
		<div class="container h-100">
			<div class="row h-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<img src="<?=base_url();?>assets/img/tsa_logo.png" alt="Andrew Jones" class="img-fluid rounded-circle" width="132" height="132" />
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form id="create_user_form">
										<div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>First Name</label>
                                                <input class="form-control form-control-lg" type="text" id="first_name" name="first_name" placeholder="Enter your first name" required/>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Last Name</label>
                                                <input class="form-control form-control-lg" type="text" id="last_name" name="last_name" placeholder="Enter your last name" required/>
                                            </div>
										</div>
										<div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>ID Number</label>
                                                <input class="form-control form-control-lg" type="text" id="id_number" name="id_number" placeholder="Enter ID Number" required/>
                                            </div>
                                            <div class="form-group col-md-6">
												<label>Phone Number</label>
												<input class="form-control form-control-lg" type="text" id="phone_number" name="phone_number" placeholder="Enter phone number" required/>
                                            </div>
                                        </div>
										<div class="form-group">
											<label>Email</label>
											<input class="form-control form-control-lg" type="email" id="email" name="email" placeholder="Enter your email"/>
										</div>
										<div class="form-row">
                                            <div class="form-group col-md-6">
											<label>User Group</label>
												<select class="form-control form-control-lg" name="group_id" id="group_id" required>
													<option value="">Select user group</option>
													<?php
													if($groups) {
														foreach($groups as $group) {
															echo '<option value="'.$group->group_id.'">'.$group->group_name.'</option>';
														}
													}
													?>
												</select>
                                            </div>
                                            <div class="form-group col-md-6">
												<label>Platform Scale Bluetooth Name</label>
												<input class="form-control form-control-lg" type="text" id="scale_name" name="scale_name" placeholder="Platform Scale Name"/>
                                            </div>
                                        </div>
										<div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Password</label>
                                                <input class="form-control form-control-lg" type="password" id="password" name="password" placeholder="********"/>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Confirm Password</label>
                                                <input class="form-control form-control-lg" type="password" id="confirm_password" name="confirm_password" placeholder="*******"/>
                                            </div>
										</div>
										<div class="col-md-12">
											<div class="ajax-loader" id="add-loader">
												<div class="spinner-grow text-warning mr-2" role="status">
													<span class="sr-only"></span> 
												</div>
												Please wait . . .
											</div>
										</div>
										<div class="text-center mt-3">
											<button type="submit" class="btn btn-lg btn-primary">Sign up</button>
											<a href="<?=site_url('admin/system_users'); ?>" class="btn btn-lg btn-warning">Back to Users</a>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script>
		var submit_url = "<?=site_url('api/register_user');?>";
		$("#create_user_form").submit(function(e) {
			e.preventDefault();
			$("#add-loader").show();

			if($("#password").val() == $("#confirm_password").val()) {
				$.ajax({
					url: submit_url,
					type: 'POST',
					data: $("#create_user_form").serialize(),
					success: function(result) {
						console.log(result);
						$("#add-loader").fadeOut(500, function() {
							$(this).remove();
						});

						if (result["status"] == "Y") {
							toastr["success"]("Operation succeeded", "Success!", {closeButton: true, progressBar: true, timeOut: 3000 });
							setTimeout(function(){// wait for 5 secs(2)
								location.reload(); // then reload the page.(3)
							}, 3000); 
						} else if(result["status"] == "N") {
							toastr["error"]("Please try again.", "Sorry!", {closeButton: true, progressBar: true, timeOut: 5000 });
						} else if(result["status"] == "ND") {
							toastr["warning"]("Missing required data", "Sorry!", {closeButton: true, progressBar: true, timeOut: 5000 });
						}

					}
				});
			} else {
				toastr["warning"]("Passwords do not match.", "Sorry!", {closeButton: true, progressBar: true, timeOut: 5000 });
				$("#add-loader").fadeOut(500, function() {
					$(this).remove();
				});
			}

			

			
		});
	</script>