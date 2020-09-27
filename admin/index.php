<?php

include 'koneksi.php';
include 'notif.php';
session_start();

if (empty($_SESSION["adminid"])) {
  header('location: login.php?login=no');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Admin</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
  <link rel="stylesheet" href="css/fullcalendar.css" />
  <link rel="stylesheet" href="css/matrix-style.css" />
  <link rel="stylesheet" href="css/matrix-media.css" />
  <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/jquery.gritter.css" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>

<body>

  <!--Header-part-->
  <div id="header">
    <h1><a href="index.php">Admin</a></h1>
  </div>
  <!--close-Header-part-->


  <!--top-Header-menu-->
  <?php include 'header.php'; ?>
  <!--close-top-Header-menu-->
  <!--start-top-serch-->
  <div id="search">
    <input type="text" placeholder="Search here..." />
    <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
  </div>
  <!--close-top-serch-->
  <!--sidebar-menu-->
  <?php include 'sidebarmenu.php' ?>
  <!--sidebar-menu-->

  <!--main-container-part-->
  <div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
      <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <?php include 'content.php' ?>
    <!--End-Action boxes-->

    <!--Footer-part-->

    <?php include 'footer.php' ?>

    <!--end-Footer-part-->

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.js"></script>

    <script src="js/excanvas.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.flot.min.js"></script>
    <script src="js/jquery.flot.resize.min.js"></script>
    <script src="js/jquery.peity.min.js"></script>
    <script src="js/fullcalendar.min.js"></script>
    <script src="js/matrix.dashboard.js"></script>
    <script src="js/jquery.gritter.min.js"></script>
    <script src="js/matrix.interface.js"></script>
    <script src="js/matrix.chat.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/matrix.form_validation.js"></script>
    <script src="js/jquery.wizard.js"></script>
    <script src="js/jquery.uniform.js"></script>
    <script src="js/select2.min.js"></script>
    <script src="js/matrix.popover.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.ui.custom.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/matrix.js"></script>
    <script src="js/matrix.tables.js"></script>
    <script src="js/wysihtml5-0.3.0.js"></script>
    <script src="js/bootstrap-wysihtml5.js"></script>
    <script>
      $('.textarea_editor').wysihtml5();
    </script>
    <script src="js/sweetalert2.all.min.js"></script>
</body>

</html>