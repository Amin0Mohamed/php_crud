<?php
include 'db.php';
$conn = new DB();
session_start();
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="assets/style.css" rel="stylesheet">
    <title>task</title>
</head>
<body>
<div class="container">
    <h2 class="w-100 p-3 text-center text-capitalize font-weight-bold text-white bg-primary my-5">home page</h2>
    <div class="row">
        <div class="col-sm-12">
            <?php if (isset($_SESSION['success'])) {?>
                <h2 class="col p-3 text-center alert alert-danger">  <?php echo $_SESSION['success'];?> </h2>
            <?php } ?>
        </div>
    </div>
    <a href="add.php" class="btn btn-info ml-auto mb-3 d-block" style="width: 100px">Add</a>
    <?php if (count( $conn->read('amin') ) ) {   ?>
    <table id="customers">
        <tr style="text-transform: capitalize">
            <th>home team</th>
            <th>away team</th>
            <th>data</th>
            <th>home team score</th>
            <th>away team score</th>
            <th>email</th>
            <th>action</th>
        </tr>
        <?php foreach ($conn->read('amin') as $row){ ?>
        <tr>
            <td><?php echo $row['home']; ?></td>
            <td><?php echo $row['away']; ?></td>
            <td><?php echo $row['data']; ?></td>
            <td><?php echo $row['htscore']; ?></td>
            <td><?php echo $row['atscore']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td>
                <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']?>">delete</a>
                <a class="btn btn-primary" href="edit.php?id=<?php echo $row['id']?>">edit</a>
            </td>
        </tr>
        <?php  }  ?>
    </table>

<?php }else{ ?>
    <h2 class="p-3 text-center alert alert-danger">not found data</h2>
<?php } ?>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

<?php
// Destroying session
session_destroy();
?>