<!DOCTYPE html>
<html>
<title>Movies</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/carousel.css">
<link rel="stylesheet" href="../css/style.css">


<?php
@$db = new mysqli('localhost', 'root', '', 'moviesdb');

if (mysqli_connect_errno()) {
  echo "Error: Could not connect to database.  Please try again later.";
  exit;
}
?>

<body>

<div class="top" >
    <div class="bar white card" id="myNavbar">
      <a href="home.php" style="color: rgb(241, 212, 47); text-decoration: none; font-size: large; font-weight: bold;">
        <img border="0" src="../images/others/pagelogo.jpg" width="75" height="60"> JY MOVIES</a>
      <!-- Right-sided navbar links -->
      <div class="right "style="padding-top:10px" >
        <a href="home.php" class="bar-item button">HOME</a>
        <a href="movies.php" class="bar-item button"></i> MOVIES <img src="../images/others/bookhere.png" width="50" height="33"></a>
        <a href="cinema.php" class="bar-item button"></i> CINEMA</a>
        <a href="checkbooking.php" class="bar-item button"></i> CHECK BOOKING</a>

      </div>
    </div>
  </div>

  <marquee behavior="alternate" direction="left" style="padding-top: 90px">
    <img src="../images/image1.jpg" width="350" height="200">
    <img src="../images/image4.jpg" width="350" height="200">
    <img src="../images/image5.jpg" width="350" height="200">
    <img src="../images/image7.jpg" width="350" height="200">
    <img src="../images/image3.jpg" width="350" height="200">
    <img src="../images/image2.jpg" width="350" height="200">
    <img src="../images/image6.jpg" width="350" height="200">
    <img src="../images/image8.jpg" width="350" height="200">
    <img src="../images/image1.jpg" width="350" height="200">
    <img src="../images/image4.jpg" width="350" height="200">
    <img src="../images/image5.jpg" width="350" height="200">
    <img src="../images/image7.jpg" width="350" height="200">
    <img src="../images/image3.jpg" width="350" height="200">
    <img src="../images/image2.jpg" width="350" height="200">
    <img src="../images/image6.jpg" width="350" height="200">
    <img src="../images/image8.jpg" width="350" height="200">
  </marquee>

  <div>
    <div class="moviemiddle1" ;>
      <div class="moviebox1" style="width:85%">&nbsp; NOW IN THEATRES</div>
    </div>

    <div id="main" class="moviemiddle3">
      <!-- <div class="moviebox3">
        <a href="moviesinformation.php">
          <img src="../images/image1.jpg" width="350" height="200">
        </a>
      </div> -->
      <?php
      $qry = "select * from movies";
      if ($result = $db->query($qry)) {
        while ($row = $result->fetch_row()) {
          echo '<div class="movie">
        <img src="data:image/jpeg;base64,' . base64_encode($row[3]) . '" />
        <div class="movie-info">
          <h4>' . $row[1] . '</h4>
        </div>
        <div class="overview">
          <h3>' . $row[1] . '</h3>
          ' . $row[2] . '
          <br />
          <form action="./moviesinformation.php" method="post">
          <button type="submit" name="booknow" class="booknow" id="booknow" value=' . $row[0] . '>Book Now</button>
          </form>
        </div>
      </div>';
        }
      }
      ?>

    </div>
  </div>



  <footer style="padding-top: 60px;">
    <div class="footer">
      <table width="100%">
        <tr>
          <th>Follow Us on Social Media:</th>
          <th>Download Our Mobile App:</th>
          <th>Contact us:</th>
        </tr>
        <tr>
          <th><a href="https://twitter.com"><img src="../images/others/twitter.png" width="30" height="30"></a>&nbsp;
            <a href="https://instagram.com"><img src="../images/others/instagram.png" width="30" height="30"></a>&nbsp;
            <a href="https://facebook.com"><img src="../images/others/facebook.png" width="30" height="30"></a>
          </th>
          <th>
          <a href="https://play.google.com"><img src="../images/others/appstore.png" width="100" height="40"></a> &nbsp;
          <a href="https://apps.apple.com"> <img src="../images/others/appstore2.png" width="40" height="40"></a>
          </th>
          <th>jymovies@i.movies.com <br>
            working hours: 9am-2am daily<br>
            hotline: +65 8565 2541</th>
        </tr>
      </table>
    </div>
  </footer>

  <script type="text/javascript" src="../js/carousel.js">
  </script>
</body>

</html>