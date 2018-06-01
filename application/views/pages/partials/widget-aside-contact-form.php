<div class="panel widget widget-contact">

	<div class="panel-heading widget-header">Contact Us</div>

	<div class="panel-body widget-body">
		
		<form class="form-contact" method="post" data-action="<?php echo base_url('contact/send'); ?>">

			<input type="hidden" name="ip" value="<?php echo get_ip(); ?>" />
					
			<div class="form-group">
				<input type="text" class="form-control" name="name" placeholder="NAME" required />
			</div>

			<div class="form-group">
				<input type="email" class="form-control" name="email" placeholder="EMAIL" required />
			</div>
			
			<div class="form-group">
				<input type="text" class="form-control" name="subject" placeholder="SUBJECT" required />
			</div>

			<div class="form-group">
				<textarea class="form-control" name="message" placeholder="MESSAGE" rows="5"></textarea>
			</div>


			<div class="form-group">
				<div class="g-recaptcha" data-sitekey="<?php echo the_config('gr_site_key'); ?>"></div>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-success btn-contact btn-send">Send&nbsp;&nbsp;<i class="fa fa-paper-plane"></i></button>
			</div>

		</form>

	</div>
</div>