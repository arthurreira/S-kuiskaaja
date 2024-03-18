<?php
require_once 'config_session.inc.php';
require_once 'dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <meta http-equiv="refresh" content="10">
  <title>Sääasema</title>
  <!-- MDB icon -->
  <link rel="icon" href="img/wheater_cloud_sharp_focus_dept.jpeg" type="image/x-icon" />
  <link href="https://fonts.googleapis.com/css2?family=Gruppo&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/mdb.min.css" />
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <?php require_once '../Weather-app-IOT/Front-end-components/navbar.php'; ?>
  <!-- MDB Header with Button Group Inline -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-danger fixed-bottom">
      <div class="container-fluid">
        <button type="button" class="btn btn-warning bnt-lg btn-rounded " data-mdb-toggle="modal" data-mdb-target="#exampleModal" data-mdb-ripple-color="#ffffff">Luokka 12
          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        </button>
      </div>
    </nav>
  </header>

  <!--Section: Design Block-->
  <?php require_once 'Front-end-components/home.php'; ?>
  <?php require_once 'Front-end-components/basicwheater.php'; ?>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js" integrity="sha512-k1rToi7UNYAW9eOOqD42RqChioy+V3yZ1bEjvzt3X34v8EG3qgLZU8hYW/hQ9F6PhdYd0YwFctbKW8YYcc2O0A==" crossorigin="anonymous"></script>
  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"></script>
</body>

</html>