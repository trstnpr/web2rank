<form class="form-contact" method="post" data-action="<?php echo base_url('contact/send'); ?>">

	<input type="hidden" name="ip" value="<?php echo get_ip(); ?>" />

	<div class="row>">

		<div class="col-md-6">
			
			<div class="form-group">
				<label>Name</label>
				<input type="text" class="form-control input-lg" name="name" placeholder="Your name ..." required />
			</div>

		</div>

		<div class="col-md-6">
			
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control input-lg" name="email" placeholder="Your email ..." required />
			</div>

		</div>

		<div class="col-md-12">
			
			<div class="form-group">
				<label>Subject</label>
				<input type="text" class="form-control input-lg" name="subject" placeholder="Your subject ..." required />
			</div>

		</div>

		<div class="col-md-12">

			<div class="form-group">
				<label>Message</label>
				<textarea class="form-control input-lg" name="message" placeholder="Your message ..." rows="5"></textarea>
			</div>

		</div>

		<div class="col-md-12">

			<div class="form-group">
				<label>I am not a robot</label>
				<div class="g-recaptcha" data-sitekey="<?php echo the_config('gr_site_key'); ?>"></div>

			</div>

		</div>

		<div class="col-md-12">
			<div class="form-group">

				<button type="submit" class="btn btn-success btn-contact btn-lg btn-send">Send&nbsp;&nbsp;<i class="fa fa-paper-plane"></i></button>

			</div>
		</div>

	</div> 

	

</form>