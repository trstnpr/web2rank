<div class="panel panel-default widget widget-information">
	<div class="panel-heading widget-header">Information</div>
	<div class="panel-body widget-body">
		<ul class="fa-ul info-list">
			<li>
				<i class="fa fa-li fa-map-marker"></i> <?php echo the_config('full_address'); ?>
			</li>

		</ul>
		
		<ul class="fa-ul info-list">
			<li class="noselect">
				<i class="fa fa-li fa-phone"></i> <?php echo the_config('phone_number'); ?>
			</li>

		</ul>

		<ul class="fa-ul info-list">
			<li class="noselect">
				<i class="fa fa-li fa-mobile"></i> <?php echo the_config('mobile_number_1'); ?>
			</li>

		</ul>

		<ul class="fa-ul info-list">
			<li class="noselect">
				<i class="fa fa-li fa-mobile"></i> <?php echo the_config('mobile_number_2'); ?>
			</li>

		</ul>

		<ul class="fa-ul info-list">

			<li class="noselect">
				<i class="fa fa-li fa-envelope"></i> <?php echo the_config('admin_email'); ?>
			</li>

		</ul>

	</div>
</div>