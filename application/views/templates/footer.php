		</main>

		<footer class="footer">

			<div class="container">

				<div class="footer-top">

					<div class="footer-content">
						
						<div class="row">

							<div class="col-md-3">

								<div class="footer-item footer-link">

									<div class="footer-header">
										<h4>Quick Links</h4>
									</div>

									<div class="footer-content">
										
										<ul class="menu">

											<li><a href="<?php echo base_url(); ?>"><i class="fa fa-chevron-right"></i> Home</a></li>
											<li><a href="<?php echo base_url('services'); ?>"><i class="fa fa-chevron-right"></i> Services</a></li>
											<li><a href="<?php echo base_url('blog'); ?>"><i class="fa fa-chevron-right"></i> Blog</a></li>
											<li><a href="<?php echo base_url('about-us'); ?>"><i class="fa fa-chevron-right"></i> About Us</a></li>
											<li>
												<?php if(current_url() == base_url()) { ?>
			                                    <a class="smooth-scroll" href="#contact_us"><i class="fa fa-chevron-right"></i> Contact Us</a>
			                                    <?php } else { ?>
			                                    <a href="<?php echo base_url('contact-us'); ?>"><i class="fa fa-chevron-right"></i> Contact Us</a>
			                                    <?php } ?>
											</li>
											<li><a href="<?php echo base_url('our-commitment-to-privacy'); ?>"><i class="fa fa-chevron-right"></i> Privacy Policy</a></li>
            								<li><a href="<?php echo base_url('terms-and-conditions'); ?>"><i class="fa fa-chevron-right"></i> Terms & Conditions</a></li>
										</ul>

									</div>

								</div>

							</div>

							<div class="col-md-3">

								<div class="footer-item footer-services">

									<div class="footer-header">
										<h4>Services</h4>
									</div>

									<div class="footer-content">
										<ul class="menu">
											<li><a href="<?php echo base_url('web-design-and-development'); ?>"><i class="fa fa-chevron-right"></i> Web Design and Development</a></li>
	                                        <li><a href="<?php echo base_url('digital-marketing'); ?>"><i class="fa fa-chevron-right"></i> Digital Marketing</a></li>
	                                        <li><a href="<?php echo base_url('web-server-management'); ?>"><i class="fa fa-chevron-right"></i> Web Server Management</a></li>
	                                        <li><a href="<?php echo base_url('virtual-assistant'); ?>"><i class="fa fa-chevron-right"></i> Virtual Assistant</a></li>
	                                        <!-- <li><a href="<?php //echo base_url('become-an-affiliate'); ?>"><i class="fa fa-chevron-right"></i> Become an Affiliate</a></li> -->
										</ul>
									</div>

								</div>

							</div>

							<div class="col-md-3">

								<div class="footer-item footer-info">

									<div class="footer-header">
										<h4>Informations</h4>
									</div>

									<div class="footer-content">

										<p class="noselect"><i class="fa fa-map-marker"></i> <?php echo the_config('full_address'); ?></p>

										<p class="noselect"><i class="fa fa-phone"></i> <?php echo the_config('phone_number'); ?></p>

										<p class="noselect"><i class="fa fa-mobile"></i> <?php echo the_config('mobile_number_1'); ?></p>

										<p class="noselect"><i class="fa fa-mobile"></i> <?php echo the_config('mobile_number_2'); ?></p>

										<p class="noselect"><i class="fa fa-paper-plane"></i> <?php echo the_config('admin_email'); ?></p>

									</div>

								</div>

							</div>

							<div class="col-md-3">

								<div class="footer-item footer-about">
									<div class="footer-header">
										<h4>About</h4>
									</div>
									<div class="footer-content">
										<p><?php echo the_config('tag_line'); ?></p>

									</div>
									<div class="footer-brand"> 
										<a href="<?php echo base_url(); ?>">

											<img src="<?php echo base_url('build/images/logo-1.png'); ?>" class="img-responsive" alt="<?php echo the_config('site_name'); ?>" title="<?php echo the_config('site_name'); ?>" />

										</a>
									</div>

								</div>

							</div>

						</div>

					</div>

				</div>

				<hr/>

				<div class="footer-bottom text-center">

					<div class="social-wrap">
								
						<ul class="social-list list-inline">
							
							<li><a href="<?php echo the_config('facebook_link'); ?>"><i class="fa fa-facebook text-muted fa-fw fa-2x"></i></a></li>

							<li><a href="<?php echo the_config('linkedin_link'); ?>"><i class="fa fa-linkedin text-muted fa-fw fa-2x"></i></a></li>

							<li><a href="<?php echo the_config('youtube_link'); ?>"><i class="fa fa-youtube-play text-muted fa-fw fa-2x"></i></a></li>

							<li><a href="<?php echo the_config('twitter_link'); ?>"><i class="fa fa-twitter text-muted fa-fw fa-2x"></i></a></li>

							<li><a href="<?php echo the_config('instagram_link'); ?>"><i class="fa fa-instagram text-muted fa-fw fa-2x"></i></a></li>

							<li><a href="<?php echo the_config('pinterest_link'); ?>"><i class="fa fa-pinterest text-muted fa-fw fa-2x"></i></a></li>

						</ul>

					</div>

					<br/>

					<p><?php echo date('Y'); ?> &copy; Web2Rank. All Rights Reserved.</p>

				</div>

			</div>

		</footer>

        <script type="text/javascript" src="<?php echo base_url('build/js/master-scripts.js?v=1.').strtotime('now'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('build/js/scripts.js?v=1.').strtotime('now'); ?>"></script>

        <?php if(current_url() == base_url('become-an-affiliate')) { ?>

        <script>
        	
        	$(document).ready(function() {

        		$('.create-token').on('submit', function(e) {
				    e.preventDefault();

				    var token_form = $(this);
				    var token_action = token_form.data('action');
				    var token_trigger = $('.btn-token');
				    
				    $.ajax({
				        url: token_action,
				        type: 'POST',
				        data: new FormData(this),
				        contentType: false,
				        cache: false,
				        processData: false,
				        beforeSend: function() {
				            token_trigger.prop('disabled', true).html('Generating ...');
				        },
				        error: function(data){
				            if(data.readyState == 4){
				                errors = JSON.parse(data.responseText);
				            }
				        },
				        success: function(data) {
				            var msg = JSON.parse(data);
				            if(msg.result == 'success'){
				                alertify.success(msg.message);
				                token_trigger.html('Generate Token').prop('disabled', false);
				                $('.referral-canvass').html(msg.link).show();
				                token_form[0].reset();
				            } else {
				                alertify.error(msg.message);
				                token_trigger.html('Generate Token').prop('disabled', false);
				                token_form[0].reset();
				            }
				        }
				    });

				});

        	});

        </script>

        <?php } ?>

