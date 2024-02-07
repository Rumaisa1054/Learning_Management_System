
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "ict_indexform";
$conn =mysqli_connect($servername, $username,$password,$database);

session_start();
if (isset($_SESSION['email']))
{
    if (isset($_SESSION['roles']))
    {
      if($_SESSION['roles'] == 'Student')
    {
      header('location: view.php');
    }
    else if($_SESSION['roles'] == 'Teacher')
    {
      header('location: upload.php');
    }
    }
}
?>
<?php
$login= false;
$showerror= false;
$servername = "localhost";
$username = "root";
$password = "";
$database = "ict_indexform";
$conn =mysqli_connect($servername, $username,$password,$database );

if(!$conn){
      die('Could not Connect MySql Server:' .mysqli_connect_error());

    }elseif(isset($_POST['submit'])) {
            //inserting to database


              $ema = $_POST['email'];
              $pas = $_POST['passw'];
              $Role = $_POST['roles'];

            //Connection formation

              //" Die if failed";
              $results = mysqli_query($conn,"SELECT * FROM  `reg` WHERE email = '$ema' && passw = '$pas'  && role = '$Role'");
              $count=mysqli_num_rows($results);
              if (!$results) {
                header('location:log.php');
              }
              else if($count == 1){
                $login = true;
                session_start();

                $_SESSION['email'] = $ema;
                $_SESSION['roles'] = $Role;
                $emailid=$_SESSION['email'];

                // header(location: );
                if ($Role == 'Student') {
                  header("location: stdnt.php");
                }
                if($Role == 'Teacher'){
                  header("location: upload.php");
                }

              }
              else
              {
                $showerror = "Invalid Credientials";
              }

        }
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    #bac
    {
      background-image: url("image/bac.jpg");
      height: 100%;
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
        <h3><center>Please Log-In to Continue</center></h3><br>
          <form action="log.php" method="POST">
            <div class="form-group">
<label for="exampleInputEmail1">Email address : </label>
<input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name ="email" id="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>
<div class="form-group">
<label for="exampleInputPassword1">Password : </label>
<input type="password" pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=\S+$).{6,}$" name ="passw" id="passw" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
</div>
Select Role :
<div class="custom-control custom-radio">
<input type="radio" id="customRadio1" value="Teacher" name="roles" class="custom-control-input" required>
<label class="custom-control-label" for="customRadio1">Teacher</label>
</div>
<div class="custom-control custom-radio">
<input type="radio" id="customRadio2" value="Student" name="roles" class="custom-control-input" required>
<label class="custom-control-label" for="customRadio2">Student</label>
</div>
<br>
<button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
</form><br>
<center><a class="text-primary" href="forgot.php">Forgot Password?</a></center>
<center><a class="text-primary" href="index.php">Click Here to Go back to Home?</a></center>
<center><a class="text-primary" href="reg.php">Donot Have an Account? Log-In Here</a></center><br><br>
<?php
if($login  == true){
  echo " logged in";
}
if($showerror == true){
    echo  '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Ooops!</strong>  You Have Entered Invalid Credientials. Please Enter Correct Details.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
    ';
}
?>

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
