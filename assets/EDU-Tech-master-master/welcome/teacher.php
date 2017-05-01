<?php
 require_once('Database.php');

 $students = Database::getStudentsByTeacher($_SESSION['userId']);
 $passed = 0;
 $failed = 0;

  function isPassing($student) {
   $total = 0;
   $testNumber = 0;
   foreach(range(1,5) as $num) {
     $score = $student["Test{$num}_score"];
     if ($score != null) {
       $total += $score;
       $testNumber++;
     }
   }

   return $total > (14 * $testNumber);
 }

 foreach($students as $student) {
   if (isPassing($student)) {
     $passed += 1;
   } else {
     $failed += 1;
   }
 }
?>
<div class="container">
  <div class="col-xs-12">
    <div class="row">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Student</th>
            <th>Test 1 Score</th>
            <th>Test 2 Score</th>
            <th>Test 3 Score</th>
            <th>Test 4 Score</th>
            <th>Test 5 Score</th>
          </tr>
        </thead>
        <tbody>
    			<?php foreach($students as $student): ?>
            <tr>
              <td><?=$student['FirstName']?> <?=$student['LastName']?></td>
              <td><?=$student['Test1_score']?></td>
              <td><?=$student['Test2_score']?></td>
              <td><?=$student['Test3_score']?></td>
              <td><?=$student['Test4_score']?></td>
              <td><?=$student['Test5_score']?></td>
            </tr>
    			<?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="row mt-20">
      <h4 class="text-center">Class Performance</h4>
      <div class="col-xs-12 col-sm-6 col-sm-offset-3 mt-10 chart-container">
        <canvas id="PassFail"></canvas>
      </div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script>
  $(function () {
    var data = {
      labels: [ "Passing", "Failing" ],
      datasets: [
        {
          data: [<?=$passed?>, <?=$failed?>],
          backgroundColor: [ "#36A2EB", "#FF6384"],
          hoverBackgroundColor: [ "#36A2EB", "#FF6384"]
        }]
      };

      new Chart(document.getElementById('PassFail'), {
        type: 'pie',
        data: data
      });
  });

</script>
