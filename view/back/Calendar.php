<?php
//index.php
include '../../controller/eventC.php';


?>
<!DOCTYPE html>
<html>
 <head>


 <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Forms </title>
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



  <title>Jquery Fullcalandar Integration with PHP and Mysql</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script> 


<!--


-->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Favicons -->
  <link href="assetss/img/favicon.png" rel="icon">
  <link href="assetss/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assetss/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assetss/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assetss/vendor/aos/aos.css" rel="stylesheet">
  <link href="assetss/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assetss/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assetss/css/main.css" rel="stylesheet">


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

  <h2 align="center">Notre Calendrier  </h2>
  <br />
  <div class="container">
   <div id="calendar"></div>
  </div>
  </main>
  
  <script>

$(document).ready(function() {
    var calendar = $('#calendar').fullCalendar({


        editable: true,
        header: 
        {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        events: 'load.php',
        selectable: true,
        selectHelper: true,
        eventResize: function(event) 
        {
            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
            var title = event.title;
            var id = event.id;
            $.ajax(
              {
                url: "update.php",
                type: "POST",
                data: { title: title, start: start, end: end, id: id },
                success: function() {
                    calendar.fullCalendar('refetchEvents');
                    alert('Event Updated');
                }
            });
        },



        eventDrop: function(event) {
            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
            var title = event.title;
            var id = event.id;
            $.ajax({
                url: "update.php",
                type: "POST",
                data: { title: title, start: start, end: end, id: id },
                success: function() {
                    calendar.fullCalendar('refetchEvents');
                    alert('Event Updated');
                }
            });
        },



        eventClick: function(event) 
        {
    // Afficher les informations de l'événement dans une boîte de dialogue personnalisée
    var eventId = event.id;
   // var ImgEv = event.extendedProps.ImgEv; // Récupérer l'URL de l'image depuis les propriétés étendues
    
    Swal.fire({
        title: 'Event Details',
        html: '<b>Title:</b> ' + event.title + '<br>' +
              '<b>Start:</b> ' + moment(event.start).format('YYYY-MM-DD HH:mm:ss') + '<br>' +
              //'<b>Img de l\'evenement:</b> <img src="' + ImgEv + '" style="max-width: 100%; height: auto;"><br>' + // Afficher l'image
              '<b>Id de l\'evenement:</b> ' + eventId + '<br>' ,
        showCancelButton: true,
        confirmButtonText: 'Delete Event',
        cancelButtonText: 'Cancel',
        showLoaderOnConfirm: true,
        preConfirm: () => {
            return new Promise((resolve) => {
                // Envoyer une requête AJAX pour supprimer l'événement
                $.ajax({
                    url: 'deleteCalendar.php',
                    type: 'POST',
                    data: { id: event.id },
                    success: function(response) {
                        // Rafraîchir le calendrier après la suppression de l'événement
                        calendar.fullCalendar('refetchEvents');
                        resolve(response);
                    },
                    error: function(xhr, status, error) {
                        Swal.fire('Error', 'Failed to delete event. Error: ' + error, 'error');
                    }
                });
            });
        },
        allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
        // Afficher un message d'alerte si la suppression réussit
        if (result.value) {
            Swal.fire('Success', 'Event removed successfully!', 'success');
        }
    });
},

        eventRender: function(event, element) {
            if (event.type_p === 'presentiel') {
                element.css('background-color', 'blue');
            } else {
                element.css('background-color', 'orange');
            }
            element.find('.fc-title').html(event.title);
        },
        timeFormat: '', // Remove the time display near each event,
    //////////////////////////////////////////////////////////////////////////////////////////////


    dayClick: function(date, jsEvent, view) 
    {
   
    let selectedDate = date.format('YYYY-MM-DD');
  
  // Rediriger vers add.php avec la date sélectionnée dans l'URL
  window.location.href = 'addCalendar.php?date=' + selectedDate;

},



        
        
        error: function(xhr, status, error) 
{
    Swal.fire('Error occurred!', 'Failed to communicate with server. Error: ' + error, 'error');
    console.log(xhr); // Affiche l'objet XHR complet dans la console
    console.log(status); // Affiche le statut de la requête dans la console
}
    //////////////////////////////////////////////////////////////////////////////////////////////
    });
});


</script>

   <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assetss/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assetss/vendor/php-email-form/validate.js"></script>
  <script src="assetss/vendor/aos/aos.js"></script>
  <script src="assetss/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assetss/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assetss/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assetss/js/main.js"></script>
<!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

</html>