<style type="text/css">
   #cookie-law-alert {
    width: 100%;
    position: fixed;
    bottom: 0;
    background: rgba(0, 0, 0, 0.75);
    z-index: 99999999;
    padding:10px 0;
   
   }

   #cookie-law-alert p {
     color: #FFF;
     margin: 0;
     font-size: 16px;
   }

   #cookie-law-alert a {
    color: #7caf26;
   }

   #cookie-law-alert .clr-right {
   	text-align: right;
   }

   #btn-agree-cookie {
		padding: 10px 20px;
		font-size: 18px;
		border: 2px solid #f5921d;
		background-color: #f5921d;
		color: #fff;
		border-radius: 99px;
		margin-top: 10px;
   }

</style>

<div id="cookie-law-alert">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <p>Our website (www.web2rankphil.com) uses cookies to provide better browsing experience to every visitor. Please be reminded that every user who continuously use our website automatically abide by our privacy policy and use of such cookies. Learn more by <a href="<?php echo base_url('our-commitment-to-privacy'); ?>" target="_blank">clicking here</a>.</p>
            </div>
            <div class="col-md-3 clr-right">
               <button id="btn-agree-cookie">I AGREE!</button>
            </div>
        </div>
    </div>
</div>

<script>

window.onload = function() {
	//alert("yahahah");
    checkCookie();
}

function setCookie(cname,cvalue,exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie() {
    var agree=getCookie("cookie");
    
    if(agree) {
    	$('#cookie-law-alert').remove();
    } 

}


$('#btn-agree-cookie').on('click', function() {
	$('#cookie-law-alert').remove();
	setCookie('cookie', 1, 1);
});

</script>

    </body>

</html>