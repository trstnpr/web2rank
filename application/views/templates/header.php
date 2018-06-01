<?php sess_expire(); ?>
<!DOCTYPE html>
<html lang="en">

    <head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />

        <!-- Favicon -->
        <link rel="icon" type = "image / x-icon" href="<?php echo base_url('build/images/favicon/favicon-32x32.png'); ?>" sizes="32x32" />
        <link rel="icon" type = "image / x-icon" href="<?php echo base_url('build/images/favicon/favicon-192x192.png'); ?>" sizes="192x192" />
        <link rel="apple-touch-icon-precomposed" type = "image / x-icon" href="<?php echo base_url('build/images/favicon/favicon-180x180.png'); ?>" />
        <meta name="msapplication-TileImage" type = "image / x-icon" content="<?php echo base_url('build/images/favicon/favicon-270x270.png'); ?>" />

        <title><?php echo $title; ?></title>

        <!-- META -->
        <meta name="title" content="<?php echo $meta_title; ?>">
        <meta name="keywords" content="<?php echo $meta_keyword; ?>">
        <meta name="description" content="<?php echo $meta_description; ?>">
        <meta name="robots" content="index, follow" />
        <!-- OG META -->
        <meta property="og:site_name" content="<?php echo the_config('site_name'); ?>">
        <meta property="og:title" content="<?php echo $title; ?>" />
        <meta property="og:description" content="<?php echo $meta_description; ?>" />
        <meta property="og:image" itemprop="image" content="<?php echo base_url('build/images/web2rank-profile.jpg'); ?>">
        <meta property="og:url" content="<?php echo current_url(); ?>" />
        <meta property="og:type" content="website" />

        <meta name="p:domain_verify" content="358de8224b0a4d9aa3905714c0a1c734"/>

        <link href="<?php echo base_url('build/css/styles.css?v=1.').strtotime('now'); ?>" rel="stylesheet">

        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', '<?php echo the_config('ga_id'); ?>', 'auto');
            ga('send', 'pageview');
        </script>

        <script src='https://www.google.com/recaptcha/api.js'></script>

    </head>


    <body>

		<div class="navbar-wrapper">

            <header class="navbar main-menu">

                <div class="navbar-extra-top clearfix hidden-xs">
                    <div class="navbar container">
                        <div class="navbar-top-right">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#"><i class="fa fa-phone fa-fw"></i> Call us <?php echo the_config('phone_number'); ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="collapse-md main-nav" id="navbar-main-container">
                    <div class="container">
                        <div class="navbar-header">
                            <a href="<?php echo base_url(); ?>" class="navbar-brand">
                                <img class="img-responsive hidden-xs" alt="<?php echo the_config('site_name'); ?>" title="<?php echo the_config('site_name'); ?>" src="<?php echo base_url('build/images/logo-sh.png'); ?>"/>
                                <img class="img-responsive visible-xs" alt="<?php echo the_config('site_name'); ?>" title="<?php echo the_config('site_name'); ?>" src="<?php echo base_url('build/images/logo-fff.png'); ?>"/>
                                <span class="sr-only">BRAND</span>
                            </a>
                            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbar-main">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <nav class="navbar-collapse collapse" id="navbar-main" style="height: 1px;">
                            <ul class="nav navbar-nav">
                                <li><a class="menu" href="<?php echo base_url(); ?>">Home</a></li>
                                <li><a class="menu" href="<?php echo base_url('blog'); ?>">Blog</a></li>
                                <li><a class="menu" href="<?php echo base_url('about-us'); ?>">About Us</a></li>
                                <li class="dropdown">
                                    <a href="<?php echo base_url('services'); ?>" class="dropdown-toggle menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services <span class="caret"></span></a>  
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url('web-design-and-development'); ?>">Web Design and Development</a></li>
                                        <li><a href="<?php echo base_url('digital-marketing'); ?>">Digital Marketing</a></li>
                                        <li><a href="<?php echo base_url('web-server-management'); ?>">Web Server Management</a></li>
                                        <li><a href="<?php echo base_url('virtual-assistant'); ?>">Virtual Assistant</a></li>
                                    </ul>

                                </li>
                                
                                <li>
                                    <?php if(current_url() == base_url()) { ?>
                                    <a class="menu smooth-scroll" href="#contact_us">Contact Us</a>
                                    <?php } else { ?>
                                    <a class="menu" href="<?php echo base_url('contact-us'); ?>">Contact Us</a>
                                    <?php } ?>
                                </li>
                                <!-- <li><a class="menu" href="<?php //echo base_url('our-commitment-to-privacy'); ?>">Privacy Policy</a></li>
                                <li><a class="menu" href="<?php //echo base_url('terms-and-conditions'); ?>">Terms & Conditions</a></li> -->
                                
                            </ul>

                            <ul class="nav navbar-nav navbar-right social-menu hidden-xs">
                                <li><a class="menu" href="<?php echo the_config('facebook_link'); ?>"><i class="fa fa-facebook fa-fw"></i></a></li>
                                <li><a class="menu" href="<?php echo the_config('linkedin'); ?>"><i class="fa fa-linkedin fa-fw"></i></a></li>
                                <li><a class="menu" href="<?php echo the_config('youtube_link'); ?>"><i class="fa fa-youtube-play text-muted fa-fw fa-2x"></i></a></li>
                                <li><a class="menu" href="<?php echo the_config('twitter_link'); ?>"><i class="fa fa-twitter fa-fw"></i></a></li>
                                <li><a class="menu" href="<?php echo the_config('instagram_link'); ?>"><i class="fa fa-instagram fa-fw"></i></a></li>
                                <li><a class="menu" href="<?php echo the_config('pinterest_link'); ?>"><i class="fa fa-pinterest fa-fw"></i></a></li>
                                
                            </ul>
                        </nav>
                    </div>
                </div>
                
            </header>

        </div>

        <div class="border-shadow-left hidden-sm hidden-xs data-img" data-bg="<?php echo base_url('build/images/shadow-left.png'); ?>"></div>

        <div class="border-shadow-right hidden-sm hidden-xs data-img" data-bg="<?php echo base_url('build/images/shadow-right.png'); ?>"></div>

        <main>