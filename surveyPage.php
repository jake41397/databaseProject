<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Surveyor</title>
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

       <div class="collapse navbar-collapse " id="navbarSupportedContent">
       <ul class="navbar-nav mr-4">
         <li class="nav-item">
             <a class="nav-link" id = "hidden" data-value="name" href="surveys.php">Welcome INSERT NAME</a></li>
         <li class="nav-item">
             <a class="nav-link" data-value="survey" href="surveys.php">Survey</a></li>
         <li class="nav-item">
           <a class="nav-link " data-value="team" href="team.php">Team</a></li>
         <li class="nav-item">
           <a class="nav-link " data-value="login"href="login.php">Login</a></li>
         </ul>
       </div>
     </nav>

       <div class="container">
       </br>
           <p>Question 1: </p>
           <div class="form-group">
            <label for="sel1">Question Type:</label>
            <select class="form-control" id="sel1" onchange="myFunction(this.value)">
              <option value="">--Pick Option--</option>
              <option value="1">Multiple Choice</option>
              <option value="2">Long Answer</option>
            </select>
            <p id="choice"></p>
          </div>

          <script>
              function myFunction(value)
              {
                var x = value;
                var text = "";

                if(x == 1)
                  creSur();
                else if (x == 2)
                  text = "Type 2";
                else
                  ;

                //document.getElementById("choice").innerHTML = text;
              }
          </script>
       </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src='js/main.js'></script>
    <script type="text/javascript" src="survey2.js"></script>
  </body>
</html>
