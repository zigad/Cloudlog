

<div class="container logbook">

	<h2>Logbook</h2>

	<form>
	<select onchange="document.location.href=this.value" id="logbookSelect">
        <option  value="">All Logbooks</option>
		<?php if ($logbook_list->num_rows() > 0) { ?>
			<?php foreach ($logbook_list->result() as $row) { ?>
				<option <?php if ($this->uri->segment(4) == $row->id) { echo "selected"; } ?> <?php if ($this->session->userdata('active_logbook_id') == $row->id) { echo "selected"; } ?> value="<?php echo site_url('logbook/index/0/').$row->id; ?>"><?php echo $row->logbook_name; ?></option>
			<?php } ?>
		<?php } ?>

      <option value="">2</option>
    </select>
	</form>

	<?php if($this->session->flashdata('notice')) { ?>
	<div class="alert alert-info" role="alert">
	  <?php echo $this->session->flashdata('notice'); ?>
	</div>
	<?php } ?>

	
	<!-- Map -->
	<div id="map" style="width: 100%; height: 300px"></div> 

	<?php $this->load->view('view_log/partial/log') ?>
