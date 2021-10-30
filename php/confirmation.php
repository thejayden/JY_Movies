<!DOCTYPE html>
<html>
<?php
session_start();

$name = $_POST['name'];
$movie_id = $_POST['confirmbook'];
$cinema = $_POST['cinema'];
$date = $_POST['date'];
$time = $_POST['timeslot'];
$ticket = $_POST['tickettype'];
$seats = $_POST['seats'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$_SESSION['bookid'];

@$db = new mysqli('localhost', 'root', '', 'moviesdb');

if (mysqli_connect_errno()) {
  echo "Error: Could not connect to database.  Please try again later.";
  exit;
}
if (isset($_SESSION['rand'])) {
  // echo "<p style='color:white'> top " . $_SESSION['rand'] . "</p>";
  $qry = "insert into bookings (movie_id, cinema_id, seats, name, email, phone, date, timeslot, ticket_type) values 
    ('" . $movie_id . "', 
    '" . $cinema . "', 
    '" . $seats . "', 
    '" . $name . "', 
    '" . $email . "', 
    '" . $phone . "', 
    '" . $date . "', 
    '" . $time . "', 
    '" . $ticket . "'
  );";
  if ($db->query($qry)) {
    $_SESSION['bookid'] = $db->insert_id;
  }
  unset($_SESSION['rand']);

  // echo "<p style='color:white'> btm " . $_SESSION['rand'] . "</p>";
} else {
  $qry = "";
}
$qry = "select * from movies where movie_id = $movie_id";
$result1 = $db->query($qry);
$row1 = $result1->fetch_row();
?>

<head>
  <title>Booking Confirmation - <?php echo $row1[1]; ?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/style.css">


</head>

<body>
  <div class="top">
    <div class="bar white card" id="myNavbar">
      <a href="home.php" style="color: rgb(241, 212, 47); text-decoration: none; font-size: large; font-weight: bold;">
        <img border="0" src="../images/others/pagelogo.jpg" width="75" height="60"> JY MOVIES</a>
      <!-- Right-sided navbar links -->
      <div class="right " style="padding-top:10px">
        <a href="home.php" class="bar-item button">HOME</a>
        <a href="movies.php" class="bar-item button"></i> MOVIES <img src="../images/others/bookhere.png" width="50" height="33"></a>
        <a href="cinema.php" class="bar-item button"></i> CINEMA</a>
        <a href="checkbooking.php" class="bar-item button"></i> CHECK BOOKING</a>

      </div>
    </div>
  </div>

  <div>
    <div class="moviemiddle1" style="padding: 100px 0 0 0;">
      <div class="moviebox1">&nbsp;BOOKING CONFIRMATION</div>
    </div>
    <div class="moviemiddle2">
      <div class="moviebox2" style="padding-left:20px;">
        <div class="movieright" style="height:100%; display: flex; flex-direction: column;">
          <div style="flex-wrap: wrap; display: flex;">
            <div style="align-items: center; text-align:center;
      justify-content: center;
      margin: 0 auto; color:yellow; font-size: 35px;">
              <strong> Thank you for booking at JY Movies. <br>
                A booking confirmation has been sent to your email.<br></strong>
            </div>
            <div>
              <table class="bookingconfirmation" style="font-size:20px"><br>
                <tr>
                  <td>Booking ID:</td>
                  <th><?php echo $_SESSION['bookid'] ?></th>
                </tr>
                <tr>
                  <td>Name:</td>
                  <th><?php echo $name ?></th>
                </tr>
                <tr>
                  <td>Movie:</td>
                  <th><?php
                      $qry = "select title from movies where movie_id = $movie_id";
                      $result = $db->query($qry);
                      $row = $result->fetch_assoc();
                      echo $row['title'] ?></th>
                </tr>
                <tr>
                  <td>Cinema:</td>
                  <th><?php
                      $qry = "select cinema_name from cinemas where cinema_id = '" . $cinema . "';";
                      $result = $db->query($qry);
                      $row = $result->fetch_assoc();
                      echo $row['cinema_name'] ?></th>
                </tr>
                <tr>
                  <td>Date:</td>
                  <th><?php echo $date ?></th>
                </tr>
                <tr>
                  <td>Time:</td>
                  <th><?php
                      $time_hr = ((int)$time) / 100;
                      if ($time_hr >= 12) {
                        if (fmod($time_hr, 12) == 0) {
                          echo "12:00 PM";
                        } else {
                          echo fmod($time_hr, 12) . ":" . substr($time, 2) . " PM";
                        }
                      } else if ($time_hr < 12) {
                        if (fmod($time_hr, 12) == 0) {
                          echo "12:00 AM";
                        } else {
                          echo fmod($time_hr, 12) . ":" . substr($time, 2) . " AM";
                        }
                      } ?></th>
                </tr>
                <!-- <tr>
                        <th>Ticket Type:</th>
                        <td></td>
                    </tr> -->
                <tr>
                  <td>Seat Number(s):</td>
                  <th><?php echo $seats ?></th>
                </tr>
                <tr>
                  <td>Email:</td>
                  <th><?php echo $email ?></th>
                </tr>
                <tr>
                  <td> Phone Number:</td>
                  <th><?php echo $phone ?></th>
                </tr>

              </table>
            </div>


          </div>
          <div style="align-items: center;
      justify-content: center;
      margin: 0 auto;">
            <div style=" text-align:center; padding:20px 0 20px 0">
              <a class="quickbook" style="text-decoration:none" href="./movies.php">Back to Movies</a>
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