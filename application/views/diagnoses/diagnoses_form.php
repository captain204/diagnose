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
                            <h2 class="text-center">Stool Mcs*</h2>
                <div class="form-group">
                    <label for="varchar">Appearance <?php echo form_error('appearance') ?></label>
                    <input type="text" class="form-control" name="appearance" id="appearance"  value="<?php echo $appearance; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Consistency <?php echo form_error('consistency') ?></label>
                    <input type="text" class="form-control" name="consistency" id="consistency"  value="<?php echo $consistency; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Mucus <?php echo form_error('mucus') ?></label>
                    <input type="text" class="form-control" name="mucus" id="mucus"  value="<?php echo $mucus; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Ova <?php echo form_error('ova') ?></label>
                    <input type="text" class="form-control" name="ova" id="ova"  value="<?php echo $ova; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Cyst <?php echo form_error('cyst') ?></label>
                    <input type="text" class="form-control" name="cyst" id="cyst"  value="<?php echo $cyst; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Larva <?php echo form_error('larva') ?></label>
                    <input type="text" class="form-control" name="larva" id="larva"  value="<?php echo $larva; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Organism <?php echo form_error('organism') ?></label>
                    <input type="text" class="form-control" name="organism" id="organism"  value="<?php echo $organism; ?>" />
                </div>       
                    <input type="hidden" class="form-control" name="patient_id" id="patient_id"value="<?php echo ($this->session->userdata('patient_id'));?>" />
                <input type="hidden" name="id" value="<?php echo $id; ?>"/> 
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            </form>
        </div>
    </body>
</html>