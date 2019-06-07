<nav class="navbar navbar-expand navbar-light bg-white sticky-top">
				<a class="sidebar-toggle d-flex mr-3">
          <i class="align-self-center" data-feather="menu"></i>
        </a>

				<h3 class="nav-link"><?=$page_title;?></h3>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle ml-2 d-inline-block d-sm-none" href="#" id="userDropdown" data-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle mt-n1" data-feather="settings"></i>
								</div>
							</a>
							<a class="nav-link nav-link-user dropdown-toggle d-none d-sm-inline-block" href="#" id="userDropdown" data-toggle="dropdown">
								<img src="<?=base_url();?>assets/img/blank_profile.png" class="avatar img-fluid rounded mr-1" alt="<?=$this->session->userdata("first_name")." ".$this->session->userdata("last_name");?>" /> <span class="text-dark"><?=$this->session->userdata("first_name")." ".$this->session->userdata("last_name");?></span>
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
								<label><?=$this->session->userdata("group_name");?></label>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?=site_url('admin/my_profile');?>">My Profile</a>
								<a class="dropdown-item" href="<?=site_url('auth/logout');?>">Sign out</a>
							</div>
						</li>

						
						<li class="nav-item dropdown">
							<?php
								$latest_notifications = [];
							?>
							<a class="nav-icon dropdown-toggle ml-2" href="#" id="alertsDropdown" data-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator danger"><?=(!$latest_notifications) ? "0" : number_format(sizeof($latest_notifications));?></span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									<?=(!$latest_notifications) ? "0" : number_format(sizeof($latest_notifications));?> New Notifications
								</div>
								<div class="list-group">
									<?php
									if($latest_notifications) {
										foreach($latest_notifications as $notify) {
											?>
											<a href="<?=$notify->url;?>" class="list-group-item">
												<div class="row no-gutters align-items-center">
													<div class="col-2">
														<i class="<?=$notify->color;?>" data-feather="<?=$notify->icon;?>"></i>
													</div>
													<div class="col-10">
														<!-- div class="text-dark"><= $notify->notification;?></div -->
														<div class="text-muted small mt-1"><?=$notify->message;?></div>
														<div class="text-muted small mt-1"><?=$this->my_database->time_elapsed_string($notify->notification_time, false);?></div>
													</div>
												</div>
											</a>
											<?php
										}
									}
									?>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all notifications</a>
								</div>
							</div>
						</li>

					</ul>
				</div>
			</nav>