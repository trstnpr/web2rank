<div class="page-content">

	<section class="section-banner data-img" data-bg="<?php echo base_url('build/images/banner/banner-page.jpg'); ?>">
		
		<div class="overlay">

			<div class="container">
				
				<h1 class="page-title"><?php echo $page->title; ?></h1>

			</div>

		</div>

	</section>

	<section class="section-page">

		<div class="container">

			<div class="row">
			
				<div class="col-md-8 col-md-offset-2">

					<div class="section-content">

						<h2 class="section-title"><?php echo $page->title; ?></h2>

						<?php 
							if($page->featured_image != NULL) {
								$page_thumb = ($page->featured_image != NULL) ? base_url($page->featured_image) : base_url('build/images/placeholder.jpg');
						?>
						<div class="page-thumb">
							<img src ="<?php echo $page_thumb; ?>" class="img-responsive" alt="<?php echo $page->title; ?>" title="<?php echo $page->title; ?>" />
						</div>
						<?php } ?>

						<div class="content-wrap">
							
							<?php echo $page->content; ?>

							
							<div class="referral-canvass text-center" title="Your refferral link">

								<?php echo base_url(); ?>

							</div>

							<div class="panel panel-success form-refer">

								<div class="panel-heading">
									Create your Referral link
								</div>

								<div class="panel-body">
								
									<form class="create-token" method="post" data-action="<?php echo base_url('affiliate/generate'); ?>">

										<div class="row">

											<div class="col-md-6">
										
												<div class="form-group">
													
													<label for="email">Email</label>
													<input type="email" class="form-control input-lg" name="email" placeholder="Your email address" required />

												</div>

											</div>

											<div class="col-md-6">

												<label for="name">Name</label>
												<input type="text" class="form-control input-lg" name="name" placeholder="Your name" required />

											</div>

											<div class="col-md-12">

												<div class="form-group">

													<button type="submit" class="btn btn-primary btn-lg btn-token">Generate Token</button>

												</div>

											</div>

										</div>

									</form>

								</div>

							</div>

							<hr/>

						</div>

					</div>
					
				</div>
				

			</div>

		</div>

	</section>

</div>