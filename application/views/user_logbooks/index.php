<div class="container">

<br>
	<?php if($this->session->flashdata('message')) { ?>
		<!-- Display Message -->
		<div class="alert-message error">
		  <p><?php echo $this->session->flashdata('message'); ?></p>
		</div>
	<?php } ?>

<div class="card">
  <div class="card-header">
    <?php echo $page_title; ?>
  </div>
  <div class="card-body">
    <p class="card-text">Logbooks are your overall store for QSOs, we could recommend creating one per callsign you have.</p>

		<?php if ($logbooks->num_rows() > 0) { ?>

		<?php if($current_active == 0) { ?>
		<div class="alert alert-danger" role="alert">
		  Attention you need to set an active logbook
		</div>
		<?php } ?>

		<?php if($is_there_logbook_qsos == 0) { ?>
			<div class="alert alert-danger" role="alert">
		  		<span class="badge badge-pill badge-warning">Warning</span> It looks like you already have QSOs in your logbook as your a current user, you need to assign these to a logbook by clicking the "Assign QSOs" button next to your logbook choice.
			</div>
		<?php } ?>

		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">Logbook Name</th>
					<th scope="col">Logbook QSOs</th>
					<th scope="col"></th>
					<?php if($is_there_logbook_qsos == 0) { ?>
					<th scope="col">Assign</th>
					<?php } ?>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($logbooks->result() as $row) { ?>
				<tr>
					<td><?php echo $row->logbook_name;?></td>
					<td><?php echo $row->qso_total;?></td>
					<td>
						<?php if($row->active_logbook != 1) { ?>			
							<a href="<?php echo site_url('logbooks/set_active/').$current_active."/".$row->id; ?>" class="btn btn-outline-secondary btn-sm btn-sm" onclick="return confirm('Are you sure you want to make logbook <?php echo $row->logbook_name; ?> the active logbook?');">Set Active</a>
						<?php } else { ?>
							<span class="badge badge-success">Active Logbook</span>
						<?php } ?>
					</td>

					<?php if($is_there_logbook_qsos == 0) { ?>
					<td>
						<a href="<?php echo site_url('logbooks/assign_qsos/').$row->id; ?>" class="btn btn-outline-secondary btn-sm" onclick="return confirm('Are you sure you want to assign your QSOs to the Logbook <?php echo $row->logbook_name; ?>?');">Assign QSOs</a>
					</td>
					<?php } ?>

					<td><a href="<?php echo site_url('logbooks/delete')."/".$row->id; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want delete Logbook <?php echo $row->logbook_name; ?>?');"><i class="fas fa-trash-alt"></i> Delete</a></td>
				</tr>	
				<?php } ?>
			</tbody>
		<table>
		<?php } ?>

		<p><a href="<?php echo site_url('logbooks/create'); ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Create a Logbook</a></p>
  </div>
</div>


</div>