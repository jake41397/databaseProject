<?php
   define('DB_SERVER', 'localhost:3306');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'bison41397');
   define('DB_DATABASE', 'SurveyToday');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

   session_start(); // starts the session
   $_SESSION['url'] = $_SERVER['REQUEST_URI']; // i.e. "about.php"
   
   // Check connection
   if ($db->connect_error)
   {
       die("Connection failed: " . $db->connect_error);
       echo("<script>console.log('Could not connect to database');</script>");
   } 

   echo "Connected successfully";
   echo("<script>console.log('Successfully connected to  database');</script>");
?>
