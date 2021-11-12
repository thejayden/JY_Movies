<!DOCTYPE html>
<html>
<?php
// session_start();

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
// $_SESSION['bookid'];

@$db = new mysqli('localhost', 'f32ee', 'f32ee', 'f32ee');

if (mysqli_connect_errno()) {
    echo "Error: Could not connect to database.  Please try again later.";
    exit;
}

?>

<head>
    <title>Booking Information</title>
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
            <div class="moviebox1">&nbsp;BOOKING(S) INFORMATION</div>
        </div>
        <div class="moviemiddle2">
            <div class="moviebox2" style="padding-left:20px;">
                <div class="movieright" style="height:100%; display: flex; flex-direction: column;">
                    <div style="flex-wrap: wrap; display: flex;">
                        <?php
                        // echo "<p style='color:white'>$name</p>";
                        // echo "<p style='color:white'>$phone</p>";
                        // echo "<p style='color:white'>$email</p>";
                        $qry = 'select * from bookings where name="' . $name . '" and phone=' . $phone . ' and email="' . $email . '"';
                        // echo "<br><p style='color:white'>$qry</p>";
                        if ($result = $db->query($qry)) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<div style="width:100%">
                        <strong style="align-items: center; text-align:center; justify-content: center;
                        margin: 0 auto; color:yellow; font-size: 20px; display:block; width:100%"> 
                        Booking ID : ' . $row["booking_id"] . ' <br></strong>
                            <table class="bookingconfirmation" style="font-size:20px"><br>
                                <tr>
                                    <td>Movie:</td>';
                                $qry_movie = 'select title from movies where movie_id =' . $row["movie_id"];
                                $result_movie = $db->query($qry_movie);
                                $row_movie = $result_movie->fetch_assoc();
                                echo '<th>' . $row_movie["title"] . '</th>
                                </tr>
                                <tr>
                                    <td>Cinema:</td>';
                                $qry_cinema = 'select cinema_name from cinemas where cinema_id ="' . $row["cinema_id"] . '"';
                                $result_cinema = $db->query($qry_cinema);
                                $row_cinema = $result_cinema->fetch_assoc();
                                echo '<th>' . $row_cinema["cinema_name"] . '</th>
                                </tr>
                                <tr>
                                    <td>Date:</td>
                                    <th>' . $row["date"] . '</th>
                                </tr>
                                <tr>
                                    <td>Time:</td>
                                    <th>';
                                $time_hr = ((int)$row["timeslot"]) / 100;
                                if ($time_hr >= 12) {
                                    if (fmod($time_hr, 12) == 0) {
                                        echo "12:00 PM";
                                    } else {
                                        echo fmod($time_hr, 12) . ":" . substr($row["timeslot"], 2) . " PM";
                                    }
                                } else if ($time_hr < 12) {
                                    if (fmod($time_hr, 12) == 0) {
                                        echo "12:00 AM";
                                    } else {
                                        echo fmod($time_hr, 12) . ":" . substr($row["timeslot"], 2) . " AM";
                                    }
                                }
                                echo '</th>
                                </tr>
                                <tr>
                                    <td>Seat Number(s):</td>';
                                    $qry_tic = 'select tic_type from tickets where tic_price =' . $row["ticket_type"] . '';
                                    $result_tic = $db->query($qry_tic);
                                    $row_tic = $result_tic->fetch_assoc();
                                    echo '<th>' . $row["seats"] . ' (' . $row_tic['tic_type'] . ')</th>
                                </tr>
                            </table>
                            <hr>                       
                        </div>';
                            }
                        } 
                        $result = $db->query($qry);
                        if ($result->fetch_assoc() == null) {
                            echo '<div style="width:100%">
                        <strong style="align-items: center; text-align:center; justify-content: center;
                        margin: 0 auto; color:yellow; font-size: 20px; display:block; width:100%"> 
                        No results found. <br></strong></div>';
                        }
                        ?></div>
                    <!-- <div style="width:100%">
                        <strong style="align-items: center; text-align:center; justify-content: center;
                        margin: 0 auto; color:yellow; font-size: 20px; display:block; width:100%"> 
                        Booking ID : <br></strong>
                            <table class="bookingconfirmation" style="font-size:20px"><br>
                                <tr>
                                    <td>Movie:</td>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td>Cinema:</td>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td>Date:</td>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td>Time:</td>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td>Seat Number(s):</td>
                                    <th></th>
                                </tr>
                            </table>
                            <hr>                       
                        </div>
                    </div> -->
                    <div style="align-items: center;
      justify-content: center;
      margin: 0 auto;">
                        <div style=" text-align:center; padding:20px 0 20px 0">
                            <a class="quickbook" style="text-decoration:none" href="./checkbooking.php">Back to Check Booking</a>
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