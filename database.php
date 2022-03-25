<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "sales";
    $connection = null;

    function connect() {
        global $server;
        global $username;
        global $password;
        global $database;
        global $connection;

        //Checks for connection, connects if not already
        if($connection == null) {
            $connection = mysqli_connect($server, $username, $password, $database);
        }
    }

    function salesTable() {
        global $connection;

        //Checks connection, does nothing if already connected.
        if($connection != null) {
            
            //Get the results of a query using the connection
            //Read first name, last name, city, and state.
            $results = mysqli_query($connection, "SELECT first_name, last_name, city, state FROM `customers`");

            //HTML Table.
            echo("<table><tbody>");
            echo("<th>First Name: </th>");
            echo("<th>Last Name: </th>");
            echo("<th>City: </th>");
            echo("<th>State: </th>");

            //Generates a new row for each HTML Row.
            while($row = mysqli_fetch_assoc($results)) {
                
                echo("<tr>");

                    //Adds an HTML using collumn for each entry using echo().
                    echo("<td>".$row['first_name']."</td>");
                    echo("<td>".$row['last_name']."</td>");
                    echo("<td>".$row['city']."</td>");
                    echo("<td>".$row['state']."</td>");

                echo("</tr>");
            }
            echo("</tbody></table>");
        }
    }

    function close() {
        global $connection;

        //Is connection *not* null?
        if($connection != null) {
            //If so, close the connection.
            mysqli_close($connection);
        }
    } 
?>