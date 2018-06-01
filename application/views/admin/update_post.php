<div class="pages-section">

	<section class="section-header">
		
		<div class="container-fluid">
			
			<div class="page-title">
				<h1>Update Post</h1>
			</div>

			<div class="breadcrumb-wrap">
				<ol class="breadcrumb">
					<li><a href="<?php echo base_url('admin'); ?>">Admin</a></li>
					<li><a href="<?php echo base_url('admin/posts'); ?>">Posts</a></li>
					<li class="active">Update</li>
				</ol>
			</div>

		</div>

	</section>

	<section class="section-content">
		
		<div class="container-fluid">

			<form class="updatepost-form" method="post" action="<?php echo base_url('admin/post/updating'); ?>">

				<input type="hidden" name="id" value="<?php echo $post->id; ?>" />
			
				<div class="row">
					
					<div class="col-md-9">
						<div class="well">
							<div class="row">

								<div class="col-md-12">

									<div class="form-group">
										<label>Page Title</label>
										<input type="text" class="form-control slugup" name="title" value="<?php echo $post->title; ?>" placeholder="Enter title ..." required />
									</div>

								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label>Slug</label>
										<input type="text" class="form-control slug" name="slug" data-slug="<?php echo base_url('admin/validatenewslug'); ?>" data-posttype="post" data-permalink="<?php echo $post->slug; ?>" value="<?php echo $post->slug; ?>" placeholder="Post slug ..." readonly required />
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label for="exampleInputFile">Featured Image</label>
										<input type="file" class="feat_img update_feat" name="featured_image" accept=".jpg, .jpeg, .png" onchange="readURL(this);" />
										<p class="help-block">Format .jpg .jpeg and .png only.</p>
										<input type="hidden" class="file_val" name="current_img" value="<?php echo $post->featured_image; ?>" />
										<input type="hidden" class="file_status" name="current_status" value="<?php echo $post->featured_image; ?>" />
										<?php $remove_preview = ($post->featured_image == NULL) ? 'display:none' : '' ; ?>
										<button type="button" class="btn btn-xs btn-warning remove-preview" style="<?php echo $remove_preview; ?>" >Remove</button>
										<?php $preview_img = ($post->featured_image != NULL) ? base_url($post->featured_image) : '' ; ?>
										<img class="img-responsive preview" src="<?php echo $preview_img; ?>" />

									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label>Content</label>
										<textarea class="wysiwyg form-control" name="content" ><?php echo $post->content; ?></textarea>
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label>Exerpt</label>
										<textarea class="form-control" name="excerpt" rows="2" maxlength="300" required><?php echo $post->excerpt; ?></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Meta Keywords</label>
										<input type="text" class="form-control" name="meta_keyword" placeholder="SEO Keywords ..." value="<?php echo $post->meta_keyword; ?>" required />
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Meta Description</label>
										<textarea class="form-control" name="meta_description" rows="2" placeholder="SEO Description ..." required><?php echo $post->meta_description; ?></textarea>
									</div>
								</div>

							</div>
						</div>
					</div>

					<div class="col-md-3">

						<div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
						    <div class="panel panel-default">
						        <div class="panel-heading" role="tab" id="headingOne">
						            <h4 class="panel-title">
								        <a role="button" data-toggle="collapse" data-parent="#accordion1" href="#category" aria-expanded="true" aria-controls="collapseOne">
								         	Category
								        </a>
								    </h4>
						        </div>
						        <div id="category" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						            <div class="panel-body">
						            <?php if($category != 0) { ?>
						            	<select class="selectpicker" name="category[]" multiple title="Categories">
						            	<?php foreach($category as $cat) { ?>	
											<option value="<?php echo $cat->name; ?>" <?php echo selected_multiple($post->category, $cat->name); ?> ><?php echo $cat->name; ?></option>
										<?php } ?>
										</select>
									<?php } else { ?>
										<strong>List Your Category</strong>
									<?php }?>
						            </div>
						        </div>
						    </div>
						</div>

						<div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
						    <div class="panel panel-default">
						        <div class="panel-heading" role="tab" id="headingOne">
						            <h4 class="panel-title">
								        <a role="button" data-toggle="collapse" data-parent="#accordion2" href="#tags" aria-expanded="true" aria-controls="collapseOne">
								         	Tags
								        </a>
								    </h4>
						        </div>
						        <div id="tags" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						            <div class="panel-body">
						            	<label>Separated by comma</label>
						                <input class="form-control" name="tag" data-role="tagsinput" value="<?php echo $post->tag; ?>" placeholder="Enter tags" />
						            </div>
						        </div>
						    </div>
						</div>

						<div class="panel-group" id="accordion4" role="tablist" aria-multiselectable="true">
						    <div class="panel panel-default">
						        <div class="panel-heading" role="tab" id="headingOne">
						            <h4 class="panel-title">
								        <a role="button" data-toggle="collapse" data-parent="#accordion4" href="#featpost" aria-expanded="true" aria-controls="collapseOne">
								         	Featured Post
								        </a>
								    </h4>
						        </div>
						        <div id="featpost" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						            <div class="panel-body">
						            	<div class="checkbox">
											<label>
												<input type="checkbox" name="is_featured" value="1" <?php echo ($post->is_featured) ? 'checked': ''; ?> /> Make as featured
											</label>
										</div>
						            </div>
						        </div>
						    </div>
						</div>

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
						                <input class="form-control" name="layout" value="<?php echo $post->layout; ?>" readonly required />
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
						                	<option value="1" <?php echo selected($post->status, 1); ?> >Publish</option>
						                	<option value="2" <?php echo selected($post->status, 2); ?> >Draft</option>
						                	<option value="3" <?php echo selected($post->status, 3); ?> >Trash</option>
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