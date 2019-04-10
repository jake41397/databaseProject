<?php
include("config.php");

if(isset($_POST['regemail']) && !empty($_POST['regemail']) AND isset($_POST['regpassword']) && !empty($_POST['regpassword']))
{
$email = $_POST['regemail'];
$password =  $_POST['regpassword'];
}
else
{
  #header('Location: login.php');
}

$query = "SELECT * FROM users WHERE email = '$email'";
echo json_Encode($query);
$result = mysqli_query($db,$query);

if($result->num_rows > 0)
  {
    echo "This is already a registered user. Email = ".$email."";

    echo("<script>console.log('User already exists');</script>");

    if(isset($_SESSION['url']))
      $url = $_SESSION['url'];
    else
      $url = "localhost/surveyToday/index.php";

      #header('Location: login.php');
  }
  else
  {
    echo("<script>console.log('Attempting to insert into Users table and send email');</script>");
    $query = "INSERT INTO users (email, password, hash, active) VALUES ('$email','$password', 0, 0)";
    $result = mysqli_query($db, $query);
    
    if (!$result)
    {
        echo("<script>console.log('The user table insertion failed.');</script>");
    }
    else
    {
        echo("<script>console.log('The user table insertion was successful.');</script>");
    }

    $to      = $email; // Send email to our user
    $subject = 'Signup | Verification'; // Give the email a subject
    $message = '

    Thanks for signing up!
    Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.

    ------------------------
    Username: '.$email.'
    Password: '.$password.'
    ------------------------

    Please click this link to activate your account:
    http://www.yourwebsite.com/verify.php?email='.$email.'

    '; // Our message above including the link

    $headers = 'From:noreply@dbsdatabase.com' . "\r\n"; // Set from headers
    mail($to, $subject, $message, $headers); // Send our email

      /*if($result)
        echo "YOUR REGISTRATION IS COMPLETED...";
      else
        echo "Unknown Error!";

      if(isset($_SESSION['url']))
        $url = $_SESSION['url'];
      else
        $url = "localhost/surveyToday/index.php";*/
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $email;
    header('Location: index.php');
  }
?>
