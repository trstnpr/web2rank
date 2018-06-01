<div class="pages-section">

	<section class="section-header">
		
		<div class="container-fluid">
			
			<div class="page-title">
				<h1>Import City <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#import_guide">See Guide</button></h1>
			</div>

			<div class="breadcrumb-wrap">
				<ol class="breadcrumb">
					<li><a href="<?php echo base_url('admin'); ?>">Admin</a></li>
					<li><a href="<?php echo base_url('admin/cities'); ?>">Cities</a></li>
					<li class="active">Import</li>
				</ol>
			</div>

		</div>

	</section>

	<section class="section-content">
		
		<div class="container-fluid">

			<div class="well">

				<form class="cityimport-form" method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/city/import/process'); ?>">

					<div class="form-group">
						<label>File Input</label>
						<input type="file" name="city" accept=".csv" required />
						<p class="help-block">Import state csv</p>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-success btn-import">Import</button>
					</div>

				</form>

			</div>

			<div class="well logs" style="display:none;">
				
				<h2>LOGS <button class="btn btn-xs btn-warning clear-logs" title="Clear Import Logs">CLEAR LOGS</button></h2>

				<br/>

				<div class="logs-wrap" style="max-height:300px;overflow-y:scroll;">

				</div>

			</div>

			<div class="modal fade" id="import_guide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			    <div class="modal-dialog modal-lg" role="document">
			        <div class="modal-content">
			            <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
			                </button>
			                <h4 class="modal-title" id="myModalLabel">Import Guide</h4>
			            </div>
			            <div class="modal-body">
			            	<div class="table-responsive">
					
								<table class="table table-bordered">
									<tr>
										<th width="5%"></th>
										<th>A - ID</th>
										<th>B - City</th>
										<th>C - State</th>
										<th>D - Content</th>
										<th>E - Phone</th>
										<th>F - Area Code</th>
										<th>G - Zip Codes</th>
										<th>H - Latitude(X)</th>
										<th>I - Longitude(Y)</th>
										<th>J - Major City</th>
									</tr>
									<tr>
										<th>1</th>
										<td class="text-warning">Leave as Blank</td>
										<td>Los Angeles</td>
										<td>CA</td>
										<td>Lorem impsum dolor sit amet</td>
										<td>(706) 489-6436</td>
										<td>706</td>
										<td>30707</td>
										<td class="text-danger">34.8712</td>
										<td class="text-danger">-85.2908</td>
										<td>0 (1 if major)</td>
									</tr>
									<tr>
										<th>2</th>
										<td class="text-warning">Leave as Blank</td>
										<td>Miami</td>
										<td>FL</td>
										<td class="text-warning">Can be empty except the FIRST COLUMN</td>
										<td>(706) 489-6436</td>
										<td>706</td>
										<td>30707</td>
										<td class="text-warning">Can be empty except the FIRST COLUMN</td>
										<td class="text-warning">Can be empty except the FIRST COLUMN</td>
										<td>0 (1 if major)</td>
									</tr>
								</table>

							</div>
			            </div>
			            <div class="modal-footer">
			                <button type="button" class="btn btn-success" data-dismiss="modal">Got It</button>
			            </div>
			        </div>
			    </div>
			</div>

		</div>

	</section>

</div>