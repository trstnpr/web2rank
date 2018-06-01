<div class="pages-section">

	<section class="section-header">
		
		<div class="container-fluid">
			
			<div class="page-title">
				<h1>User Account</button></h1>
			</div>

			<div class="breadcrumb-wrap">
				<ol class="breadcrumb">
					<li><a href="<?php echo base_url('admin'); ?>">Admin</a></li>
					<li class="active">User Account</li>
				</ol>
			</div>

		</div>

	</section>

	<section class="section-content">
		
		<div class="container-fluid">

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Current User : <strong><?php echo $user->username; ?></strong></h3>
				</div>
				<div class="panel-body">

					<div class="row">

						<div class="col-md-8">

							<form class="form-horizontal userdetails-form" method="post" action="<?php echo base_url('admin/user/detail/update'); ?>">
							    <div class="form-group">
							        <label class="col-sm-2 control-label">Username</label>
							        <div class="col-sm-10">
							            <input type="text" class="form-control" name="username" value="<?php echo $user->username; ?>" placeholder="Username" title="Cannot be change" disabled />
							        </div>
							    </div>

							    <div class="form-group">
							        <label class="col-sm-2 control-label">Email</label>
							        <div class="col-sm-10">
							            <input type="email" class="form-control" name="email" value="<?php echo $user->email; ?>" placeholder="Email" required />
							        </div>
							    </div>
							    <div class="form-group">
							        <div class="col-sm-offset-2 col-sm-10">
							            <button type="submit" class="btn btn-primary btn-user">Save</button>
							        </div>
							    </div>
							</form>
						</div>

					</div>

				</div>
				
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Change Password</strong></h3>
				</div>
				<div class="panel-body">

					<div class="alert alert-warning alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						Session will be terminated once password successfully changed.
					</div>

					<div class="row">

						<div class="col-md-8">

							<form class="form-horizontal userpass-form" method="post" action="<?php echo base_url('admin/user/password/update'); ?>">

							    <div class="form-group">
							        <label class="col-sm-3 control-label">Password</label>
							        <div class="col-sm-9">
							            <input type="password" class="form-control" name="password" placeholder="Current Password" required />
							        </div>
							    </div>

							    <div class="form-group">
							        <label class="col-sm-3 control-label">New Password</label>
							        <div class="col-sm-9">
							            <input type="password" class="form-control" name="new_pass" placeholder="Desired Password" required />
							        </div>
							    </div>

							    <div class="form-group">
							        <label class="col-sm-3 control-label">Confirm Password</label>
							        <div class="col-sm-9">
							            <input type="password" class="form-control" name="conf_pass" placeholder="Confirm Password" required />
							        </div>
							    </div>
							    
							    <div class="form-group">
							        <div class="col-sm-offset-3 col-sm-9">
							            <button type="submit" class="btn btn-primary btn-password">Save</button>
							        </div>
							    </div>
							</form>

						</div>

					</div>

				</div>
			</div>

		</div>

	</section>

</div>