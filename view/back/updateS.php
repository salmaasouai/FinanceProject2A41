<?php

include '../../controller/sponsorC.php';
//require '../../model/sponsor.php';

$error = "";
$sponsor = null;
$sponsorC = new sponsorC();

if (isset($_GET['id'])) {
    $sponsorId = $_GET['id'];

    $sponsorDetails = $sponsorC->getSponsor($sponsorId);

    if ($sponsorDetails) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $updatedValues = [];
            if (
                isset($_POST["NomSpon"]) ||
                isset($_POST["IdEv"])||
                isset($_POST["ImgSpon"])
            ) {
                if (isset($_POST['NomSpon']) && $_POST['NomSpon'] !== '') {
                    $updatedValues['NomSpon'] = ($_POST['NomSpon']);
                } else {
                    $updatedValues['NomSpon'] = $sponsorDetails['NomSpon'];
                }

                if (isset($_POST['IdEv']) && $_POST['IdEv'] !== '') {
                    $updatedValues['IdEv'] = intval($_POST['IdEv']);
                } else {
                    $updatedValues['IdEv'] = $sponsorDetails['IdEv'];
                }

                if (isset($_POST['ImgSpon']) && $_POST['ImgSpon'] !== '') {
                  $updatedValues['ImgSpon'] = ($_POST['ImgSpon']);
              } else {
                  $updatedValues['ImgSpon'] = $sponsorDetails['ImgSpon'];
              }

                
            } else {
                // Si aucun champ n'est modifié, conservez les valeurs existantes
                $updatedValues = [
                    'NomSpon' => $sponsorDetails['NomSpon'],
                    'IdEv' => $sponsorDetails['IdEv'],
                    'ImgSpon' => $sponsorDetails['ImgSpon']
                ];
            }

           
            $sponsor = new sponsor(
                $sponsorId,
                $updatedValues['NomSpon'],
                $updatedValues['IdEv'],
                $updatedValues['ImgSpon']
                
            );

            $sponsorC->updateSponsor($sponsor, $sponsorId);
            
            // Rediriger après la mise à jour
            header('Location: afficherS.php');
            exit(); // Terminer l'exécution du script après la redirection
        } else {
            $error = "Missing information";
        }
    } else {
        exit("Sponsor ID is invalid");
    }
} else {
    exit("Sponsor ID is missing");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Forms Update </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" type="image/png" href="assets/img/Taktiklogo.png" sizes="1000x1000">
  <link href="assets/img/Taktiklogo.png" rel="Taktiklogo">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="index.html" class="logo d-flex align-items-center">
    <img src="assets/img/logo.png" alt="">
    <span class="d-none d-lg-block">Admin</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<div class="search-bar">
            <form class="search-form d-flex align-items-center">
            <input type="text" name="query" id="searchInput" placeholder="Search" title="Enter search keyword">
              <button type="button" title="Search" onclick="filterTable()"><i class="bi bi-search"></i></button>
            </form>
          </div>


<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item d-block d-lg-none">
      <a class="nav-link nav-icon search-bar-toggle " href="#">
        <i class="bi bi-search"></i>
      </a>
    </li><!-- End Search Icon-->

    <li class="nav-item dropdown">

      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-bell"></i>
        <span class="badge bg-primary badge-number">4</span>
      </a><!-- End Notification Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
        <li class="dropdown-header">
          You have 4 new notifications
          <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-exclamation-circle text-warning"></i>
          <div>
            <h4>Lorem Ipsum</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>30 min. ago</p>
          </div>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li class="notification-item">
          <i class="bi bi-x-circle text-danger"></i>
          <div>
            <h4>Atque rerum nesciunt</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>1 hr. ago</p>
          </div>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li class="notification-item">
          <i class="bi bi-check-circle text-success"></i>
          <div>
            <h4>Sit rerum fuga</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>2 hrs. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-info-circle text-primary"></i>
          <div>
            <h4>Dicta reprehenderit</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>4 hrs. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>
        <li class="dropdown-footer">
          <a href="#">Show all notifications</a>
        </li>

      </ul><!-- End Notification Dropdown Items -->

    </li><!-- End Notification Nav -->

    <li class="nav-item dropdown">

      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-chat-left-text"></i>
        <span class="badge bg-success badge-number">3</span>
      </a><!-- End Messages Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
        <li class="dropdown-header">
          You have 3 new messages
          <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="message-item">
          <a href="#">
            <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
            <div>
              <h4>Maria Hudson</h4>
              <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
              <p>4 hrs. ago</p>
            </div>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="message-item">
          <a href="#">
            <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
            <div>
              <h4>Anna Nelson</h4>
              <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
              <p>6 hrs. ago</p>
            </div>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="message-item">
          <a href="#">
            <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
            <div>
              <h4>David Muldon</h4>
              <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
              <p>8 hrs. ago</p>
            </div>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="dropdown-footer">
          <a href="#">Show all messages</a>
        </li>

      </ul><!-- End Messages Dropdown Items -->

    </li><!-- End Messages Nav -->

    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="assets/img/profileImg.jpg" alt="Profile" class="rounded-circle">
        <span class="d-none d-md-block dropdown-toggle ps-2">S.Souai</span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6>S.Salma</h6>
          <span>IT ENGENEERING STUDENT </span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
            <i class="bi bi-person"></i>
            <span>My Profile</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
            <i class="bi bi-gear"></i>
            <span>Account Settings</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
            <i class="bi bi-question-circle"></i>
            <span>Need Help?</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
          </a>
        </li>

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->


<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

<li class="nav-item">
<a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
  <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
</a>
<ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
  <li>
  <a href="AddEv.php" >

      <i class="bi bi-circle"></i><span>Form Elements(events)</span>
    </a>
  </li>
  <li>
    <a href="addS.php" class="active">
      <i class="bi bi-circle"></i><span>Form Elements(sponsor)</span>
    </a>
  </li>
 
  
  
</ul>
<!-- End Forms Nav -->

<li class="nav-item">
<a class="nav-link " data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
  <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
</a>
<ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
  
  <li>
    <a href="afficherEv.php" class="active">
      <i class="bi bi-circle"></i><span>Events Tables</span>
    </a>
    <a href="afficherS.php" class="active">
      <i class="bi bi-circle"></i><span>Sponsor Tables</span>

      <a href="afficherParticipations" class="active">
        <i class="bi bi-circle"></i><span>Participations Tables</span>
      </a>
      
    </a>
  </li>
</ul>
</li><!-- End Tables Nav -->

<li class="nav-item">
<a class="nav-link " data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
  <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
</a>
<ul id="charts-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
<li>
    <a href="stat2.php" class="active">
      <i class="bi bi-circle"></i><span>ECharts</span>
    </a>
  </li>
</ul>
</li><!-- End Charts Nav -->


<li class="nav-item">
<a class="nav-link " data-bs-target="#calendar-nav" data-bs-toggle="collapse" href="#">
<i class="bi bi-calendar"></i></i><span>Calendar</span>
</a>
<ul id="calendar-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
<li>
    <a href="Calendar.php" class="active">
      <i class="bi bi-circle"></i><span>Calendar</span>
    </a>
  </li>
</ul>
</li><!-- End calendar Nav -->


<li class="nav-item">
<a class="nav-link collapsed" href="users-profile.php">
<i class="bi bi-person"></i>
<span>Profile</span>
</a>
</li><!-- End Profile Page Nav -->

<li class="nav-item">
<a class="nav-link collapsed" href="pages-faq.php">
 <i class="bi bi-question-circle"></i>
 <span>F.A.Q</span>
</a>
</li><!-- End F.A.Q Page Nav -->

 <li class="nav-item">
   <a class="nav-link " href="pages-contact.php">
     <i class="bi bi-envelope"></i>
     <span>Contact</span>
   </a>
 </li><!-- End Contact Page Nav -->

<li class="nav-item">
<a class="nav-link collapsed" href="pages-register.php">
 <i class="bi bi-card-list"></i>
 <span>Register</span>
</a>
</li><!-- End Register Page Nav -->

<li class="nav-item">
<a class="nav-link collapsed" href="pages-login.php">
 <i class="bi bi-box-arrow-in-right"></i>
 <span>Login</span>
</a>
</li><!-- End Login Page Nav -->

</ul>

</aside><!-- End Sidebar-->

  <main id="main" class="main">
   <!--Page Title (body) -->
    <div class="pagetitle">
      <h1>Form Elements</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Elements</li>
        </ol>
      </nav>
    </div>  <!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="text-center">
        <!--<div class="col-lg-6">-->

              <!-- General Form Elements -->
              <form method="POST" action="" id="eventForm">
        <div class="text-center">
        <!--<div class="col-lg-6">-->
          
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">General Form Elements</h5>

              <!-- General Form Elements -->
              <form method="POST" action="" id="myform">

    <div class="row mb-3">
        <label for="NomSpon" class="col-sm-2 col-form-label"><i class="fas fa-heading text-primary"></i>Nom sponsor:</label>
        <div class="col-sm-10">
        <input type="NomSpon" class="form-control" name="NomSpon" id="NomSpon" value="<?php echo $sponsorDetails['NomSpon']; ?>">
            <span id="error1"></span>
        </div>
    </div>

    <div class="row mb-3">
        <label for="IdEv" class="col-sm-2 col-form-label"><i class="fas fa-heading text-primary"></i>id evenement a sponsoriser:</label>
        <div class="col-sm-10">
        <input type="IdEv" class="form-control" name="IdEv" id="IdEv" value="<?php echo $sponsorDetails['IdEv']; ?>">
            <span id="error2"></span>
        </div>
    </div>

    <div class="row mb-3">
    <label for="ImgSpon" class="col-sm-2 col-form-label"><i class="fas fa-image text-secondary"></i> Image</label>
    <div class="col-sm-10">
        <input type="file" class="form-control" name="ImgSpon" id="ImgSpon">
        <span id="error3"></span>
    </div>
</div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary" id="updateBtn">update</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
        <a href="afficherS.php" class="btn btn-secondary">Go back</a>
    </div>
</form>

  <!-- End General Form Elements -->
             
            </div>
          </div>

        </div>
      </div>
  </main><!-- End #main -->
  


  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Admin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
     <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
    </div>
  </footer><!-- End Footer -->
  <script>
    // Écouteur d'événement pour le formulaire
    document.getElementById('eventForm').addEventListener('submit', function(e) {
        let myinput = document.getElementById("Titre");
        let myinput2 = document.getElementById("Date");
        let myinput3 = document.getElementById("Time");
        let myinput4 = document.getElementById("detailsEvent");
        let myinput5 = document.getElementById("NbParticipants");
        let myinput6 = document.getElementById("categorie");

        if (
            myinput.value.trim() === "<?php echo $eventDetails['Titre']; ?>" &&
            myinput2.value.trim() === "<?php echo $formattedDate; ?>" &&
            myinput3.value.trim() === "<?php echo $eventDetails['Time']; ?>" &&
            myinput4.value.trim() === "<?php echo $eventDetails['detailsEvent']; ?>" &&
            myinput5.value.trim() === "<?php echo $eventDetails['NbParticipants']; ?>" &&
            myinput6.value.trim() === "<?php echo $eventDetails['categorie']; ?>"
        ) {
            alert("Aucun champ n'a été modifié.");
            e.preventDefault(); // Empêcher la soumission du formulaire
        }
        else
        {
          
        if (!confirm("Are you sure you want to update this event?")) {
            e.preventDefault(); // Empêcher la soumission du formulaire si l'utilisateur clique sur "Annuler"
        }
        }

        let myinput7 = document.getElementById("NbParticipants");
        let inputValue7 = myinput7.value.trim();
        // Expression régulière pour vérifier si la chaîne ne contient que des nombres
        let numbersOnly = /^[0-9]+$/;

        // Vérifie si la valeur de l'input ne contient que des nombres
        if (!numbersOnly.test(inputValue7)) {
            let myerror7 = document.getElementById("error7");
            myerror7.innerHTML = "Le champ NbParticipants doit contenir uniquement des nombres.";
            myerror7.style.color = "red";
            e.preventDefault(); // Empêcher la soumission du formulaire
        }
    });

</script>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  </body>