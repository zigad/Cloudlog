<div id="qsl_card_labels_container" class="container">

<br>
	<?php if($this->session->flashdata('message')) { ?>
		<!-- Display Message -->
		<div class="alert-message error">
		  <p><?php echo $this->session->flashdata('message'); ?></p>
		</div>
	<?php } ?>

<div class="card">
	<h2 class="card-header">QSL Card Labels</h2>

	<div class="card-body">
    	<p class="card-text">I need to write some introduction text to how QSL Card Labels work</p>
    	<a href="#" class="btn btn-outline-primary btn-sm">Create New Label Type</a>

	</div>
</div>

<br><br>

<div class="card">
	<h2 class="card-header">QSL Card Labels Pending</h2>

	<div class="table-responsive">
		<table>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">Callsign</th>
						<th scope="col">Labels Waiting</th>
						<th scope="col">Status</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">2M0SQL</th>
						<td>300</td>
						<td><a href="#" class="btn btn-outline-success btn-sm">Print</a> <a href="#" class="btn btn-outline-info btn-sm">View QSOs</a></td>
					</tr>
				</tbody>
		</table>
	</div>


	<div class="card-body">

	</div>
</div>

</div>