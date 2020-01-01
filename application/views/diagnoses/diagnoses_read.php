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
        <h2 style="margin-top:0px">Diagnoses Read</h2>
        <table class="table">
	    <tr><td>Diarrhorea</td><td><?php echo $diarrhorea; ?></td></tr>
	    <tr><td>Vomiting</td><td><?php echo $vomiting; ?></td></tr>
	    <tr><td>Dehydration</td><td><?php echo $dehydration; ?></td></tr>
	    <tr><td>Patient Id</td><td><?php echo $patient_id; ?></td></tr>
	    <tr><td>Created At</td><td><?php echo $created_at; ?></td></tr>
	    <tr><td>Updated At</td><td><?php echo $updated_at; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('diagnoses') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>