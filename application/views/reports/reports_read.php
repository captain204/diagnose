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
        <h2 style="margin-top:0px">Reports Read</h2>
        <table class="table">
	    <tr><td>Level</td><td><?php echo $level; ?></td></tr>
	    <tr><td>Symptoms</td><td><?php echo $symptoms; ?></td></tr>
	    <tr><td>Treatment</td><td><?php echo $treatment; ?></td></tr>
	    <tr><td>Created At</td><td><?php echo $created_at; ?></td></tr>
	    <tr><td>Updated At</td><td><?php echo $updated_at; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('reports') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>