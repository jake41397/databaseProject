<?php
   include("config.php");

   # reset the login error message
   $_SESSION['loginmsg'] = "";

   if(isset($_POST['logemail']) && !empty($_POST['logemail']) AND isset($_POST['logpassword']) && !empty($_POST['logpassword']))
   {
      // email and password sent from form
      $myemail = mysqli_real_escape_string($db,$_POST['logemail']);
      $mypassword = mysqli_real_escape_string($db,$_POST['logpassword']);

      $sql = "SELECT * FROM users WHERE email = '$myemail' AND password = '$mypassword'";
      echo("<script>console.log(". json_encode($sql). ");</script>");
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      $active = !$active;
      $count = mysqli_num_rows($result);

      if($count == 1)
      {
        // If the account has not yet been activated, send them back to try again
        if (!$active)
        {
          $_SESSION['loginmsg'] = "This account has not yet been activated";
          header("Location: login.php");
          exit;
        }

        // Log the user in
        $_SESSION['username'] = $myemail;
        $_SESSION['loggedin'] = true;
        header("Location: index.php");
        exit;
      }
      else
      {
        // The username and password didn't match an account in the database
        $_SESSION['loginmsg'] = "Incorrect Email or Password";
        header("Location: login.php");
        exit;
      }
   }
   else
   {
     // One of the two fields was empty or not set
     $_SESSION['loginmsg'] = "Please fill in both the Email and Password fields";
     header("Location: login.php");
     exit;
   }

    exit;
?>
