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

    	<div class="page-wrap">

	        <!-- Sidebar -->
	        <div class="sidebar-wrapper">

	            <ul class="sidebar-nav">
	                <li class="sidebar-brand">
	                    <a href="#menu-toggle" class="btn btn-lg menu-toggle">
	                        Administrator
	                    </a>
	                </li>
	                <li>
	                	<a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
	                </li>
	                <li>
	                	<a href="<?php echo base_url(); ?>" target="_blank"><i class="fa fa-eye"></i> View Site</a>
	                </li>
	                <li>
	                    <a href="#page-dropdown" data-toggle="collapse"><i class="fa fa-file-text"></i> Pages</a>
	                    <ul id="page-dropdown" class="collapse list-unstyled side-dropdown">
		                	<li><a href="<?php echo base_url('admin/pages'); ?>"><i class="fa fa-clipboard"></i>All Pages</a></li>
		                	<li><a href="<?php echo base_url('admin/page/new'); ?>"><i class="fa fa-pencil-square-o"></i> New</a></li>
			            </ul>
	                </li>
	                <li>
	                    <a href="#post-dropdown" data-toggle="collapse"><i class="fa fa-thumb-tack"></i> Posts</a>
	                    <ul id="post-dropdown" class="collapse list-unstyled side-dropdown">
		                	<li><a href="<?php echo base_url('admin/posts'); ?>"><i class="fa fa-clipboard"></i>All Posts</a></li>
		                	<li><a href="<?php echo base_url('admin/post/new'); ?>"><i class="fa fa-pencil-square-o"></i> New</a></li>
		                	<li><a href="<?php echo base_url('admin/category'); ?>"><i class="fa fa-sitemap"></i> Categories</a></li>
			            </ul>
	                </li>
	                <li class="hide">
	                    <a href="<?php echo base_url('admin/business'); ?>"><i class="fa fa-building"></i> Business</a>
	                </li>
	                <li class="hide">
	                    <a href="#states-dropdown" data-toggle="collapse"><i class="fa fa-location-arrow"></i> States</a>
	                    <ul id="states-dropdown" class="collapse list-unstyled side-dropdown">
		                	<li><a href="<?php echo base_url('admin/states'); ?>"><i class="fa fa-list"></i>All States</a></li>
		                	<li><a href="<?php echo base_url('admin/state/new'); ?>"><i class="fa fa-pencil-square-o"></i> New</a></li>
		                	<li><a href="<?php echo base_url('admin/state/import'); ?>"><i class="fa fa-upload"></i> Import</a></li>
			            </ul>
	                </li>
	                <li class="hide">
	                    <a href="#cities-dropdown" data-toggle="collapse"><i class="fa fa-map-marker"></i> Cities</a>
	                    <ul id="cities-dropdown" class="collapse list-unstyled side-dropdown">
		                	<li><a href="<?php echo base_url('admin/cities'); ?>"><i class="fa fa-list"></i>All Cities</a></li>
		                	<li><a href="<?php echo base_url('admin/city/new'); ?>"><i class="fa fa-pencil-square-o"></i> New</a></li>
		                	<li><a href="<?php echo base_url('admin/city/import'); ?>"><i class="fa fa-upload"></i> Import</a></li>
			            </ul>
	                </li>
	                <li>
	                    <a href="#settings-dropdown" data-toggle="collapse"><i class="fa fa-wrench"></i> Settings</a>
	                    <ul id="settings-dropdown" class="collapse list-unstyled side-dropdown">
	                    	<li><a href="<?php echo base_url('admin/configuration'); ?>"><i class="fa fa-cog"></i>Configurations</a></li>
		                	<li><a href="<?php echo base_url('admin/user'); ?>"><i class="fa fa-user"></i>User Account</a></li>
			            </ul>
	                </li>
	                <li>
	                    <a href="<?php echo base_url('admin/logout'); ?>"><i class="fa fa-sign-out"></i> Logout</a>
	                </li>
	            </ul>

	        </div>
	        <!-- /#sidebar-wrapper -->

	        <div class="page-content-wrapper">

	        	<section class="menu-drawer-section visible-xs">
		        	<div class="container-fluid">
		        		<a href="#menu-toggle" class="btn btn-success menu-toggle"><i class="fa fa-bars"></i> Menu</a>
		        	</div>
		        </section>