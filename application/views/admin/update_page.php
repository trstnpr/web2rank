<div class="pages-section">

	<section class="section-header">
		
		<div class="container-fluid">
			
			<div class="page-title">
				<h1>Update Page</h1>
			</div>

			<div class="breadcrumb-wrap">
				<ol class="breadcrumb">
					<li><a href="<?php echo base_url('admin'); ?>">Admin</a></li>
					<li><a href="<?php echo base_url('admin/pages'); ?>">Pages</a></li>
					<li class="active">Update</li>
				</ol>
			</div>

		</div>

	</section>

	<section class="section-content">
		
		<div class="container-fluid">

			<form class="updatepage-form" method="post" action="<?php echo base_url('admin/page/updating'); ?>">

				<input type="hidden" name="id" value="<?php echo $page->id; ?>" />
			
				<div class="row">
					
					<div class="col-md-9">
						<div class="well">
							<div class="row">

								<div class="col-md-12">

									<div class="form-group">
										<label>Page Title</label>
										<input type="text" class="form-control slugup" name="title" value="<?php echo $page->title; ?>" placeholder="Enter title ..." required />
									</div>

								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label>Slug</label>
										<input type="text" class="form-control slug" name="slug" data-slug="<?php echo base_url('admin/validatenewslug'); ?>" data-posttype="page" data-permalink="<?php echo $page->slug; ?>" value="<?php echo $page->slug; ?>" placeholder="Page slug ..." readonly required />

									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label for="exampleInputFile">Featured Image</label>
										<input type="file" class="feat_img update_feat" name="featured_image" accept=".jpg, .jpeg, .png" onchange="readURL(this);" />
										<p class="help-block">Format .jpg .jpeg and .png only.</p>
										<input type="hidden" class="file_val" name="current_img" value="<?php echo $page->featured_image; ?>" />
										<input type="hidden" class="file_status" name="current_status" value="<?php echo $page->featured_image; ?>" />
										<?php $remove_preview = ($page->featured_image == NULL) ? 'display:none' : '' ; ?>
										<button type="button" class="btn btn-xs btn-warning remove-preview" style="<?php echo $remove_preview; ?>" >Remove</button>
										<?php $preview_img = ($page->featured_image != NULL) ? base_url($page->featured_image) : '' ; ?>
										<img class="img-responsive preview" src="<?php echo $preview_img; ?>" />

									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label>Content</label>
										<textarea class="wysiwyg form-control" name="content" ><?php echo $page->content; ?></textarea>
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label>Exerpt</label>
										<textarea class="form-control" name="excerpt" rows="2" maxlength="300" required><?php echo $page->excerpt; ?></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Meta Keywords</label>
										<input type="text" class="form-control" name="meta_keyword" placeholder="SEO Keywords ..." value="<?php echo $page->meta_keyword; ?>" required />
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Meta Description</label>
										<textarea class="form-control" name="meta_description" rows="2" placeholder="SEO Description ..." required><?php echo $page->meta_description; ?></textarea>
									</div>
								</div>

							</div>
						</div>
					</div>

					<div class="col-md-3">

						<div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
						    <div class="panel panel-default">
						        <div class="panel-heading" role="tab" id="headingOne">
						            <h4 class="panel-title">
								        <a role="button" data-toggle="collapse" data-parent="#accordion2" href="#pageattr" aria-expanded="true" aria-controls="collapseOne">
								         	Page Attribute
								        </a>
								    </h4>
						        </div>
						        <div id="pageattr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						            <div class="panel-body">
						            	<label>Post Type</label>
						                <input class="form-control" name="layout" value="page" value="<?php echo $page->layout; ?>" readonly required />
						            </div>
						        </div>
						    </div>
						</div>
						
						<div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
						    <div class="panel panel-default">
						        <div class="panel-heading" role="tab" id="headingOne">
						            <h4 class="panel-title">
								        <a role="button" data-toggle="collapse" data-parent="#accordion1" href="#publish" aria-expanded="true" aria-controls="collapseOne">
								         	Action
								        </a>
								    </h4>
						        </div>
						        <div id="publish" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						            <div class="panel-body">
						                <label>Save As</label>
						                <select class="form-control" name="status" required>
						                	<option value="1" <?php echo selected($page->status, 1); ?> >Publish</option>
						                	<option value="2" <?php echo selected($page->status, 2); ?> >Draft</option>
						                	<option value="3" <?php echo selected($page->status, 3); ?> >Trash</option>
						                </select>
						            </div>
						        </div>
						        <div class="panel-footer">
						        	<button type="submit" class="btn btn-success btn-block btn-save">Update</button>
						        </div>
						    </div>
						</div>

					</div>

				</div>

			</form>

		</div>

	</section>

</div>