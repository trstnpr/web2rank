<div class="cities-section">

	<section class="section-header">
		
		<div class="container-fluid">
			
			<div class="page-title">
				<h1>Cities <a href="<?php echo base_url('admin/city/new'); ?>" class="btn btn-default btn-sm">Add New</a></h1>
			</div>

			<div class="breadcrumb-wrap">
				<ol class="breadcrumb">
					<li><a href="<?php echo base_url('admin'); ?>">Admin</a></li>
					<li class="active">Cities</li>
				</ol>
			</div>

		</div>

	</section>

	<section class="section-content">
		
		<div class="container-fluid">
		<?php
			if($cities != 0) {
		?>
			<div class="data-list">
				<table class="table table-striped datatable" cellspacing="0" width="100%">
				    <thead>
				        <tr>
				            <th>City</th>
				            <th>State</th>
				            <th>Phone</th>
				            <th>Major</th>
				            <th>Action</th>
				        </tr>
				    </thead>
				    <tbody>
				    <?php foreach ($cities as $city) { ?>
				        <tr>
				            <td>
				            	<strong><?php echo $city->name; ?></strong>
				            	<p class="txt-block"><?php echo base_url($city->slug); ?></p>
				            </td>
				            <td><?php echo state(strtoupper($city->state)); ?></td>
				            <td><?php echo $city->phone; ?></td>
				            <th>
				            	<?php echo major_city($city->is_popular); ?>
				            </th>
				            <td width="10%">
				            	<a href="<?php echo base_url('city/'.$city->slug); ?>" class="btn btn-primary btn-xs btn-block" target="_blank">View</a>
				            	<a href="<?php echo base_url('admin/city/update/'.$city->slug); ?>" class="btn btn-warning btn-xs btn-block">Update</a>
				            	<button type="button" class="btn btn-danger btn-xs btn-block city-delete" data-delete="<?php echo $city->id; ?>" data-action="<?php echo base_url('admin/city/delete'); ?>">Delete</button>
				            </td>
				        </tr>
				    <?php } ?>
				    </tbody>
				</table>
			</div>

			<div class="form-group">
				<button type="button" class="btn btn-danger btn-sm delcity-all" data-action="<?php echo base_url('admin/city/delete-all'); ?>" data-type="city">Delete All</button>
			</div>
		<?php } else { ?>
			<div class="well">
				<h2 class="txt-center">No Cities Available</h2>
			</div>
		<?php } ?>
		</div>

	</section>

</div>