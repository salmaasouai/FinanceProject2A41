<?php
// Fonction pour se connecter à la base de données
function connectDB() {
    $link = mysqli_connect("localhost", "root", "", "events");
    if (!$link) {
        die("Erreur de connexion à la base de données: " . mysqli_connect_error());
    }
    return $link;
}

// Fonction pour récupérer les statistiques des événements par catégorie
function getEventStatistics($link) {
    $statData = array();
    $sql = "SELECT categorie, AVG(NbParticipants) AS MoyenneParticipants FROM events GROUP BY categorie";
    $result = mysqli_query($link, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $statData[] = array(
                "label" => $row['categorie'],
                "y" => $row['MoyenneParticipants']
            );
        }
    } else {
        echo "Erreur: " . mysqli_error($link);
    }

    return $statData;
}

// Fonction pour afficher le tableau de statistiques
function displayStatisticsTable($statData) {
    echo '<h1>Statistiques des événements par catégorie</h1>';
    echo '<table border="1">';
    echo '<tr><th>Catégorie</th><th>Moyenne Participants</th></tr>';
    foreach ($statData as $data) {
        echo '<tr><td>' . $data['label'] . '</td><td>' . $data['y'] . '</td></tr>';
    }
    echo '</table>';
}

// Connexion à la base de données
$link = connectDB();

// Récupération des statistiques des événements
$statData = getEventStatistics($link);

// Fermeture de la connexion à la base de données
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tables / Data</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" type="image/png" href="assets/img/Taktiklogo.png" sizes="1000x1000">
  <link href="assets/img/Taktiklogo.png" rel="aTaktiklogo">

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
    <title>Event Statistics</title>
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

    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
</div><!-- End Page Title -->
    <header id="header">
        <!-- En-tête de votre page ici -->
    </header>

    <aside id="sidebar">
        <!-- Barre latérale de votre page ici -->
    </aside>

    <main id="main">
        <div class="pagetitle">
            <h1>Event Participant Statistics</h1>
            <!-- Fil d'Ariane ici -->
        </div>

        <section class="section">
    <div class="row">
        <!-- Colonne pour le graphique -->
        <div class="col-lg-8">
    <div class="card h-100">
        <div class="card-body">
            <div class="chart-container" style="height: 450px;"> <!-- Ajustez la hauteur ici -->
                <!-- Affichage du graphique ici -->
                <div id="chartContainer" style="height: 100%; width: 100%;"></div>
            </div>
        </div>
    </div>
</div>

        <!-- Colonne pour le tableau de statistiques -->
        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-body">
                    <div class="table-container">
                        <!-- Affichage du tableau de statistiques ici -->
                        <?php displayStatisticsTable($statData); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



    </main>
    <main>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script>
        window.onload = function() {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Event Participants Statistics",
                    fontSize: 20, // Taille de la police du titre
                    fontFamily: "Arial", // Police du titre
                    fontWeight: "normal" // Poids de la police du titre
                },
                axisY: {
                    title: "Nombre de participants",
                    titleFontSize: 14, // Taille de la police de l'axe Y
                    titleFontColor: "#333", // Couleur de la police de l'axe Y
                    lineColor: "#999", // Couleur des lignes de l'axe Y
                    tickColor: "#999" // Couleur des marques sur l'axe Y
                },
                data: [{
                    type: "column",
                    yValueFormatString: "#,##0.# participants",
                    dataPoints: <?php echo json_encode($statData, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();
        }
    </script>
</main>

</body>
<footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>ADMIN</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
     
    </div>
  </footer>
</html>
