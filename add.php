<?php
include 'db.php';
$conn = new DB();
$error='';
$success='';
if(isset($_POST['submit']))
{
     $home = filter_var($_POST['home'],FILTER_SANITIZE_STRING);
     $away = filter_var($_POST['away'],FILTER_SANITIZE_STRING);
     $htscore = filter_var($_POST['htscore'],FILTER_SANITIZE_NUMBER_INT);
     $atscore = filter_var($_POST['atscore'],FILTER_SANITIZE_NUMBER_INT);
     $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
     $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);

     if (empty($home) || empty($away) || empty($htscore) || empty($atscore) ){
         $error='please fill all fieldes';
     }else{
           if ( filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) ){
                   if (strlen($password) >= 5 ){
                       $newPassword=$conn->enc_password($password);
                       $q="INSERT INTO `amin`(`home`, `away`, `htscore`, `atscore`,`email`,`password`)VALUES ('$home','$away',$htscore,$atscore,'$email','$newPassword')";
                       $success = $conn->insert($q);
                   }else{
                       $error='password must be grater than 6 characters';
                   }
           }else{
               $error='please type valid email';
           }
     }

}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>add data</title>
</head>
<body>

<div class="container" style="margin: 50px auto;width: 50%">
    <div class="row">
        <div class="col-sm-12">
            <?php if ($error != '') {?>
                <h2 class="col p-3 text-center alert alert-danger">  <?php echo $error;?> </h2>
            <?php } ?>
        </div>
        <div class="col-sm-12">
            <?php if ($success != '') {?>
                <h2 class="col p-3 text-center alert alert-danger">  <?php echo $success;?> </h2>
            <?php } ?>
        </div>

    </div>
    <h2 class="w-100 p-3 text-center text-capitalize font-weight-bold text-white bg-primary">add value</h2>
    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
        <div class="form-group">
            <input type="text" name="home" class="form-control"  placeholder="Enter home team">
        </div>
        <div class="form-group">
            <input type="text" name="away" class="form-control"  placeholder="Enter away team">
        </div>
        <div class="form-group">
            <input type="number" name="htscore"  class="form-control"  placeholder="Enter home team score">
        </div>
        <div class="form-group">
            <input type="number" name="atscore"  class="form-control"  placeholder="Enter away team score">
        </div>
        <div class="form-group">
            <input type="text" name="email"  class="form-control"  placeholder="Enter email">
        </div>
        <div class="form-group">
            <input type="text" name="password"  class="form-control"  placeholder="Enter password">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
    <a href="home.php" class="btn btn-info m-auto w-50 mb-3 d-block" style="width: 100px">home</a>

</div>




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
