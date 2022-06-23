<?php
session_start();
if (!isset($_SESSION['sessionid'])) {
    echo "<script>alert('Session not available. Please login');</script>";
    echo "<script> window.location.replace('login.php')</script>";
}

include 'dbconnect.php';
$sqltutor = "SELECT * FROM tbl_tutors";
$stmt = $conn->prepare($sqltutor);
$stmt->execute();
$rows = $stmt ->fetchAll();

$results_per_page = 10;
if (isset($_GET['pageno'])) {
    $pageno = (int)$_GET['pageno'];
    $page_first_result = ($pageno - 1) * $results_per_page;
} else {
    $pageno = 1;
    $page_first_result = 0;
}

$stmt = $conn->prepare($sqltutor);
$stmt->execute();
$number_of_result = $stmt->rowCount();
$number_of_page = ceil($number_of_result / $results_per_page);
$sqltutor = $sqltutor . " LIMIT $page_first_result , $results_per_page";
$stmt = $conn->prepare($sqltutor);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$rows = $stmt->fetchAll();

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
      <a href="homepage.php" class="w3-bar-item w3-button w3-wide w3-">
        <b>MY Tutor</b></a
      >
      <a href="courses.php" class="w3-bar-item w3-button w3-hide-small">Courses</a>
      <a href="tutors.php" class="w3-bar-item w3-button w3-hide-small"
        >Tutors</a
      >
      <a href="#subscription" class="w3-bar-item w3-button w3-hide-small">Subscription</a>
      <a href="#profile" class="w3-bar-item w3-button w3-hide-small">Profile</a>
      <div class="w3-right">
        <a href="" class="w3-bar-item w3-button w3-hide-small"
          >LOGOUT</a
        >
      </div>

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

    <div class="w3-content" style="max-width: 1200px">

    <div class ="w3-header w3-center w3-margin-top w3-padding w3-animate-opacity">
    <img src='../images/header_tutor.png' alt='' style='width:100%;'>
    </div>

    <div class="w3-center" >
    <h3>MEET OUR TUTORS</h3>
      <div class="w3-grid-template w3-padding w3-animate-bottom">  

        <?php
        foreach ($rows as $tutor) {

            $tutorid = $tutor['tutor_id'];
            $tutoremail = $tutor['tutor_email'];
            $tutorname = $tutor['tutor_name'];
            $tutordesc = $tutor['tutor_description'];

            echo <<<END
              <div class='w3-card w3-container w3-padding w3-round-xlarge w3-hover-shadow ' >
              <img src='../assets/tutors/$tutorid.jpg' alt='' style='width:100%;'>
              <div class='w3-content' style='height: 90px'>
              <h5 >$tutorname</h5>
              </div>
              <p class='text'>$tutordesc</p>

              <button onclick="document.getElementById($tutorid).style.display='block'" class="w3-button w3-black">MORE DETAILS</button>
              <div id=$tutorid class="w3-modal">
                <div class="w3-modal-content w3-animate-bottom w3-card-4">
                  <header class="w3-container w3-black"> 
                    <span onclick="document.getElementById($tutorid).style.display='none'" 
                    class="w3-button w3-display-topright">&times;</span>
                    <h2 class='w3-padding-32'>$tutorname</h2>
                  </header>
                  <div class="w3-container">
                  <div class = 'w3-col m6 w3-padding'>
                    <img src='../assets/tutors/$tutorid.JPG' alt='' class='fitImg' style='width:100%;'>
                    <h6>$tutoremail</h6>

                  </div>
                  <div class = 'w3-col m6 w3-padding'>

                  <p>$tutordesc</p>
                  </div>
                  </div>
                </div>
              </div>
              </div>
            END;
            
        }
        ?>
    </div>
      </div>
      </div>

      <?php
    $num = 1;
    if ($pageno == 1) {
        $num = 1;
    } else if ($pageno == 2) {
        $num = ($num) + 10;
    } else {
        $num = $pageno * 10 - 9;
    }
    echo "<div class='w3-container w3-row w3-padding-64'>";
    echo "<center>";
    for ($page = 1; $page <= $number_of_page; $page++) {
        echo '<a href = "courses.php?pageno=' . $page . '" style=
            "text-decoration: none">&nbsp&nbsp' . $page . ' </a>';
    }
    echo " ( " . $pageno . " )";
    echo "</center>";
    echo "</div>";
    ?>
    
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