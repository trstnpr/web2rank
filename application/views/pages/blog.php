<div class="blog-content">
	<section class="section-banner data-img" data-bg="<?php echo base_url('build/images/banner/banner-blog.jpg'); ?>">
		<div class="overlay">
			<div class="container">
				<h1 class="page-title">Blog</h1>
			</div>
		</div>
	</section>

	<section class="section-blog">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="section-content">
						<div class="blog-wrap">
							<div class="slider-wrap clearfix">
								<h2 class="slider-header">Latest Articles</h2>
								<?php if($slider) { ?>
								<div class="btn-group slider-nav pull-right" role="group" aria-label="...">
									<a class="btn btn-success btn-sm slider-control" href="#carousel-example-generic" role="button" data-slide="prev">Prev</a>
									<a class="btn btn-success btn-sm slider-control" href="#carousel-example-generic" role="button" data-slide="next">Next</a>
								</div>
								<div id="carousel-example-generic" class="carousel slide recent-post-slider" data-ride="carousel">
								    <div class="carousel-inner" role="listbox">
								        <?php
										foreach($slider as $blog) {
				    						$blog_thumb = ($blog->featured_image != NULL) ? base_url($blog->featured_image) : base_url('build/images/placeholder.jpg');
				    						$content_excerpt = truncate(($blog->excerpt != NULL) ? $blog->excerpt : $blog->content, 150);
										?>
								        <div class="item">
								        	<div class="thumb-wrapper data-img" data-bg="<?php echo $blog_thumb; ?>">
									            <div class="article-details">
									            	<h4 class="article-title"><?php echo $blog->title; ?> <small class="article-meta">Posted on <?php echo date_proper($blog->created_at); ?></small></h4>
									            	<div class="article-excerpt">
									                	<p><?php echo $content_excerpt; ?>. <a href="<?php echo base_url($blog->slug); ?>">Read more</a></p>
									                	<div class="article-category">
									                		<?php echo category($blog->category); ?>
									                	</div>
									                </div>
									            </div>
									        </div>
								        </div>
								        <?php } ?>
								    </div>
								</div>
								<?php } else { ?>
								<h3 class="text-center text-muted">No Articles Available</h3>
								<?php } ?>
							</div>
							<hr/>
							<div class="featured-article-wrap">
								<h2 class="featured-article-header">Featured Articles</h2>
								<div class="article-wrapper">
									<?php if($featured) { ?>
									<div class="row">
										<?php
										foreach($featured as $blog) {
				    						$blog_thumb = ($blog->featured_image != NULL) ? base_url($blog->featured_image) : base_url('build/images/placeholder.jpg');
				    						$content_excerpt = truncate(($blog->excerpt != NULL) ? $blog->excerpt : $blog->content, 80);
										?>
										<div class="col-md-4">
											<div class="article-item">
												<div class="article-thumb">
													<img src="<?php echo $blog_thumb; ?>" class="img-responsive" alt="<?php echo $blog->title; ?>" />
												</div>
												<div class="article-details">
													<h4 class="article-title"><?php echo $blog->title; ?></h4>
													<div class="article-excerpt">
														<p><?php echo $content_excerpt; ?>. <a href="<?php echo base_url($blog->slug); ?>">Read more</a></p>
														<div class="article-category">
									                		<?php echo category($blog->category); ?>
									                	</div>
													</div>
												</div>
											</div>
										</div>
										<?php } ?>
									</div>
									<?php } else { ?>
									<h3 class="text-center text-muted">No Featured Articles Available</h3>
									<?php } ?>
								</div>
							</div>
							<hr/>
							<div class="other-article-wrap">
								<h2 class="other-article-header">Other Articles</h2>
								<?php if($other) { ?>
								<div class="article-wrapper">
									<?php
									foreach($featured as $blog) {
			    						$blog_thumb = ($blog->featured_image != NULL) ? base_url($blog->featured_image) : base_url('build/images/placeholder.jpg');
			    						$content_excerpt = truncate(($blog->excerpt != NULL) ? $blog->excerpt : $blog->content, 200);
									?>
									<div class="article-item">
										<div class="row">
											<div class="col-md-4">
												<div class="article-thumb">
													<img src="<?php echo $blog_thumb; ?>" class="img-responsive" alt="<?php echo $blog->title; ?>" />
												</div>
											</div>
											<div class="col-md-8">
												<div class="article-details">
													<h4 class="article-title"><?php echo $blog->title; ?></h4>
													<small class="article-meta">Posted on <?php echo date_proper($blog->created_at); ?></small>
													<div class="article-body">
														<p><?php echo $content_excerpt; ?>. <a href="<?php echo base_url($blog->slug); ?>">Read more</a></p>
														<div class="article-category">
									                		<?php echo category($blog->category); ?>
									                	</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php } ?>
								</div>
								<?php } else { ?>
								<h3 class="text-center text-muted">No Articles Available</h3>
								<?php } ?>
							</div>
							<a href="<?php echo base_url('blog/all'); ?>" class="btn btn-success">View All Articles&nbsp;&nbsp;<i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="aside">
						<?php include('partials/widget-aside-social.php'); ?>
						<?php include('partials/widget-aside-services.php'); ?>
						<?php include('partials/widget-aside-menu.php'); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>