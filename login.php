
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php include('header.php') ?>
    <?php include('connect.php') ?>
        <div class="container">

    <div class="row">
       <div class="col-lg-4">
        <div class="login-content">
                    <form action="login.php" method="post">
                        <div class="section-title">
                            <h3>Login</h3>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-user"></i></span>
                                <input type="email" required="required" value="" name="email" class="form-control" placeholder="email">
                                <input type="password" required="required" value="" name="password" class="form-control" placeholder="password">
                            </div>
                        </div>
                      <div class="login-btn">
					   <input type="submit" name="login" value="Login">
                      
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

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "select * from user where email ='$email' and password= '$password'";
    $rs = mysqli_query($con,$sql);
    if(mysqli_num_rows($rs)>0){
        $data = mysqli_fetch_array($rs);
  //      print_r($data);
  $roletype = $data['roletype'];
  $userid = $data['userid'];
  $username = $data['name'];
 
  $_SESSION['type'] = $roletype;
  $_SESSION['userid'] =$userid;
   $_SESSION['name'] =$username;

  if($roletype == 1){
echo "<script>alert('admin successfully login')</script>";
 //header('Location: index.php');
 echo "<script> window.location.href='index.php' </script>";
  }else if($roletype == 2) {
    echo "<script>alert('user successfully login')</script>";
    echo "<script> window.location.href='index.php' </script>";
  }
 
    }else{
         echo "<script>alert('invalid username or password ')</script>";
    }
   
}

?>