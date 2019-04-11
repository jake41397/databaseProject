<?php 
include("config.php");
?>

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
       <p class="navbar-brand"><?php if($_SESSION['loggedin']) echo "Welcome!"; else echo "";?></p>

       <div class="collapse navbar-collapse " id="navbarSupportedContent">
       <ul class="navbar-nav mr-4">
         <li class="nav-item">
         <a class="nav-link" id = "hidden" data-value="name" <?php if(isset($_SESSION['loggedin'])) echo "href=surveys.php"; else echo "href=login.php";?>><?php if (!isset($_SESSION['loggedin'])) echo ""; else echo "Welcome " . $_SESSION['username'];?></a></li>
         <li class="nav-item">
             <a class="nav-link" data-value="survey" href="surveys.php">Survey</a></li>
         <li class="nav-item">
           <a class="nav-link " data-value="team" href="team.php">Team</a></li>
         <li class="nav-item">
           <a class="nav-link " data-value="login" <?php if($_SESSION['loggedin']) echo "href=logout.php"; else echo "href=login.php";?>><?php if($_SESSION['loggedin']) echo "Logout"; else echo "Login";?></a></li>
         </ul>
       </div>
     </nav>

     <header class="header">
       <div class="overlay"></div>
       <div class="container">
         <div class="description ">
           <h1>Your Surveys</br><hr></hr>
             <table>
        <thead>
            <tr>
                <td><h3>Active&nbsp&nbsp|&nbsp&nbsp</h3></td>
                <td><h3>Name&nbsp&nbsp|&nbsp&nbsp</h3></td>
                <td><h3>Description&nbsp&nbsp|&nbsp&nbsp</h3></td>
                <td><h3>Start Date&nbsp&nbsp|&nbsp&nbsp</h3></td>
                <td><h3>End Date&nbsp&nbsp|&nbsp&nbsp</h3></td>
            </tr>
        </thead>
        <tbody>
        <?php

        $survey_list = "";
        $userID = $_SESSION['userID'];
        $result = mysqli_query($db, "SELECT * FROM survey WHERE UserId = '$userID' ORDER BY SurveyId DESC");
        
        if (!$result)
        {
          $survey_list="You have not created any surveys";
          exit;
        }
            while($row = mysqli_fetch_array($result)) 
            {
            ?>
                <tr>
                    <td><?php if ($row['IsOpen'] == 1) echo "Open"; else echo "Closed";?></td>
                    <td><?php echo "<a href=\"viewThisSurvey.php?user=".$userID."&survey=".$row['SurveyId']."\">".$row['SurvName']."</a>";?></td>
                    <td><?php echo $row['Description']?></td>
                    <td><?php echo $row['Start']?></td>
                    <td><?php echo $row['End']?></td>
                </tr>

            <?php
            }
            ?>
            </tbody>
       </table>
            <?php echo $survey_list; ?>
           </h1>
         </div>
       </div>
     </header>

     

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src='js/main.js'></script>
  </body>
</html>


?>