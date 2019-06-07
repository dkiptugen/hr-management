<nav class="sidebar sidebar-sticky">
<!-- nav class="sidebar sidebar-sticky toggled" -->
	<div class="sidebar-content  js-simplebar">
		<center>
			<a class="sidebar-brand" href="index.html">
				<img src="<?=base_url().'assets/img/tsa_logo.png';?>" style="width: 80px" alt="">
			</a>
		</center>

		<ul class="sidebar-nav">
			<li class="sidebar-header">Main Menu</li>
			<li class="sidebar-item <?=($this->uri->segment('2') == 'dashboard') ? 'active' : '';?>">
				<a class="sidebar-link font-weight-bold" href="<?=site_url('staff/dashboard');?>">
					<i class="align-middle" data-feather="monitor"></i> <span class="align-middle">Dashboard</span>
				</a>
			</li>
			<li class="sidebar-item <?=($this->uri->segment('2') == 'departments') ? 'active' : '';?>">
				<a class="sidebar-link font-weight-bold" href="<?=site_url('staff/departments');?>">
					<i class="align-middle" data-feather="layers"></i> <span class="align-middle">Departments</span>
				</a>
			</li>
			<li class="sidebar-item <?=(!$this->uri->segment('2')) ? 'active' : '';?>">
				<a class="sidebar-link font-weight-bold" href="<?=site_url('staff/index');?>">
					<i class="align-middle" data-feather="users"></i> <span class="align-middle">Staffs</span>
				</a>
			</li>
			<li class="sidebar-item <?=($this->uri->segment('2') == 'leave_management') ? 'active' : '';?>">
				<a class="sidebar-link font-weight-bold" href="<?=site_url('staff/leave_management');?>">
					<i class="align-middle" data-feather="calendar"></i> <span class="align-middle">Leave Management</span>
				</a>
			</li>
			<li class="sidebar-item <?=($this->uri->segment('2') == 'payslips') ? 'active' : '';?>">
				<a class="sidebar-link font-weight-bold" href="<?=site_url('staff/payslips');?>">
					<i class="align-middle" data-feather="credit-card"></i> <span class="align-middle">Payslips</span>
				</a>
			</li>

			<li class="sidebar-header">
					Administration
				</li>
				<li class="sidebar-item <?=(in_array($this->uri->segment('2'), ['system_preferences', 'leave_types', 'user_groups', 'status'])) ? 'active' : '';?>">
					<a href="#technical_pages" data-toggle="collapse" class="font-weight-bold sidebar-link">
						<i class="align-middle" data-feather="settings"></i> <span class="align-middle">Settings</span>
						<!-- span class="sidebar-badge badge badge-primary">14</span -->
					</a>
					<ul id="technical_pages" class="sidebar-dropdown list-unstyled collapse <?=(in_array($this->uri->segment('2'), ['system_preferences', 'leave_types', 'user_groups', 'status'])) ? 'show' : '';?>">
						<li class="sidebar-item <?=($this->uri->segment('2') == 'leave_types') ? 'active' : '';?>"><a class="sidebar-link" href="<?=site_url("staff/leave_types");?>">Leave Types</a></li>
						<li class="sidebar-item <?=($this->uri->segment('2') == 'system_preferences') ? 'active' : '';?>"><a class="sidebar-link" href="<?=site_url("staff/system_preferences");?>">System Preferences</a></li>
						<li class="sidebar-item <?=($this->uri->segment('2') == 'user_groups') ? 'active' : '';?>"><a class="sidebar-link" href="<?=site_url("staff/user_groups");?>">User Groups</a></li>
						<li class="sidebar-item <?=($this->uri->segment('2') == 'status') ? 'active' : '';?>"><a class="sidebar-link" href="<?=site_url("staff/status");?>">Status</a></li>
					</ul>
				</li>

			

			<div class="sidebar-cta">
				<button type="button" class="close sidebar-cta-close" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<div class="sidebar-cta-content">
					<strong class="d-inline-block mb-1">Protect Your Password</strong>
					<div class="mb-2">
						Your password is your secret
					</div>
					<a href="#" class="btn btn-outline-primary">Change Password</a>
				</div>
			</div>
		
	</div>
</nav>