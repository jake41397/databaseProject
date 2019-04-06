<?php
  include("config.php");

  $email = $_POST['email'];
  $password =  $_POST['password'];
  $query = "SELECT email FROM u_login WHERE Email = '$email'";
  $result = mysqli_query($db,$query);

  if($result)
  {
    echo "This is already a registered user.";

    if(isset($_SESSION['url']))
      $url = $_SESSION['url'];
    else
      $url = "localhost/surveyToday/index.php";
  }
  else
  {
    $query = "INSERT INTO u_login (email,password, UserID, Verified) VALUES ('$email','$password', 0, false)";
    $result = mysqli_query($db,$query);

    if($result)
      echo "YOUR REGISTRATION IS COMPLETED...";
    else
      echo "Unknown Error!";

    if(isset($_SESSION['url']))
      $url = $_SESSION['url'];
    else
      $url = "localhost/surveyToday/index.php";
  }
?>
