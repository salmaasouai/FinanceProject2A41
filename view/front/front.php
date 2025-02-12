<?php
 require '../../controller/eventC.php';

 $ec=new eventC();
 $tab= $ec->afficher();
 $sc=new sponsorC();
$tab1= $sc->afficherSponsor();

$r = new ratingC();
$ratings = $r->calculerMoyenneParIdEv();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

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
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- =======================================================
  * Template Name: Mentor
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Updated: Mar 19 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
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

   <main class="main">

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

    <!-- Events Section -->
    <section id="events" class="events section">

      <div class="section-title">
        <h2>Events</h2>
        <p>Check Our Exciting Program</p>
      </div>

      <div class="container">
      <div class="row">

      <?php 
   
   foreach($tab as $even): 
    $eventId = $even['IdEv'];
   
?>
   
<div class="col-lg-4 mb-4">
    <div class="card h-100">
        <img src="events_pics/<?= $even['ImgEv']; ?>" width="350" height="300">
        <div class="card-body">  
        <?php
            // Recherchez la moyenne de notation pour cet événement dans le tableau $ratings
            foreach ($ratings as $rating) 
            {
                if ($rating['IdEv'] == $even['IdEv']) {
                    echo 'Average Rating: ' . number_format($rating['moyenne'], 2); // Affichez la moyenne avec 2 décimales
                    break;
               }
            }
       
                    // Utiliser la moyenne des évaluations pour cet événement pour colorer les étoiles
                    $averageRating = number_format($rating['moyenne'], 2); // Supposons que la moyenne est stockée dans $rating['moyenne']
         ?>
        <div class="rating-stars" data-event-id="<?= $eventId; ?>" data-average-rating="<?= $averageRating; ?>" >
                <header>Rate this event</header>
                <a href="" data-rating="1"></a>
                <a href="" data-rating="2"></a>
                <a href="" data-rating="3"></a>
                <a href="" data-rating="4"></a>
            </div>
            <div class="comment"></div> <!-- Ajoutez cette div vide pour afficher le commentaire -->
            <?php
           
            ?>
            <h5 class="card-title">
                <?= $even['Titre']; ?>
                <!-- Afficher les étoiles à côté du titre -->
                
            </h5>
            <i class="bi bi-badge-check text-primary black-icon"></i>
            <div class="categorie">
            <i class="bi bi-bookmarks-fill"></i> Catégorie: <?= $even['categorie']; ?>
            </div>
            <ul class="list-unstyled">
                <li><i class="bi bi-calendar-event"></i> <?= $even['Date']; ?></li>
                <li><i class="bi bi-clock-fill"></i> <?= $even['Time']; ?></li>
                <li><i class="bi bi-info"></i> Details : <?= $even['detailsEvent']; ?></li>
                <li><i class="bi bi-person"></i> NbParticipants : <?= $even['NbParticipants']; ?></li>
            </ul>
            <div class="button-group">
                <button type="button" class="btn btn-success alert-me-btn" data-event-id="<?= $eventId; ?>" data-event-name="<?= $even['Titre']; ?>" data-event-nbparticipants="<?= $even['NbParticipants']; ?>" data-event-date="<?= $even['Date']; ?>" data-event-time="<?= $even['Time']; ?>"  data-event-idevent="<?= $even['IdEv']; ?>">
                    <span class="btn-text">I participate!</span>
                    <i class="bi bi-bell-fill"></i>
                </button>
                <input type="email" class="email-input" style="display: none;" placeholder="Enter your email">
            </div>
            <br>
            <div class="button-group">
                <button type="button" class="btn btn-primary sponsor-btn" data-event-id="<?= $eventId; ?>">
                    <i class="bi bi-gift"></i>
                    <span class="btn-text">Sponsor this event</span>
                </button>
            </div>
            <br>
            <div class="button-group">
                <button type="button" class="btn btn-primary afficherS-btn" data-event-id="<?= $eventId; ?>">
                    <i class="bi bi-gift"></i>
                    <span class="btn-text">See sponsors of this event</span>
                </button>
            </div>
            <!-- Ajoutez cette partie à chaque carte d'événement -->

<div id="event-details-container"></div>



            <div class="card-body">  
    <!-- Vos autres éléments HTML pour la carte -->
    <div id="dialogue-container"></div>
</div>
        </div>
    </div>
</div>
<?php endforeach; ?>



</div>
</div>
    </section><!-- /Events Section -->
  </main>
  <script src="script.js" defer></script>

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
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>