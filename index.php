<?php
    INCLUDE("database.php");
?>
<html>
  <head>
    <title>Sales</title>
  </head>
  <body>
   <h2>Current Sales</h2>
    <?php
       connect();
       salesTable();
       updateTable();
       close();
    ?>

    <!--Creates fields-->

    <?php 
    function updateTable() {
        
        echo("<form action='/index.php'>");

        echo("<label for='customer_id'>First name:</label><br>");
        echo("<input type='number' id='customer_id' name='customer_id'>");

        echo("<br>");

        echo("<label for='first_name'>Last name:</label><br>");
        echo("<input type='text' id='first_name' name='first_name'>")

        echo("<br>")

        echo("<label for='last_name'>Last name:</label><br>");
        echo("<input type='text' id='last_name' name='last_name'>");
        
        echo("<br>");

        echo("<label for='city'>Last name:</label><br>");
        echo("<input type='text' id='city' name='city'>");

        echo("<br>");

        echo("<label for='state'>Last name:</label><br>");
        echo("<input type='text' id='state' name='state'>");

        echo("<input type=-submit' value='Submit'>");

        echo("</form>");
    ?>

  </body>
</html>