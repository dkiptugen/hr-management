<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">List of Departments</h1>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<div class="text-right"><button data-toggle="modal" data-target="#addModal" class="btn btn-primary">Add Department</button></div>
					</div>
					<div class="card-body">
						<table id="datatables-buttons" class="table table-striped table-hover custom-list-table" style="width:100%">
							<thead>
								<tr>
									<th>Department Name</th>
									<th>Parent Department</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Name</td>
									<td>Parent</td>
									<td class="table-action">
										<a href="#" data-toggle="modal" data-target="#editModal"><i class="align-middle" data-feather="edit-2"></i></a>
										<a href="#"><i class="align-middle" data-feather="trash"></i></a>
									</td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<th>Department Name</th>
									<th>Parent Department</th>
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

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Department</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body m-3">
				<p class="mb-0">Use Bootstrap’s JavaScript modal plugin to add dialogs to your site for lightboxes, user notifications, or completely custom content.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success">Save</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Update Department</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body m-3">
				<p class="mb-0">Use Bootstrap’s JavaScript modal plugin to add dialogs to your site for lightboxes, user notifications, or completely custom content.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success">Save</button>
			</div>
		</div>
	</div>
</div>

<script>
    var home_url = "<?=site_url('admin/departments')?>";
    var submit_url = "<?=site_url('dboperations/db_operations');?>";
    var submit_add_url = "<?=site_url('api/dboperation/add/products');?>";
    var submit_edit_url = "<?=site_url('api/dboperation/edit/products/product_id/');?>";

    /*$(".edit-item").click(function(e) {
        $("#edit-key_id").val($(this).data('id'));
        $("#edit-product_name").val($(this).data('product_name'));
    });*/
</script>