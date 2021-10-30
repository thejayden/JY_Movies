<!DOCTYPE html>
<html>
<?php
session_start();
$rand = rand();
$_SESSION['rand'] = $rand;
@$db = new mysqli('localhost', 'root', '', 'moviesdb');

if (mysqli_connect_errno()) {
  echo "Error: Could not connect to database.  Please try again later.";
  exit;
}

$id = $_POST['quickbook'];
// echo $id;
?>
<?php
$qry = "select * from movies where movie_id = $id";
$result1 = $db->query($qry);
$row1 = $result1->fetch_row();

$qry2 = "select * from movieinfo where movie_id = $id";
$result2 = $db->query($qry2);
$row2 = $result2->fetch_assoc();
?>

<head>
  <title>Book Now - <?php echo $row1[1]; ?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" />
  <link rel="stylesheet" href="../css/carousel.css">
  <link rel="stylesheet" href="../css/style.css">

  <style>
    input {
    /* width: 100%; */
    /* height: 40px; */
    height: 32.5px;
    border-radius: 8px;
    outline: none;
    border: 2px solid #c4c4c4;
    /* padding: 0 30px; */
    box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    /* display: block; */
  }

  </style>
</head>

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
    <form id="bookingform" name="bookingform" action="./confirmation.php" method="post">
      <div class="moviemiddle2">
        <div class="moviebox2">
          <div class="movieimage">
            <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row1[3]) . '" width="315" height="auto" />' ?>
          </div>
          <div class="movieright" style="height:100%; display: flex; flex-direction: column;">
            <!-- <div style="flex-wrap: wrap; display: flex;"> -->
            <!-- <div class="topform">
              <div class="column left">
                <label for="cinema">Cinema:</label>
                <select id="movie" form="bookingform" name="cinema" id="cinema">
                  <option value="1">Woodlands</option>
                  <option value="2">Yishun</option>
                  <option value="3">Jurong</option>
                  <option value="4">Serangoon</option>
                  <option value="5">Pasir Ris</option>
                  <option value="6">Sengkang</option>
                  <option value="7">Orchard</option>
                  <option value="8">Boon Keng</option>
                  <option value="9">Lavender</option>
                  <option value="10">Farrer Park</option>
                </select>
              </div>
              <form>
                <div class="column middle">
                  <input type="date" id="date" name="date">
                </div>
                <div class="column right">
                  <input type="time" id="time" name="time">
                </div>
              </form>
            </div> -->
            <?php
            // echo "<p style='color:white'> sesh id" . session_id() . "</p>";
            ?>
            <div class="topform" style="padding-right:80px">
              <label for="cinema">Cinema:</label>
              <select form="bookingform" name="cinema" id="cinema" required>
                <option value="" disabled selected hidden>Choose A Cinema</option>
                <option value="JY1">JY Woodlands</option>
                <!-- <option value="JY2">JY Yishun</option>
                <option value="JY3">JY Jurong</option> -->
                <option value="JY4">JY Serangoon</option>
                <option value="JY5">JY Pasir Ris</option>
                <option value="JY6">JY Sengkang</option>
                <option value="JY7">JY Orchard</option>
                <option value="JY8">JY Boon Keng</option>
                <option value="JY9">JY Lavender</option>
                <option value="JY10">JY Farrer Park</option>
              </select>
              <!-- <label for="date">Date:</label> -->
              <input type="date" id="date" name="date" required>
              <div style="text-align:center; padding:10px 0 0 0">
                <label for="timeslot">Timeslot:</label>
                <select form="bookingform" name="timeslot" id="timeslot" required>
                  <option value="" disabled selected hidden>Choose A Timeslot</option>
                  <option value="0000">12AM</option>
                  <option value="1000">10AM</option>
                  <option value="1300">1PM</option>
                  <option value="1600">4PM</option>
                  <option value="1900">7PM</option>
                  <option value="2100">9PM</option>
                </select>
                <!-- <p style="text-align:center; color:red">TEst</p> -->
              </div>
            </div>
            <div id="seatsdisplay" style="margin:auto; text-align:center; display:none">
              <ul class="showcase">
                <li>
                  <div class="seat"></div>
                  <small>Available</small>
                </li>

                <li>
                  <div class="seat selected"></div>
                  <small>Selected</small>
                </li>

                <li>
                  <div class="seat unavail"></div>
                  <small>Unavailable</small>
                </li>
              </ul>
              <div class="container">
                <div class="screen">
                  <span>SCREEN</span>
                </div>
                <div class="row">
                  <div class="xlabel">1</div>
                  <div class="xlabel">2</div>
                  <div class="xlabel">3</div>
                  <div class="xlabel">4</div>
                  <div class="xlabel">5</div>
                  <div class="xlabel">6</div>
                  <div class="xlabel">7</div>
                  <div class="xlabel">8</div>
                  <div class="xlabel">9</div>
                  <div class="xlabel">10</div>
                </div>
                <div class="row" id="rowA">
                  <div class="ylabel">A</div>
                  <div class="seat unavail" id="A1"></div>
                  <div class="seat unavail" id="A2"></div>
                  <div class="seat" id="A3"></div>
                  <div class="seat" id="A4"></div>
                  <div class="seat unavail" id="A5"></div>
                  <div class="seat unavail" id="A6"></div>
                  <div class="seat" id="A7"></div>
                  <div class="seat" id="A8"></div>
                  <div class="seat unavail" id="A9"></div>
                  <div class="seat unavail" id="A10"></div>
                </div>
                <div class="row" id="rowB">
                  <div class="ylabel">B</div>
                  <div class="seat" id="B1"></div>
                  <div class="seat" id="B2"></div>
                  <div class="seat unavail" id="B3"></div>
                  <div class="seat unavail" id="B4"></div>
                  <div class="seat" id="B5"></div>
                  <div class="seat" id="B6"></div>
                  <div class="seat unavail" id="B7"></div>
                  <div class="seat unavail" id="B8"></div>
                  <div class="seat" id="B9"></div>
                  <div class="seat" id="B10"></div>
                </div>

                <div class="row" id="rowC">
                  <div class="ylabel">C</div>
                  <div class="seat unavail" id="C1"></div>
                  <div class="seat unavail" id="C2"></div>
                  <div class="seat" id="C3"></div>
                  <div class="seat" id="C4"></div>
                  <div class="seat unavail" id="C5"></div>
                  <div class="seat unavail" id="C6"></div>
                  <div class="seat" id="C7"></div>
                  <div class="seat" id="C8"></div>
                  <div class="seat unavail" id="C9"></div>
                  <div class="seat unavail" id="C10"></div>
                </div>

                <div class="row" id="rowD">
                  <div class="ylabel">D</div>
                  <div class="seat" id="D1"></div>
                  <div class="seat" id="D2"></div>
                  <div class="seat unavail" id="D3"></div>
                  <div class="seat unavail" id="D4"></div>
                  <div class="seat" id="D5"></div>
                  <div class="seat" id="D6"></div>
                  <div class="seat unavail" id="D7"></div>
                  <div class="seat unavail" id="D8"></div>
                  <div class="seat" id="D9"></div>
                  <div class="seat" id="D10"></div>
                </div>

                <div class="row" id="rowE">
                  <div class="ylabel">E</div>
                  <div class="seat unavail" id="E1"></div>
                  <div class="seat unavail" id="E2"></div>
                  <div class="seat" id="E3"></div>
                  <div class="seat" id="E4"></div>
                  <div class="seat unavail" id="E5"></div>
                  <div class="seat unavail" id="E6"></div>
                  <div class="seat" id="E7"></div>
                  <div class="seat" id="E8"></div>
                  <div class="seat unavail" id="E9"></div>
                  <div class="seat unavail" id="E10"></div>
                </div>

                <div class="row" id="rowF">
                  <div class="ylabel">F</div>
                  <div class="seat" id="F1"></div>
                  <div class="seat" id="F2"></div>
                  <div class="seat unavail" id="F3"></div>
                  <div class="seat unavail" id="F4"></div>
                  <div class="seat" id="F5"></div>
                  <div class="seat" id="F6"></div>
                  <div class="seat unavail" id="F7"></div>
                  <div class="seat unavail" id="F8"></div>
                  <div class="seat" id="F9"></div>
                  <div class="seat" id="F10"></div>
                </div>
              </div>
              <?php
              $qry = "select * from tickets";
              $tic_prices = array();
              if ($result = $db->query($qry)) {
                while ($row = $result->fetch_assoc()) {
                  array_push($tic_prices, $row["tic_price"]);
                }
              }
              ?>
              <div style="margin:auto; min-width:300px; text-align:center; padding-right:60px">
                <label for="ticketprice">Ticket Type:</label>
                <select form="bookingform" name="tickettype" id="tickettype" required>
                  <option value="" disabled selected hidden>Select ticket type</option>
                  <option value=<?php echo $tic_prices[2]; ?>>Standard</option>
                  <option value=<?php echo $tic_prices[1]; ?>>Platinum</option>
                  <option value=<?php echo $tic_prices[0]; ?>>Gold</option>
                </select>
              </div>
            </div>
            <!-- <div> -->
            <table class="ticketbox">
              <tr>
                <th>Ticket Type</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Sub Total</th>
              </tr>
              <tr>
                <td id="ticket_type"></td>
                <td id="ticket_qty"></td>
                <td id="ticket_price"></td>
                <td id="ticket_subtot"></td>
              </tr>
            </table>
            <p id="seat_msg" class="seat_msg" style="text-align:center; color:red"></p>
            <!-- </div> -->
            <div class="contact" style="margin: auto; margin-right:10px; padding-top:20px; min-width:fit-content">
              <div>
                <label for="name">*Name:</label>
                <i class="fas fa-user"></i>
                <input type="text" name="name" id="name" placeholder="Enter your name here">
                <i class="fas fa-exclamation-circle failure-icon"></i>
                <i class="far fa-check-circle success-icon"></i>
                <div class="error"></div>
              </div>
              <div>
                <label for="phone">*Phone:</label>
                <i class="fas fa-phone"></i>
                <input type="text" name="phone" id="phone" placeholder="Enter your phone here">
                <i class="fas fa-exclamation-circle failure-icon"></i>
                <i class="far fa-check-circle success-icon"></i>
                <div class="error"></div>
              </div>
              <div>
                <label for="email">*E-mail:</label>
                <i class="far fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="Enter your Email-ID here">
                <i class="fas fa-exclamation-circle failure-icon"></i>
                <i class="far fa-check-circle success-icon"></i>
                <div class="error"></div>
              </div>
            </div>

            <!-- </div> -->
            <div style="margin-top: 5%; text-align:center">
              <input type="hidden" name="seats" id="seats" value="test" />
              <button type="submit" name="confirmbook" class="quickbook" id="confirmbook" value=<?php echo $row1[0] ?>>Book Tickets</button>
              <br><br>
              <a style="color:whitesmoke; text-decoration:none"href="./movies.php">Back to Movies</a>
            </div>
          </div>

        </div>
      </div>
    </form>
    <script src="../js/quickbooking.js"></script>

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