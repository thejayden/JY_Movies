<?php
@$db = new mysqli('localhost', 'root', '', 'moviesdb');

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
<style>
  body,
  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    font-family: "Raleway", sans-serif
  }

  body,
  html {
    height: 100%;
    line-height: 1.8;
  }

  body {
    background-image: url("../images/others/bluegradient1.jpg");
  }

  /* Full height image header */
  /* .bgimg-1 {
    background-position: center;
    background-size: cover;
    background-image: url("/w3images/mac.jpg");
    min-height: 100%;
  } */

  .w3-bar .w3-button {
    padding: 16px;
  }

  div.gallery_wrap {
    float: left;
  }

  div.gallery {
    margin: 5px;
    border: 1px solid #ccc;
    /* float: left; */
    /* width: 180px; */
    width: 150px;
    transition: ease 0.3s all;
    /* z-index: 999; */
    display: inline-block;
    /* z-index: -1; */
  }

  div.gallery_wrap:hover {
    /* border: 1px solid #777; */
    transform: scale(1.2);
    box-shadow: 0 1em 2em rgba(0, 0, 0, 0.2);
    transition: ease 0.3s all;
    background-color: black;
    z-index: 2;
    position: relative;
  }

  .gallery_wrap:hover .gallery {
    border: none;
  }

  .gallery_wrap:hover .desc {
    display: inline-block;
    /* z-index: 999;
    position: relative; */
    /* float: right; */
  }

  div.gallery img {
    width: 100%;
    height: auto;
    filter: grayscale(50%);
    /* z-index: -1; */
    /* width: 40%;
    height: auto; */
  }

  div.desc {
    /* padding: 5px; */
    display: none;
    text-align: left;
    vertical-align: top;
    width: auto;
    max-width: 110px;
    /* background-color: black; */
    color: #F6C90E;
    font-size: smaller;
    z-index: 2;
    padding: 5px 10px 0 5px;
  }

  div.nowshowing {
    /* padding: 15px; */
    text-align: center;
    background-color: #F6C90E;
    /* filter: none; */
  }

  p.movie_title {
    font-size: larger;
    margin: 0;
    padding: 0 0 5px 0;
    line-height: 20px;
    font-weight: bold;
  }

  p.movie_info {
    font-size: x-small;
    margin: 0;
    padding: 0px 0 0px 0;
    line-height: 15px;
    font-weight: lighter;
    color: #C39F0B;
  }

  .footer {
    font-family: 'Arial Narrow', Arial, sans-serif;
    font-size: medium;
    padding: 30px 0 60px 0;
    color: whitesmoke;
    /* background-color: #131313; */
    background-color: black;
    /* height: 200px; */

  }

  /* .dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
} */
</style>

<body>

  <!-- Navbar (sit on top) -->
  <div class="w3-top">
    <div class="w3-bar w3-white w3-card" id="myNavbar">
      <a href="#Home" style="color: rgb(241, 212, 47); text-decoration: none; font-size: large; font-weight: bold;">
        <img border="0" src="../images/others/pagelogo.jpg" width="75" height="60"> JY MOVIES</a>
      <!-- Right-sided navbar links -->
      <div class="w3-right w3-hide-small">
        <a href="home.php" class="w3-bar-item w3-button">HOME</a>
        <a href="movies.php" class="w3-bar-item w3-button"></i> MOVIES</a>
        <a href="cinema.php" class="w3-bar-item w3-button"></i> CINEMA</a>
        <a href="quickbooking.php" class="w3-bar-item w3-button"></i> QUICK BOOKING</a>
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
    <div style="text-align: center; padding-top: 30px;">
      <a href="moviesinformation.php">
        <img border="0" src="../images/others/shangchigif.gif" width="400px" height="220">
        <div style="color: rgba(104, 237, 255, 0.993); font-family: sans-serif"><strong>CLICK HERE TO GET YOUR TICKET(S) TODAY!</strong></div>
      </a>
    </div>
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
    <div>
      <table class="footer" width="100%">
        <tr>
          <th>Follow Us:</th>
          <th>Download Our Mobile App:</th>
          <th>Contact us:</th>
        </tr>
        <tr>
          <th><img src="../images/others/twitter.png" width="30" height="30">&nbsp;
            <img src="../images/others/instagram.png" width="30" height="30"> &nbsp;
            <img src="../images/others/facebook.png" width="30" height="30">
          </th>
          <th>
            <img src="../images/others/appstore.png" width="90" height="30"> &nbsp;
            <img src="../images/others/appstore2.png" width="30" height="30">
          </th>
          <th>90807053</th>
        </tr>
      </table>
    </div>
  </footer>

  <script type="text/javascript" src="../js/carousel.js">
  </script>
</body>

</html>