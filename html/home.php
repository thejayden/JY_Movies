<?php
@$db = new mysqli('localhost', 'root', '', 'moviesdb');

if (mysqli_connect_errno()) {
  echo "Error: Could not connect to database.  Please try again later.";
  exit;
}
?>

<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
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
    background-image: url("../images/bluegradient1.jpg");
  }

  /* Full height image header */
  .bgimg-1 {
    background-position: center;
    background-size: cover;
    background-image: url("/w3images/mac.jpg");
    min-height: 100%;
  }

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
    z-index: 999;
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
    z-index: 999;
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
        <img border="0" alt="W3Schools" src="../images/pagelogo.jpg" width="50" height="38"> JY MOVIES</a>
      <!-- Right-sided navbar links -->
      <div class="w3-right w3-hide-small">
        <a href="#about" class="w3-bar-item w3-button">HOME</a>
        <a href="#team" class="w3-bar-item w3-button"></i> MOVIES</a>
        <a href="#work" class="w3-bar-item w3-button"></i> CINEMA</a>
        <a href="#pricing" class="w3-bar-item w3-button"></i> QUICK BOOKING</a>

      </div>
      <!-- Hide right-floated links on small screens and replace them with a menu icon -->

      <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
        <i class="fa fa-bars"></i>
      </a>
    </div>
  </div>

  <marquee behavior="alternate" direction="left" style="padding-top: 60px">
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
    <a href="https://www.w3schools.com">
      <img border="0" src="../images/shangchigif.gif" width="400px" height="220">
      <div style="color: rgba(104, 237, 255, 0.993); font-family: sans-serif"><strong>CLICK HERE TO GET YOUR TICKET(S) TODAY!</strong></div>
    </a>
  </div>

  <!-- Slideshow container -->



  <!-- Header with full-height image -->
  <header class="bgimg-1 w3-display-container" id="home" style="padding: 50px 50px 0 50px;">
    <div class="slideshow-container fade" style="float: left;">

      <!-- Full images with numbers and message Info -->
      <div class="Containers">
        <img src="../images/promo1.jpg" style="width: 100%">
      </div>

      <div class="Containers">
        <img src="../images/promo2.jpg" style="width: 100%; ">
      </div>

      <div class="Containers">
        <img src="../images/promo3.jpg" style="width:100%">
      </div>
    </div>
    <div style="float: right;">
      <?php
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
      ?></div>
  </header>

  <!-- Footer -->
  <footer class="w3-center w3-black w3-padding-64">
    <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
    <div class="w3-xlarge w3-section">
      <i class="fa fa-facebook-official w3-hover-opacity"></i>
      <i class="fa fa-instagram w3-hover-opacity"></i>
      <i class="fa fa-snapchat w3-hover-opacity"></i>
      <i class="fa fa-pinterest-p w3-hover-opacity"></i>
      <i class="fa fa-twitter w3-hover-opacity"></i>
      <i class="fa fa-linkedin w3-hover-opacity"></i>
    </div>
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
  </footer>

  <script type="text/javascript" src="../js/carousel.js">
  </script>
</body>

</html>