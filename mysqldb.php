<?php
   define('DB_SERVER', 'localhost:3306');
   define('DB_USERNAME', '${{ secrets.DB_USER_NAME }}');
   define('DB_PASSWORD', '${{ secrets.DB_PASSWORD }}');
   define('DB_DATABASE', '${{ secrets.DB_DATABASE }}');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>
