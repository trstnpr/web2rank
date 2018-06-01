<div class="states-section">

	<section class="section-header">
		
		<div class="container-fluid">
			
			<div class="page-title">
				<h1>States <a href="<?php echo base_url('admin/state/new'); ?>" class="btn btn-default btn-sm">Add New</a></h1>
			</div>

			<div class="breadcrumb-wrap">
				<ol class="breadcrumb">
					<li><a href="<?php echo base_url('admin'); ?>">Admin</a></li>
					<li class="active">States</li>
				</ol>
			</div>

		</div>

	</section>

	<section class="section-content">
		
		<div class="container-fluid">
		<?php
			if($states != 0) {
		?>
			
			<div class="data-list">
				<table class="table table-striped datatable" cellspacing="0" width="100%">
				    <thead>
				        <tr>
				            <th>State</th>
				            <th>Abbreviation</th>
				            <th>Slug</th>
				            <th>Action</th>
				        </tr>
				    </thead>
				    <tbody>
				    <?php foreach ($states as $state) { ?>
				        <tr>
				            <td><strong><?php echo $state->state; ?></strong></td>
				            <td><?php echo $state->abbrev; ?></td>
				            <td><?php echo base_url($state->slug); ?></td>
				            <td width="10%">
				            	<a href="<?php echo base_url('state/'.$state->slug); ?>" class="btn btn-primary btn-xs btn-block" target="_blank">View</a>
				            	<a href="<?php echo base_url('admin/state/update/'.$state->slug); ?>" class="btn btn-warning btn-xs btn-block">Update</a>
				            	<button type="button" class="btn btn-danger btn-xs btn-block state-delete" data-delete="<?php echo $state->id; ?>" data-action="<?php echo base_url('admin/state/delete'); ?>">Delete</button>
				            </td>
				        </tr>
				    <?php } ?>
				    </tbody>
				</table>
			</div>

			<div class="form-group">
				<button type="button" class="btn btn-danger btn-sm delstate-all" data-action="<?php echo base_url('admin/state/delete-all'); ?>" data-type="state">Delete All</button>
			</div>

		<?php } else { ?>
			<div class="well">
				<h2 class="txt-center">No States Available</h2>
			</div>
		<?php } ?>
		</div>

	</section>

</div>