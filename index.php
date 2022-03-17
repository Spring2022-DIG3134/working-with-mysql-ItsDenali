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
       close();
    ?>
  </body>
</html>