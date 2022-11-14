
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Applications</title>
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
                <th>Job</th>
                <th>Category</th>
                <th>Users</th>
                <th>Date</th>
                <th>CV</th>
            </tr>
            <?php
            

            $sql = "SELECT application.appid,jobs.name, user.name as 'username', categories.name as 'catname', application.date,application.cv
            from application
            INNER JOIN jobs on jobs.jobid = application.jobid
            INNER JOIN categories on categories.catid = jobs.catid
            INNER JOIN  user on user.userid = application.userid
            ";

            $rs = mysqli_query($con,$sql);
            while($data = mysqli_fetch_array($rs)) {

            
            ?>
            <tr>
                <td><?=$data['appid']?> </td>
                <td><?=$data['name']?> </td>
                <td><?=$data['catname']?> </td>
                <td><?=$data['username']?> </td>
                <td><?=$data['date']?> </td>
                <td><a href="uploads/<?=$data['cv']?>" class="btn btn-warning" target="_blank">view cv</a> </td>
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



