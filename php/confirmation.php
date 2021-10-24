<!DOCTYPE html>
<html>
<?php
@$db = new mysqli('localhost', 'root', '', 'moviesdb');

if (mysqli_connect_errno()) {
  echo "Error: Could not connect to database.  Please try again later.";
  exit;
}

$movie_id = $_POST['confirmbook'];
$seats = $_POST['seats'];
echo $movie_id;
echo $seats;
?>
<?php
$qry = "insert into bookings_test (movie_id, seats) values ('".$movie_id."', '".$seats."');";
$result1 = $db->query($qry);
// echo  $db->affected_rows;
// $row1 = $result1->fetch_row();

// $qry2 = "select * from movieinfo where movie_id = $id";
// $result2 = $db->query($qry2);
// $row2 = $result2->fetch_assoc();
?>
<title>Booking Confirmation - <?php echo $row1[1]; ?></title>
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

  .moviemiddle2 {
    justify-content: center;
    display: flex;
    padding: 50px 0 20px 0;
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
    height: auto;
    background-color: rgba(7, 21, 78, 0.623);
    color: whitesmoke;
    text-align: left;
    padding-bottom: 20px;
    /* display: flexbox; */
  }

  .movieimage {
    float: left;
    padding: 20px 50px 0 20px;

  }

  .movieimagemini {
    float: left;
    padding: 10px 0 0 10px;

  }

  .movieright {
    /* float: left; */
    padding: 20px 20px 0 0px;
    color: #b1b1b3;
    position: relative;
  }

  .movieboxtitle {
    color: #ccb543;
  }

  .name {
    color: #e3e3e3;
  }

  .quickbook {
    background-color: #F6C90E;
    color: black;
    font-size: 16px;
    font-weight: bold;
    border: 0;
    border-radius: 50px;
    padding: 10px 20px;
    margin-top: 5px;
    cursor: pointer;
    justify-content: center;
    transition: ease 0.9s all;
  }

  .quickbook:hover {
    transition: ease 0.3s all;
    transform: scale(1.1);
    font-weight: 900;
  }

  /* body {
    background-color: #242333;
    display: flex;
    flex-direction: column;
    color: white;
    align-items: center;
    justify-content: center;
    height: 100vh;
    font-family: 'Lato', 'sans-serif';
  } */

  .movie-container {
    margin: 20px 0;
  }

  .movie-container select {
    background-color: #fff;
    border: 0;
    border-radius: 5px;
    font-size: 14px;
    margin-left: 10px;
    padding: 5px 15px 5px 15px;
    -moz-appearance: none;
    -webkit-appearance: none;
    appearance: none;
  }

  .container {
    perspective: 1000px;
    margin-bottom: 30px;
  }

  .seat {
    background-color: #444451;
    height: 20px;
    width: 21px;
    margin: 3px;
    border-radius: 5px;
    /* border-top-left-radius: 5px;
    border-top-right-radius: 5px; */
  }

  .ylabel {
    /* background-color: #444451; */
    height: 20px;
    width: 21px;
    margin: 3px;
    border-radius: 5px;
  }

  .xlabel {
    height: 20px;
    width: 21px;
    margin: 3px;
    border-radius: 5px;
    /* text-align: center; */
  }

  .xlabel:nth-of-type(1) {
    margin-left: 35px;
  }

  .xlabel:nth-of-type(3) {
    margin-left: 18px;
  }

  .xlabel:nth-last-of-type(2) {
    margin-left: 18px;
  }

  .xlabel:nth-last-of-type(1) {
    margin-left: -2px;
  }

  .seat.selected {
    /* background-color: #6feaf6; */
    background-color: #fcff43;
    box-shadow: 0 0px 5px white;
  }

  .seat.unavail {
    background-color: #000c33;
    /* border: 1px solid white; */
    box-shadow: 0 0px 3px #6feaf6;
    /* background: repeating-linear-gradient(-45deg, #000c33, #000c33 5px, white 6px, white 7px); */
  }

  .seat:nth-of-type(3) {
    margin-right: 18px;
  }

  .seat:nth-last-of-type(2) {
    margin-left: 18px;
  }

  .seat:not(.unavail):hover {
    cursor: pointer;
    transform: scale(1.2);
  }

  .showcase .seat:not(.unavail):hover {
    cursor: default;
    transform: scale(1);
  }

  .showcase {
    background-color: rgba(0, 0, 0, 0.1);
    padding: 5px 10px;
    border-radius: 5px;
    color: #777;
    list-style-type: none;
    display: flex;
    justify-content: space-between;
  }

  .showcase li {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 10px;
  }

  .showcase li small {
    margin-left: 10px;
  }

  .row {
    display: flex;
  }

  .screen {
    background-color: #F6C90E;
    height: 80px;
    width: 85%;
    margin: 15px 0;
    margin-left: auto;
    margin-right: 25px;
    transform: rotateX(-45deg);
    box-shadow: 0 3px 10px #F6C90E;
    text-align: center;
    line-height: 5em;
    color: #000000;
  }

  p.text {
    margin: 5px 0;
  }

  p.text span {
    color: #6feaf6;
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
        <a href="quickbooking.php" class="w3-bar-item w3-button"></i> QUICK BOOKING</a>
      </div>
    </div>
  </div>
  <div>
    <div class="moviemiddle1" style="padding: 100px 0 0 0;">
      <div class="moviebox1">&nbsp;<?php echo $movie_id;
echo $seats; ?></div>
    </div>

    <div class="moviemiddle2">
      <div class="moviebox2">
        <div class="movieimage">
        </div>
        <div class="movieright" style="height:100%; display: flex; flex-direction: column;">
          <div style="flex-wrap: wrap; display: flex;">
            <div>
            </div>
            <div>
            </div>
          </div>
          <div style="margin-top: 30%; text-align:center">
            <button type="submit" name="confirmbook" class="quickbook" id="confirmbook" value=' . $row1[0] . '>BOOK</button>
            <br>
            <a href="./movies.php">Back to Movies</a>
          </div>
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