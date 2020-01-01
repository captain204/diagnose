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
        <h2 class="text-center" style="margin-top:0px">Please Select Severity Level *</h2>
        <div class="text-center">    
            <form action="<?php echo $action; ?>" method="post">
                <div class="form-group">
                    <label for="varchar">Diarrhorea <?php echo form_error('diarrhorea') ?></label>
                    <select name="diarrhorea" id="diarrhorea" class="form-control">
                        <option></option>
                        <option value="mild" class="form-control">Mild</option>
                        <option value="moderate">Moderate</option>
                        <option value="severe">Severe</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="varchar">Vomiting  <?php echo form_error('vomiting') ?></label>
                    <select name="vomiting" id="vomiting" class="form-control">
                        <option></option>
                        <option value="mild">Mild</option>
                        <option value="moderate">Moderate</option>
                        <option value="severe">Severe</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="varchar">Dehydration  <?php echo form_error('dehydration') ?></label>
                    <select name="dehydration" id="dehydration" class="form-control">
                        <option></option>
                        <option value="mild">Mild</option>
                        <option value="moderate">Moderate</option>
                        <option value="severe">Severe</option>
                    </select>
                </div>        
                    <input type="hidden" class="form-control" name="patient_id" id="patient_id" placeholder="Patient Id" value="<?php echo $patient_id; ?>" />
                <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            </form>
        </div>
    </body>
</html>