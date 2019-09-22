
<div class="container" id="create_station_profile">

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
    <h5 class="card-title"></h5>
    <p class="card-text"></p>

		<?php if($this->session->flashdata('notice')) { ?>
			<div id="message" >
			<?php echo $this->session->flashdata('notice'); ?>
			</div>
		<?php } ?>

		<?php $this->load->helper('form'); ?>

		<?php echo validation_errors(); ?>

		<form method="post" action="<?php echo site_url('logbooks/create'); ?>" name="create_logbook">
			<div class="form-group">
			    <label for="logbookName">Logbook Name</label>
			    <input type="text" class="form-control" name="logbookName" id="logbookName" aria-describedby="logbookName" placeholder="2M0SQL" required>
			    <small id="stationNameInputHelp" class="form-text text-muted">Name for your Logbook this can be a callsign or anything you like.</small>
			</div>

			<button type="submit" class="btn btn-primary"><i class="fas fa-plus-square"></i> Create Logbook</button>
		</form>
  </div>
</div>

<br>

</div>