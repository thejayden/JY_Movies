<?php
@$db = new mysqli('localhost', 'f32ee', 'f32ee', 'f32ee');

if (mysqli_connect_errno()) {
  echo "Error: Could not connect to database.  Please try again later.";
  exit;
}
?>

<!DOCTYPE html>
<html>
<title>JY MOVIES</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/carousel.css">
<link rel="stylesheet" href="../css/style.css">


<body>

  <!-- Navbar (sit on top) -->
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

  <div style="text-align: center; padding-top: 30px;">
    <a href="movies.php">
    <img border="0" src="../images/others/shangchigif.gif" width="400px" height="220">
    <div style="color: rgba(104, 237, 255, 0.993); font-family: sans-serif"><strong>CLICK HERE TO GET YOUR TICKET(S) TODAY!</strong></div>
  </a>
  </div>

  <!-- Header with full-height image -->
  <div id="home" style="padding: 50px 50px 0px 10px;">
    <div class="slideshow-container fade" style="float: left;">

      <!-- Full images with numbers and message Info -->
      <div class="Containers">
        <img src="../images/others/promo1.jpg" style="width: 100%">
      </div>

      <div class="Containers">
        <img src="../images/others/promo2.jpg" style="width: 100%; ">
      </div>

      <div class="Containers">
        <img src="../images/others/promo3.jpg" style="width:100%">
      </div>
    </div>
    <div style="padding: 0 0px 0 100px; justify-content:left; flex-wrap:wrap; display:flex">
      <?php
      // $qry = "select * from movies LIMIT 8";
      $qry = "select * from movies";
      // echo '<table><tr>';
      if ($result = $db->query($qry)) {
        while ($row = $result->fetch_row()) {
          echo '<div class="gallery_wrap">';
          echo '<div class="gallery">';
          echo '<div class="nowshowing">NOW SHOWING</div>';
          echo '<img src="data:image/jpeg;base64,' . base64_encode($row[3]) . '" />';
          echo '</div>';
          echo '<div class="desc"><p class="movie_title">' . $row[1] . '</p>' .
            '<p style="color=#C39F0B">' . $row[4] . '</p>' .
            '<p class="movie_info" style="padding-top:5px;">' . $row[2] . '</p>' .
            '<p class="movie_info">' . $row[5] . ' mins </p>' .
            '<p class="movie_info">' . $row[6] . '</p>' . '</div>';
          echo '</div>';
        }
        $result->free_result();
      }
      $db->close();
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