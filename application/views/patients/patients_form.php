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
        <h2 class="text-center" style="margin-top:0px"><?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
            <div class="text-center">
                <div class="form-group">
                    <label for="varchar">Firstname <?php echo form_error('firstname') ?></label>
                    <input type="text" class="form-control" name="firstname" id="firstname"  value="<?php echo $firstname; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Lastname <?php echo form_error('lastname') ?></label>
                    <input type="text" class="form-control" name="lastname" id="lastname"  value="<?php echo $lastname; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Marital Status <?php echo form_error('marital_status') ?></label>
                    <select name="marital_status"  id="marital_status" class="form-control">
                        <option></option>
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="varchar">Date Birth <?php echo form_error('date_birth') ?></label>
                    <input type="date" class="form-control" name="date_birth" id="date_birth"  value="<?php echo $date_birth; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Phone <?php echo form_error('phone') ?></label>
                    <input type="text" class="form-control" name="phone" id="phone"  value="<?php echo $phone; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Email <?php echo form_error('email') ?></label>
                    <input type="email" class="form-control" name="email" id="email"  value="<?php echo $email; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Address <?php echo form_error('address') ?></label>
                    <input type="text" class="form-control" name="address" id="address" value="<?php echo $address; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Occupation <?php echo form_error('occupation') ?></label>
                    <input type="text" class="form-control" name="occupation" id="occupation"  value="<?php echo $occupation; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Doctors Name <?php echo form_error('doc_name') ?></label>
                    <input type="text" class="form-control" name="doc_name" id="doc_name"  value="<?php echo $doc_name; ?>" />
                </div>
                    <input type="hidden" class="form-control" name="doc_id" id="doc_id" value="2"/>
                <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                <a href="<?php echo site_url('patients') ?>" class="btn btn-danger">Cancel</a>
            </div>
	</form>
    </body>
</html>