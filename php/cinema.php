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
    background-image: url("../images/others/bluegradient1.jpg");
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



  .moviemiddle1 {
    height: 150px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    
  }

  .moviemiddle3 {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    justify-content: center;

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

  .moviebox3 {
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

  /* the only thing changed here is below:*/

  .locationsbox{
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
  }
.locations{
    width: 1000px;
    height: 49px;
       
}
figcaption{
    color: whitesmoke;
    font-family:  Arial, sans-serif;
    padding: 20px 0 10px 0;
}#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: whitesmoke;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: whitesmoke;
  font-size: 60px;
  font-weight: bold;
padding-top: 30px;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
  
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
        <a href="checkbooking.php" class="w3-bar-item w3-button"></i> CHECK BOOKING</a>

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



 <!-- <img id="myImg" src="../images/location/LC_!.png" alt="Snow" style="width:100%;max-width:300px"> -->
 <div >
    <div class="moviemiddle1" ;>
      <div class="moviebox1" style="width:85%">&nbsp;&nbsp;CINEMA LOCATIONS</div>
    </div>

    <div class="locationsbox">
    <table class="locations" style="width:85%; padding-bottom: 30px;">
<tr>
<th><figcaption>Woodlands</figcaption><img id="myImg" alt="Woodlands" src="../images/location/LC_!.png" width="300" height="220">&nbsp;</th>
<th><figcaption>Woodlands</figcaption><img id="myImg"src="../images/location/LC_!.png" width="300" height="220">&nbsp;</th>
<th><figcaption>Woodlands</figcaption><img id="myImg"src="../images/location/LC_!.png" width="300" height="220">&nbsp;</th>
<th><figcaption>Woodlands</figcaption><img id="myImg"src="../images/location/LC_!.png" width="300" height="220">&nbsp;</th>
<th><figcaption>Woodlands</figcaption><img id="myImg"src="../images/location/LC_!.png" width="300" height="220">&nbsp;</th>

</tr> 


<br><br>

<tr>
<th><figcaption>Woodlands</figcaption><img id="myImg"src="../images/location/LC_!.png" width="300" height="220">&nbsp;</th>
<th><figcaption>Woodlands</figcaption><img id="myImg"src="../images/location/LC_!.png" width="300" height="220">&nbsp;</th>
<th><figcaption>Woodlands</figcaption><img id="myImg"src="../images/location/LC_!.png" width="300" height="220">&nbsp;</th>
<th><figcaption>Woodlands</figcaption><img id="myImg"src="../images/location/LC_!.png" width="300" height="220">&nbsp;</th>
<th><figcaption>Woodlands</figcaption><img id="myImg"src="../images/location/LC_!.png" width="300" height="220">&nbsp;</th>

</tr>
 
</table>
 </div>
<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>



  <footer style="padding-top: 60px;">


    <div class="footer">
      <table width="100%">
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