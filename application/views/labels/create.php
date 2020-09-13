<div id="qsl_card_labels_container" class="container">

<br>
	<?php if($this->session->flashdata('message')) { ?>
		<!-- Display Message -->
		<div class="alert-message error">
		  <p><?php echo $this->session->flashdata('message'); ?></p>
		</div>
	<?php } ?>

<?php echo validation_errors(); ?>

<form method="post" action="<?php echo site_url('labels/create'); ?>" name="create_label_type">

	<div class="card">
		<h2 class="card-header"><?php echo $page_title; ?></h2>

		<div class="card-body">

			<!-- Label Name Input -->
	    	<div class="form-group">
			    <label for="LabelName">Label Name</label>
			    <input name="label_name" type="text" class="form-control" id="LabelName" aria-describedby="label_nameHelp" placeholder="Code 925041 6x3 Generic Label Sheet">
			    <small id="label_nameHelp" class="form-text text-muted">Label name used for display purposes so pick something meaningful perhaps the label style.</small>
			</div>

			<div class="form-group row">
    			<label class="col-sm-2 col-form-label" for="paperType">Paper Type</label>
			    <div class="col-sm-10">
				    <select name="paper_type" class="form-control" id="paperType">
						<option value="a4">A4</option>
						<option value="letter">Letter</option>
					</select>
			    </div>
  			</div>

  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label" for="measurementType">Measurement used</label>
			    <div class="col-sm-10">
				    <select name="measurementType" class="form-control" id="measurementType">
						<option value="mm">Millimetres</option>
						<option value="in">Inches</option>
					</select>
			    </div>
  			</div>

			<div class="form-group row">
    			<label class="col-sm-2 col-form-label" for="marginTop">Margin Top</label>
			    <div class="col-sm-10">
				    <input name="marginTop" type="text" class="form-control" id="marginTop" aria-describedby="marginTopHelp">
			    	<small id="marginTopHelp" class="form-text text-muted">Top margin of labels</small>
			    </div>
  			</div>

  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label" for="marginLeft">Margin Left</label>
			    <div class="col-sm-10">
				    <input name="marginLeft" type="text" class="form-control" id="marginLeft" aria-describedby="marginLeftHelp">
			    	<small id="marginLeftHelp" class="form-text text-muted">Left margin of labels.</small>
			    </div>
  			</div>

  			<div class="form-group row">
    			<label class="col-sm-3 col-form-label" for="NX">Number of labels horizontally</label>
			    <div class="col-sm-9">
				    <input name="NX" type="number" min="1" max="40" step="1" class="form-control" id="NX" aria-describedby="NXHelp">
			    	<small id="NXHelp" class="form-text text-muted">Number of labels horizontally across the page.</small>
			    </div>
  			</div>

  			<div class="form-group row">
    			<label class="col-sm-3 col-form-label" for="NY">Number of labels vertically</label>
			    <div class="col-sm-9">
				    <input name="NY" type="number" min="1" max="40" step="1" class="form-control" id="NY" aria-describedby="NYHelp">
			    	<small id="NYHelp" class="form-text text-muted">Number of labels vertically across the page.</small>
			    </div>
  			</div>

  			<div class="form-group row">
    			<label class="col-sm-3 col-form-label" for="SpaceX">Horizontal space between 2 labels</label>
			    <div class="col-sm-9">
				    <input name="SpaceX" type="text" class="form-control" id="SpaceX">
			    </div>
  			</div>

  			<div class="form-group row">
    			<label class="col-sm-3 col-form-label" for="SpaceY">Vertical space between 2 labels</label>
			    <div class="col-sm-9">
				    <input name="SpaceY" type="text" class="form-control" id="SpaceY">
			    </div>
  			</div>

			<div class="form-group row">
    			<label class="col-sm-2 col-form-label" for="width">Width of label</label>
			    <div class="col-sm-10">
				    <input name="width" type="text" class="form-control" id="width" aria-describedby="widthHelp">
			    	<small id="widthHelp" class="form-text text-muted">Total width of one label.</small>
			    </div>
  			</div>

  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label" for="height">Height of label</label>
			    <div class="col-sm-10">
				    <input name="height" type="text" class="form-control" id="height" aria-describedby="heightHelp">
			    	<small id="heightHelp" class="form-text text-muted">Total height of one label</small>
			    </div>
  			</div>

  			<div class="form-group row">
    			<label class="col-sm-2 col-form-label" for="font_size">Font Size</label>
			    <div class="col-sm-10">
				    <input name="font_size" type="number" min="1" max="40" step="1" class="form-control" id="font_size" value="8" aria-describedby="font_sizeHelp">
			    	<small id="font_sizeHelp" class="form-text text-muted">Font size used on the label don't go to big.</small>
			    </div>
  			</div>

  			<button type="submit" class="btn btn-primary"><i class="fas fa-plus-square"></i> Save Label Type</button>
		</div>
	</div>

</form>

</div>
<br>