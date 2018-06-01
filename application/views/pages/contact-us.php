<div class="contact-content">

	<section class="section-banner data-img" data-bg="<?php echo base_url('build/images/banner/banner-page.jpg'); ?>">

		<div class="overlay">
		
			<div class="container">
				
				<h1 class="page-title"><?php echo $page->title; ?></h1>

			</div>

		</div>

	</section>

	<section class="section-contact">
		
		<div class="container">

			<div class="row">

				<div class="col-md-8">
					
					<div class="section-content">

						<h2 class="section-title"><?php echo $page->title; ?></h2>

						<div class="content-wrap">
							
							<?php echo $page->content; ?>

							<br/>

							<div class="form-wrap">

								<form class="form-horizontal form-contact" method="post" data-action="<?php echo base_url('contact/send'); ?>">

								<input type="hidden" name="ip" value="<?php echo get_ip(); ?>" />

									<div class="form-group">
										<label class="col-sm-2 control-label">Name</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="name" placeholder="Your name ...">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">Email</label>
										<div class="col-sm-10">
											<input type="email" class="form-control" name="email" placeholder="Your email ...">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">Subject</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="subject" placeholder="Your subject ...">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">Message</label>
										<div class="col-sm-10">
											<textarea class="form-control" name="message" placeholder="Your message ..." rows="5"></textarea>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-10">
											<div class="g-recaptcha" data-sitekey="<?php echo the_config('gr_site_key'); ?>"></div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-10">
											<button type="submit" class="btn btn-success btn-send">Send&nbsp;&nbsp;<i class="fa fa-paper-plane"></i></button>
										</div>
									</div>
								</form>
							</div>

						</div>

					</div>

				</div>

				<div class="col-md-4">

					<div class="aside">

						<?php include('partials/widget-aside-information.php'); ?>

						<?php include('partials/widget-aside-social.php'); ?>

						<?php include('partials/widget-aside-menu.php'); ?>

					</div>

				</div>

			</div>

		</div>

	</section>
	
</div>