<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
    #bac{
      background-image: url("image/bac.jpg");
      height: 100%;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }
    </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>REGISTER!</title>
  </head>
  <body id="bac">
    <?php
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
                  $dob = $_POST['date'];
                  $pas = $_POST['passw'];
                  $Role = $_POST['roles'];

                //Connection formation

                  //" Die if failed";
                  $results = mysqli_query($conn,"SELECT * FROM  `reg` WHERE email = '$ema'");
                  if($count=mysqli_num_rows($results)){
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Error!</strong>  You have an Account Already. Please Log-In to Continue.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                  }else{
                  $sql = "INSERT INTO reg (sno, email, dob, passw,role) VALUES (NULL, '$ema', '$dob', '$pas', '$Role')";
                  $resulst =mysqli_query($conn, $sql);
                  if($resulst){
                                          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong>  Your Account Has Been Created. Please Log-In to Continue.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

                                      }
                            else{
                                  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Ooops!</strong>  We are facing some technical issue and your entry was not submitted successfully! We regret the inconvinience caused!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                                }
                  }

                          }
    ?>
    <br>
      <div class="container">
        <div class="row justify-content-evenly row-cols-3">
          <div class="col-md-3">
          </div>
          <div class="col-md-6 border border-dark ps-4 pe-4 pb-1 rounded bg-white text-primary">
            <br>
            <h1><center>-Learning Hub-</center></h1>
            <h3><center>Please Register to Continue</center></h3><br>
              <form action="reg.php" method="POST">
                <div class="form-group">
    <label for="exampleInputEmail1">Email address : </label>
    <input type="email" name ="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" id="email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Date of birth : </label>
    <input type="date" required name ="date" id="date" class="form-control" id="exampleInput" placeholder="Enter Date of Birth">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password : </label>
    <input type="password" required  pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=\S+$).{6,}$" name ="passw" id="passw" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>

  Select Role :
  <div class="custom-control custom-radio">
  <input type="radio" id="customRadio1" value="Teacher" name="roles" class="custom-control-input">
  <label class="custom-control-label" for="customRadio1">Teacher</label>
</div>
<div class="custom-control custom-radio">
  <input type="radio" id="customRadio2" value="Student" name="roles" class="custom-control-input">
  <label class="custom-control-label" for="customRadio2">Student</label>
</div>
  <br>
  <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
</form><br>
<center><a class="text-primary" href="index.php">Click Here to Go back to Home?</a></center>
<center><a class="text-primary" href="log.php">Already Have an Account? Log-In Here</a></center><br><br>
                <!-- <div class="row">
                  <div class="col">
                   <b>First name : </b><input type="text" name ="fnme" id="fnme" class="form-control" placeholder="First name" aria-label="fname">
                 </div><br><br>
                  <div class="col">
                    <b>Last Name : </b><input type="text" name ="lnme" id="lnme" class="form-control" placeholder="Last name" aria-label="lname">
                 </div>
               </div>
               <br><br>
               <div class="row">
                 <div class="col">
                   <b>Subject : </b><input type="text" name ="sub" id="sub" class="form-control" placeholder="Subject" aria-label="Subject">
                 </div><br>
                 <div class="col">
                    <b>Email : </b><input name ="email" id="email" type="email" class="form-control" placeholder="Email Address" aria-label="email">
                 </div><br>
               </div>
               <br>
               <div class="row">
                 <div class="col">
                    <b>Message : </b><textarea name ="msg" id="msg" class="form-control" placeholder="Enter your message" id="exampleFormControlTextarea1" rows="3"></textarea><br>
                    <button type="submit" class="btn btn-success">Submit</button>
                 </div><br>

               </div>
               <br>

              </form> -->

           </div>

          </div>

          <div class="col-md-3">

          </div>
        </div>
      </div>


    <br>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
