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
    <p class="card-text">Need some text here</p>

		<?php if ($logbooks->num_rows() > 0) { ?>

<?php if($current_default == 0) { ?>
<div class="alert alert-danger" role="alert">
  Attention you need to set an default logbook
</div>
<?php } ?>

<?php if($current_active == 0) { ?>
<div class="alert alert-danger" role="alert">
  Attention you need to set an active logbook
</div>
<?php } ?>

		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">Logbook Name</th>
					<th scope="col"></th>
					<th scope="col"></th>
	
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($logbooks->result() as $row) { ?>
				<tr>
					<td><?php echo $row->logbook_name;?></td>
					<td>
						<?php if($row->default_logbook != 1) { ?>			
							<a href="<?php echo site_url('logbooks/set_default/').$current_default."/".$row->id; ?>" class="btn btn-outline-secondary btn-sm" onclick="return confirm('Are you sure you want to make logbook Logbook <?php echo $row->logbook_name; ?> the default?');">Set Default</a>
						<?php } else { ?>
							<span class="badge badge-success">Default Logbook</span>
						<?php } ?>
					</td>
					<td>
						<?php if($row->active_logbook != 1) { ?>			
							<a href="<?php echo site_url('logbooks/set_active/').$current_active."/".$row->id; ?>" class="btn btn-outline-secondary btn-sm btn-sm" onclick="return confirm('Are you sure you want to make logbook Logbook <?php echo $row->logbook_name; ?> the default?');">Set Active</a>
						<?php } else { ?>
							<span class="badge badge-success">Active Logbook</span>
						<?php } ?>
					</td>
					<td>



					</td>
					<td></td>
					<td><a href="<?php echo site_url('logbooks/delete')."/".$row->id; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want delete Logbook <?php echo $row->logbook_name; ?>?');"><i class="fas fa-trash-alt"></i> Delete</a></td>
				</tr>	
				<?php } ?>
			</tbody>
		<table>
		<?php } ?>

		<p><a href="<?php echo site_url('logbooks/create'); ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Create a Logbook</a></p>

		#Need a script here to see if the log has any QSOs with no logbooks#
  </div>
</div>


</div>