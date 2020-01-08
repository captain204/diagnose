<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Patient Diagnosis</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../node_modules/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../node_modules/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../../node_modules/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="../../node_modules/perfect-scrollbar/css/perfect-scrollbar.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="../../node_modules/bootstrap-table/dist/bootstrap-table.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  
  <link rel="stylesheet" href="<?php echo base_url();?>assets/themes/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
<div class="container-scroller">
    
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                        <div class="col-md-8 offset-2">
                          <h2 class="text-center"><?=$title?></h2>
                          <table class="table text-center">
                            <tr><td>Firstname</td><td><?php echo $firstname; ?></td></tr>
                            <tr><td>Lastname</td><td><?php echo $lastname; ?></td></tr>
                            <tr><td>Phone</td><td><?php echo $phone; ?></td></tr>
                            <tr><td>Email</td><td><?php echo $email; ?></td></tr>
                            <tr><td>Address</td><td><?php echo $address; ?></td></tr>
                            <tr><td>Occupation</td><td><?php echo $occupation; ?></td></tr>
                            <tr><td>Doctor</td><td><?php echo $doc_name; ?></td></tr>
                            <tr><td>Diarrhorea</td><td><?php echo $diarrhorea; ?></td></tr>
                            <tr><td>Vomiting</td><td><?php echo $vomiting; ?></td></tr>
                            <tr><td>Dehydration</td><td><?php echo $dehydration; ?></td></tr>
                            <tr><td>Appearance</td><td><?php echo $appearance; ?></td></tr>
                            <tr><td>Consistency</td><td><?php echo $consistency; ?></td></tr>
                            <tr><td>Mucus</td><td><?php echo $mucus; ?></td></tr>
                            <tr><td>Ova</td><td><?php echo $ova; ?></td></tr>
                            <tr><td>Cyst</td><td><?php echo $cyst; ?></td></tr>
                            <tr><td>Larva</td><td><?php echo $larva; ?></td></tr>
                            <tr><td>Organism</td><td><?php echo $organism; ?></td></tr>
                          </table>
                          <h2 class="text-center"> Status: <?=$status;?>  </h2>
                          <p class="text-center"> <?=$symptoms;?> </p>
                          <h2 class="text-center"> Treatment </h2>
                          <p class="text-center"> <?=$treatment;?> </p>
                          <div class="text-center">
                            <button onClick="window.print()" class="btn btn-success text-center">Print</button>
                            <a href="<?php echo site_url('patients') ?>" class="btn btn-primary">Back</a>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>

  <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../../node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../../node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="../../js/jq.tablesort.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/tablesorter.js"></script>
  <!-- End custom js for this page-->
  </body>



    
</html>