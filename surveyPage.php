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

      <div class="container">
      </br>
      </br>
      </br>
      <form method="post" action="" class="formbkg">
      <label for="title">Title:</label>
      <input type="text" name="title" value="" placeholder="Title" class="form-control" id="title">

      <label for="descript">Description</label>
      <textarea rows="4" cols="50" name="descript" value ="" class="form-control" id="descript"></textarea>

      <label for="start">Start Date</label>
      <input type="date" id="start" name="surveyStart" value="2019-03-18"  min="2019-03-18" max="2020-12-31">

      <label for="start">End Date</label>
      <input type="date" id="end" name="surveyEnd" value="2019-03-18"  min="2019-03-18" max="2020-12-31">

       </br>
       </br>
           <p>Question 1:</p>
           <div class="form-group">
            <label for="sel1">Question Type:</label>
            <select class="form-control" id="sel1" onchange="myFunction(this.value, 1)">
              <option value="">--Pick Option--</option>
              <option value="1">Multiple Choice</option>
              <option value="2">Long Answer</option>
            </select>
          </div>

          <div id="form_sample1"></div>

          <p>Question 2:</p>
          <div class="form-group">
           <label for="sel1">Question Type:</label>
           <select class="form-control" id="sel1" onchange="myFunction(this.value, 2)">
             <option value="">--Pick Option--</option>
             <option value="1">Multiple Choice</option>
             <option value="2">Long Answer</option>
           </select>
         </div>

         <div id="form_sample2"></div>


         <p>Question 3: </p>
         <div class="form-group">
          <label for="sel1">Question Type:</label>
          <select class="form-control" id="sel1" onchange="myFunction(this.value, 3)">
            <option value="">--Pick Option--</option>
            <option value="1">Multiple Choice</option>
            <option value="2">Long Answer</option>
          </select>
        </div>

        <div id="form_sample3"></div>

        <p>Question 4: </p>
        <div class="form-group">
         <label for="sel1">Question Type:</label>
         <select class="form-control" id="sel1" onchange="myFunction(this.value, 4)">
           <option value="">--Pick Option--</option>
           <option value="1">Multiple Choice</option>
           <option value="2">Long Answer</option>
         </select>
       </div>

       <div id="form_sample4"></div>

       <p>Question 5: </p>
       <div class="form-group">
        <label for="sel1">Question Type:</label>
        <select class="form-control" id="sel1" onchange="myFunction(this.value), 5">
          <option value="">--Pick Option--</option>
          <option value="1">Multiple Choice</option>
          <option value="2">Long Answer</option>
        </select>
      </div>

      <div id="form_sample5"></div>

      <input type="submit" value="Submit">
    </br>
    </br>
  </form>
  </div>

          <script>
              function myFunction(value, question)
              {
                var x = value;

                if(x == 1)
                {
                  // Fetching HTML Elements in Variables by ID.
                  var x = document.getElementById("form_sample" + question);
                  var createform = document.createElement('form'); // Create New Element Form
                  createform.setAttribute("action", ""); // Setting Action Attribute on Form
                  createform.setAttribute("method", "post"); // Setting Method Attribute on Form
                  x.appendChild(createform);

                /*  var heading = document.createElement('h2'); // Heading of Form
                  heading.innerHTML = "Contact Form ";
                  createform.appendChild(heading);*/

                  var line = document.createElement('hr'); // Giving Horizontal Row After Heading
                  createform.appendChild(line);

                  var linebreak = document.createElement('br');
                  createform.appendChild(linebreak);

                  var questionlabel = document.createElement('label'); // Create Label for Name Field
                  questionlabel.innerHTML = "Question : "; // Set Field Labels
                  createform.appendChild(questionlabel);

                  var inputelement = document.createElement('input'); // Create Input Field for Name
                  inputelement.setAttribute("type", "text");
                  inputelement.setAttribute("name", "dname");
                  createform.appendChild(inputelement);

                  var linebreak = document.createElement('br');
                  createform.appendChild(linebreak);

                  var messagelabel = document.createElement('label'); // Append Textarea
                  messagelabel.innerHTML = "Answer : ";
                  createform.appendChild(messagelabel);

                  var linebreak2 = document.createElement('br');
                  createform.appendChild(linebreak2);

                  var radioelement = document.createElement('input');
                  radioelement.setAttribute("id", "rating1");
                  radioelement.setAttribute("type", "radio");
                  radioelement.setAttribute("value", "1");
                  createform.appendChild(radioelement);

                  var radiolabel1 = document.createElement('label');
                  radiolabel1.setAttribute("for", "rating1");
                  radiolabel1.innerHTML = "1 ";
                  createform.appendChild(radiolabel1);

                  var radioelement2 = document.createElement('input');
                  radioelement2.setAttribute("id", "rating2");
                  radioelement2.setAttribute("type", "radio");
                  radioelement2.setAttribute("value", "2");
                  createform.appendChild(radioelement2);

                  var radiolabel2 = document.createElement('label');
                  radiolabel2.setAttribute("for", "rating2");
                  radiolabel2.innerHTML = "2 ";
                  createform.appendChild(radiolabel2);

                  var radioelement3 = document.createElement('input');
                  radioelement3.setAttribute("id", "rating3");
                  radioelement3.setAttribute("type", "radio");
                  radioelement3.setAttribute("value", "3");
                  createform.appendChild(radioelement3);

                  var radiolabel3 = document.createElement('label');
                  radiolabel3.setAttribute("for", "rating3");
                  radiolabel3.innerHTML = "3 ";
                  createform.appendChild(radiolabel3);

                  var radioelement4 = document.createElement('input');
                  radioelement4.setAttribute("id", "rating4");
                  radioelement4.setAttribute("type", "radio");
                  radioelement4.setAttribute("value", "4");
                  createform.appendChild(radioelement4);

                  var radiolabel4 = document.createElement('label');
                  radiolabel4.setAttribute("for", "rating3");
                  radiolabel4.innerHTML = "4 ";
                  createform.appendChild(radiolabel4);

                  var radioelement5 = document.createElement('input');
                  radioelement5.setAttribute("id", "rating5");
                  radioelement5.setAttribute("type", "radio");
                  radioelement5.setAttribute("value", "5");
                  createform.appendChild(radioelement5);

                  var radiolabel5 = document.createElement('label');
                  radiolabel5.setAttribute("for", "rating5");
                  radiolabel5.innerHTML = "5 ";
                  createform.appendChild(radiolabel5);

                  var messagebreak = document.createElement('br');
                  createform.appendChild(messagebreak);

                  /*var submitelement = document.createElement('input'); // Append Submit Button
                  submitelement.setAttribute("type", "submit");
                  submitelement.setAttribute("name", "dsubmit");
                  submitelement.setAttribute("value", "Submit");
                  createform.appendChild(submitelement);*/

                  x.insertbefore(createform, x.childNodes[0]);
                }
                else if (x == 2)
                {
                  // Fetching HTML Elements in Variables by ID.
                  var x = document.getElementById("form_sample" + question);
                  var createform = document.createElement('form'); // Create New Element Form
                  createform.setAttribute("action", ""); // Setting Action Attribute on Form
                  createform.setAttribute("method", "post"); // Setting Method Attribute on Form
                  x.appendChild(createform);

                  var line = document.createElement('hr'); // Giving Horizontal Row After Heading
                  createform.appendChild(line);

                  var linebreak = document.createElement('br');
                  createform.appendChild(linebreak);

                  var questionlabel = document.createElement('label'); // Create Label for Name Field
                  questionlabel.innerHTML = "Question : "; // Set Field Labels
                  createform.appendChild(questionlabel);

                  var inputelement = document.createElement('input'); // Create Input Field for Name
                  inputelement.setAttribute("type", "text");
                  inputelement.setAttribute("name", "dname");
                  createform.appendChild(inputelement);

                  var linebreak = document.createElement('br');
                  createform.appendChild(linebreak);

                  var messagelabel = document.createElement('label'); // Append Textarea
                  messagelabel.innerHTML = "Answer : ";
                  createform.appendChild(messagelabel);

                  var texareaelement = document.createElement('textarea');
                  texareaelement.setAttribute("name", "dmessage");
                  createform.appendChild(texareaelement);

                  var messagebreak = document.createElement('br');
                  createform.appendChild(messagebreak);

                  x.insertbefore(createform, x.childNodes[0]);
                }
                else
                  ;

              }
          </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src='js/main.js'></script>
    <script type="text/javascript" src="survey2.js"></script>
  </body>
</html>
