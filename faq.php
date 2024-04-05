<?php
include "connection.php";
$query = "SELECT * FROM cars";
$cars = mysqli_query($conn, $query);
include "header.php";

?>

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/faq.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>FAQs <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">FAQs</h1>
          </div>
        </div>
      </div>
    </section>








<div class="text-center">
  <h2 class="mt-5 mb-5">FAQs</h2>
</div>
<section class="container my-5" id="maincontent">
  <section id="accordion">
    <a class="py-3 d-block w-100 position-relative z-index-1 pr-1 text-secondary border-top " aria-controls="faq-17" aria-expanded="false" data-toggle="collapse" href="#faq-17" role="button">
      <div class="d-flex justify-content-between align-items-cente">
        <h2 class="h4 m-0 pr-3 ">
          Are car rentals available for self-drive?
        </h2>
        <div>
          <i class="fa fa-plus"></i>
        </div>
      </div>
    </a>
    <div class="collapse" id="faq-17" style="">
      <div class="card card-body border-0 p-0">
        <p>As you take a car rental service, you of course get the self-drive option.</p>
      </div>
    </div>

    <a class="py-3 d-block w-100 position-relative z-index-1 pr-1 text-secondary border-top" aria-controls="faq-18" aria-expanded="false" data-toggle="collapse" href="#faq-18" role="button">
      <div class="d-flex justify-content-between align-items-cente">
        <h2 class="h4 m-0 pr-3">
          Do I need to register on your site to book car?
        </h2>
        <div>
          <i class="fa fa-plus"></i>
        </div>
      </div>
    </a>
    <div class="collapse" id="faq-18" style="">
      <div class="card card-body border-0 p-0">
        <p>No. You can use our service fully without the need to register. You just need to provide your details at the time of booking.</p>
        <p>
        </p>
      </div>
    </div>

    <a class="py-3 d-block w-100 position-relative z-index-1 pr-1 text-secondary border-top" aria-controls="faq-19" aria-expanded="false" data-toggle="collapse" href="#faq-19" role="button">
      <div class="d-flex justify-content-between align-items-cente">
        <h2 class="h4 m-0 pr-3">
          What do I need To pick my car up?
        </h2>
        <div>
          <i class="fa fa-plus"></i>
        </div>
      </div>
    </a>
    <div class="collapse" id="faq-19" style="">
      <div class="card card-body border-0 p-0">
        <p>To pick up your rental you will need a reservation voucher from Chill Drive.</p>
        <p>
        </p>
      </div>
    </div>

    <a class="py-3 d-block  w-100 position-relative z-index-1 pr-1 text-secondary  border-top" aria-controls="faq-20" aria-expanded="false" data-toggle="collapse" href="#faq-20" role="button">
      <div class="d-flex justify-content-between align-items-cente">
        <h2 class="h4 m-0 pr-3">
          What is the best email to reach you at?
        </h2>
        <div>
          <i class="fa fa-plus"></i>
        </div>
      </div>
    </a>
    <div class="collapse" id="faq-20">
      <div class="card card-body border-0 p-0">
        <p>The best email for any inquiries is sodhalaxman7@gmail.com!</p>
        <p>
        </p>
      </div>
    </div>

    <a class="py-3 d-block w-100 position-relative z-index-1 pr-1 text-secondary  border-top" aria-controls="faq-21" aria-expanded="false" data-toggle="collapse" href="#faq-21" role="button">
      <div class="d-flex justify-content-between align-items-cente">
        <h2 class="h4 m-0 pr-3">
          How long can I rent a car?
        </h2>
        <div>
          <i class="fa fa-plus"></i>
        </div>
      </div>
    </a>
    <div class="collapse" id="faq-21">
      <div class="card card-body border-0 p-0">
        <p>You can take a car in renting for a maximum of 4 days</p>
        <p>
        </p>
      </div>
    </div>

    <a class="py-3 d-block w-100 position-relative z-index-1 pr-1 text-secondary  border-top" aria-controls="faq-22" aria-expanded="false" data-toggle="collapse" href="#faq-22" role="button">
      <div class="d-flex justify-content-between align-items-cente">
        <h2 class="h4 m-0 pr-3">
          Does the car comes with full tank?
        </h2>
        <div>
          <i class="fa fa-plus"></i>
        </div>
      </div>
    </a>
    <div class="collapse" id="faq-22">
      <div class="card card-body border-0 p-0">
        <p>We work with "same to same" fuel policy, which means that we deliver the car to you with a certain amount of fuel and you should return it back with the same level as collected.</p>
        <p>
        </p>
      </div>
    </div>
  </section>
</section>





<?php
include "footer.php";
?>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
  <svg class="circular" width="48px" height="48px">
    <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
    <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
  </svg>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.timepicker.min.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>

</body>

</html>