
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

    .bookingconfirmation {
      font-family: 'Arial Narrow', Arial, sans-serif;
      letter-spacing: 2.3px;
      font-size: 25px;
      color: whitesmoke;
    }

    .footer {
      font-family: 'Arial Narrow', Arial, sans-serif;
      font-size: medium;
      padding-top: 50px;
      color: whitesmoke;
      background-color: black;
      height: 200px;

    }
  </style>

</head>

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
  <div>
    <div class="moviemiddle1" style="padding: 100px 0 0 0;">
      <div class="moviebox1">&nbsp;BOOKING CONFIRMATION</div>
    </div>
    <?php
    // echo "<p style='color:white'> sesh id" . session_id() . "</p>";
    // @$db = new mysqli('localhost', 'root', '', 'moviesdb');

    // if (mysqli_connect_errno()) {
    //   echo "Error: Could not connect to database.  Please try again later.";
    //   exit;
    // }

    // $name = $_POST['name'];
    // $movie_id = $_POST['confirmbook'];
    // $cinema = $_POST['cinema'];
    // $date = $_POST['date'];
    // $time = $_POST['timeslot'];
    // $ticket = $_POST['tickettype'];
    // $seats = $_POST['seats'];
    // $phone = $_POST['phone'];
    // $email = $_POST['email'];
    ?>
    <?php

    //   if (isset($_SESSION['rand'])) {
    //     echo "<p style='color:white'> top " . $_SESSION['rand'] . "</p>";
    //     $qry = "insert into bookings (movie_id, cinema_id, seats, name, email, phone, date, timeslot, ticket_type) values 
    //   ('" . $movie_id . "', 
    //   '" . $cinema . "', 
    //   '" . $seats . "', 
    //   '" . $name . "', 
    //   '" . $email . "', 
    //   '" . $phone . "', 
    //   '" . $date . "', 
    //   '" . $time . "', 
    //   '" . $ticket . "'
    // );";
    //     if ($insert = $db->query($qry)) {
    //       $cur_bookingId = $insert->insert_id;
    //     }
    //     unset($_SESSION['rand']);
    //     echo "<p style='color:white'> btm " . $_SESSION['rand'] . "</p>";
    //   } else {
    //     $qry = "";
    //   }

    // echo  $db->affected_rows;
    // $row1 = $result1->fetch_row();

    // $qry2 = "select * from movieinfo where movie_id = $id";
    // $result2 = $db->query($qry2);
    // $row2 = $result2->fetch_assoc();
    ?>

    <div class="moviemiddle2">
      <div class="moviebox2">
        <div class="movieimage">
        </div>
        <div class="movieright" style="height:100%; display: flex; flex-direction: column;">
          <div style="flex-wrap: wrap; display: flex;">
            <div>
              <table class="bookingconfirmation">
                <tr>
                  <th>Booking ID:</th>
                  <td><?php echo $_SESSION['bookid']?></td>
                </tr>
                <tr>
                  <th>Name:</th>
                  <td><?php echo $name ?></td>
                </tr>
                <tr>
                  <th>Movie:</th>
                  <td><?php
                      $qry = "select title from movies where movie_id = $movie_id";
                      $result = $db->query($qry);
                      $row = $result->fetch_assoc();
                      echo $row['title'] ?></td>
                </tr>
                <tr>
                  <th>Cinema:</th>
                  <td><?php
                      $qry = "select cinema_name from cinemas where cinema_id = '" . $cinema . "';";
                      $result = $db->query($qry);
                      $row = $result->fetch_assoc();
                      echo $row['cinema_name'] ?></td>
                </tr>
                <tr>
                  <th>Date:</th>
                  <td><?php echo $date ?></td>
                </tr>
                <tr>
                  <th>Time:</th>
                  <td><?php
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
                      } ?></td>
                </tr>
                <!-- <tr>
                        <th>Ticket Type:</th>
                        <td></td>
                    </tr> -->
                <tr>
                  <th>Seat Number(s):</th>
                  <td><?php echo $seats ?></td>
                </tr>
                <tr>
                  <th>Email:</th>
                  <td><?php echo $email ?></td>
                </tr>
                <tr>
                  <th> Phone Number:</th>
                  <td><?php echo $phone ?></td>
                </tr>

              </table>
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
  <!-- <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script> -->
</body>

</html>