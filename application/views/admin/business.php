<div class="business-section">

	<section class="section-header">
		
		<div class="container-fluid">
			
			<div class="page-title">
				<h1>Business</h1>
			</div>

			<div class="breadcrumb-wrap">
				<ol class="breadcrumb">
					<li><a href="<?php echo base_url('admin'); ?>">Admin</a></li>
					<li class="active">Business</li>
				</ol>
			</div>

		</div>

	</section>

	<section class="section-content">
		
		<div class="container-fluid">

		<?php
			if($business != 0) {
		?>
			<div class="data-list">
				<table class="table datatable" cellspacing="0" width="100%">
				    <thead>
				        <tr>
				        	<th width="5%">#</th>
				        	<th>Business</th>
				        	<th width="15%">Photo</th>
				            <th>Location</th>
				            <th>Status</th>
				            <th>Submitted</th>
				            <th>Verified</th>
				            <th>Action</th>
				        </tr>
				    </thead>
				    <tbody>
				    <?php foreach ($business as $biz) {

				    	$verified = ($biz->status == 1) ? date_proper($biz->confirmed_at) : ucwords(biz_status($biz->status));

				    		$photo = ($biz->photo != NULL) ? base_url($biz->photo) : base_url('build/images/lock.png') ;

				    ?>

				        <tr class="<?php echo biz_status_shade($biz->status); ?>">
				        	<td><?php echo biz_status_icon($biz->status); ?></td>
				        	<td>
				            	<strong><?php echo $biz->name; ?></strong>
				            	<p><?php echo $biz->email; ?></p>
				            	<p><?php echo $biz->contact; ?></p>
				            </td>
				        	<td>
				        		<img src="<?php echo $photo; ?>" class="img-responsive" alt="<?php echo $biz->name; ?>" title="<?php echo $biz->name; ?>" />	
				        	</td>
				            <td><?php echo $biz->city.' '.$biz->zip.', '.$biz->state; ?></td>
				            <td><?php echo biz_status_styled($biz->status); ?></td>
				            <td><?php echo date_proper($biz->submitted_at); ?></td>
				            <td><?php echo $verified; ?></td>
				            <td width="10%">
				            	<button type="button" class="btn btn-primary btn-xs btn-block biz-verify" data-id="<?php echo $biz->id; ?>" <?php echo biz_action($biz->status, 1); ?> data-action="<?php echo base_url('business/verify'); ?>">Verify</button>
				            	<button type="button" class="btn btn-warning btn-xs btn-block biz-void" data-id="<?php echo $biz->id; ?>" <?php echo biz_action($biz->status, 2); ?> data-action="<?php echo base_url('business/void'); ?>">Void</button>
				            	<button type="button" class="btn btn-danger btn-xs btn-block biz-delete" data-id="<?php echo $biz->id; ?>" data-action="<?php echo base_url('business/delete'); ?>">Delete</button>
				            </td>
				        </tr>
				    <?php } ?>
				    </tbody>
				</table>
			</div>

		<?php } else { ?>

			<div class="well">
				<h2 class="txt-center">No Business Available</h2>
			</div>

		<?php } ?>

		</div>

	</section>

</div>