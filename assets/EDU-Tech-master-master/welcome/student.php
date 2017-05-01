<div class="container">
  <div class="col-xs-12">
    <div class="row">
      <p class="lead text-center">Personal Homepage</p>
      <p>In order to test your readiness to take the EQAO, why not practice real EQAO questions? After taking the quiz, you will be taken to your personalized results page which will give you a breakdown of your strong and weak areas, as well as videos that will teach you skills for the problems you were unable to solve. You can take up to 5 unique quizzes, allowing you chart your improvement over time. For best results: watch the videos to bolster your skills before taking the next quiz!</p>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <h4 class="text-center">Test Results</h4>
        <canvas id="StudentTests"></canvas>
      </div>
    </div>
    <div class="row mt-20">
      <div class="col-sm-6">
        <h4 class="text-center">Grades 1-3 Over Time</h4>
        <canvas id="Math1to3" height="400"></canvas>
      </div>
      <div class="col-sm-6">
        <h4 class="text-center">Grades 4-6 Over Time</h4>
        <canvas id="Math4to6" height="400"></canvas>
      </div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script>
  $(function () {
    var years = [ '2011-2012', '2012-2013', '2013-2014', '2014-2015', '2015-2016' ];

    var mathFor = {};
    mathFor['1to3'] = [ 68, 67, 67, 63 ];
    mathFor['4to6'] = [ 58, 57, 54, 50 ];

    for (var key in mathFor) {
      new Chart(document.getElementById('Math' + key), {
        type: 'bar',
        data: {
          labels: years,
          datasets: [{
            label: 'EQAO Mathematics results for ' + key.split('to')[0] + ' to ' + key.split('to')[1],
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)'
            ],
            borderColor: [
              'rgba(255,99,132,1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 1,
            data: mathFor[key]
          }]
        }
      });
    }

    var data = <?=json_encode(Database::utf8ize(Database::getStudentScores($_SESSION['userId'])))?>;
    if (data.length) {
      var testData = [];
      for (var i = 0; i < 5; i++) {
        if (data[0][i] !== null) {
          testData.push(parseInt(data[0][i]));
        }
      }

      if (testData.length) {
        new Chart(document.getElementById('StudentTests'), {
          'type': 'bar',
          data: {
            labels: ['Test 1', 'Test 2', 'Test 3', 'Test 4', 'Test 5'],
            datasets: [{
              label: 'Test',
              data: testData
            }]
          }
        });
      }
    }
  });
</script>
