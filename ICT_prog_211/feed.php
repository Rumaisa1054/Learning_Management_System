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

     <title>Give Feedback!</title>
     <?php
     if(isset($_POST['submit'])){//.
     $servername = "localhost";
     $username = "root";
     $password = "";
     $database = "ict_indexform";



     //inserting to database
     $conn =mysqli_connect($servername, $username,$password,$database );
       //" Die if failed";
       $emailid = $_SESSION['email'];
       $Courseid = $_POST['Cid'];
       $Message = $_POST['feed'];
       if ($Courseid=='NULL' || $Message=='NULL') {
         echo '
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
         <strong>Error!!!</strong>Fill the form to Submit.
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
         </div>
         ';
       }
       else{
         $sql="SELECT * FROM `enroll` where `emailid` = '$emailid' AND id='$Courseid'";
         $que=mysqli_query($conn,$sql);
         if($que){//.
         $result = mysqli_query($conn,"SELECT * FROM  `comments` where  `emailid` = '$emailid' AND `Courseid` = '$Courseid' AND `comment` = '$Message'");
          $row=mysqli_num_rows($result);
          if($row >0){//.
         echo '
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
         <strong>Error!!!</strong>Feedback Already Submitted.
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
         </div>
         ';
         }///.cl
         else{//.
         $sql = "INSERT INTO `comments` (`Srno`, `emailid`, `Courseid`, `comment`) VALUES ('NULL', '$emailid', '$Courseid', '$Message')";
         $resulst =mysqli_query($conn, $sql);
         if($resulst){//.
                                 echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
               <strong>Success!</strong>  Your Feedback Have Been Submitted. We will return to you Soon through Your Email Address
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button></div>';

                             }//.cl.
                   else{//.
                         echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
               <strong>Ooops!</strong>  We are facing some technical issue and your entry was not submitted successfully! We regret the inconvinience caused!
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               </div>';
                       }///.cl
         }//.cl.
       }//.cl
       else{//.
         echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Ooops!</strong> Please Enter A Correct ID In which you are Enrolled
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>';
       }//.cl
       }

   }//.cl

?>
   </head>
   <body id="bac">
 <br>
   <div class="container">
     <div class="row justify-content-evenly row-cols-3">
       <div class="col-md-3">
       </div>
       <div class="col-md-6 border border-dark mt-3 pt-1 ps-5 pe-5 rounded bg-white text-primary">
         <br>
         <h1><center>-Learning Hub-</center></h1>
         <h3><center>Give Feedback.</center></h3><br>
          <div class="container">
            <form action="feed.php" method="POST">
            <div class="row">
            <div class="col">
            <b>Enter CourseId : </b><input name ="Cid"  class="form-control" placeholder="Enter Course ID" id="exampleFormControlTextarea1" rows="3" required><br>

            <b>Enter Comment : </b><textarea name ="feed" class="form-control" placeholder="Enter your Comment" id="exampleFormControlTextarea1" rows="6" required></textarea><br>
            <button type="submit" name="submit" class="btn btn-success">Post</button></form><br>

            </div><br>

          </div><br><center><a class=" text-center text-primary" href="stdnt.php">Click Here to Go back to Profile?</a><br>OR<br>  <a class="text-primary " href="logout.php">   LOG-OUT   </a></center>
            <div class="col-md-3">

            </div>
            <div class="col-md-3">

            </div>
          </div>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 </body>
 </html>



    <br>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
    </html>
