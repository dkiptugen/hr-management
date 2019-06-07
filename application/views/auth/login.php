<main class="main h-100 w-100">
	<div class="container h-100">
		<div class="row h-100">
			<div class="col-sm-10 col-md-8 col-lg-5 mx-auto d-table h-100">
				<div class="d-table-cell align-middle">
				
					<div id="login-area" class="login-forms">
						<div class="text-center mt-4">
						<h1 class="h2">Welcome</h1>
						<p class="lead">
							Sign in to your account to continue
						</p>
					</div>

					<div class="card">
						<div class="card-body">
							<div class="m-sm-4 mt-0">
								<div class="text-center mb-30">
									<img src="<?=base_url();?>assets/img/tsa_logo.png" alt="TSA User" class="img-fluid" width="132" height="132" />
								</div>
								<form id="login-form">
									<div class="form-group">
										<label>Email</label>
										<input class="form-control form-control-lg" type="text" id="login-username" name="username" placeholder="Enter your email" required/>
									</div>
									<div class="form-group">
										<label>Password</label>
										<input class="form-control form-control-lg" type="password" id="password" name="password" placeholder="Enter your password" required />
										<small>
											<a href="pages-reset-password.html">Forgot password?</a>
										</small>
									</div>
									<div class="col-md-12">
										<div class="ajax-loader" id="login-loader">
											<div class="spinner-grow text-warning mr-2" role="status">
												<span class="sr-only"></span> 
											</div>
											Please wait . . .
										</div>
									</div>
									<div class="text-center mt-3">
										<button type="submit" class="btn btn-lg btn-primary">Sign in</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					</div>

					<div id="otp-area" class="login-forms">
						<div class="text-center mt-4">
							<h1 class="h2">Verify it's you</h1>
							<p class="lead">
								Enter OTP from your Google Authenticator App
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form id="otp-form">
										<input class="form-control form-control-lg" type="hidden" id="username" name="username">
										<input class="form-control form-control-lg" type="hidden" id="otp_secret_key" name="otp_secret_key">
										<div class="form-group">
											<input class="form-control form-control-lg" type="text" id="otp_passcode" name="otp_passcode" data-mask="000 000" maxlength="7" placeholder="6 digit code" required>
										</div>
										<div class="col-md-12">
											<div class="ajax-loader" id="otp-loader">
												<div class="spinner-grow text-warning mr-2" role="status">
													<span class="sr-only"></span> 
												</div>
												Please wait . . .
											</div>
										</div>
										<div class="text-center mt-3">
											<button type="submit" class="btn btn-lg btn-primary">Submit OTP</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</main>
    
<script>
	$(document).ready(function() {
		setCookie("token", "");
		var login_url = "<?=site_url('api/login');?>";
		var otp_submit_url = "<?=site_url('api/verify_account');?>";
		var admin_url = "<?=site_url('admin/dashboard');?>";
		$("#login-form").submit(function(e) {
			$("#login-loader").show();
			e.preventDefault();

			$.ajax({
				url: login_url,
				type: 'POST',
				data: $("#login-form").serialize(),
				success: function(result) {
					console.log(result);
					$("#login-loader").fadeOut(500, function() {
						$(this).remove();
					});

					if(result["status"] == "00") {
						$("#otp_secret_key").val(result["secret"]);
						$("#username").val($("#login-username").val());
						$(".login-forms").toggle();
					} else if(result["status"] == "01") {
						toastr["error"]("Invalid login details.", "Sorry!", {closeButton: true, progressBar: true, timeOut: 5000 });
					} else if(result["status"] == "99") {
						toastr["warning"]("Missing required data", "Sorry!", {closeButton: true, progressBar: true, timeOut: 5000 });
					}

				}
			});
			
		});

		$("#otp-form").submit(function(e) {
			$("#otp-loader").show();
			e.preventDefault();
			$.ajax({
				url: otp_submit_url,
				type: 'POST',
				data: $("#otp-form").serialize(),
				success: function(result) {
					$("#otp-loader").fadeOut(500, function() {
						$(this).remove();
					});

					if (result["status"] == "00") {
						setCookie("tsa_token", result["token"]);
						window.location = admin_url;
					} else if(result["status"] == "01") {
						toastr["error"]("Invalid token.", "Sorry!", {closeButton: true, progressBar: true, timeOut: 5000 });
						$(".login-forms").toggle();
					} else if(result["status"] == "99") {
						toastr["warning"]("Missing required data", "Sorry!", {closeButton: true, progressBar: true, timeOut: 5000 });
						$(".login-forms").toggle();
					}

				}
			});
		});
	});
</script>