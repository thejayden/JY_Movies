<!DOCTYPE html>
<html>
<title>Movies</title>
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

  .moviemiddle1 {
    height: 150px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
  }

  .moviemiddle2 {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    background-color: rgba(7, 21, 78, 0.623);
    /* width: 1500px; */
  }

  .moviebox1 {
    width: 1000px;
    height: 49px;
    background-color: rgba(7, 21, 78, 0.623);
    color: whitesmoke;
    letter-spacing: 2.3px;
    font-size: 30px;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    text-align: left;
  }

  .moviebox2 {
    width: 1000px;
    height: 500px;
    background-color: rgba(7, 21, 78, 0.623);
    color: whitesmoke;
    letter-spacing: 2.3px;
    font-size: 30px;
    text-align: left;
  }

  .newsletter {

    background-color: whitesmoke;
    justify-content: center;
    display: flex;
  }

  .newsletterbox {
    padding-top: 30px;
    text-align: left;
    color: black;
    font-size: medium;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  }

  input {
    border-top-style: hidden;
    border-right-style: hidden;
    border-left-style: hidden;
    border-bottom-style: groove;
    background-color: whitesmoke;
    outline: none;
    color: black;
    font-family: 'Arial Narrow';
  }

  .footer {
    font-family: 'Arial Narrow', Arial, sans-serif;
    font-size: medium;
    padding-top: 50px;
    color: whitesmoke;
    background-color: black;
    height: 200px;

  }

  /* .button {
    background-color: black;
    border: none;
    color: whitesmoke;
    padding: 10px 22px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 18px;
    margin: 4px 2px;
    cursor: pointer;
  } */

  /* main {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  } */

  .booknow {
    background-color: black;
    color: #F6C90E;
    font-size: 16px;
    font-weight: bold;
    border: 0;
    border-radius: 50px;
    padding: 10px 20px;
    margin-top: 5px;
    cursor:pointer;
    justify-content:center;
  }

  .movie {
    width: 300px;
    margin: 1rem;
    border-radius: 5px;
    box-shadow: 0.2px 4px 5px rgba(0, 0, 0, 0.1);
    background-color: #F6C90E;
    position: relative;
    overflow: hidden;
  }

  .movie img {
    width: 100%;
  }

  .movie-info {
    color: #eee;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0.5rem 1rem 1rem;
    letter-spacing: 0.5px;
  }

  .movie-info h4 {
    margin-top: 0;
    font-weight: bolder;
    color:black;
  }

  .overview {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(255,255,255, 0.9);
    padding: 1rem;
    max-height: 100%;
    transform: translateY(101%);
    transition: transform 0.3s ease-in;
  }

  .movie:hover .overview {
    transform: translateY(0)
  }
</style>
<?php
@$db = new mysqli('localhost', 'root', '', 'moviesdb');

if (mysqli_connect_errno()) {
  echo "Error: Could not connect to database.  Please try again later.";
  exit;
}
?>

<body>

  <!-- Navbar (sit on top) -->
  <div class="w3-top">
    <div class="w3-bar w3-white w3-card" id="myNavbar">
      <a href="#Home" style="color: rgb(241, 212, 47); text-decoration: none; font-size: large; font-weight: bold;">
        <img border="0" src="../images/pagelogo.jpg" width="75" height="60"> JY MOVIES</a>
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
    <div class="moviemiddle1" ;>
      <div class="moviebox1">&nbsp; NOW IN THEATRES</div>
    </div>

    <div id="main" class="moviemiddle2">
      <!-- <div class="moviebox2">
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
          <h3>Overview</h3>
          ' . $row[2] . '
          <br />
          <form action="./moviesinformation.php" method="post">
          <button type="submit" name="booknow" class="booknow" id="booknow" value=' . $row[0] . '>Book Now</button>
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
          <th>Follow Us:</th>
          <th>Download Our Mobile App:</th>
          <th>Contact us:</th>
        </tr>
        <tr>
          <th><img src="../images/twitter.png" width="30" height="30">&nbsp;
            <img src="../images/instagram.png" width="30" height="30"> &nbsp;
            <img src="../images/facebook.png" width="30" height="30">
          </th>
          <th>
            <img src="../images/appstore.png" width="90" height="30"> &nbsp;
            <img src="../images/appstore2.png" width="30" height="30">
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