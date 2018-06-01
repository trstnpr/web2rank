<div class="pages-section">

	<section class="section-header">
		
		<div class="container-fluid">
			
			<div class="page-title">
				<h1>Import State <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#import_guide">See Guide</button></h1>
			</div>

			<div class="breadcrumb-wrap">
				<ol class="breadcrumb">
					<li><a href="<?php echo base_url('admin'); ?>">Admin</a></li>
					<li><a href="<?php echo base_url('admin/states'); ?>">States</a></li>
					<li class="active">Import</li>
				</ol>
			</div>

		</div>

	</section>

	<section class="section-content">
		
		<div class="container-fluid">

			<div class="well">

				<form class="stateimport-form" method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/state/import/process'); ?>">

					<div class="form-group">
						<label>File Input</label>
						<input type="file" name="states" accept=".csv" required />
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
										<th>B - State Name</th>
										<th>C - Abbreviation</th>
										<th>D - Description</th>
										<th>E - Meta Keyword</th>
										<th>F - Meta Description</th>
									</tr>
									<tr>
										<th>1</th>
										<td class="text-warning">Leave as Blank</td>
										<td>California</td>
										<td>CA</td>
										<td>Lorem impsum dolor sit amet</td>
										<td class="text-danger">Lorem impsum dolor sit amet</td>
										<td class="text-danger">Lorem impsum dolor sit amet</td>
									</tr>
									<tr>
										<th>2</th>
										<td class="text-warning">Leave as Blank</td>
										<td>Florida</td>
										<td>FL</td>
										<td>Lorem impsum dolor sit amet</td>
										<td class="text-warning">Can be empty except the FIRST ROW</td>
										<td class="text-warning">Can be empty except the FIRST ROW</td>
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