<?php include("config.php"); ?>
<script src="js/takeSurveyHelper.js" type="text/javascript"></script> 

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

      <div class="container">
      </br>
      </br>
      </br>

      <?php

        if (isset($_GET['part']) && !empty($_GET['part']) AND isset($_GET['survey']) && !empty($_GET['survey']))
        {
            $partID = mysqli_escape_string($db,$_GET['part']);
            $_SESSION['partID'] = $partID;

            $surveyID = mysqli_escape_string($db, $_GET['survey']);
            $_SESSION['surveyID'] = $surveyID;

            // Make sure this is a valid participant (who hasn't already participated)
            $query = "SELECT * FROM participant WHERE PartId='".$partID."' AND SurveyId='".$surveyID."' AND Done='0'";
            $search = mysqli_query($db, $query);
            $match = mysqli_num_rows($search);
            $row = mysqli_fetch_assoc($search);

            $_SESSION['validSurvey'] = false;

            if ($row)
            {
                // get the questions for this survey
                $query = "SELECT * FROM questions WHERE SurveyId='$surveyID' ORDER BY QuestionId ASC";
                $search = mysqli_query($db, $query);
                $numQuestions = mysqli_num_rows($search);

                $i = 1;

                // Loop through the rows returned by the search
                while ($row = mysqli_fetch_assoc($search))
                {
                    // Store the question type and question text in session variables
                    $_SESSION['q'.$i.'Type'] = $row['Type'];
                    $_SESSION['q'.$i.''] = $row['QuestDes'];

                    $i++;
                }

                $search = mysqli_query($db, "SELECT * FROM survey WHERE SurveyId='$surveyID'");

                // If it is a valid survey ID
                if ($row = mysqli_fetch_assoc($search))
                {
                    $_SESSION['SurveyName'] = $row['SurvName'];
                    $_SESSION['SurveyDesc'] = $row['Description'];

                    if (!$row['IsOpen'])
                    {
                        echo '<div class="statusmsg">This survey has concluded.</div>';
                    }
                    else
                    {
                        $_SESSION['validSurvey'] = true;
                    }
                }

                // update this participant to reflect that they have just participated (set done to true)
                //mysqli_query($db, "UPDATE participant SET Done='1' WHERE PartId='".$partID."' AND SurveyId='".$surveyID."' AND Done='0'");   
            }
            else
            {
                echo '<div class="statusmsg">This is not a valid survey link.</div>';
                exit;
            }
        }
        else
        {
            exit;
        }
      ?>

      <form method="post" action="index.php" class="formbkg">
      <label for="title">Survey:</label>
      <p><?php if ($_SESSION['validSurvey']) echo $_SESSION['SurveyName']; else echo "This is not a valid survey link.";?></p>
      <hr></hr>

      <label for="descript">Description:</label>
      <p><?php if ($_SESSION['validSurvey']) echo $_SESSION['SurveyDesc']; else echo "This is not a valid survey link.";?></p>
       <hr></hr>
          <div id="form_sample1">
            <?php
                if (isset($_SESSION['q1Type']))
                {
                    echo "<script>
                    myFunction(".$_SESSION['q1Type'].", ".json_encode($_SESSION['q1']).", 1);
                    </script>";
                }
            ?>
          </div>
        <hr></hr>
          <div id="form_sample2">
            <?php
                if (isset($_SESSION['q2Type']))
                {
                    echo "<script>
                    myFunction(".$_SESSION['q2Type'].", ".json_encode($_SESSION['q2']).", 2);
                    </script>";
                }
            ?>
          </div>
        <hr></hr>
          <div id="form_sample3">  
             <?php
                if (isset($_SESSION['q3Type']))
                {
                    echo "<script>
                    myFunction(".$_SESSION['q3Type'].", ".json_encode($_SESSION['q3']).", 3);
                    </script>";
                }
            ?>
          </div>
        <hr></hr>
          <div id="form_sample4">
            <?php
                if (isset($_SESSION['q4Type']))
                {
                    echo "<script>
                    myFunction(".$_SESSION['q4Type'].", ".json_encode($_SESSION['q4']).", 4);
                    </script>";
                }
            ?>
          </div>
        <hr></hr>
          <div id="form_sample5">
            <?php
                if (isset($_SESSION['q5Type']))
                {
                    echo "<script>
                    myFunction(".$_SESSION['q5Type'].", ".json_encode($_SESSION['q5']).", 5);
                    </script>";
                }
            ?>
          </div>
        <hr></hr>
        <input type="submit" value="Submit">
       </br>
       </br>
       </form>
       </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src='js/main.js'></script>
    <script type="text/javascript" src="js/survey2.js"></script>
  </body>
</html>
