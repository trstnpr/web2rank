<div class="category-section">

	<section class="section-header">
		
		<div class="container-fluid">
			
			<div class="page-title">
				<h1>Category</h1>
			</div>

			<div class="breadcrumb-wrap">
				<ol class="breadcrumb">
					<li><a href="<?php echo base_url('admin'); ?>">Admin</a></li>
					<li><a href="<?php echo base_url('admin/category'); ?>">Category</a></li>
					<li class="active"><?php echo $cat->name; ?></li>
				</ol>
			</div>

		</div>

	</section>

	<section class="section-content">
		
		<div class="container-fluid">
			
			<div class="row">

				<div class="col-md-7 col-md-push-5">
					<?php if($categories != 0) { ?>
					<div class="data-list">
						<table class="table table-striped datatable" cellspacing="0" width="100%">
						    <thead>
						        <tr>
						            <th>Category</th>
						            <th>slug</th>
						            <th>Action</th>
						        </tr>
						    </thead>
						    <tbody>
						   	<?php foreach($categories as $category) { ?>
						        <tr>
						            <td width="30%">
						            	<strong><?php echo $category->name; ?></strong>		
						            </td>
						            <td width=30%>
						            	<?php echo $category->slug; ?>
						            </td>
						            <td width="10%">
						            	<a href="<?php echo base_url('admin/category/update/'.$category->slug); ?>" class="btn btn-primary btn-xs btn-block">Update</a>
						            	<button type="button" class="btn btn-danger btn-xs btn-block btn-delcat" data-delete="<?php echo $category->id; ?>" data-action="<?php echo base_url('admin/delete_category'); ?>">Delete</button>
						            </td>
						        </tr>
						    <?php } ?>
						    </tbody>
						</table>
					</div>
					<?php } else { ?>
					<div class="well">No Categories Available</div>
					<?php } ?>
				</div>

				<div class="col-md-5 col-md-pull-7">

					<div class="panel panel-success">
						<div class="panel-heading"><strong>Update Category</strong></div>
						<div class="panel-body">
							
							<form class="update-category" method="post" action="<?php echo base_url('admin/category/update'); ?>">
								<input type="hidden" name="id" value="<?php echo $cat->id; ?>" />

								<div class="form-group">
									<label>Name</label>
									<input type="text" class="form-control slugup" name="name" value="<?php echo $cat->name; ?>" placeholder="Category name ..." required />
								</div>

								<div class="form-group">
									<label>Slug</label>
									<input type="text" class="form-control slug" name="slug" data-slug="<?php echo base_url('admin/validatenewslug'); ?>" data-posttype="category" data-permalink="<?php echo $cat->slug; ?>" value="<?php echo $cat->slug; ?>" placeholder="Category slug ..." readonly required />
								</div>

								<div class="form-group">
									<label>Description</label>
									<textarea class="form-control" name="description" rows="4" maxlength="150" placeholder="Category description ..." required><?php echo $cat->description; ?></textarea>
								</div>

								<div class="form-group">
									<button type="submit" class="btn btn-success btn-save">Update</button>
								</div>

							</form>

						</div>
					</div>

				</div>

			</div>

		</div>

	</section>

</div>