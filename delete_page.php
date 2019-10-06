<?php
        $servername = 'localhost';//login info
        $username = '#####';
        $password = '##########';
        $dbname = 'Murph';

        $mysqli = new mysqli($servername, $username, $password, $dbname);

        if(mysqli_connect_error()){
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
        }
        $mysqli->select_db($dbname);//select db name.


        $sql = "DELETE FROM events";//command that deletes all entries in events table.
        if ($mysqli->query($sql) === TRUE) {
                echo "Cleared all data.";
        } else {
                echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
        header('Location: table.php');//return webpage to table page
?>