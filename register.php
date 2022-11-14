<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
</head>
<body>
    <?php include('header.php') ?>
    <?php include('connect.php') ?>
        <div class="container">

    <div class="row">
       <div class="col-lg-4">
        <div class="login-content">
                    <form action="register.php" method="post">
                        <div class="section-title">
                            <h3>Register</h3>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <input type="text" required="required" value="" name="name" class="form-control" placeholder="name">
                                <input type="email" required="required" value="" name="email" class="form-control" placeholder="email">
                                <input type="password" required="required" value="" name="password" class="form-control" placeholder="password">
                            </div>
                        </div>
                      <div class="login-btn">
					   <input type="submit" name="register" value="Register">
                      
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

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

   // print_r($_POST);
   if(mysqli_query($con,"INSERT INTO `user`( `name`, `email`, `password`, `roletype`) VALUES ('$name','$email','$password','2')")) {
    echo "<script>alert('register successfully!!')</script>";
   }else {
    echo "<script>alert('Not register ')</script>";
   }
}

?>