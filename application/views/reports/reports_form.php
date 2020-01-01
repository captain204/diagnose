<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Reports <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="level">Level <?php echo form_error('level') ?></label>
            <textarea class="form-control" rows="3" name="level" id="level" placeholder="Level"><?php echo $level; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="symptoms">Symptoms <?php echo form_error('symptoms') ?></label>
            <textarea class="form-control" rows="3" name="symptoms" id="symptoms" placeholder="Symptoms"><?php echo $symptoms; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="treatment">Treatment <?php echo form_error('treatment') ?></label>
            <textarea class="form-control" rows="3" name="treatment" id="treatment" placeholder="Treatment"><?php echo $treatment; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="timestamp">Created At <?php echo form_error('created_at') ?></label>
            <input type="text" class="form-control" name="created_at" id="created_at" placeholder="Created At" value="<?php echo $created_at; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Updated At <?php echo form_error('updated_at') ?></label>
            <input type="text" class="form-control" name="updated_at" id="updated_at" placeholder="Updated At" value="<?php echo $updated_at; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('reports') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>