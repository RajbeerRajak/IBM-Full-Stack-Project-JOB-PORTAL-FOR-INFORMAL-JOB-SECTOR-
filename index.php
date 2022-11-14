<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    
<?php include('header.php') ?>
<?php include('connect.php') ?>
<div class="container">
    <h1>Lastest Jobs</h1>
    <h1>Welcome to 
        <?php
 //   session_start(); 
 //  echo $_SESSION['name'];
    ?></h1>
    <div class="row">  
      
       	
<?php
$sql = "SELECT jobs.jobid,jobs.name,categories.name as 'catname',jobs.desciption,jobs.date,jobs.salary,jobs.skill,jobs.timing,jobs.location
from jobs
INNER JOIN categories on categories.catid = jobs.catid 
ORDER by jobs.jobid DESC LIMIT 3
";
$rs = mysqli_query($con,$sql);
while($jobdata = mysqli_fetch_array($rs)) {
    ?>
       	<div class="col-sm-12 myborder">
       		
				<h4><?= $jobdata['name']?> </h4>
                <small> Category: ( <?= $jobdata['catname']?> ) </small>
				<p>Desc: <?=$jobdata['desciption']?></p>
                <small>Skill: ( <?= $jobdata['skill']?> ) </small>
                
                <p>Timing: <?=$jobdata['timing']?></p>
                <p>Location: <?=$jobdata['location']?></p>
			
       
	</div>
    <?php } ?>
    <a href="viewjobs.php" class="btn btn-primary">View All Jobs</a>
</div>
</div>

<?php include('footer.php') ?>

</body>
</html>