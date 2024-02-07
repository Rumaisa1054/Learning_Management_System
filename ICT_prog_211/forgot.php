
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "ict_indexform";
$conn =mysqli_connect($servername, $username,$password,$database);

session_start();
if (isset($_SESSION['email'])){
  if($_SESSION['roles'] == 'Student')
  {header('location: view.php');}
  elseif($_SESSION['roles'] == 'Teacher'){header('location: upload.php');}
}
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "ict_indexform";
$conn =mysqli_connect($servername, $username,$password,$database );

if(isset($_POST['submit'])) {
            //inserting to database

              $dob = $_POST['date'];
              $ema = $_POST['email'];
              $passwn = $_POST['passwn'];
              $results = mysqli_query($conn,"SELECT * FROM  `reg` WHERE email = '$ema' AND dob='$dob'");
              if($count=mysqli_num_rows($results))
              {

                $results = mysqli_query($conn,"UPDATE `reg` SET `passw` = '$passwn' WHERE `reg`.`dob` = '$dob'");
                if($results){
                                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>Success!</strong>  Your password Has been Updated. Please Log-In to Continue.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

                                    }
                          else{
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Ooops!</strong>  We are facing some technical issue and your entry was not submitted successfully! We regret the inconvinience caused!
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                              }
              }
              else
              {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Error!</strong>Please Enter Correct Credientials.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
              }

                      }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
    #bac{
    background-image: url("image/bac.jpg");
      height: 100vh;
      background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
    }
    </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>LOG_IN!</title>
  </head>
  <body id="bac">
<br><br>
  <div class="container">
    <div class="row justify-content-evenly row-cols-3">
      <div class="col-md-3">
      </div>
      <div class="col-md-6 border border-dark p-4 rounded bg-white text-primary">
        <br>
        <h1><center>-Learning Hub-</center></h1>
        <h3><center>Please Enter to Continue</center></h3><br>
          <form action="forgot.php" method="POST">
              <div class="form-group">
                <label for="exampleInputPassword1">Date of birth : </label>
                <input type="date" required name ="date" id="date" class="form-control" id="exampleInput" placeholder="Enter Date of Birth">
                <small id="emailHelp" class="form-text text-muted">Please Enter Your Date of Birth to reset Your Password.</small>
              </div>
              <div class="form-group">
  <label for="exampleInputEmail1">Email address : </label>
  <input type="email" name ="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" id="email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  <small id="emailHelp" class="form-text text-muted">Enter Email through which you registered.</small>
</div>
<div class="form-group">
  <label for="exampleInputPassword1">Enter New Password to Update: </label>
  <input type="password" required  pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=\S+$).{6,}$" name ="passwn" id="passw" class="form-control" id="exampleInputPassword1" placeholder="Password">
</div>
<button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
</form><br>
<center><a class="text-primary" href="log.php">Go to Log-In Page</a></center>
<center><a class="text-primary" href="index.php">Click Here to Go back to Home?</a></center>
<center><a class="text-primary" href="reg.php">Donot Have an Account? Log-In Here</a></center><br><br>

       </div>

      </div>

      <div class="col-md-3">

      </div>
    </div>
  </div>


<br><br>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
