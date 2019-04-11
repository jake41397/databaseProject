<?php
   include("config.php");

   # reset the login error message
   $_SESSION['surveyCreationMessage'] = "";

   // Check Survey Title
   if (isset($_POST['title']) && !empty($_POST['title']))
   {
       $surveyName = mysqli_real_escape_string($db,$_POST['title']);
   }
   else
   {
       $_SESSION['surveyCreationMessage'] = "Please enter a title for the survey";
       header("Location: createSurvey.php");
       exit;
   }

   // Check the Description
   if (isset($_POST['descript']) && !empty($_POST['descript']))
   {
       $surveyDesc = mysqli_real_escape_string($db,$_POST['descript']);
   }
   else
   {
       $_SESSION['surveyCreationMessage'] = "Please enter a description for the survey";
       header("Location: createSurvey.php");
       exit;
   }

   // Check Survey Start Date
   if (isset($_POST['surveyStart']) && !empty($_POST['surveyStart']))
   {
       $startDate = mysqli_real_escape_string($db,$_POST['surveyStart']);
   }
   else
   {
       $_SESSION['surveyCreationMessage'] = "Please enter the start date for the survey";
       header("Location: createSurvey.php");
       exit;
   }

   // Check Survey End Date
   if (isset($_POST['surveyEnd']) && !empty($_POST['surveyEnd']))
   {
        $endDate = mysqli_real_escape_string($db, $_POST['surveyEnd']);
   }
   else
   {
       $_SESSION['surveyCreationMessage'] = "Please enter the end date for the survey";
       header("Location: createSurvey.php");
       exit;
   }

   // Check Email List
   if (isset($_POST['emaillist']) && !empty($_POST['emaillist']))
   {
       $emailList = explode(",", $_POST['emaillist']);

       // trim return or space characters from beginning and end of each of the emails
       for($i = 0; $i < count($emailList); $i++)
       {
           $emailList[$i] = trim($emailList[$i], " \t\n\r\0\x0B ");
       }
   }
   else
   {
       $_SESSION['surveyCreationMessage'] = "Please enter the participants' email addresses separated by commas";
       header("Location: createSurvey.php");
       exit;
   }

   // Check Question 1 Type
   if (isset($_POST['question1Type']) && !empty($_POST['question1Type']))
   {
       // This must be an actual question (Type 1 or 2)
       $q1Type = $_POST['question1Type'];

       if (isset($_POST['question1']) && !empty($_POST['question1']))
       {
           $q1 = mysqli_real_escape_string($db, $_POST['question1']);
       }
       else
       {
           // There must be a question in this question :)
           $_SESSION['surveyCreationMessage'] = "Please add the question text for Question 1";
           header("Location: createSurvey.php");
           exit;
       }
   }
   else
   {
       // There must be at least one question in the survey
       $_SESSION['surveyCreationMessage'] = "Please add at least one question to the survey";
       header("Location: createSurvey.php");
       exit;
   }

   // Check Question 2 Type
   if (isset($_POST['question2Type']) && !empty($_POST['question2Type']))
   {
       // This must be an actual question (Type 1 or 2)
       $q2Type = $_POST['question2Type'];

       if (isset($_POST['question2']) && !empty($_POST['question2']))
       {
           $q2 = mysqli_real_escape_string($db, $_POST['question2']);
       }
       else
       {
           // There must be a question in this question :)
           $_SESSION['surveyCreationMessage'] = "Please add the question text for Question 2";
           header("Location: createSurvey.php");
           exit;
       }
   }

   // Check Question 3 Type
   if (isset($_POST['question3Type']) && !empty($_POST['question3Type']))
   {
       // This must be an actual question (Type 1 or 2)
       $q3Type = $_POST['question3Type'];

       if (isset($_POST['question3']) && !empty($_POST['question3']))
       {
           $q3 = mysqli_real_escape_string($db, $_POST['question3']);
       }
       else
       {
           // There must be a question in this question :)
           $_SESSION['surveyCreationMessage'] = "Please add the question text for Question 3";
           header("Location: createSurvey.php");
           exit;
       }
   }

   // Check Question 4 Type
   if (isset($_POST['question4Type']) && !empty($_POST['question4Type']))
   {
       // This must be an actual question (Type 1 or 2)
       $q4Type = $_POST['question4Type'];

       if (isset($_POST['question4']) && !empty($_POST['question4']))
       {
           $q4 = mysqli_real_escape_string($db, $_POST['question4']);
       }
       else
       {
           // There must be a question in this question :)
           $_SESSION['surveyCreationMessage'] = "Please add the question text for Question 4";
           header("Location: createSurvey.php");
           exit;
       }
   }

   // Check Question 5 Type
   if (isset($_POST['question5Type']) && !empty($_POST['question5Type']))
   {
       // This must be an actual question (Type 1 or 2)
       $q5Type = $_POST['question5Type'];

       if (isset($_POST['question5']) && !empty($_POST['question5']))
       {
           $q5 = mysqli_real_escape_string($db, $_POST['question5']);
       }
       else
       {
           // There must be a question in this question :)
           $_SESSION['surveyCreationMessage'] = "Please add the question text for Question 5";
           header("Location: createSurvey.php");
           exit;
       }
   }

    // Insert this survey into the database
    $userID = $_SESSION['userID'];

    $query = "INSERT INTO survey (UserID, SurvName, Description, IsOpen, Start, End) VALUES ('$userID', '$surveyName', '$surveyDesc', 1, '$startDate', '$endDate')";
    $result = mysqli_query($db, $query);
    echo json_encode($query);
    echo json_encode($result);
    
    // check if the survey successfully inserted
    if (!$result)
    {
        $_SESSION['surveyCreationMessage'] = "The insertion of this survey into the database failed.";
        //header("Location: createSurvey.php");
    }

    // Fetch the surveyId we just inserted
    $surveyID = mysqli_insert_id($db);

    if (isset($q1Type) && $q1Type != "0")
    {
        $query = "INSERT INTO questions (Type, QuestDes, SurveyId) VALUES ('$q1Type', '$q1', '$surveyID')";
        $result = mysqli_query($db, $query);
    }

    if (isset($q2Type) && $q2Type != "0")
    {
        $query = "INSERT INTO questions (Type, QuestDes, SurveyId) VALUES ('$q2Type', '$q2', '$surveyID')";
        $result = mysqli_query($db, $query);
    }

    if (isset($q3Type) && $q3Type != "0")
    {
        $query = "INSERT INTO questions (Type, QuestDes, SurveyId) VALUES ('$q3Type', '$q3', '$surveyID')";
        $result = mysqli_query($db, $query);
    }

    if (isset($q4Type) && $q4Type != "0")
    {
        $query = "INSERT INTO questions (Type, QuestDes, SurveyId) VALUES ('$q4Type', '$q4', '$surveyID')";
        $result = mysqli_query($db, $query);
    }

    if (isset($q5Type) && $q5Type != "0")
    {
        $query = "INSERT INTO questions (Type, QuestDes, SurveyId) VALUES ('$q5Type', '$q5', '$surveyID')";
        $result = mysqli_query($db, $query);
    }

    header("Location: viewSurvey.php");
    exit;
?>
