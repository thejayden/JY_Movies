<!DOCTYPE html>
<html>
<?php
@$db = new mysqli('localhost', 'root', '', 'moviesdb');

if (mysqli_connect_errno()) {
  echo "Error: Could not connect to database.  Please try again later.";
  exit;
}

$id = $_POST['quickbook'];
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

<head>
  <title>Book Now - <?php echo $row1[1]; ?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" />
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

    /* 
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
  } */

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

    .topform {
      /* padding: 0 0 0px 10px; */
      margin: auto;
      /* padding-right: 50px; */
      text-align: center;
      padding: 20px;
    }

    select {
      height: 32.5px;
      line-height: 15px;
      /* height: 40px; */
      border-radius: 8px;
      outline: none;
      border: 2px solid #c4c4c4;
      /* padding: 0 30px; */
      box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    }

    .contact label {
      float: left;
      clear: left;
      display: block;
      width: 100px;
      text-align: right;
      padding-right: 30px;
      margin-top: 10px;
    }

    /* .contact input {
      margin-top: 10px;
      display: block;
    } */
    /* .contact {
      display: flex;
      flex-direction: column;
      justify-content: center;
      width: 45%;
      max-width: 400px;
      box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
      padding: 50px;
    } */

    .contact div input {
      /* width: 100%; */
      height: 40px;
      border-radius: 8px;
      outline: none;
      border: 2px solid #c4c4c4;
      padding: 0 30px;
      box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
      /* display: block; */
    }

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

    .contact div {
      position: relative;
      margin-bottom: 15px;
    }

    .contact div i {
      position: absolute;
      padding: 10px;
    }

    /* .contact label {
      display: block;
      margin-bottom: 5px;
    } */

    .contact input:focus {
      border: 2px solid #F6C90E;
    }

    .success-icon,
    .failure-icon {
      right: 0;
      opacity: 0;
    }

    .failure-icon,
    .error {
      color: red;
    }

    .success-icon {
      color: green;
    }

    .error {
      font-size: 14.5px;
      margin-top: 5px;
      margin-right: 80px;
      text-align: right;
    }

    .fa-user,
    .fa-phone,
    .fa-envelope {
      color: #CFA90B;
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
            <div class="topform">
              <label for="cinema">Cinema:</label>
              <select form="bookingform" name="cinema" id="cinema" required>
                <option value="" disabled selected hidden>Choose A Cinema</option>
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
              <!-- <label for="date">Date:</label> -->
              <input type="date" id="date" name="date">
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
              </div>
            </div>
            <div style="margin:auto; text-align:center">
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
                  <div class="seat"></div>
                  <div class="seat"></div>
                  <div class="seat unavail"></div>
                  <div class="seat unavail"></div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                  <div class="seat unavail"></div>
                  <div class="seat unavail"></div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                </div>

                <div class="row" id="rowC">
                  <div class="ylabel">C</div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                </div>

                <div class="row" id="rowD">
                  <div class="ylabel">D</div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                </div>

                <div class="row" id="rowE">
                  <div class="ylabel">E</div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                </div>

                <div class="row" id="rowF">
                  <div class="ylabel">F</div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                  <div class="seat"></div>
                  <div class="seat"></div>
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
              <div style="margin:auto; min-width:300px; text-align:center">
                <label for="ticketprice">Ticket Type:</label>
                <select form="bookingform" name="tickettype" id="tickettype" required>
                  <option value="" disabled selected hidden>Select ticket type</option>
                  <option value=<?php echo $tic_prices[0]; ?>>Standard</option>
                  <option value=<?php echo $tic_prices[1]; ?>>Platinum</option>
                  <option value=<?php echo $tic_prices[2]; ?>>Gold</option>
                </select>
              </div>
              <!-- <p class="text">
                You have selected <span id="count">0</span> seats for a price of $<span id="total">0</span>
              </p> -->
            </div>
            <!-- <div> -->
            <table>
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
              <br>
              <a href="./movies.php">Back to Movies</a>
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