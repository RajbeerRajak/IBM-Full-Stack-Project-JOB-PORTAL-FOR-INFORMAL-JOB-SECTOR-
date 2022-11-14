<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs</title>
</head>
<body>
    <?php include('header.php') ?>
    <?php include('connect.php') ?>
    <?php

    if(!isset( $_SESSION['type'])) {
      header('Location: login.php');
    }
    ?>

<div class="container">
    <div class="row">
        <div class="col-lg-4">
<div class="login-content">
                    <form action="jobs.php" method="post">
                        <div class="section-title">
                            <h3>Jobs</h3>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-user"></i></span>
                                <input type="hidden" name="jobid" value="">
                                <input type="text" required="required" value="" name="name" class="form-control" placeholder="Name">
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-user"></i></span>
                                <textarea name="description" id="" class="form-control" placeholder="Description"></textarea>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-user"></i></span>
                                
                                <input type="text" required="required"
                               value="" name="skill"
                                class="form-control" placeholder="skill">
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-user"></i></span>
                                
                                <input type="text" required="required"
                               value="" name="timing"
                                class="form-control" placeholder="timing">
                            </div>

                        <!--    <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-user"></i></span>
                                
                                <input type="date" required="required"
                               value="" name="date"
                                class="form-control" >
                            </div> -->
                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-user"></i></span>
                                
                                <input type="text" required="required"
                               value="" name="salary"
                                class="form-control" placeholder="salary">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-user"></i></span>
                                <textarea name="location" id="" class="form-control" placeholder="Location"></textarea>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-user"></i></span>
                                <select name="catid" id="" class="form-control">
                                    <?php
                                    $sql = "SELECT * FROM categories";
                                    $data = mysqli_query($con,$sql);
                                    if(mysqli_num_rows($data) > 0){
                                        while($row=mysqli_fetch_array($data)){
                                            ?><option value="<?= $row['catid'] ?>" > <?=$row['name'] ?></option><?php
                                        }
                                    }
                                    else{
                                        ?><option> Category Not Added </option><?php
                                    }
                                    ?>
                                </select>
                            </div>
                              </div>
                      <div class="login-btn">
					   <input type="submit" name="addjob" value="Add Job">
                       <input type="submit" name="updatecat" value="Update">
					</div>
                     </form>
                    
					
					
                </div>
</div>
        </div>
        <div class="col-lg-8">
             <table> 
                <tr> 
                    <th> ID </th>
                    <th> Name </th>
                    <th> Categories </th>
                    <th> Skill </th>
                    <th> Desc </th>
                    <th> Salary </th>
                    <th> Timing </th>
                    <th> Date </th>
                </tr>
                <?php
$sql = "SELECT jobs.jobid,jobs.name,categories.name as 'catname',jobs.desciption,jobs.date,jobs.salary,jobs.skill,jobs.timing,jobs.location
from jobs
INNER JOIN categories on categories.catid = jobs.catid";
$rs = mysqli_query($con,$sql);
while($jobdata = mysqli_fetch_array($rs)) {
    ?>
    <tr>
        <td> <?= $jobdata['jobid'] ?> </td>
        <td> <?= $jobdata['name'] ?> </td>
        <td> <?= $jobdata['catname'] ?> </td>
        <td> <?= $jobdata['skill'] ?> </td>
        <td> <?= $jobdata['desciption'] ?> </td>
        <td> <?= $jobdata['salary'] ?> </td>
        <td> <?= $jobdata['timing'] ?> </td>
        <td> <?= $jobdata['date'] ?> </td>
    
    </tr>
<?php
}

?>
            </table>
                      
       </div>
        </div>
    </div>



    <?php include('footer.php') ?>

    <?php 

if(isset($_POST['addjob'])) {
    $name = $_POST['name'];
    $catid = $_POST['catid'];
    $description = $_POST['description'];
    $skill = $_POST['skill'];
  $date = date('d/m/Y');
    $timing = $_POST['timing'];
    $location = $_POST['location'];
    $salary = $_POST['salary'];

  //  print_r($_POST);
  if(mysqli_query($con,"INSERT INTO `jobs`( `name`, `desciption`, `skill`, `timing`, `date`, `salary`, `location`, `catid`) VALUES ('$name','$description','$skill','$timing','$date','$salary','$location','$catid')")){
    echo "<script> alert('record Added')</script>";
  }else{
     echo "<script> alert('record not added')</script>";
  }
}

    ?>
</body>
</html>