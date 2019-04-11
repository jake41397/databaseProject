<?php session_start(); ?>

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

      <form method="post" action="processSurveyCreation.php" class="formbkg">
      <label for="title">Title</label>
      <input type="text" name="title" value="" placeholder="Title" class="form-control" id="title">
      <hr></hr>

      <label for="descript">Description</label>
      <textarea rows="4" cols="50" name="descript" value ="" class="form-control" id="descript"></textarea>
      </br>
      <hr></hr>

      <label for="start">Start Date</label>
      <input type="date" id="start" name="surveyStart" value="<?php echo date("Y-m-d");?>"  min="2019-03-18" max="2020-12-31">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <label for="end">End Date</label>
      <input type="date" id="end" name="surveyEnd" value="<?php echo date("Y-m-d");?>"  min="2019-03-18" max="2020-12-31">
      </br>
      <hr></hr>

      <p>Email List</p>
      <textarea name="emaillist" id="emaillist" rows="2" cols="50"></textarea>
       <hr></hr>
           <p>Question 1</p>
           <div class="form-group">
            <select class="form-control" name="question1Type" id="sel1" onchange="myFunction(this.value, 1)">
              <option value="0">--Pick Question Type--</option>
              <option value="1">Multiple Choice</option>
              <option value="2">Long Answer</option>
            </select>
          </div>

          <div id="form_sample1"></div>
          
          <hr></hr>
          <p>Question 2</p>
          <div class="form-group">
           <select class="form-control" name="question2Type" id="sel1" onchange="myFunction(this.value, 2)">
             <option value="0">--Pick Question Type--</option>
             <option value="1">Multiple Choice</option>
             <option value="2">Long Answer</option>
           </select>
         </div>

         <div id="form_sample2"></div>

         <hr></hr>
         <p>Question 3</p>
         <div class="form-group">
          <select class="form-control" name="question3Type" id="sel1" onchange="myFunction(this.value, 3)">
            <option value="0">--Pick Question Type--</option>
            <option value="1">Multiple Choice</option>
            <option value="2">Long Answer</option>
          </select>
        </div>

        <div id="form_sample3"></div>
        
        <hr></hr>
        <p>Question 4</p>
        <div class="form-group">
         <select class="form-control" name="question4Type" id="sel1" onchange="myFunction(this.value, 4)">
           <option value="0">--Pick Question Type--</option>
           <option value="1">Multiple Choice</option>
           <option value="2">Long Answer</option>
         </select>
       </div>

       <div id="form_sample4"></div>
       <hr></hr>
       <p>Question 5</p>
       <div class="form-group">
        <select class="form-control" name="question5Type" id="sel1" onchange="myFunction(this.value, 5)">
          <option value="0">--Pick Question Type--</option>
          <option value="1">Multiple Choice</option>
          <option value="2">Long Answer</option>
        </select>
      </div>

      <div id="form_sample5"></div>
      <hr></hr>
      <?php
        if (isset($_SESSION['surveyCreationMessage']))
        {
          echo $_SESSION['surveyCreationMessage'];
        }
      ?>
      </br>
      <input type="submit" value="Create Survey">
    </br>
    </br>
  </form>
  </div>

          <script>
              function myFunction(value, question)
              {
                var x = value;

                if(x == 0)
                {
                  if ( $('#form_sample' + question).text().length == 0 )
                  {

                  }
                  else
                  {
                    $('#form_sample' + question).empty();
                  }
                }
                else if(x == 1)
                {
                  if ( $('#form_sample' + question).text().length == 0 )
                  {
                    // Fetch this question's div element
                    var x = document.getElementById("form_sample" + question);

                    var questionlabel = document.createElement('label'); // Create Label for Name Field
                    questionlabel.innerHTML = "Question&nbsp;"; // Set Field Labels
                    x.appendChild(questionlabel);

                    var questionInput = document.createElement('input'); // Create Input Field for the question itself
                    questionInput.setAttribute("type", "text");
                    questionInput.setAttribute("name", "question" + question); // identify this input field (ex: question1)
                    x.appendChild(questionInput);
                  }
                  else
                  {
                    $('#form_sample' + question).empty();
                    myFunction(value, question);
                  }
                }
                else if (x == 2)
                {
                  if ( $('#form_sample' + question).text().length == 0 )
                  {
                    // Fetch this question's div element
                    var x = document.getElementById("form_sample" + question);

                    var questionlabel = document.createElement('label'); // Create Label for Name Field
                    questionlabel.innerHTML = "Question&nbsp;"; // Set Field Labels
                    x.appendChild(questionlabel);

                    var questionInput = document.createElement('input'); // Create Input Field for actual question
                    questionInput.setAttribute("type", "text");
                    questionInput.setAttribute("name", "question" + question);
                    questionInput.setAttribute("size", "42");
                    x.appendChild(questionInput);
                  }
                  else
                  {
                    $('#form_sample' + question).empty();
                    myFunction(value, question);
                  }
                }
              }
          </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src='js/main.js'></script>
    <script type="text/javascript" src="js/survey2.js"></script>
  </body>
</html>
