<?php
        $servername = 'localhost';  //log in information
        $username = '####';
        $password = '############';
        $dbname = 'Murph';

        $mysqli = new mysqli($servername, $username, $password, $dbname);

        if(mysqli_connect_error()){
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
        }
        $mysqli->select_db($dbname);    //select db


        $date = $_GET['date'];          //getting data from URL data
        $hours = $_GET["hours"];
        $minutes = $_GET['minutes'];
        $seconds = $_GET['seconds'];

        $x = 2 - strlen($hours);        //if length of time in database is not two, adjust string to add a zero, so time is displayed uniformly.
        while($x > 0){
                echo $x;
                $hours = "0" . $hours;
                $x = $x - 1;
        }
        $x = 2 - strlen($minutes);
        while($x > 0){
                echo $x;
                $minutes = "0" . $minutes;
                $x = $x - 1;
        }
        $x = 2 - strlen($seconds);
        while($x > 0){
                echo $x;
                $seconds = "0" . $seconds;
                $x = $x - 1;
        }
        $pushups = $_GET['pushups'];        //getting data from URL data
        $pullups = $_GET['pullups'];
        $squats = $_GET['squats'];
        $total_time = $hours . ": " . $minutes . ": " . $seconds; //concatenating time variables into one
        echo "<html><br>pushups = " . $pushups;         //displaying input form data
        echo "<br>pullups = " . $pullups;
        echo "<br>total time =" . $total_time;
        echo "<br>date = " . $date;
        $sql = "INSERT INTO events (Date, time,pullups,pushups,squats) 
                VALUES ('$date', '$total_time',$pullups,$pushups,$squats)";//storing data into database command
        if ($mysqli->query($sql) === TRUE) {//query command and display error message, if error.
                echo "<br><br>"."A New record was created successfully";
        } else {
                echo "Error: " . $sql . "<br>" . $mysqli->error;
        }

        echo "<form action = 'main.html'><input type = 'submit' value = 'Add another value'></form>";
        echo "<br><form action = 'table.php'><input type = 'submit' value = 'See Table'></form></html>";
?>