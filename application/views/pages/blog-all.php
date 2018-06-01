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
							<div class="all-article-wrap">
								<div class="article-wrapper">
									<?php
				    				if($blogs->result()) {
				    					foreach($blogs->result() as $blog) {
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
														<p><?php echo $content_excerpt; ?> <a href="<?php echo base_url($blog->slug); ?>">Read more</a></p>
														<div class="article-category">
									                		<?php echo category($blog->category); ?>
									                	</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php
				    					}
				                        if (strlen($pagination)) {
				                            echo $pagination;
				                        }
				    				} else { ?>
				                    <h2 class="text-muted text-center">No Blog Posts Available</h2>
				                    <?php } ?>
								</div>
							</div>

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