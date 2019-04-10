<?php session_start();
      //$_SESSION['loggedin'] = false;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Surveyor | Surveys</title>
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

    <div class ="content">

       <div class="overlay"></div>
       <div class="container">
         <div class="description ">
            <h1>Would You Like To Do?</h1>
          </div>
        </div>
     <!-- Survey Boxes Section -->
     <div class="surveybox">
       <div class="container">
         <div class="row">
           <div class="col-lg-3 col-md-3 col-sm-12 item">
             <a href=<?php if(isset($_SESSION['loggedin'])) echo "surveyPage.php"; else echo "login.php";?>>
              <img src="images/createSurveyBox.jpg" class="img-fluid" alt="Create">
              <div class="des">Create a Survey</div>
              <!-- <span class="text-muted">Create</span> -->
            </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 item">
              <a href=<?php if(isset($_SESSION['loggedin'])) echo "viewSurvey.php"; else echo "login.php";?>>
              <img src="images/viewSurveyBox.jpg" class="img-fluid" alt="View">
              <div class="des">View a Survey</div>
              <!-- <span class="text-muted">View</span> -->
            </div>
           </div>
        </div>
     </div>
   </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src='js/main.js'></script>
  </body>
</html>
