<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'dataproj');
   define('DB_DATABASE', 'login');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

   session_start(); // starts the session
   $_SESSION['url'] = $_SERVER['REQUEST_URI']; // i.e. "about.php"
?>
