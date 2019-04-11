function myFunction(value, text, question)
              {

                if (!value)
                {
                    return;
                }

                var x = value;

                if(x == 1)
                {
                    // Fetching HTML Elements in Variables by ID.
                    var x = document.getElementById("form_sample" + question);
                    var createform = document.createElement('form'); // Create New Element Form
                    createform.setAttribute("action", ""); // Setting Action Attribute on Form
                    createform.setAttribute("method", "post"); // Setting Method Attribute on Form
                    x.appendChild(createform);

                    var questionlabel = document.createElement('label'); // Create Label for Name Field
                    questionlabel.innerHTML = "Question: " + JSON.stringify(text); // Set Field Labels
                    createform.appendChild(questionlabel);

                    var linebreak2 = document.createElement('br');
                    createform.appendChild(linebreak2);

                    var linebreak = document.createElement('br');
                    createform.appendChild(linebreak);

                    var messagelabel = document.createElement('label'); // Append Textarea
                    messagelabel.innerHTML = "Answer : ";
                    createform.appendChild(messagelabel);

                    var divForRadioSelect = document.createElement('div');
                    createform.appendChild(divForRadioSelect);

                    var radiolabel1 = document.createElement('label');
                    radiolabel1.setAttribute("for", "rating1");
                    radiolabel1.innerHTML = "Strongly Disagree&nbsp;";
                    divForRadioSelect.appendChild(radiolabel1);

                    var radioelement = document.createElement('input');
                    radioelement.setAttribute("id", "rating1");
                    radioelement.setAttribute("type", "radio");
                    radioelement.setAttribute("value", "1");
                    radioelement.setAttribute("name", "radioGroup");
                    divForRadioSelect.appendChild(radioelement);

                    var radiolabel2 = document.createElement('label');
                    radiolabel2.setAttribute("for", "rating2");
                    radiolabel2.innerHTML = "&nbsp;&nbsp;&nbsp;Disagree&nbsp";
                    divForRadioSelect.appendChild(radiolabel2);

                    var radioelement2 = document.createElement('input');
                    radioelement2.setAttribute("id", "rating2");
                    radioelement2.setAttribute("type", "radio");
                    radioelement2.setAttribute("value", "2");
                    radioelement2.setAttribute("name", "radioGroup");
                    divForRadioSelect.appendChild(radioelement2);

                    var radiolabel3 = document.createElement('label');
                    radiolabel3.setAttribute("for", "rating3");
                    radiolabel3.innerHTML = "&nbsp;&nbsp;&nbsp;Neutral&nbsp";
                    divForRadioSelect.appendChild(radiolabel3);

                    var radioelement3 = document.createElement('input');
                    radioelement3.setAttribute("id", "rating3");
                    radioelement3.setAttribute("type", "radio");
                    radioelement3.setAttribute("value", "3");
                    radioelement3.setAttribute("name", "radioGroup");
                    divForRadioSelect.appendChild(radioelement3);

                    var radiolabel4 = document.createElement('label');
                    radiolabel4.setAttribute("for", "rating3");
                    radiolabel4.innerHTML = "&nbsp;&nbsp;&nbsp;Agree&nbsp";
                    divForRadioSelect.appendChild(radiolabel4);

                    var radioelement4 = document.createElement('input');
                    radioelement4.setAttribute("id", "rating4");
                    radioelement4.setAttribute("type", "radio");
                    radioelement4.setAttribute("value", "4");
                    radioelement4.setAttribute("name", "radioGroup");
                    divForRadioSelect.appendChild(radioelement4);

                    var radiolabel5 = document.createElement('label');
                    radiolabel5.setAttribute("for", "rating5");
                    radiolabel5.innerHTML = "&nbsp;&nbsp;&nbsp;Strongly Agree&nbsp";
                    divForRadioSelect.appendChild(radiolabel5);

                    var radioelement5 = document.createElement('input');
                    radioelement5.setAttribute("id", "rating5");
                    radioelement5.setAttribute("type", "radio");
                    radioelement5.setAttribute("value", "5");
                    radioelement5.setAttribute("name", "radioGroup");
                    divForRadioSelect.appendChild(radioelement5);

                    divForRadioSelect.appendChild(linebreak2);

                    var messagebreak = document.createElement('br');
                    createform.appendChild(messagebreak);

                    /*var submitelement = document.createElement('input'); // Append Submit Button
                    submitelement.setAttribute("type", "submit");
                    submitelement.setAttribute("name", "dsubmit");
                    submitelement.setAttribute("value", "Submit");
                    createform.appendChild(submitelement);*/

                    x.insertBefore(createform, x.childNodes[0]);
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
                    questionlabel.innerHTML = "Question: " + JSON.stringify(text); // Set Field Labels
                    createform.appendChild(questionlabel);

                    var linebreak = document.createElement('br');
                    createform.appendChild(linebreak);

                    var messagelabel = document.createElement('label'); // Append Textarea
                    messagelabel.innerHTML = "Answer : ";
                    createform.appendChild(messagelabel);

                    var texareaelement = document.createElement('textarea');
                    texareaelement.setAttribute("name", "dmessage");
                    texareaelement.setAttribute("maxlength", "200");
                    texareaelement.setAttribute("cols", "45");
                    texareaelement.setAttribute("rows", "3");
                    createform.appendChild(texareaelement);

                    x.insertBefore(createform, x.childNodes[0]);
                }
              }