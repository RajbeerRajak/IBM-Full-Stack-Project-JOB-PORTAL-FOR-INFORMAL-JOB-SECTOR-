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
    
    <div class="row">  
      
       	
<?php
$jobid = $_GET['jobid'];
$sql = "SELECT jobs.jobid,jobs.name,categories.name as 'catname',jobs.desciption,jobs.date,jobs.salary,jobs.skill,jobs.timing,jobs.location
from jobs
INNER JOIN categories on categories.catid = jobs.catid 
where jobs.jobid = '$jobid' 
";
$rs = mysqli_query($con,$sql);
$jobdata = mysqli_fetch_array($rs);

$_SESSION['jobid'] = $jobid;
    ?>
       	<div class="col-sm-12 myborder">
       		
				<h4><?= $jobdata['name']?> </h4>
                <small> Category: ( <?= $jobdata['catname']?> ) </small>
				<p>Desc: <?=$jobdata['desciption']?></p>
                <small>Skill: ( <?= $jobdata['skill']?> ) </small>
                <p>Timing: <?=$jobdata['timing']?></p>
                <p>Location: <?=$jobdata['location']?></p>
                <p>Apply On: <?=$jobdata['date']?></p>
			<div class="col-sm-2">
                <?php

                if(isset($_SESSION['type'])) {
                    if ($_SESSION['type'] == 2) {
                        echo '<a href="apply.php" class="btn btn-primary">Apply Now</a>';
                    }
                }else {
                        echo '<a href="login.php" class="btn btn-primary">Login</a> <br><br>';
                        echo '<a href="register.php" class="btn btn-primary">Register</a>';
                    }
                ?>
                
            </div>
       
	</div>

    
</div>
</div>
<?php include('footer.php') ?>

</body>
</html>