<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">List of Staff Members</h1>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<div class="text-right"><a href="<?=STAFF_URL."/index/add";?>" class="btn btn-primary">Add Staff Member</a></div>
					</div>
					<div class="card-body">
						<table id="datatables-buttons" class="table table-striped table-hover custom-list-table" style="width:100%">
							<thead>
								<tr>
									<th>Full Name</th>
									<th>Payroll No.</th>
									<th>Department</th>
									<th>Job Title</th>
									<th>Phone Number</th>
									<th>Email Address</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Felix Ogucha Nyabwari</td>
									<td>4001</td>
									<td>Digital Department</td>
									<td>Senior Software Engineer</td>
									<td>0723293349</td>
									<td>felix.nyabwari@mediamax.co.ke</td>
									<td class="table-action">
										<a href="#" data-toggle="modal" data-target="#editModal"><i class="align-middle" data-feather="edit-2"></i></a>
										<a href="#"><i class="align-middle" data-feather="trash"></i></a>
									</td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<th>Full Name</th>
									<th>Payroll No.</th>
									<th>Department</th>
									<th>Job Title</th>
									<th>Phone Number</th>
									<th>Actions</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>