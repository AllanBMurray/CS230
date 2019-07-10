
<html>
<!--

-->
  <head>
    <title>Hiragana Tutor - CS230 - Allan Murray</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style type="text/css">

.imgw {
  width: 40px;
  height: 40px;
}

.imgx {
  width: 100px;
  height: 100px;
}

.imgy {
  width: 300px;
  height: 300px;
}

.imgz {
  width: 60px;
  height: 60px;
}

.modal {
  display: none;
  position: fixed;
  top: 50%;
  left: 50%;
  margin-top: -185px;
  margin-left: -300px;
  width: 600px;
  height: 370px;
  background-color: lightgray;
  font-size: 20px;
  text-align: center;
}

.quizCSS{
  font-size: 180px;
}

.submitDiv{
	text-align: center;
}

.tg {
  border-collapse: separate;
  border-spacing: 10px;
}

.tg td{font-family:Arial, sans-serif;font-size:42px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:42px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;box-shadow: 2px 2px 2px #888888}
.span {font-family:Arial, sans-serif;font-size:12px;}
.tg .tg-wp8o{border-color:#000000;text-align:center;vertical-align:top; box-shadow: 2px 2px 2px #888888}
.tg .tg-dtwo{background-color:#3166ff;color:#9b9b9b;border-color:#000000;text-align:center;vertical-align:top;box-shadow: 2px 2px 2px #888888}

.button-style {
  position:relative;
  margin: auto;
  display: inline-block;
  color: blue;
  background-color: grey;
  font-size: 20px;
  padding: 16px 16px;
  border-radius: 12px;
  border: 2px solid black;
  box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  cursor: pointer;
}

.button-style:hover {
  background-color: darkgray
}

#startButtons {
	margin-left: 400px;
}

/* The container */
.container {
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  display: block;
  cursor: pointer;
  font-size: 22px;
  border-radius: 12px;
  border: 2px solid lightgrey;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.answer-container {
  display: block;
  position: relative;
  background-color: lightgrey;
  width: 200px;
  padding-left: 45px;
  padding-top: 12px;
  padding-bottom: 12px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  border-radius: 12px;
  border: 2px solid lightgrey;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.result-container {
  display: block;
  position: relative;
  width: 800px;
  padding-left: 45px;
  padding-top: 12px;
  padding-bottom: 12px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  border-radius: 12px;
  border: 2px solid lightgrey;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.incorrect {
	background-color: coral;
}

.correct {
	background-color: greenyellow;
}

/* This radio styling is adapted from a website, bootsnipp.com. */
/* Hide the browser's default radio button */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 16;
  left: 10;
  height: 25px;
  width: 25px;
  background-color: lightgrey;
  border-radius: 50%;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: purple;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
 left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
    </style>
  </head>
  <script>

    hiraganaArray = ["a","e","fu","ha","he","hi","ho","i","ka","ke","ki","ko","ku","ma","me","mi","mo","mu","n","na","ne","ni","no","nu","o","ra","re","ri","ro","ru","sa","se","si","so","su","ta","te","ti","to","tsu","u","wa","we","wi","wo","ya","yo","yu"];
    quizFlag = false;
    finishedQuiz = false;
    quizQuestion = 1;
    var quizArray = [0];
    quizResults = [];
    questionArray = [];
    usernamejs = "";
    attemptsArray = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
    correctsArray = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
    $('#myQuizResults').hide();

//function to shade cells based on attempts and corrects
  function shadeCells(){
    for (let y = 0; y < 48; y++)
    {
      if (attemptsArray[y]==0){
        $('#'+hiraganaArray[y]).css("background-color","White");
      } 
      else if ((correctsArray[y]/attemptsArray[y])<=0.25) {
        $('#'+hiraganaArray[y]).css("background-color","Silver");
      }
      else if ((correctsArray[y]/attemptsArray[y])<=0.5){
        $('#'+hiraganaArray[y]).css("background-color","LightGrey");
      }
      else if ((correctsArray[y]/attemptsArray[y])<=0.75){
        $('#'+hiraganaArray[y]).css("background-color","DarkGrey");
      }
      else{
        $('#'+hiraganaArray[y]).css("background-color","Grey");//Grey is darker than DrakGrey!!
      }
    }
}
//function to play audio, cell is turned light blue as audio plays.
function playAudio(cellid) {
  if (quizFlag == false){
    let tempBackgroundColor = $('#'+cellid).css("background-color");
    $('#'+cellid).css("background-color","lightskyblue")
    var soundx = "audio/"+cellid+".wav";
    sound = new Audio(soundx);
    sound.play();
    sound.onended = function(){
      $('#'+cellid).css("background-color",tempBackgroundColor)
    }
  }
}
//function to start quiz. Changes border of table and turns flag to true.
function quiz(){
  $('#hiraganaTable').css("border","10px solid purple");
  quizFlag = true;
}
//function to reset page after a quiz has been completed or cancelled.
function resetQuiz(){
  $('#hiraganaTable').css("border","");
  quizFlag = false;
  shadeCells();
  quizArray = [0];
  quizResults = [];
  questionArray = [];
  quizQuestion = 1;
}
//resets the page after a quiz without saving results.
function reloadPage(){
  resetQuiz();
  $("#myQuizResults").hide();
  $(".modal").hide();
  $("#mainContents").show();
  $("#username").val("");
  $("#password").val("");
  $("#loginMessage").html("Please enter your username and password.")
}
//start a quiz with ten random symbols
function randomQuiz(){
  let j = 0;
  while (j < 10){
  	const rQ = hiraganaArray[Math.round(47*Math.random())];
  	console.log(rQ);
  	console.log(quizArray.noRepetition(rQ));
  	//prevent repetition in the selected symbols
  	if (quizArray.noRepetition(rQ)){
  		quizArray.push(rQ);
  		j++;
  	}
  	else{
  		console.log("repetition");
  	}
  }
  console.log(quizArray);
  //symbols are set, begin quiz
  quizFlag = true;
  beginQuiz();
}
//Displays login modal
function loginModal(){
  if(usernamejs == ""){
    $("#mainContents").hide(); //hide table, buttons and acknowledgements
    $("#myQuizResults").hide(); //quizresults
    $(".modal").show(); //show login modal
  }
  else{
    usernamejs = "";
    attemptsArray = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
    correctsArray = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
    resetQuiz();
    shadeCells();
    $("#loginStatus").html("Logged in as: Guest User");
    $("#loginButton").text("Login/Sign Up");
  }
}
//login a user and download user data from database
function userLogin(){
    console.log("userLogin");
    usernamejs = $("#username").val();
    passwordjs = $("#password").val();
    userData = {username:usernamejs, password:passwordjs};
    $.ajax({
        type: "POST",
        url: "../userlogin.php",
        data: JSON.stringify(userData),
        dataType: "json",
        success: function(response,status){
            if (response == null){
                $("#loginMessage").html("<b>Login details incorrect. Please try again or cancel.</b>")
            }
            else{
                var responseData = response;
                $("#loginStatus").html("Logged in as: "+responseData.username);
                $("#mainContents").show(); //hide table, buttons and acknowledgements
                $(".modal").hide(); //hide login modal
                attemptsArray = (responseData.attempts).split(",").map(Number);
                correctsArray = (responseData.corrects).split(",").map(Number);
                shadeCells();
                $("#loginButton").text("Log Out");
                $("#username").val("");
                $("#password").val("");
                $("#loginMessage").html("Please enter your username and password.");
                if (finishedQuiz == true){
                  reallySave();
                }
                finishedQuiz = false;
            }
        },
        error: function(jqXHR, textStatus, errorThrown){
            console.log(textStatus, errorThrown);
        }
    });
}
//create a new user
function createUser(){
    console.log("createUser");
    usernamejs = $("#username").val();
    passwordjs = $("#password").val();
    userData = {username:usernamejs, password:passwordjs};
    $.ajax({
        type: "POST",
        url: "../createuser.php",
        dataType: "application/json",
        data: JSON.stringify(userData),
        success: function(response,status){
            $("#loginStatus").html("Logged in as: "+usernamejs);
            $("#mainContents").show(); //show table, buttons and acknowledgements
            $(".modal").hide(); //hide login modal
            $("#loginButton").text("Log Out");
            $("#username").val("");
            $("#password").val("");
            if (finishedQuiz == true){
              reallySave();
            }
            finishedQuiz = false; 
        },
        error: function(response, status){
          $("#loginMessage").html("<b>Please select another username or cancel.</b>")
        } 
    });
}
//Beings the quiz. Hides table and uses ajax to collect data for questions.
//Alerts the user if 10 questions haven't been selected yet.
//Adapted from code from lecture.
function beginQuiz(){
  if (quizFlag == true && quizArray.length>10){
    $("#mainContents").hide();//hide table, buttons and acknowledgements
    $("#myQuiz").removeClass('d-none'); //display quiz
    populateQuestions(1);
  }
  else if(quizFlag == true){
    alert("Please pick at least ten symbols");
  }
}
//Changes colour of sell when it is selected for the quiz.
function selectQuestions(cellid){
  if (quizFlag == true){
    $('#'+cellid).css("background-color","purple")
    quizArray.push(cellid);
  }
}
 //Prepares array with details for each question. Incorrect alternatives are selected randomly.
 //The correct answer is put into a random position. Version of question selected randomly.
function populateQuestions(qnum){
  $("#qText").text("Question: "+qnum);
  questionArray = [qnum];
  i = 0;
  while (i < 3){
  	const r = hiraganaArray[Math.round(47*Math.random())]; //select wrong answer at random
  	console.log(r);
  	//if wrong answer hasn't been picked before and isn't equal to the correct answer, then add to array.
  	if (r != quizArray[qnum] && questionArray.noRepetition(r)){
  		questionArray.push(r);
  		i++;
  	}
  }
  //insert correct answer to array and also add it's position.
  const qPosition = Math.round(1+3*Math.random());
  questionArray.insert(qPosition, quizArray[qnum]);
  questionArray.push(qPosition);

  console.log(questionArray);
  
  //randomly pick between each type of question
  var randomNum = Math.round(Math.random());
  if (randomNum == 0){
    populateQuestions1(qnum);
  }
  else {
    populateQuestions2(qnum);
  }
}
//function to insert correct answer into array in specified position
Array.prototype.insert = function(index, item) {
    this.splice(index, 0, item);
};
//function to check for repetition in an array
Array.prototype.noRepetition = function(item) {
	var noRep = true;
    $.each(this,function(){ //"this" is the array
    	if(this==item){ //now "this" is an element in the array
    		noRep = false;
    	}
    })
    return noRep;
};
//question is a hiragana symbol and answers are romaji
function populateQuestions1(qnum){
  $("#q1pic,#q2pic,#q3pic,#q4pic").hide();
  $("#quizPic").show();
  $("#quizText").text("");
  $("#question1").text(questionArray[1]);
  $("#question2").text(questionArray[2]);
  $("#question3").text(questionArray[3]);
  $("#question4").text(questionArray[4]);
  $("#quizPic").attr("src","images/Hiragana/"+questionArray[questionArray[5]]+".png");
}
//question is romaji and answers are hiragana symbols
function populateQuestions2(qnum){
  $("#question1, #question2, #question3, #question4").text("");
  $("#q1pic,#q2pic,#q3pic,#q4pic").show();
  $("#quizPic").hide();
  $("#q1pic").attr("src","images/Hiragana/"+questionArray[1]+".png");
  $("#q2pic").attr("src","images/Hiragana/"+questionArray[2]+".png");
  $("#q3pic").attr("src","images/Hiragana/"+questionArray[3]+".png");
  $("#q4pic").attr("src","images/Hiragana/"+questionArray[4]+".png");
  $("#quizText").text(questionArray[questionArray[5]]);
}
//check if user is logged in, then either opens loginModal or calls reallySave().
function saveResults(){
  if (usernamejs == ""){
    finishedQuiz = true;
    loginModal();
  }
  else{
    reallySave();
  }
}
//save results of the latest quiz
function reallySave(){
    let recordResultsArray = [];
    for (let k = 1; k < 11; k++){
      for (let m = 0; m < 48; m++){
        if (quizArray[k] == hiraganaArray[m]){
          recordResultsArray.push(m);
        }
      }
    }
    for (let p = 0; p < 10; p++)
    {
        attemptsArray[recordResultsArray[p]]++;
        correctsArray[recordResultsArray[p]]+=quizResults[p];
    }
    shadeCells();
    correctsArrayjs = correctsArray.join();
    attemptsArrayjs = attemptsArray.join();
    //create variable for ajax POST.
    userData = {username:usernamejs, corrects:correctsArrayjs, attempts:attemptsArrayjs};
    $.ajax({
        type: "POST",
        url: "../userResults.php",
        dataType: "application/json",
        data: JSON.stringify(userData),
    });
    resetQuiz();
    $("#mainContents").show(); //show table, buttons and acknowledgements
    $("#myQuizResults").hide(); //hide quizresults
}
//records answer in answer array. If it's the 10th question then this function reveals the results.
function submitAnswer(){
  var currentAnswer = 0;
  if ($('#radio1').is(':checked')){
    currentAnswer = 1;
    $('#radio1').prop("checked",false);
  }
  else if ($('#radio2').is(':checked')){
    currentAnswer = 2;
    $('#radio2').prop("checked",false);
  }
  else if ($('#radio3').is(':checked')){
    currentAnswer = 3;
    $('#radio3').prop("checked",false);
  }
  else if ($('#radio4').is(':checked')){
    currentAnswer = 4;
    $('#radio4').prop("checked",false);
  }
  if (currentAnswer == questionArray[5]){
    quizResults.push(1);
  }
  else{
    quizResults.push(0);
  }
  quizQuestion+=1;
  if (quizQuestion < 11){
    populateQuestions(quizQuestion);
  }
  else{
    answerTotal = 0;
    resultsOutput = "<br><div>";
    qCount = 0;
    $.each(quizResults,function(){
      answerTotal += this;
      qCount++;
      if(this == 1){
        resultsOutput += "<div class='result-container correct'>"+quizArray[qCount]+"<img class='imgw' src='images/Hiragana/"+quizArray[qCount]+".png'>Question "+qCount+": Correct</div>";	
      }
      else{
        resultsOutput += "<div class='result-container incorrect'>"+quizArray[qCount]+"<img class='imgw' src='images/Hiragana/"+quizArray[qCount]+".png'>Question "+qCount+": Incorrect</div>";	
      }
    });
    answerTotal*=10;
    resultsOutput += "</div><hr><u><b>Final score: "+answerTotal+"%</b></u>";
    $("#myQuiz").addClass('d-none');
    $("#myQuizResults").show();
    $("#options").html(resultsOutput);
  }
}
</script>
<body>
  <h1>Hiragana Tutor - CS230 - Allan Murray</h1>
  <b id="loginStatus">Logged in as: Guest user</b>
  <div id="myModal" class="modal">
    <br>
    <p id="loginMessage">Please enter your username and password.</p>
    <form>
    <input type="text" id="username" Placeholder="Username"><br>
    <input type="password" id="password" Placeholder="Password"><br>
    </form>
    <p>Press User Login or Create Account as appropriate</p>
    <button class="button-style" onclick="userLogin()">User Login</button>
    <button class="button-style" onclick="createUser()">Create Account</button>
    <button class="button-style" onclick="reloadPage()">Cancel</button><br><br>
    <a href = "https://en.wikipedia.org/wiki/Hiragana" target="_blank">Click here for the Hiragana article on Wikipedia</a>
  </div>
  <div id="mainContents">
  <table class="tg" id="hiraganaTable">
  <tr>
    <th class="tg-dtwo">/N/</th>
    <th class="tg-dtwo">/w/</th>
    <th class="tg-dtwo">/r/</th>
    <th class="tg-dtwo">/y/</th>
    <th class="tg-dtwo">/m/</th>
    <th class="tg-dtwo">/h/</th>
    <th class="tg-dtwo">/n/</th>
    <th class="tg-dtwo">/t/</th>
    <th class="tg-dtwo">/s/</th>
    <th class="tg-dtwo">/k/</th>
    <th class="tg-dtwo">Ø</th>
    <th class="tg-dtwo"></th>
  </tr>
  <tr>
    <td class="tg-wp8o" rowspan="5"id="n" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/n.png" onmouseover="src='GIF/Hiragana/n.gif'" onmouseout="src='images/Hiragana/n.png'"><br><span class="span">N</span></td>
    <td class="tg-wp8o" id="wa" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/wa.png" onmouseover="src='GIF/Hiragana/wa.gif'" onmouseout="src='images/Hiragana/wa.png'"><br><span class="span">WA</span></td>
    <td class="tg-wp8o" id="ra" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/ra.png" onmouseover="src='GIF/Hiragana/ra.gif'" onmouseout="src='images/Hiragana/ra.png'"><span class="span"><br>RA</span></td>
    <td class="tg-wp8o" id="ya" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/ya.png" onmouseover="src='GIF/Hiragana/ya.gif'" onmouseout="src='images/Hiragana/ya.png'"><br><span class="span">YA</span></td>
    <td class="tg-wp8o" id="ma" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/ma.png" onmouseover="src='GIF/Hiragana/ma.gif'" onmouseout="src='images/Hiragana/ma.png'"><br><span class="span">MA</span></td>
    <td class="tg-wp8o" id="ha" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/ha.png" onmouseover="src='GIF/Hiragana/ha.gif'" onmouseout="src='images/Hiragana/ha.png'"><br><span class="span">HA</span></td>
    <td class="tg-wp8o" id="na" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/na.png" onmouseover="src='GIF/Hiragana/na.gif'" onmouseout="src='images/Hiragana/na.png'"><span class="span"><br>NA</span></td>
    <td class="tg-wp8o" id="ta" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/ta.png" onmouseover="src='GIF/Hiragana/ta.gif'" onmouseout="src='images/Hiragana/ta.png'"><br><span class="span">TA</span></td>
    <td class="tg-wp8o" id="sa" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/sa.png" onmouseover="src='GIF/Hiragana/sa.gif'" onmouseout="src='images/Hiragana/sa.png'"><br><span class="span">SA</span></td>
    <td class="tg-wp8o" id="ka" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/ka.png" onmouseover="src='GIF/Hiragana/ka.gif'" onmouseout="src='images/Hiragana/ka.png'"><br><span class="span">KA</span></td>
    <td class="tg-wp8o" id="a" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/a.png" onmouseover="src='GIF/Hiragana/a.gif'" onmouseout="src='images/Hiragana/a.png'"><br><span class="span">A</span></td>
    <td class="tg-dtwo">/a/</td>
  </tr>
  <tr>
    <td class="tg-wp8o" id="wi"><img class="imgx" src="images/Hiragana/wi.png"><br><span class="span">WI (obsolete)</span></td>
    <td class="tg-wp8o" id="ri" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/ri.png" onmouseover="src='GIF/Hiragana/ri.gif'" onmouseout="src='images/Hiragana/ri.png'"><span class="span"><br>RI</span></td>
    <td class="tg-wp8o"></td>
    <td class="tg-wp8o" id="mi" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/mi.png" onmouseover="src='GIF/Hiragana/mi.gif'" onmouseout="src='images/Hiragana/mi.png'"><br><span class="span">MI</span></td>
    <td class="tg-wp8o" id="hi" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/hi.png" onmouseover="src='GIF/Hiragana/hi.gif'" onmouseout="src='images/Hiragana/hi.png'"><br><span class="span">HI</span></td>
    <td class="tg-wp8o" id="ni" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/ni.png" onmouseover="src='GIF/Hiragana/ni.gif'" onmouseout="src='images/Hiragana/ni.png'"><span class="span"><br>NI</span></td>
    <td class="tg-wp8o" id="ti" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/ti.png" onmouseover="src='GIF/Hiragana/ti.gif'" onmouseout="src='images/Hiragana/ti.png'"><br><span class="span">CHI</span></td>
    <td class="tg-wp8o" id="si" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/si.png" onmouseover="src='GIF/Hiragana/si.gif'" onmouseout="src='images/Hiragana/si.png'"><br><span class="span">SHI</span></td>
    <td class="tg-wp8o" id="ki" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/ki.png" onmouseover="src='GIF/Hiragana/ki.gif'" onmouseout="src='images/Hiragana/ki.png'"><br><span class="span">KI</span></td>
    <td class="tg-wp8o" id="i" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/i.png" onmouseover="src='GIF/Hiragana/i.gif'" onmouseout="src='images/Hiragana/i.png'"><br><span class="span">I</span></td>
    <td class="tg-dtwo">/i/</td>
  </tr>
  <tr>
    <td class="tg-wp8o"></td>
    <td class="tg-wp8o" id="ru" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/ru.png" onmouseover="src='GIF/Hiragana/ru.gif'" onmouseout="src='images/Hiragana/ru.png'"><span class="span"><br>RU</span></td>
    <td class="tg-wp8o" id="yu" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/yu.png" onmouseover="src='GIF/Hiragana/yu.gif'" onmouseout="src='images/Hiragana/yu.png'"><br><span class="span">YU</span></td>
    <td class="tg-wp8o" id="mu" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/mu.png" onmouseover="src='GIF/Hiragana/mu.gif'" onmouseout="src='images/Hiragana/mu.png'"><br><span class="span">MU</span></td>
    <td class="tg-wp8o" id="fu" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/fu.png" onmouseover="src='GIF/Hiragana/fu.gif'" onmouseout="src='images/Hiragana/fu.png'"><br><span class="span">FU</span></td>
    <td class="tg-wp8o" id="nu" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/nu.png" onmouseover="src='GIF/Hiragana/nu.gif'" onmouseout="src='images/Hiragana/nu.png'"><span class="span"><br>NU</span></td>
    <td class="tg-wp8o" id="tsu" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/tsu.png" onmouseover="src='GIF/Hiragana/tsu.gif'" onmouseout="src='images/Hiragana/tsu.png'"><br><span class="span">TSU</span></td>
    <td class="tg-wp8o" id="su" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/su.png" onmouseover="src='GIF/Hiragana/su.gif'" onmouseout="src='images/Hiragana/su.png'"><br><span class="span">SU</span></td>
    <td class="tg-wp8o" id="ku" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/ku.png" onmouseover="src='GIF/Hiragana/ku.gif'" onmouseout="src='images/Hiragana/ku.png'"><br><span class="span">KU</span></td>
    <td class="tg-wp8o" id="u" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/u.png" onmouseover="src='GIF/Hiragana/u.gif'" onmouseout="src='images/Hiragana/u.png'"><br><span class="span">U</span></td>
    <td class="tg-dtwo">/u/</td>
  </tr>
  <tr>
    <td class="tg-wp8o" id="we"><img class="imgx" src="images/Hiragana/we.png"><span class="span"><br>WE (obsolete)</span></td>
    <td class="tg-wp8o" id="re" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/re.png" onmouseover="src='GIF/Hiragana/re.gif'" onmouseout="src='images/Hiragana/re.png'"><span class="span"><br>RE</span></td>
    <td class="tg-wp8o"></td>
    <td class="tg-wp8o" id="me" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/me.png" onmouseover="src='GIF/Hiragana/me.gif'" onmouseout="src='images/Hiragana/me.png'"><br><span class="span">ME</span></td>
    <td class="tg-wp8o" id="he" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/he.png" onmouseover="src='GIF/Hiragana/he.gif'" onmouseout="src='images/Hiragana/he.png'"><br><span class="span">FE</span></td>
    <td class="tg-wp8o" id="ne" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/ne.png" onmouseover="src='GIF/Hiragana/ne.gif'" onmouseout="src='images/Hiragana/ne.png'"><span class="span"><br>NE</span></td>
    <td class="tg-wp8o" id="te" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/te.png" onmouseover="src='GIF/Hiragana/te.gif'" onmouseout="src='images/Hiragana/te.png'"><br><span class="span">TE</span></td>
    <td class="tg-wp8o" id="se" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/se.png" onmouseover="src='GIF/Hiragana/se.gif'" onmouseout="src='images/Hiragana/se.png'"><br><span class="span">SE</span></td>
    <td class="tg-wp8o" id="ke" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/ke.png" onmouseover="src='GIF/Hiragana/ke.gif'" onmouseout="src='images/Hiragana/ke.png'"><br><span class="span">KE</span></td>
    <td class="tg-wp8o" id="e" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/e.png" onmouseover="src='GIF/Hiragana/e.gif'" onmouseout="src='images/Hiragana/e.png'"><br><span class="span">E</span></td>
    <td class="tg-dtwo">/e/</td>
  </tr>
  <tr>
    <td class="tg-wp8o" id="wo" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/wo.png" onmouseover="src='GIF/Hiragana/wo.gif'" onmouseout="src='images/Hiragana/wo.png'"><span class="span"><br>WO</span></td>
    <td class="tg-wp8o" id="ro" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/ro.png" onmouseover="src='GIF/Hiragana/ro.gif'" onmouseout="src='images/Hiragana/ro.png'"><span class="span"><br>RO</span></td>
    <td class="tg-wp8o" id="yo" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/yo.png" onmouseover="src='GIF/Hiragana/yo.gif'" onmouseout="src='images/Hiragana/yo.png'"><span class="span"><br>YO</span></td>
    <td class="tg-wp8o" id="mo" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/mo.png" onmouseover="src='GIF/Hiragana/mo.gif'" onmouseout="src='images/Hiragana/mo.png'"><br><span class="span">MO</span></td>
    <td class="tg-wp8o" id="ho" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/ho.png" onmouseover="src='GIF/Hiragana/ho.gif'" onmouseout="src='images/Hiragana/ho.png'"><br><span class="span">FO</span></td>
    <td class="tg-wp8o" id="no" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/no.png" onmouseover="src='GIF/Hiragana/no.gif'" onmouseout="src='images/Hiragana/no.png'"><span class="span"><br>NO</span></td>
    <td class="tg-wp8o" id="to" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/to.png" onmouseover="src='GIF/Hiragana/to.gif'" onmouseout="src='images/Hiragana/to.png'"><br><span class="span">TO</span></td>
    <td class="tg-wp8o" id="so" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/so.png" onmouseover="src='GIF/Hiragana/so.gif'" onmouseout="src='images/Hiragana/so.png'"><br><span class="span">SO</span></td>
    <td class="tg-wp8o" id="ko" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/ko.png" onmouseover="src='GIF/Hiragana/ko.gif'" onmouseout="src='images/Hiragana/ko.png'"><br><span class="span">KO</span></td>
    <td class="tg-wp8o" id="o" onclick="playAudio(id); selectQuestions(id);"><img class="imgx" src="images/Hiragana/o.png" onmouseover="src='GIF/Hiragana/o.gif'" onmouseout="src='images/Hiragana/o.png'"><br><span class="span">O</span></td>
    <td class="tg-dtwo">/o/</td>
  </tr>
</table>
<div id="startButtons">
  <span>
    <button class="button-style" onclick="beginQuiz(); quiz();">Start Quiz</button>
    <button class="button-style" onclick="resetQuiz();">Cancel Quiz</button>
    <button class="button-style" onclick="randomQuiz();">Random Quiz</button>
    <button class="button-style" id="loginButton" onclick="loginModal();">Login/Sign Up</button>
  </span>
</div>

<div class="acknol" id="acknol">
<b>To play quiz: Select 10 symbols and then press "Start Quiz" again.</b><br><br>
<b>Colour Key for Logged-In Users:</b>
<table>
  <tr style="border-style:solid">
    <th style="background-color:White; border-style:solid">  Not Started/0%  </th>
    <th style="background-color:Silver; border-style:solid;border-width:1px;">  0% to 25% Correct  </th>
    <th style="background-color:LightGrey; border-style:solid;border-width:1px;">  25% to 50% Correct  </th>
    <th style="background-color:DarkGrey; border-style:solid;border-width:1px;">  50% to 75% Correct  </th>
    <th style="background-color:Grey; border-style:solid;border-width:1px;">  75% to 100% Correct  </th>
  </tr>
</table><br>
  Acknowledgements:<br>
  <a href="https://commons.wikimedia.org/wiki/Category:Hiragana_stroke_order_(animated_image_set)"><b>GIFs:</b> https://commons.wikimedia.org/wiki/Category:Hiragana_stroke_order_(animated_image_set)</a><br>
  <a href="https://commons.wikimedia.org/wiki/Hiragana"><b>Images:</b> https://commons.wikimedia.org/wiki/Hiragana</a><br>
  <a href="http://www.guidetojapanese.org/learn/complete/hiragana"><b>Sound files:</b> http://www.guidetojapanese.org/learn/complete/hiragana</a><br>
  <a href="https://audio.online-convert.com/convert-to-wav"><b>Audio conversion:</b> https://audio.online-convert.com/convert-to-wav</a>
</div>

</div>
  <div class="d-none" id="myQuiz">
    <div class="container" id="questionContainer">
      <u><div id="qText" style="font-family:Arial; font-size:36px"></div></u>
      <img id="quizPic" class="imgy">
      <h1 class="quizCSS" id="quizText"></h1>
      <label class="answer-container"><label id="question1"></label>
        <input type="radio" name="radio" id="radio1"><img class="imgz" id="q1pic">
        <span class="checkmark"></span>
      </label>
      <label class="answer-container"><label id="question2"></label>
        <input type="radio" name="radio" id="radio2"><img class="imgz" id="q2pic">
        <span class="checkmark"></span>
      </label>
      <label class="answer-container"><label id="question3"></label>
        <input type="radio" name="radio" id="radio3"><img class="imgz" id="q3pic">
        <span class="checkmark"></span>
      </label>
      <label class="answer-container"><label id="question4"></label>
        <input type="radio" name="radio" id="radio4"><img class="imgz" id="q4pic">
        <span class="checkmark"></span>
      </label>
    </div>
    <div class="submitDiv">
      <button class="button-style" onclick="submitAnswer()">Submit Answer</button>
    </div>
  </div>
  <div id="myQuizResults" style="display: none;">
    <div id="options" class="container"></div>
    <div class="submitDiv">
      <button class="button-style" onclick="reloadPage();">Do Not Save Results</button>
      <button class="button-style" onclick="saveResults();">Save Results</button>
    </div>
  </div>
  </body>
</html>
