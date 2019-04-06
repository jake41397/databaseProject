<?php
   include("config.php");

   if($_SERVER["REQUEST_METHOD"] == "POST")
   {
      // email and password sent from form
      $myemail = mysqli_real_escape_string($db,$_POST['email']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);

      $sql = "SELECT email FROM u_login WHERE Email = '$myemail' AND Password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      $count = mysqli_num_rows($result);

      if($count == 1)
      {
        echo "Logged in!";
      }
      else
      {
        echo "Incorrect Username or Password.";
      }
    }

    if(isset($_SESSION['url']))
      $url = $_SESSION['url'];
    else
      $url = "localhost/surveyToday/login.html";

    header("location: $url");
?>
