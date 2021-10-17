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

  .moviemiddle1 {
    height: 150px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    padding: 100px 0 0 0;
  }

  .moviemiddle2 {
    justify-content: center;
    display: flex;
    padding-top: 50px;
  }

  .moviebox1 {
    width: 1000px;
    height: 49px;
    background-color:rgba(7, 21, 78, 0.623);
    color: whitesmoke;
    letter-spacing: 2.3px;
    font-size: 30px;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    text-align: left;
  }

  .moviebox2 {
    width: 1000px;
    height: auto;
    background-color: rgba(7, 21, 78, 0.623);
    color: whitesmoke;
    text-align: left;

  }

  .movieimage {
    float: left;
    padding: 20px 0 0 20px;

  }
  .movieimagemini {
    float: left;
    padding: 10px 0 0 10px;

  }

  .movieright{
    float: left;
    padding: 20px 0 0 30px;
    color: #b1b1b3;

  }

  .movieboxtitle{
    color: #ccb543;
  }
  .name{
    color: #e3e3e3;
  }
</style>

<body>

  <!-- Navbar (sit on top) -->
  <div class="w3-top">
    <div class="w3-bar w3-white w3-card" id="myNavbar">
      <a href="#Home" style="color: rgb(241, 212, 47); text-decoration: none; font-size: large; font-weight: bold;">
      <img border="0"  src="../images/pagelogo.jpg" width="75" height="60"> JY MOVIES</a>
      <!-- Right-sided navbar links -->
      <div class="w3-right w3-hide-small">
      <a href="home.php" class="w3-bar-item w3-button">HOME</a>
        <a href="movies.php" class="w3-bar-item w3-button"></i> MOVIES</a>
        <a href="cinema.php" class="w3-bar-item w3-button"></i> CINEMA</a>
        <a href="quickbooking.php" class="w3-bar-item w3-button"></i> QUICK BOOKING</a>

      </div>
      
    </div>
  </div>
  <div>
    <div class="moviemiddle1">
      <div class="moviebox1">&nbsp; SHANG-CHI AND THE LEGEND OF THE TEN RINGS</div>
    </div>

    <div class="moviemiddle2">
      <div class="moviebox2">
        <div class="movieimage">
          <img  src="../images/movieshangchi.jpg" width="315" height="315">
          <p><video width="315" height="200" controls>
            <source src="../images/shangchitrailer.mp4" type="video/mp4">
              Your browser does not support the video tag.
          </video>
          </p>
        </div>
        <div class="movieright">
          <span class="movieboxtitle">PHOTOS:</span><br>
          <img class="movieimagemini" src="../images/image1.jpg" width="150" height="80">
          <img class="movieimagemini" src="../images/image2.jpg" width="150" height="80">
          <img class="movieimagemini" src="../images/image3.jpg" width="150" height="80">
                    <br><br><br><br>
          <span class="movieboxtitle">DETAILS:</span><br>
          <table>
            <tr>
              <td>Casts: <span class='name'> Simu Liu, Tony Leung<span></td>
              <td>Produced by: <span class='name'> Kevin Feige, Jonathan Schwartz<span></td>            </tr>
            <tr>
              <td>Director: <span class='name'> Destin Daniel Cretton &nbsp;<span></td>
              <td>Production Company: <span class='name'> Marvel Studios<span></td>
            </tr>
            <tr>
              <td>Release Date: <span class='name'> 3 Sep 2021<span></td>
              <td>Running Time: <span class='name'> 2H 12M<span></td>
            </tr>
          </table><br>
          <span class="movieboxtitle">SYPNOSIS:</span><br>
          <span class='name'> Martial-arts master Shang-Chi confronts 
            <br>the past he thought he left behind when he's drawn 
            <br> into the web of the mysterious Ten Rings organization.<span>
        </div>

      </div>
    </div>


  </div>

  <footer style="color: antiquewhite; background-color:aqua;">
  <p>Author: Hege Refsnes</p>
  <p><a href="mailto:hege@example.com">hege@example.com</a></p>
</footer>

  <script type="text/javascript" src="../js/carousel.js">
  </script>
</body>

</html>