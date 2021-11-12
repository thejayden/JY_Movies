<?php
    header('Content-Type: application/json');

    @$db = new mysqli('localhost', 'f32ee', 'f32ee', 'f32ee');

    $date = $_POST["date"];
    $time = $_POST["time"];
    $cinema = $_POST["cinema"];
    $movie = $_POST["movie"];

    $qry = "SELECT seats FROM bookings where movie_id=$movie and date='$date' and timeslot=$time and cinema_id='$cinema'";

    $result = mysqli_query($db,$qry);

    $data = array();
    foreach ($result as $row) {
	    $data[] = $row;
    }

    mysqli_close($db);
    $fp = fopen("../trash.txt","w");
    if (!$fp){
        $message = "Error writing to file. Try again later!" ;
    }else{
        fwrite($fp, json_encode($data));
        $message = "File saved!"; 
    }
    fclose($fp);

    echo json_encode($data);
?>
