<div class="pages-section">

	<section class="section-header">
		
		<div class="container-fluid">
			
			<div class="page-title">
				<h1>Configurations</button></h1>
			</div>

			<div class="breadcrumb-wrap">
				<ol class="breadcrumb">
					<li><a href="<?php echo base_url('admin'); ?>">Admin</a></li>
					<li class="active">Configuration</li>
				</ol>
			</div>

		</div>

	</section>

	<section class="section-content">
		
		<div class="container-fluid">

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Site Configurations</strong></h3>
				</div>
				<div class="panel-body">

				<?php if($config != 0) { ?>

					<form class="form-horizontal config-form" method="post" action="<?php echo base_url('admin/configuration/update'); ?>">

						<?php foreach($config as $conf) { ?>	
					    <div class="form-group">
					        <label class="col-sm-2 control-label"><?php echo $conf->label; ?></label>
					        <label class="col-sm-2 control-label"><?php echo $conf->key; ?></label>
					        <div class="col-sm-8">
					        <?php if($conf->input_type == 'text' OR $conf->input_type == 'password') { ?>
					            <input type="<?php echo $conf->input_type; ?>" class="form-control" placeholder="<?php echo $conf->description; ?>" name="config[<?php echo $conf->key; ?>][]" value="<?php echo $conf->value; ?>" />
					        <?php } else { ?>
					        	<textarea class="form-control" placeholder="<?php echo $conf->description; ?>" rows="3" name="config[<?php echo $conf->key; ?>][]"><?php echo $conf->value; ?></textarea>
					        <?php } ?>
					        </div>
					    </div>
						<?php } ?>

						<div class="form-group">
							<div class="col-sm-offset-4 col-sm-8">
								<button type="submit" class="btn btn-primary btn-config">Save Configurations</button>
							</div>
						</div>

					</form>

				<?php } ?>

				</div>
				
			</div>

		</div>

	</section>

</div>