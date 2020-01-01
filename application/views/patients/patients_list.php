<!doctype html>
<html>
    <head>
        <title>Cholera Diagnosis</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <?php if($this->session->userdata('username')):?>
            <div class="alert alert-success">
                    <?php echo ($this->session->userdata('username'));?>
            </div>
        <?php endif;?>

        <h2 class="text-center" style="margin-top:0px">Patients</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('patients/create'),'Diagnose', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('patients/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('patients'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Firstname</th>
		<th>Lastname</th>
		<th>Phone</th>
		<th>Email</th>
		<th>Address</th>
		<th></th>
        <th>Actions</th>
        <th></th>
            </tr><?php
            foreach ($patients_data as $patients)
            {
                ?>
                <tr>
			<td width="200px"><?php echo ++$start ?></td>
			<td><?php echo $patients->firstname ?></td>
			<td><?php echo $patients->lastname ?></td>
			<td><?php echo $patients->phone ?></td>
			<td><?php echo $patients->email ?></td>
			<td><?php echo $patients->address ?></td>
            <td><a href="<?php echo site_url('patients/read/'.$patients->id) ?>" class="btn btn-primary">View</a></td>
            <td><a href="<?php echo site_url('patients/update/'.$patients->id) ?>" class="btn btn-primary">Update</a></td>
            <td><a href="<?php echo site_url('diagnoses/results/'.$patients->id) ?>" class="btn btn-primary">Diagnosis</a></td> 
                
            <td>
            </td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>