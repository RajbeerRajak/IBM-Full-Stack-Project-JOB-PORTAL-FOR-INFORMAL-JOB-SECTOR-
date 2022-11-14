
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply</title>
</head>
<body>
    <?php include('header.php') ?>
    <?php include('connect.php') ?>
        <div class="container">

    <div class="row">
       <div class="col-lg-4">
        <div class="login-content">
                    <form action="apply.php" method="post" enctype="multipart/form-data">
                        <div class="section-title">
                            <h3>Apply</h3>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-user"></i></span>
                                <input type="file" required="required" value="" name="file" class="form-control" placeholder="upload file">
                                
                            </div>
                        </div>
                      <div class="login-btn">
					   <input type="submit" name="apply" value="Apply">
                      
					</div>
                     </form>
                </div>
       </div>
       </div>
       </div>
       <?php include('footer.php') ?>
       </body>
</html>

<?php

if(isset($_POST['apply'])){
$jobid = $_SESSION['jobid'];
$userid = $_SESSION['userid'];
$file = $_FILES['file']['name'];
$tmp = $_FILES['file']['tmp_name'];

move_uploaded_file($tmp,"uploads/$file");

$date = date('d/m/y');

if(mysqli_query($con,"INSERT INTO `application`(`userid`, `jobid`, `cv`, `date`) VALUES ('$userid','$jobid','$file','$date')")) {
 echo "<script>alert('Application Submitted successfully!!')</script>";
 echo "<script> window.location.href='index.php' </script>";
}else {
echo "<script>alert('Application Not Submitted successfully!!')</script>";
}
   
}

?>