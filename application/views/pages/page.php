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
			
				<div class="col-md-8">

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

							<hr/>

						</div>

						<div class="content-contact-cta">
							<div class="row">
								<div class="col-md-9">
									<h4 class="text-cta">Any queries and concerns? Feel free to Contact Us</h4>
								</div>
								<div class="col-md-3">
									<a href="<?php echo base_url('contact-us') ?>" class="btn btn-primary btn-block btn-cta">Contact Us</a>
								</div>
							</div>
						</div>

					</div>
					
				</div>
				
				<div class="col-md-4">

					<div class="aside">

						<?php include('partials/widget-aside-contact-form.php'); ?>

						<?php include('partials/widget-aside-social.php'); ?>
					
						<?php include('partials/widget-aside-menu.php'); ?>

						<?php include('partials/widget-aside-services.php'); ?>

					</div>

				</div>

			</div>

		</div>

	</section>

</div>