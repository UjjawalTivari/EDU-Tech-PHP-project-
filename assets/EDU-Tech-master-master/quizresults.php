<?php
require_once("Database.php");
session_start();

$WrongArray = array();
$wrongList = substr($_POST['wrongAnswers'], 1);
$WrongArray = explode(',',$wrongList);
//echo $WrongArray;
$strandArray = Database::get_strand_scores($WrongArray);

$numOfRightAns = (20 - count($WrongArray));
$result = "";
if($numOfRightAns < 12)
	$result = "failing to meet";
else if ($numOfRightAns == 12 ||$numOfRightAns == 13)
	$result = "approaching";
else if ($numOfRightAns == 14 || $numOfRightAns == 15)
	$resuslt = "meeting";
else
	$result = "exceeding";

$substrandArray = Database::retrieve_substrands($WrongArray);
$linkArray = Database::retrieve_videos($substrandArray);


//Add the score to the grades table

Database::update_grades($_SESSION['userId'], $_SESSION['test'], $numOfRightAns);
$StringWrong = join(",", $WrongArray);

$startTime = date('Y-m-d H:i:s', ($_POST['startTime'] / 1000));
$endTime = date('Y-m-d H:i:s', ($_POST['endTime'] / 1000));
Database::update_test($_SESSION['userId'], $_SESSION['test'], $startTime, $endTime, null,
			$numOfRightAns, (4-$strandArray['NumberSense']), (4 - $strandArray['Geometry']),
			(4 - $strandArray['Measurement']), (4 - $strandArray['Patterning']),
	 		(4 - $strandArray['Data']), $StringWrong);

//Add the result to the test page

?>
<?php
include_once('header.php');
include_once('navigation_bar.php');
?>
<style>
	.category-label,
	.category-score {
	}

	.category-score {
		display: inline-block;
		padding: 10px;
		border-radius: 20px;
		background-color: skyblue;
	}

	.resource-list-item {
		margin: 5px 0;
	}
</style>
<div class="container">
	<div class="col-xs-12">
		<div class="row">
			<h5>
				<?php
					echo "Your score is " . $numOfRightAns . "/20. You are ". $result . " provincial expectations";
				?>
			</h5>
		</div>
		<div class="row mt-10">
			<div class="col-xs-6 col-sm-4 text-center">
				<h5 class="category-label">Number Sense</h5>
				<div class="category-score">
					<?php
						echo (4-$strandArray['NumberSense']),"/4";
					?>
				</div>
			</div>
			<div class="col-xs-6 col-sm-4 text-center">
				<h5 class="category-label">Measurement</h5>
				<div class="category-score">
					<?php
					echo (4-$strandArray['Measurement']),"/4";
					?>
				</div>
			</div>
			<div class="col-xs-6 col-sm-4 text-center">
				<h5 class="category-label">Patterning</h5>
				<div class="category-score">
					<?php
					echo (4-$strandArray['Patterning']),"/4";
					?>
				</div>
			</div>
			<div class="col-xs-6 col-sm-4 text-center col-sm-offset-2">
				<h5 class="category-label">Geometry</h5>
				<div class="category-score">
					<?php
					echo (4-$strandArray['Geometry']),"/4";
					?>
				</div>
			</div>
			<div class="col-xs-12 col-sm-4 text-center">
				<h5 class="category-label">Data Management and Probability</h5>
				<div class="category-score">
					<?php
					echo (4-$strandArray['Data']),"/4";
					?>
				</div>

			</div>
		</div>

		<div class="row mt-20">
			<h4 class="text-center">You had difficulty with the following concepts</h4>
			<div class="col-xs-12 resource-list">
				<div class="row">
					<?php foreach($substrandArray as $substrand): ?>
						<div class="col-xs-6 col-sm-3 text-center">
							<a class="btn btn-default resource-list-item"><?=$substrand?></a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<div class="row mt-10">
			<div class="col-xs-12 video-container mt-10"></div>
		</div>
	</div>
</div>
<script>
	$(function () {
		var videoLinks = {
			<?php foreach($substrandArray as $substrand): ?>
				'<?=$substrand?>' : '<?=$linkArray[$substrand]?>',
			<?php endforeach; ?>
		};

		$('a.resource-list-item').click(function (e) {
			var $container = $('.video-container');
			$container.html(videoLinks[$(e.target).html()]);
			$container.find('iframe').prop('width', $container.width());
		});
	})
</script>
