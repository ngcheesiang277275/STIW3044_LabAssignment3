<?php
session_start();
if (!isset($_SESSION['sessionid'])) {
    echo "<script>alert('Session not available. Please login');</script>";
    echo "<script> window.location.replace('login.php')</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MY Tutor</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link href="../css/style.css" rel="stylesheet"/>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Montserrat:wght@600&display=swap"
      rel="stylesheet"
    />
  </head>

    <script>
    function hamburgerMenu() {
      var x = document.getElementById("idMenuBar");
      if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
      } else {
        x.className = x.className.replace(" w3-show", "");
      }
    }
  </script>

  <body>
    <!-- Top navigation bar -->
    <div class="w3-bar w3-black w3-padding-16" id="navBar">
      <a href="homepage.php" class="w3-bar-item w3-button w3-wide">
        <b>MY Tutor</b></a
      >
      <a href="courses.php" class="w3-bar-item w3-button w3-hide-small">Courses</a>
      <a href="tutors.php" class="w3-bar-item w3-button w3-hide-small"
        >Tutors</a
      >
      <a href="#subscription" class="w3-bar-item w3-button w3-hide-small">Subscription</a>
      <a href="#profile" class="w3-bar-item w3-button w3-hide-small">Profile</a>

      <!-- Right-sided navbar links -->
      <div class="w3-right">
        <a href="" class="w3-bar-item w3-button w3-hide-small"
          >LOGOUT</a
        >
      </div>
      <!-- Hide right-floated links on small screens and replace them with a menu icon -->

      <a
        href="javascript:void(0)"
        class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium"
        onclick="hamburgerMenu()"
      >
        <i class="fa fa-bars"></i>
      </a>
    </div>

    <!-- Hamburger menu -->
    <div
      id="idMenuBar"
      class="w3-bar-block w3-card w3-white w3-hide w3-hide-large w3-hide-medium"
    >
      <a href="courses.php" class="w3-bar-item w3-button w3-center">Courses </a>
      <a href="tutors.php" class="w3-bar-item w3-button w3-center">Tutors</a>
      <a href="#subscription" class="w3-bar-item w3-button w3-center">Subscription</a>
      <a href="#profile" class="w3-bar-item w3-button w3-center">Profile</a>
    </div>

    <div class="w3-content w3-padding" style="max-width: 1000px">

    <div class ="w3-header w3-center w3-padding w3-animate-opacity">
        <img src='../images/header_welcome.png' alt='' style='width:100%;'>
    </div>

    <div class="w3-display-container w3-padding w3-animate-bottom">
    <img src='../images/banner_courses.png' alt='' style='width:100%;'>

  <div class="w3-display-left w3-text-black" style="padding:48px">
    <span class="w3-jumbo w3-hide-small w3-hide-medium">The Future Depends on Youself</span><br>
    <span class="w3-xxlarge w3-hide-large ">The Future Depends on Youself</span><br>
    <span class="w3-large">Start joining our courses today.</span>
    <p><a href="courses.php" class="w3-button w3-black w3-padding-large w3-round-xlarge w3-margin-top w3-opacity w3-hover-opacity-off">TAKE ME TO COURSES</a></p>
  </div> 
  </div>
  </div>
    
      <!-- footer -->
  <footer class="w3-row-padding w3-padding-16 w3-center w3-black">
    <div class="w3-small">
      <a href="courses.php" class="w3-bar-item w3-button">Courses</a>
      <a href="tutors.php" class="w3-bar-item w3-button">Tutors</a>
      <a href="#subscription" class="w3-bar-item w3-button">Subscription</a>
      <a href="#profile" class="w3-bar-item w3-button">Profile</a>
    </div>

    <h6>© 2022 MY Tutor</h6>
  </footer>

  </body>
</html>
