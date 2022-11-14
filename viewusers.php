
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Users</title>
</head>
<body>
    <?php include('header.php') ?>
    <?php include('connect.php') ?>
<div class="container">
    <div class="row">
       <div class="col-lg-12">
        <table class="table">
            <tr> 
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Pass</th>
            </tr>
            <?php
            

            $sql = " select * from user where roletype =2";

            $rs = mysqli_query($con,$sql);
            while($data = mysqli_fetch_array($rs)) {

            
            ?>
            <tr>
                <td><?=$data['userid']?> </td>
                <td><?=$data['name']?> </td>
                <td><?=$data['email']?> </td>
                <td><?=$data['password']?> </td>
            </tr>
            <?php
            }
            ?>
</table>
       </div>
    </div>
</div>
<?php include('footer.php') ?>

</body>
</html>



