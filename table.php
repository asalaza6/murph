<html><!--html table which is completed using php to access mysql table-->
        <table style = "width:100%">

        <tr><td>Date</td><td>Time</td><td>Pullups</td><td>Pushups</td><td>Squats</td></tr>
        <?php
        $servername = 'localhost'; //login info
        $username = '####';
        $password = '############';
        $dbname = 'Murph';

        $mysqli = new mysqli($servername, $username, $password, $dbname);

        if(mysqli_connect_error()){
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
        }
        mysqli_select_db($mysqli, $dbname);//select database



        $sql = "SELECT Date,time, pullups, pushups, squats FROM events";//command to retrieve table

        if($result = mysqli_query($mysqli,$sql)){
                while($row = mysqli_fetch_assoc($result)){//loop through every row in the table.
                        echo "<tr> <td>" . $row['Date'] .
                                " </td><td>" . $row['time'] .
                                " </td><td>" . $row['pullups'] .
                                " </td><td>" . $row['pushups'] .
                                " </td><td>" . $row['squats'] . "</td></tr>";
                }

                mysqli_free_result($result);
        }
        ?>
        </table><br>
        <html><form action = 'main.html'><input type = 'submit' value = 'Enter another value'></form>
        <form action = 'delete_page.php'><input type = 'submit' value = 'Clear Table'></form></html>
</html>