<!DOCTYPE html>

<html lang="en">

    <head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />

        <title><?php echo $title; ?></title>

        <!-- Favicon -->
        <link rel="icon" type = "image / x-icon" href="<?php echo base_url('build/images/favicon/favicon-32x32.png'); ?>" sizes="32x32" />
        <link rel="icon" type = "image / x-icon" href="<?php echo base_url('build/images/favicon/favicon-192x192.png'); ?>" sizes="192x192" />
        <link rel="apple-touch-icon-precomposed" type = "image / x-icon" href="<?php echo base_url('build/images/favicon/favicon-180x180.png'); ?>" />
        <meta name="msapplication-TileImage" type = "image / x-icon" content="<?php echo base_url('build/images/favicon/favicon-270x270.png'); ?>" />

        <link href="<?php echo base_url('build/css/admin_styles.css?v=1'); ?>" rel="stylesheet">

    </head>

    <body>

		<section class="admin-login-section">

			<div class="container">

			    <div class="row">

			        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">

			        	<div class="login-wrap">

				            <form role="form" class="admin-login" method="post" action="<?php echo base_url('admin/login/process'); ?>">
								<div class="form-group text-center">
									<div class="logo">
										<img src="<?php echo base_url('build/images/logo-2.png'); ?>" class="img-responsive center-block" />
									</div>
								</div>
								<br/>
								<div class="form-group">
									<input type="text" class="form-control input-lg username" name="username" placeholder="Enter username">
								</div>
								<div class="form-group">
									<input type="password" class="form-control input-lg password" name="password" placeholder="Enter password">
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-success btn-lg btn-block btn-login">Login</button>
								</div>
				            </form>

				        </div>

				        <a href="<?php echo base_url(); ?>" class="center-block txt-center"><i class="fa fa-long-arrow-left"></i> Back to Home</a>

			        </div>

			    </div>

			</div>


		</section>
	
        <script type="text/javascript" src="<?php echo base_url('build/js/master-scripts.js?v=1'); ?>"></script>
        <script src="<?php echo base_url('bower_components/tinymce/tinymce.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('build/js/admin_scripts.js?v=1'); ?>"></script>

        <script type="text/javascript">


        </script>

    </body>

</html>