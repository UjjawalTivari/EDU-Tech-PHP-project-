<?php
/**
 * Created by PhpStorm.
 * User: Samaya
 * Date: 10/31/2016
 * Time: 2:00 PM
 */
session_start();

if(!isset($_SESSION["userName"])) {
  header("Location:login.php");
}

?>
<?php
include_once('header.php');
include_once('navigation_bar.php');
?>
<style>
  .question-group {
    list-style-type: none;
    padding: 0;
  }
  .question-answer {
    margin-bottom: 10px;
  }

  .question-answer > span {
    margin-left: 5px;
  }

  .container {
    margin-bottom: 20px;
  }
</style>
<div class="container">
	<form id="quizform" method="post" action = "quizresults.php">
    <div class="col-xs-12">
      <div class="row">
        <h4 class="text-right text-danger">
          <span id="minutes">00</span>
          :
          <span id="seconds">00</span>
        </h4>
      </div>
      <div class="row">
        <h4 id="questText" colspan="4"> test question </h4>
      </div>
      <div id="questImg" class="row">
        test image
      </div>
      <div class="row">
        <ul class="question-group">
          <li class="question-answer" id="ans1"><input type="radio" name="answer" id="answer1" value="rans1"/> <span id="ans_1"></span></li>
          <li class="question-answer" id="ans2"><input type="radio" name="answer" id="answer2" value="rans2"/> <span id="ans_2"></span></li>
          <li class="question-answer" id="ans3"><input type="radio" name="answer" id="answer3" value="rans3"/> <span id="ans_3"></span></li>
          <li class="question-answer" id="ans4"><input type="radio" name="answer" id="answer4" value="rans4"/> <span id="ans_4"></span></li>
        </ul>
      </div>
      <div class"row" id="next_button">
        <input class="btn btn-primary pull-right" type= "button" id="submit" value = "next" />
      </div>
        <!-- these hidden columns hold a counter variable, and a list of all answers the person gets wrong -->
        <input type="hidden" id="clicks" value="0"/>
        <input type = "hidden" name="wrongAnswers" id="wrongAnswers" value=""/>
        <input type = "hidden" name="startTime" id="startTime" value=""/>
        <input type = "hidden" name="endTime" id="endTime" value=""/>
    </div>
  </form>
