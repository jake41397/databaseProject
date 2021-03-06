<?php
include("config.php");

# reset the register error message
$_SESSION['registermsg'] = "";

if(isset($_POST['regemail']) && !empty($_POST['regemail']) AND isset($_POST['regpassword']) && !empty($_POST['regpassword']))
{
  $email = $_POST['regemail'];
  $password =  $_POST['regpassword'];
  $plainPassword = $password;
  $password = md5($password);
}
else
{
  $_SESSION['registermsg'] = "Please fill in both the Email and Password fields";
  header('Location: login.php');
  exit;
}

$query = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($db,$query);

if($result->num_rows > 0)
  {
    $_SESSION['registermsg'] = "This user already exists";
    echo("<script>console.log('User already exists');</script>");

    if(isset($_SESSION['url']))
      $url = $_SESSION['url'];
    else
      $url = "localhost/surveyToday/index.php";

      header('Location: login.php');
      exit;
  }
  else
  {
    echo("<script>console.log('Attempting to insert into Users table and send email');</script>");
    $hash = md5( rand(0,1000) ); // Generate random 32 character hash and assign it to a local variable.
    $query = "INSERT INTO users (email, password, hash, active) VALUES ('$email','$password', '$hash', 0)";
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
    $subject = 'SurveyToday | Sign-Up Verification'; // Give the email a subject
    $message = '

    Thanks for signing up!
    Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.

    ------------------------
    Username: '.$email.'
    Password: '.$plainPassword.'
    ------------------------

    Please click this link to activate your account:
    https://dbsdatabase.com/verify.php?email='.$email.'&hash='.$hash.'

    '; // Our message above including the link

    $headers = 'From:noreply@dbsdatabase.com' . "\r\n"; // Set from headers
    mail($to, $subject, $message, $headers); // Send our email

    // Go to successful registration landing page
    //header('Location: successfulregistration.php');
    header('Location: verify.php?email='.$email.'&hash='.$hash);
  }
?>
