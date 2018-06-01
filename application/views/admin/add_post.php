<div class="pages-section">

	<section class="section-header">
		
		<div class="container-fluid">
			
			<div class="page-title">
				<h1>Add New Post</h1>
			</div>

			<div class="breadcrumb-wrap">
				<ol class="breadcrumb">
					<li><a href="<?php echo base_url('admin'); ?>">Admin</a></li>
					<li><a href="<?php echo base_url('admin/posts'); ?>">Posts</a></li>
					<li class="active">New</li>
				</ol>
			</div>

		</div>

	</section>

	<section class="section-content">
		
		<div class="container-fluid">

			<form class="addpost-form" method="post" action="<?php echo base_url('admin/post/add'); ?>">
			
				<div class="row">
					
					<div class="col-md-9">
						<div class="well">
							<div class="row">

								<div class="col-md-12">

									<div class="form-group">
										<label>Post Title</label>
										<input type="text" class="form-control slugme" name="title" placeholder="Enter title ..." required />
									</div>

								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label>Slug</label>
										<input type="text" class="form-control slug" name="slug" data-slug="<?php echo base_url('admin/validateslug'); ?>" data-posttype="post" placeholder="Post slug ..." readonly required />
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label for="exampleInputFile">Featured Image</label>
										<input type="file" class="feat_img" name="featured_image" accept=".jpg, .jpeg, .png" onchange="readURL(this);" />
										<p class="help-block">Format .jpg .jpeg and .png only.</p>

										<button type="button" class="btn btn-xs btn-warning remove-preview" style="display:none;">Remove</button>

										<img class="img-responsive preview" src="" />

									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label>Content</label>
										<textarea class="wysiwyg form-control" name="content" ></textarea>
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label>Exerpt</label>
										<textarea class="form-control" name="excerpt" rows="2" maxlength="300" required></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Meta Keywords</label>
										<input type="text" class="form-control" name="meta_keyword" placeholder="SEO Keywords ..." required />
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Meta Description</label>
										<textarea class="form-control" name="meta_description" placeholder="SEO Description ..." rows="2" required></textarea>
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
											<option value="<?php echo $cat->name; ?>" ><?php echo $cat->name; ?></option>
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
						                <input class="form-control" name="tag" data-role="tagsinput" placeholder="Enter tags" />
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
												<input type="checkbox" name="is_featured" value="1" /> Make as featured
											</label>
										</div>
						            </div>
						        </div>
						    </div>
						</div>

						<div class="panel-group" id="accordion3" role="tablist" aria-multiselectable="true">
						    <div class="panel panel-default">
						        <div class="panel-heading" role="tab" id="headingOne">
						            <h4 class="panel-title">
								        <a role="button" data-toggle="collapse" data-parent="#accordion3" href="#pageattr" aria-expanded="true" aria-controls="collapseOne">
								         	Page Attribute
								        </a>
								    </h4>
						        </div>
						        <div id="pageattr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						            <div class="panel-body">
						            	<label>Post Type</label>
						                <input class="form-control" name="layout" value="post" readonly required />
						            </div>
						        </div>
						    </div>
						</div>
						
						<div class="panel-group" id="accordion4" role="tablist" aria-multiselectable="true">
						    <div class="panel panel-default">
						        <div class="panel-heading" role="tab" id="headingOne">
						            <h4 class="panel-title">
								        <a role="button" data-toggle="collapse" data-parent="#accordion4" href="#publish" aria-expanded="true" aria-controls="collapseOne">
								         	Action
								        </a>
								    </h4>
						        </div>
						        <div id="publish" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						            <div class="panel-body">
						                <label>Save As</label>
						                <select class="form-control" name="status" required>
						                	<option value="1">Publish</option>
						                	<option value="2">Draft</option>
						                </select>
						            </div>
						        </div>
						        <div class="panel-footer">
						        	<button type="submit" class="btn btn-success btn-block btn-save">Save</button>
						        </div>
						    </div>
						</div>

					</div>

				</div>

			</form>

		</div>

	</section>

</div>