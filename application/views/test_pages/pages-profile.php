<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Profile</h1>

		<div class="row">
			<div class="col-md-4 col-xl-3">
				<div class="card mb-3">
					<div class="card-header">
						<h5 class="card-title mb-0">Profile Details</h5>
					</div>
					<div class="card-body text-center">
						<img src="<?=base_url();?>assets/img/avatar-4.jpg" alt="Marie Salter" class="img-fluid rounded-circle mb-2" width="128" height="128" />
						<h4 class="card-title mb-0">Marie Salter</h4>
						<div class="text-muted mb-2">Lead Developer</div>
					</div>
					<hr class="my-0" />
					<div class="card-body">
						<h5 class="h6 card-title">About</h5>
						<ul class="list-unstyled mb-0">
							<li class="mb-1"><span data-feather="phone" class="feather-sm mr-1"></span> 0723 293 349</li>
							<li class="mb-1"><span data-feather="message-square" class="feather-sm mr-1"></span> fenicfelix@gmail.com</li>
							<li class="mb-1"><span data-feather="shopping-cart" class="feather-sm mr-1"></span> 5,000 Kgs.</li>
						</ul>
					</div>
					<hr class="my-0" />
					<div class="card-body">
						<center><button class="btn btn-primary">Change Password</button></center>
					</div>
					<hr class="my-0" />
				</div>
			</div>

			<div class="col-md-8 col-xl-9">
				<div class="card">
					<div class="card-header">
						<div class="card-actions float-right">
							<div class="dropdown show">
								<a href="#" data-toggle="dropdown" data-display="static">
	<i class="align-middle" data-feather="more-horizontal"></i>
</a>

								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<a class="dropdown-item" href="#">Something else here</a>
								</div>
							</div>
						</div>
						<h5 class="card-title mb-0">Personal Detailss</h5>
					</div>
					<div class="card-body h-100">

						<form>
												<div class="form-row">
													<div class="form-group col-md-6">
														<label for="inputFirstName">First name</label>
														<input type="text" class="form-control" id="inputFirstName" placeholder="First name">
													</div>
													<div class="form-group col-md-6">
														<label for="inputLastName">Last name</label>
														<input type="text" class="form-control" id="inputLastName" placeholder="Last name">
													</div>
												</div>
												<div class="form-group">
													<label for="inputEmail4">Email</label>
													<input type="email" class="form-control" id="inputEmail4" placeholder="Email">
												</div>
												<div class="form-group">
													<label for="inputAddress">Address</label>
													<input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
												</div>
												<div class="form-group">
													<label for="inputAddress2">Address 2</label>
													<input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
												</div>
												<div class="form-row">
													<div class="form-group col-md-6">
														<label for="inputCity">City</label>
														<input type="text" class="form-control" id="inputCity">
													</div>
													<div class="form-group col-md-4">
														<label for="inputState">State</label>
														<select id="inputState" class="form-control">
                    <option selected="">Choose...</option>
                    <option>...</option>
                  </select>
													</div>
													<div class="form-group col-md-2">
														<label for="inputZip">Zip</label>
														<input type="text" class="form-control" id="inputZip">
													</div>
												</div>
												<button type="submit" class="btn btn-primary">Save changes</button>
											</form>
					</div>
				</div>
			</div>
		</div>

	</div>
</main>