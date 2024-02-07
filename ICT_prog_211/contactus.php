<?php
session_start();
if (!isset($_SESSION['email'])){
  header('location:log.php');
}



$servername = "localhost";
$username = "root";
$password = "";
$database = "ict_indexform";

//Connection formation
$conn =mysqli_connect($servername, $username,$password,$database );
//" Die if failed";
if(!$conn){
              die("Sorry we failed to connect : " . mysqli_connect_error());
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
         <h3><center>Contact with Us.</center></h3><br>

          <!--php-->
          <?php

                      if(isset($_POST['submit'])){//.
                      $servername = "localhost";
                      $username = "root";
                      $password = "";
                      $database = "ict_indexform";

                      $email = $_POST['emails'];
                      $Fname = $_POST['fnmes'];
                      $Lname = $_POST['lnmes'];
                      $Subject = $_POST['subs'];
                      $Message = $_POST['msgs'];

                      //inserting to database
                      $conn =mysqli_connect($servername, $username,$password,$database );
                        //" Die if failed";
                        $result = mysqli_query($conn,"SELECT * FROM  contactus where  FirstName = '$Fname' AND LastName = '$Lname' AND Email = '$email' AND Subject = '$Subject' AND Message= '$Message'");
                         $rowcount=mysqli_num_rows($result);

                        if($rowcount >0){//.
                        echo '
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!!!</strong> Query Already Submitted.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        ';
                        }//.
                        else{//.
                        $sql = "INSERT INTO  `contactus` (`Sr.No`, `FirstName`, `LastName`, `Email`, `Subject`, `Message`) VALUES ('NULL', '$Fname', '$Lname', '$email', '$Subject', '$Message')";
                        $resulst =mysqli_query($conn, $sql);
                        if($resulst){
                                                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                              <strong>Success!</strong>  Your Query Have Been Submitted
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';

                                            }//.
                                  else{
                                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <strong>Ooops!</strong>  We are facing some technical issue and your entry was not submitted successfully! We regret the inconvinience caused!
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>';
                                      }//.
                        }//.

                                }//.
          ?>
            <form action="contactus.php" method="POST">
              <div class="row">
                <div class="col">
                 <b>First name : </b><input type="text" name ="fnmes" id="fnme" class="form-control" placeholder="First name" aria-label="fname" required>
               </div><br>
                <div class="col">
                  <b>Last Name : </b><input type="text" name ="lnmes" id="lnme" class="form-control" placeholder="Last name" aria-label="lname" required>
               </div>
             </div>
             <br><br>
             <div class="row">
               <div class="col">
                 <b>Subject : </b><input type="text" name ="sub" id="subs" class="form-control" placeholder="Subject" aria-label="Subject" required>
               </div><br>
               <div class="col">
                  <b>Email : </b><input name ="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" id="emaild" type="email" class="form-control" placeholder="Email Address" aria-label="email" required>
               </div><br>
             </div>
             <br>
             <div class="row">
               <div class="col">
                  <b>Message : </b><textarea name ="msg" id="msgs" class="form-control" placeholder="Enter your message" id="exampleFormControlTextarea1" rows="3" required></textarea><br>
                  <button type="submit" class="btn btn-success">Submit</button>
                  <center>
               </div><br>

             </div>
             <br>

            </form><a class="text-primary" href="stdnt.php">Click Here to Go back to Profile?</a></center>
        </div>

       </div>

       <div class="col-md-3">

       </div>
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



    <br><br>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
    </html>
