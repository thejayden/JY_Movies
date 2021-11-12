<!DOCTYPE html>
<html>
<?php
@$db = new mysqli('localhost', 'f32ee', 'f32ee', 'f32ee');

if (mysqli_connect_errno()) {
  echo "Error: Could not connect to database.  Please try again later.";
  exit;
}

$id = $_POST['booknow'];
echo $id;
?>
<?php
$qry = "select * from movies where movie_id = $id";
$result1 = $db->query($qry);
$row1 = $result1->fetch_row();

$qry2 = "select * from movieinfo where movie_id = $id";
$result2 = $db->query($qry2);
$row2 = $result2->fetch_assoc();
?>
<title>Book Now - <?php echo $row1[1]; ?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/carousel.css">
<link rel="stylesheet" href="../css/style.css">


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


  <div>
    <div class="moviemiddle1" style="padding: 100px 0 0 0;">
      <div class="moviebox1">&nbsp; <?php echo $row1[1]; ?> </div>
    </div>

    <div class="moviemiddle2">
      <div class="moviebox2">
        <div class="movieimage">
          <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row1[3]) . '" width="315" height="auto" />' ?>
          <!-- <img src="../images/movieshangchi.jpg" width="315" height="315"> -->
          <p><iframe width="315" height="200" frameBorder="0" allow="fullscreen;" src=<?php echo '"' . $row2["video"] . '">' ?> </iframe>
              <!-- Your browser does not support the video tag. -->
          </p>
        </div>
        <div class="movieright" style="height:100%; display: flex; flex-direction: column;">
          <div style="flex-wrap: wrap; display: flex;">
            <div>
              <span class="movieboxtitle">PHOTOS: </span><br>
              <img class="movieimagemini" src=<?php echo '"data:image/jpeg;base64,' . base64_encode($row2["image1"]) . '"'; ?> width="150" height="80">
              <img class="movieimagemini" src=<?php echo '"data:image/jpeg;base64,' . base64_encode($row2["image2"]) . '"'; ?> width="150" height="80">
              <img class="movieimagemini" src=<?php echo '"data:image/jpeg;base64,' . base64_encode($row2["image3"]) . '"'; ?> width="150" height="80">
              <br><br><br><br>
            </div>
            <div>
              <span class="movieboxtitle">DETAILS:</span><br>
              <table>
                <tr>
                  <td>Casts: <span class='name'> <?php echo $row2["casts"]; ?><span></td>
                  <td>Produced by: <span class='name'> <?php echo $row2["producers"]; ?><span></td>
                </tr>
                <tr>
                  <td>Director: <span class='name'> <?php echo $row2["director"]; ?> &nbsp;<span></td>
                  <td>Production Company: <span class='name'> <?php echo $row2["company"]; ?><span></td>
                </tr>
                <tr>
                  <td>Release Date: <span class='name'> <?php echo $row2["released"]; ?><span></td>
                  <td>Running Time: <span class='name'> <?php echo $row1[5]; ?> minutes <span></td>
                </tr>
              </table><br>
              <span class="movieboxtitle">SYPNOSIS:</span><br>
              <!-- <span class='name'> Martial-arts master Shang-Chi confronts
            <br>the past he thought he left behind when he's drawn
            <br> into the web of the mysterious Ten Rings organization.<span> -->
              <span class='name'><?php echo $row2["summary"]; ?></span>
            </div>
          </div>

          <div style="margin-top: 30%; text-align:center">
            <form action="./quickbooking.php" method="post">
              <button type="submit" name="quickbook" class="quickbook" id="quickbook" value="<?php echo $row1[0]; ?>">Quick Booking</button>
            </form>
            <br>
            <a style="color:whitesmoke; text-decoration:none"href="./movies.php">Back to Movies</a>
          </div>
        </div>

      </div>
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