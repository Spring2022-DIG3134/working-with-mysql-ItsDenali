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
//


//----------
//----------
//--Lab 8---
//----------
//----------


function updateTable() {
        // Use the global $connection.
        global $connection;
        // Perform validation.
        // (1) Do the keys exist?
        if(isset($_POST["customer_id"]) &&
           isset($_POST["first_name"]) &&
           isset($_POST["last_name"]) &&
           isset($_POST["city"]) &&
           isset($_POST["state"])) {

            // (2) Confirm the values.
            // Convert string input (to prevent injection attacks).
            $firstName = htmlspecialchars($_POST["first_name"]);
            $lastName = htmlspecialchars($_POST["last_name"]);
            $state = htmlspecialchars($_POST["state"]);
            $city = htmlspecialchars($_POST["city"]);
            // With type="number", this will probably be a number,
            //  but, just to be sure, use intval() to force a conversion.
            $customerId = intval($_POST["customer_id"]);

            // Is $connection null?
            // If so, do nothing.
            if($connection != null) {
                // Using the $connection, insert data into the database.
                $results = mysqli_query($connection, "INSERT INTO customers (customer_id, first_name, last_name, city, state) VALUES({$customerId}, '{$firstName}', '{$lastName}', '{$city}', '{$state}')");
            }
        }
    }
?>










<!-- <?php
    
?> -->