</div>

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>
    function endTest() {
      debugger;
      console.log('endTest called', sessionStorage.getItem('counter'), $('#clicks').val());
      sessionStorage.setItem('counter', 19);
      $('#clicks').val(19);
      $('#submit').click();
    };

    function initTest() {
      console.log('Test Initialized');
      var currentTime = Date.now();
      sessionStorage.setItem('test_started', currentTime);
      $('#startTime').val(currentTime);

      sessionStorage.setItem('test_avail_till', Date.now() + 1000 * 60 * 60);
    };

    function preFillTestData() {
      console.log('Test Prefilled');
      if (sessionStorage.getItem('counter') !== null) {
        $('#clicks').val(sessionStorage.getItem('counter'));
      }
      if (sessionStorage.getItem('wrongAnswers') !== null) {
        $('#wrongAnswers').val(sessionStorage.getItem('wrongAnswers'));
      }
      if (sessionStorage.getItem('test_started') !== null) {
        $('#startTime').val(sessionStorage.getItem('test_started'));
      }
    };

    function updateTimerUI() {
      var endTime = sessionStorage.getItem('test_avail_till');
      var diff = endTime - Date.now();

      $('#minutes').html(Math.floor((diff/1000) / 60));
      $('#seconds').html(Math.floor((diff/1000) % 60));
    }


    function updateTimer() {
      if (sessionStorage.getItem('test_avail_till') >= Date.now()) {
        updateTimerUI();
        setTimeout(updateTimer, 1000);
      } else {
        debugger;
        endTest();
      }
    };


    $(document).ready(function(){
      preFillTestData();

      if (sessionStorage.getItem('test_started') == null) {
        initTest();
      } else if (sessionStorage.getItem('test_avail_till') <= Date.now()) {
        console.log('ending test timer exceeded');
        endTest();
      }

      updateTimer();


      //Load the first question - counter starts at 0
			var counter = $('#clicks').val();

      $.getJSON('Quiz.php', function(data){
        if(counter < 19) {
          var questionText = data[counter].quest_text;
          var questionImage = data[counter].image;
          var answer1 = data[counter].ans1;
          var answer2 = data[counter].ans2;
          var answer3 = data[counter].ans3;
          var answer4 = data[counter].ans4;
          var correct = data[counter].correct_ans;
          var questionId = data[counter].quest_id;

          //Put the question text into the table
          $('#questText').html(questionText);


          //If the answer has the last 3 characters jpg, make an image tag, otherwise, just put in the text
          if(answer1.slice(-3) == 'jpg'){
            $('#ans_1').html("<img src=images/"+answer1+">");
            $('#ans_2').html("<img src=images/"+answer2+">");
            $('#ans_3').html("<img src=images/"+answer3+">");
            $('#ans_4').html("<img src=images/"+answer4+">");
          }

          else{
            $('#ans_1').html(answer1);
            $('#ans_2').html(answer2);
            $('#ans_3').html(answer3);
            $('#ans_4').html(answer4);
          }

          //If the image is not null, make an image tag, otherwise, print an empty string
          if (questionImage != null) {
            $('#questImg').html('<img class="img-responsive" style="margin:0 auto;" src="/images/'+questionImage+'">');
          }
          else{
            $('#questImg').html('');
          }
        }
      });
	});


  $('#next_button').click(function () {
    if ($(this).find("#submit").length === 0) {
      sessionStorage.clear();
    }
  });

	$('#submit').click(function(){

    //each time the button is clicked, get the counter value
    var counter = $('#clicks').val();

    //If the counter is at 19, change the next button to a submit button
    if(counter >= 19){
      $('#next_button').html("<input type='submit' value='view my results!'/>");
    }
    //Add one to the counter
    counter = parseInt(counter) + 1;
    //Save the new counter value in the hidden field
    $('#clicks').val((counter ));
    sessionStorage.setItem('counter', counter);




		//retrieve the question bank
    $.getJSON('Quiz.php', function(data){
      if(counter < 20) {
        var questionText = data[counter].quest_text;
        var questionImage = data[counter].image;
        var answer1 = data[counter].ans1;
        var answer2 = data[counter].ans2;
        var answer3 = data[counter].ans3;
        var answer4 = data[counter].ans4;
        //The id and correct answer correspond to the previously shown question onClick
        var correct = data[counter-1].correct_ans;
        var questionId = data[counter-1].quest_id;

        //See above code
        $('#questText').html(questionText);

        if(answer1.slice(-3) == 'jpg'){
          $('#ans_1').html("<img src=images/"+answer1+">");
          $('#ans_2').html("<img src=images/"+answer2+">");
          $('#ans_3').html("<img src=images/"+answer3+">");
          $('#ans_4').html("<img src=images/"+answer4+">");
        } else{
          $('#ans_1').html(answer1);
          $('#ans_2').html(answer2);
          $('#ans_3').html(answer3);
          $('#ans_4').html(answer4);
        }


        if (questionImage != null) {
          $('#questImg').html('<img class="img-responsive" style="margin:0 auto;" src="/images/'+questionImage+'">');
        } else{
          $('#questImg').html('');
        }

        //If the answer doesn't match the correct answer, add it to the wrong answer list in the hidden form field

        if(!(($('#answer1').is(':checked') && correct == 1) ||	($('#answer2').is(':checked') && correct == 2) ||
        ($('#answer3').is(':checked') && correct == 3) ||($('#answer4').is(':checked') && correct == 4))){

          var wrongAnswers = $('#wrongAnswers').val() + "," + questionId;

          //record the new value
          $('#wrongAnswers').val(wrongAnswers);
          sessionStorage.setItem('wrongAnswers', wrongAnswers);

        }
        //At the end of this transaction, uncheck the radio buttons
        $("input:radio").removeAttr("checked");

      }
      if (counter == 20){

        var correct = data[counter-1].correct_ans;
        var questionId = data[counter-1].quest_id;

        //See above code


        //If the answer doesn't match the correct answer, add it to the wrong answer list in the hidden form field

        if(!(($('#answer1').is(':checked') && correct == 1) ||	($('#answer2').is(':checked') && correct == 2) ||
        ($('#answer3').is(':checked') && correct == 3) ||($('#answer4').is(':checked') && correct == 4))){

          var wrongAnswers = $('#wrongAnswers').val() + "," + questionId;

          //record the new value
          $('#wrongAnswers').val(wrongAnswers);
          $('#endTime').val(Date.now());

          sessionStorage.clear();
        }

      }

    });

  });


//ERROR - last question isn't being stored!!!


</script>
<?php
include_once('footer.php');
?>
