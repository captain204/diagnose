<!doctype html>
<html>
    <head>
        <title>Cholera</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 class="text-center" style="margin-top:0px">Patient Record</h2>
        <table class="table">
	    <tr><td>Firstname</td><td><?php echo $firstname; ?></td></tr>
	    <tr><td>Lastname</td><td><?php echo $lastname; ?></td></tr>
	    <tr><td>Marital Status</td><td><?php echo $marital_status; ?></td></tr>
	    <tr><td>Date Birth</td><td><?php echo $date_birth; ?></td></tr>
	    <tr><td>Phone</td><td><?php echo $phone; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>Address</td><td><?php echo $address; ?></td></tr>
	    <tr><td>Occupation</td><td><?php echo $occupation; ?></td></tr>
	    <tr><td>Doctor</td><td><?php echo $doc_name; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('patients') ?>" class="btn btn-success">Back</a></td></tr>
	</table>
        </body>
</html>