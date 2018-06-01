<div class="pages-section">

	<section class="section-header">
		
		<div class="container-fluid">
			
			<div class="page-title">
				<h1>Trash Pages</h1>
			</div>

			<div class="breadcrumb-wrap">
				<ol class="breadcrumb">
					<li><a href="<?php echo base_url('admin'); ?>">Admin</a></li>
					<li><a href="<?php echo base_url('admin/pages'); ?>">Pages</a></li>
					<li class="active">Trash</li>
				</ol>
			</div>

		</div>

	</section>

	<section class="section-content">
		
		<div class="container-fluid">

		<?php
			if($pages != 0) {
		?>
			<div class="data-list">
				<table class="table table-striped datatable" cellspacing="0" width="100%">
				    <thead>
				        <tr>
				            <th>Title</th>
				            <th>Status</th>
				            <th>Author</th>
				            <th>Action</th>
				        </tr>
				    </thead>
				    <tbody>
				    <?php foreach ($pages as $page) { ?>
				        <tr>
				            <td width="50%">
				            	<strong><?php echo $page->title; ?></strong>
				            	<p class="hidden-xs"><?php echo base_url($page->slug); ?></p>		
				            </td>
				            <td><?php echo ucwords(status($page->status)); ?></td>
				            <td><?php echo $page->author; ?></td>
				            <td width="10%">
				            	<button type="button" class="btn btn-primary btn-xs btn-block btn-recover" data-recover="<?php echo $page->id; ?>" data-action="<?php echo base_url('admin/page/recover'); ?>">Recover</button>
				            	<button type="button" class="btn btn-danger btn-xs btn-block btn-delete" data-delete="<?php echo $page->id; ?>" data-action="<?php echo base_url('admin/page/delete'); ?>">Delete</button>
				            </td>
				        </tr>
				    <?php } ?>
				    </tbody>
				</table>
			</div>

			<div class="form-group">
				<button type="button" class="btn btn-danger btn-sm empty-trash" data-action="<?php echo base_url('admin/pages/empty'); ?>" data-type="page">Empty Trash</button>
			</div>

		<?php } else { ?>

			<div class="well">
				<h2 class="txt-center">No Pages Available</h2>
			</div>

		<?php } ?>

		</div>

	</section>

</div>