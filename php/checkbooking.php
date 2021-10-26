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

    .moviemiddle2 {
        justify-content: center;
        display: flex;
        padding: 50px 0 20px 0;
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

    .moviebox2 {
        width: 1000px;
        height: auto;
        background-color: rgba(7, 21, 78, 0.623);
        color: whitesmoke;
        text-align: left;
        padding: 20px 0 20px 20px;
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

.bookingconfirmation{
    font-family: 'Arial Narrow', Arial, sans-serif;
    letter-spacing: 2.3px;
    font-size: 25px;
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

    <div>
        <div class="moviemiddle1" ;>
            <div class="moviebox1" style="width:85%">&nbsp;&nbsp;CHECK BOOKING</div>
        </div>
        <div class="moviemiddle2">
            <div class="moviebox2" style="width:85%">
                <table class="bookingconfirmation">
                    <tr>
                        <th>Booking ID:</th>
                    </tr>
                    <tr>
                        <th>Movie:</th>
                    </tr>
                    <tr>
                        <th>Cinema:</th>
                    </tr>
                    <tr>
                        <th>Date:</th>
                    </tr>
                    <tr>
                        <th>Time:</th>
                    </tr>
                    <tr>
                        <th> Seat Number(s):</th>
                    </tr>
                    <tr>
                        <th>Email:</th>
                    </tr>
                    <tr>
                        <th> Phone Number:</th>
                    </tr>

                </table>
            </div>

        </div>

    </div>

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