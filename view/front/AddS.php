<?php

//require '../../model/sponsor.php';
include '../../controller/sponsorC.php'; // Inclure le fichier sponsorC.php


$error = "";
$sponsor= null;
$sponsorC = new sponsorC();
$eventId = isset($_GET['eventId']) ? $_GET['eventId'] : '';


if ( 
  isset($_POST["NomSpon"]) &&
  isset($_POST["IdEv"]) &&
  isset($_POST["ImgSpon"]) 
 
) {
  if (
      
      !empty($_POST["NomSpon"]) &&
      !empty($_POST["IdEv"]) &&
      !empty($_POST["ImgSpon"]) 
      
      
  ) 
  {
    $eventId = $_POST["IdEv"];
     $eventExists = $sponsorC->checkEventExists($eventId);

  if ($eventExists) 
  {
      // L'événement existe, on peut ajouter le sponsor
      $sponsor = new sponsor(
          null,
          $_POST['NomSpon'],
          $_POST['IdEv'],
          $_POST['ImgSpon'],
      );
      $sponsorC->addSponsor($sponsor);
      header('Location: front.php');
  } 
  else {
      // L'événement n'existe pas
      $errorMessage = "L'événement avec l'ID spécifié n'existe pas. Pas de possibilité de faire l'ajout de ce sponsor";
    }

  } 
} 
else {
  $error = "missing informations";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Events - Taktik.tn</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" type="image/png" href="assets/img/Taktiklogo2.png" >
  <link href="assets\img\Taktiklogo2.png" rel="Taktiklogo">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  </head>

<body>

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="">Taktik.tn</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.html" class="">Home</a></li>
          <li><a href="about.html">About</a></li>

          <li class="dropdown has-dropdown">
  <a href="#"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
  <ul>
    <li><a href="cours.html">Courses</a></li>
    <li><a href="Tutors.html">Tutors</a></li>
    <li><a href="plan.html">Plan Financier</a></li>
  </ul>
</li>
          <li><a href="news.html">News</a></li>
          <li class="dropdown has-dropdown">
            <a href="events.html"><span>Events</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                <li><a href="#">Upcoming Events</a></li>
                <li><a href="#">Past Events</a></li>
            </ul>
        </li>

          <li><a href="contact.html">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="cours.html">Get Started</a>

    </div>
  </header>
<!-- Page Title -->
<div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Events</h1>
              <p class="mb-0">Join our plateform to learn more about finance!</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Events</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->
   
 

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sponsor Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Your form content here -->
        <form method="POST" action="" id="myform">
          <!-- Form fields -->
          <!-- Titre -->
          <div class="row mb-3">
            <label for="NomSpon" class="col-sm-2 col-form-label"> Nom sponsor:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" maxlength="25" placeholder="Place sponsor name" name="NomSpon" id="NomSpon">
              <span id="error1"></span>
            </div>
          </div>
          <!-- id evenement -->
          <div class="row mb-3">
            <label for="IdEv" class="col-sm-2 col-form-label"> id evenement a sponsoriser:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" maxlength="25" placeholder="ID de l'événement" name="IdEv" id="IdEv" value="<?= $eventId ?>" readonly>
              <span id="error2"></span>
            </div>
          </div>
          <!-- Image -->
          <div class="row mb-3">
            <label for="ImgSpon" class="col-sm-2 col-form-label"><i class="fas fa-image text-secondary"></i> Image</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" name="ImgSpon" id="ImgSpon">
              <span id="error3"></span>
            </div>
          </div>
          <!-- Submit button -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" onclick="submitForm()">Submit</button>
          </div>
        </form>
        <!-- End of form content -->
      </div>
    </div>
  </div>
</div>


<script>
  window.onload = function() {
    var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
    myModal.show();
  }
</script>

<script>
  function submitForm() {
    // Get form element
    var form = document.getElementById("myform");

    // Create a FormData object to easily construct a set of key/value pairs representing form fields and their values
    var formData = new FormData(form);

    // You can now send formData to your server using XMLHttpRequest or fetch
    // For example, using fetch:
    fetch("/submit", {
      method: "POST",
      body: formData
    })
    .then(response => {
      if (response.ok) {
        // Handle success
        console.log("Form successfully submitted");
        // Optionally close the modal or clear the form
        // Example: $('#exampleModal').modal('hide');
      } else {
        // Handle error
        console.error("Form submission failed");
      }
    })
    .catch(error => {
      console.error("Error:", error);
    });
  }
</script>



  <!-- End General Form Elements -->
               <script>
                let myform=document.getElementById("myform");
                  /*controle sur le nom */
                  myform.addEventListener('submit',function(e)
                  {
                    let myinput=document.getElementById("NomSpon");
                    if(myinput.value.trim() ==''){
                      let myerror=document.getElementById("error");
                      myerror.innerHTML="le champs name doit etre rempli";
                      myerror.style.color="red";
                       e.preventDefault();
                    } 
                
                    let myinput2=document.getElementById("IdEv");
                    if(myinput2.value.trim() ==''){
                      let myerror2=document.getElementById("error2");
                      myerror2.innerHTML="le champs date doit etre rempli";
                      myerror2.style.color="red";
                       e.preventDefault();
                    } 
                    
                    let myinput3 = document.getElementById("IdEv");
                    let inputValue3 = myinput3.value.trim();
                    // Expression régulière pour vérifier si la chaîne ne contient que des nombres
                    let numbersOnly = /^[0-9]+$/;

                         // Vérifie si la valeur de l'input ne contient que des nombres
                       if (!numbersOnly.test(inputValue3)) {
                          let myerror3 = document.getElementById("error3");
                          myerror3.innerHTML = "Le champ idSponsor doit contenir uniquement des nombres.";
                          myerror3.style.color = "red";
                          e.preventDefault();
                  }});
                
                 /*controle sur date */
                 
                 
               </script>
            </div>
          </div>

        </div>
      </div>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer position-relative">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="">taktik.tn</span>
          </a>
          <div class="footer-contact pt-3">
            <p>A108 Adam Street</p>
            <p>New York, NY 535022</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
            <p><strong>Email:</strong> <span>taktik.tn@gmail.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12 footer-newsletter">
          <h4>Our Newsletter</h4>
          <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
          <form action="forms/newsletter.php" method="post" class="php-email-form">
            <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your subscription request has been sent. Thank you!</div>
          </form>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1">taktik.tn</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        <!--Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
      </div>
    </div>

  </footer>

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

</html>