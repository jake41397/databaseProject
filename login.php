<?php
   include("config.php");

   if($_SERVER["REQUEST_METHOD"] == "POST")
   {
      $myemail = $_POST['email'];
      $mypassword = $_POST['password'];

      $sql = "SELECT email FROM Users WHERE email = '$myemail' AND password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $count = mysqli_num_rows($result);

      if($count == 1)
      {
        $_SESSION['loggedin'] = true;
        echo "Logged in!";
        header('Location: index.php');
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $myemail;
      }
      else
      {
        echo "Incorrect Username or Password.";
        $_SESSION['loggedin'] = false;
      }
    }

    if(isset($_SESSION['url']))
      $url = $_SESSION['url'];
    else
      $url = "localhost/surveyToday/index.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Surveyor | Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <!-- navbar -->
     <nav class="navbar navbar-expand-lg fixed-top ">
       <a class="navbar-brand" href="index.php">Home</a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>
       <p class="navbar-brand"><?php if(isset($_SESSION['loggedin'])) echo "Welcome!"; else echo "";?></p>

       <div class="collapse navbar-collapse " id="navbarSupportedContent">
       <ul class="navbar-nav mr-4">
         <li class="nav-item">
         <a class="nav-link" id = "hidden" data-value="name" <?php if(isset($_SESSION['loggedin'])) echo "href=surveys.php"; else echo "href=login.php";?>><?php if (!isset($_SESSION['loggedin'])) echo ""; else echo "Welcome " . $_SESSION['username'];?></a></li>
         <li class="nav-item">
             <a class="nav-link" data-value="survey" href="surveys.php">Survey</a></li>
         <li class="nav-item">
           <a class="nav-link " data-value="team" href="team.php">Team</a></li>
         <li class="nav-item">
           <a class="nav-link " data-value="login"href="login.php"><?php //if($_SESSION['logged']) echo "Logout"; else echo "Login";?></a></li>
         </ul>
       </div>
     </nav>

     <header class="header">
       <div class="overlay"></div>
       <div class="container">
       </br>
       </br>
         <div class="row">
          <div class="col-sm-6">
             <div class="description ">
               <h1>Login: </h1>
               <form method = "post" action = "">
                 <div class="form-group">
                    <label for="usr">Email:</label>
                    <input type="text" name="logemail" value="" placeholder="Email" class="form-control" id="logemail">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password"  name="logpassword" value="" placeholder="Password" class="form-control" id="logpwd">
                  </div>
                  <button id="myBtn" name="commit" value="Login" >Submit</button>
              </form>
             </div>
             <?php
                if(isset($msg))
                {  // Check if $msg is not empty
                    echo '<div class="statusmsg">'.$msg.'</div>'; // Display our message and wrap it with a div with the class "statusmsg".
                }
             ?>
          </div>

          <div class="col-sm-6">
            <div class="description">
              <form method = "post" action = "register.php">
                <h1>Sign Up: </h1>
                <div class="form-group">
                   <label for="email">Email:</label>
                   <input type="text" name="regemail" value="" placeholder="Email" class="form-control" id="regemail">
                 </div>
                 <div class="form-group">
                   <label for="pwd">Password:</label>
                   <input type="password" name="regpassword" value="" placeholder="Password" class="form-control" id="regpwd">
                 </div>
                 <button id="signUp" name="commit" value="Register" >Submit</button>
               </form>
            </div>
          </div>
          <?php
                if(isset($msg))
                {  // Check if $msg is not empty
                    echo '<div class="statusmsg">'.$msg.'</div>'; // Display our message and wrap it with a div with the class "statusmsg".
                }
          ?>
        </div>

         <script type ="text/javascript">
            var logpwd = document.getElementById("logpwd");
            var logusr = document.getElementById("logemail");
            var regpwd = document.getElementById("regpwd");
            var regemail = document.getElementById("regemail");

            myBtn.addEventListener("keyup", function(event)
            {
              if (event.keyCode === 13)
              {
                event.preventDefault();
                document.getElementById("myBtn").click();
              }
            });
          </script>
       </div>
     </header>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src='js/main.js'></script>
  </body>
</html>
