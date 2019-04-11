<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Surveyor | Team Members</title>
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
           <a class="nav-link " data-value="login" <?php if(isset($_SESSION['loggedin'])) echo "href=logout.php"; else echo "href=login.php";?>><?php if(isset($_SESSION['loggedin'])) echo "Logout"; else echo "Login";?></a></li>
         </ul>
       </div>
     </nav>

     <header class="header">
       <div class="overlay"></div>
       <div class="container">
         <div class="description ">
             <h1>Hope you like our application!</h1>
             <P></br><h3>Team Members:</h3></br><h4>Jacob Knudson: API, Viewing survey front end</br>Jacob Massaro: Front end, Login/register API</br>Christa Lawrence: Backend</h4></p>
         </div>

       </div>
     </header>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src='js/main.js'></script>
  </body>
</html>
