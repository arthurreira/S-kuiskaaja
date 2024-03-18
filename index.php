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
  <title>Sääasema</title>
  <!-- MDB icon -->
  <link rel="icon" href="img/wheater_cloud_sharp_focus_dept.jpeg"  type="image/x-icon" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Gruppo&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->

  <link rel="stylesheet" href="css/mdb.min.css" />
  <link rel="stylesheet" href="/Css/style.css">
</head>

<body style="background-color: black;">

  <?php
  require_once '../Weather-app-IOT/Front-end-components/navbar.php';

  ?>
  <!-- Navbar -->





  <!--Section: Design Block-->
  <section>
    <div id="intro" class="bg-image" style="
        background-image: url('img/finland_wheater_background_for\ \(1\).jpeg');
        height: 100vh;
      ">
      <div class="mask" style="background-color: rgba(0, 0, 0, 0.2);">
        <div class="container  justify-content-center align-items-center h-100">
          <div class="row align-items-center">
            <?php
            require_once 'Front-end-components/wheater-card.php';

            ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  

  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.umd.min.js"></script>




  <script src="https://www.gstatic.com/charts/loader.js"></script>


</body>

</html>