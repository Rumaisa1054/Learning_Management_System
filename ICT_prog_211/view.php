<?php
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
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <nav class="navbar  navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">-Learning Hub-</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link text-white active" aria-current="page" href="index.php">   HOME   </a>
            </li>
            <li class="nav-item dropdown">
               <a  class="nav-link  text-white  dropdown-toggle" href="#"   id="navbarDropdown"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                 COURSES
               </a>
               <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#Coursesmm">Social Media Marketing</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#Coursegd">Graphic designing</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#Coursewp">Wordpress</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#Courseseo">Search Engine Optimization</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#Courseava">Amazon Virtual assistant</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#Courseac">Autocad</a></li>
               </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link  text-white " href="#about">   ABOUT US   </a>
          </li>
          <li class="nav-item">
              <a class="nav-link  text-white " href="#contact">   CONTACT US   </a>
          </li>

          </ul>
          
        </div>
      </div>
  </nav>
  <img src="image/x2.png" class="img-fluid" alt="Image">
  <div class="p-1 mb-2 bg-primary text-white" id="Courseac" width="100%" font-size="18px"><center><h4>Auto-Cad</h4></center></div>

    <div class="container">
      <div class="row  justify-content-center">

        <?php


          $sql="SELECT * FROM videod where cat='Auto-Cad'";

          $query=mysqli_query($conn,$sql);
          while($row=mysqli_fetch_array($query)){
            $teachername= $row["teachername"];
            $cat= $row["cat"];
            $filedes=$row['name'];
            $idd=$row['idd'];
              ?>

              <div class="col-md-4 col-sm-4">
                <div class="card mt-2 mb-2 ms-2 me-2">
                  <div class="card-body">
                    <h5 class="card-title">Course : <?php echo $cat; ?></h5>
                    <p class="card-text"> Teacher name : <?php echo $teachername; ?></p>
                    <p class="card-text"> Course ID : <?php echo $idd; ?></p>
                    <a href="log.php" class="btn btn-primary">Enroll in course</a>
                   </div>

                </div>
              </div><br>

              <?php
            }
              ?>
    <br></div>
    </div>

  <div class="p-1 mt-2 mb-2 bg-primary text-white" id="Coursegd" width="100%" font-size="18px"><center><h4>Graphic Designing</h4></center></div>

  <div class="container">
    <div class="row  justify-content-center">

      <?php


        $sql="SELECT * FROM videod where cat='Graphic Designing'";

        $query=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($query)){
          $teachername= $row["teachername"];
          $cat= $row["cat"];
          $idd=$row['idd'];
            ?>

            <div class="col-md-4 col-sm-4">
              <div class="card mt-2 mb-2 ms-2 me-2">
                <div class="card-body">
                  <h5 class="card-title">Course : <?php echo $cat; ?></h5>
                  <p class="card-text"> Teacher name : <?php echo $teachername; ?></p>
                  <p class="card-text"> Course ID : <?php echo $idd; ?></p>
                  <a href="log.php" class="btn btn-primary">Enroll in course</a>
                 </div>

              </div>
            </div><br>

            <?php
          }
            ?>
  <br></div>
  </div>


  <div class="p-1 mt-2 mb-2 bg-primary text-white" id="Coursewp" width="100%" font-size="18px"><center><h4>Wordpress</h4></center></div>

  <div class="container">
    <div class="row  justify-content-center">

      <?php


        $sql="SELECT * FROM videod where cat='Wordpress'";

        $query=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($query)){
          $teachername= $row["teachername"];
          $cat= $row["cat"];
          $idd=$row['idd'];
            ?>

            <div class="col-md-4 col-sm-4">
              <div class="card mt-2 mb-2 ms-2 me-2">
                <div class="card-body">
                  <h5 class="card-title">Course : <?php echo $cat; ?></h5>
                  <p class="card-text"> Teacher name : <?php echo $teachername; ?></p>
                  <p class="card-text"> Course ID : <?php echo $idd; ?></p>
                  <a href="log.php" class="btn btn-primary">Enroll in course</a>

                 </div>

              </div>
            </div><br>

            <?php
          }
            ?>
  <br></div>
  </div>

  <div class="p-1 mt-2 mb-2 bg-primary text-white" id="Courseava" width="100%" font-size="18px"><center><h4>Amazon Virtual Assistant</h4></center></div>

  <div class="container">
    <div class="row  justify-content-center">

      <?php
    //inserting to database


        $sql="SELECT * FROM videod where cat='Amazon Virtual Assistant'";

        $query=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($query)){
          $teachername= $row["teachername"];
          $cat= $row["cat"];
          $idd=$row['idd'];
            ?>

            <div class="col-md-4 col-sm-4">
              <div class="card mt-2 mb-2 ms-2 me-2">
                <div class="card-body">
                  <h5 class="card-title">Course : <?php echo $cat; ?></h5>
                  
                  <p class="card-text"> Teacher name : <?php echo $teachername; ?></p>
                  <p class="card-text"> Course ID : <?php echo $idd; ?></p>
                  <a href="log.php" class="btn btn-primary">Enroll in course</a>
                 </div>

              </div>
            </div><br>

            <?php
          }
            ?>
  <br></div>
  </div>

  <div class="p-1 mt-2 mb-2 bg-primary text-white" id="Coursesmm" width="100%" font-size="18px"><center><h4>Social Media Marketing</h4></center></div>

  <div class="container">
    <div class="row  justify-content-center">

      <?php



        $sql="SELECT * FROM videod where cat='Social Media Marketing'";

        $query=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($query)){
          $teachername= $row["teachername"];
          $cat= $row["cat"];
          $idd=$row['idd'];
            ?>

            <div class="col-md-4 col-sm-4">
              <div class="card mt-2 mb-2 ms-2 me-2">
                <div class="card-body">
                  <h5 class="card-title">Course : <?php echo $cat; ?></h5>
                  <p class="card-text"> Teacher name : <?php echo $teachername; ?></p>
                  <p class="card-text"> Course ID : <?php echo $idd; ?></p>
                  <a href="log.php" class="btn btn-primary">Enroll in course</a>
                 </div>

              </div>
            </div><br>

            <?php
          }
            ?>
  <br></div>
  </div>

  <div class="p-1 mt-2 mb-2 bg-primary text-white" id="Courseseo" width="100%" font-size="18px"><center><h4>Search Engine Optimization</h4></center></div>

  <div class="container">
    <div class="row  justify-content-center">

      <?php
        $sql="SELECT * FROM videod where cat='Search Engine Optimization'";

        $query=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($query)){
          $teachername= $row["teachername"];
          $cat= $row["cat"];
          $idd=$row['idd'];
            ?>

            <div class="col-md-4 col-sm-4">
              <div class="card mt-2 mb-2 ms-2 me-2">
                <div class="card-body">
                  <h5 class="card-title">Course : <?php echo $cat; ?></h5>
                  <p class="card-text"> Teacher name : <?php echo $teachername; ?></p>
                  <p class="card-text"> Course ID : <?php echo $idd; ?></p>
                  <a href="log.php" class="btn btn-primary">Enroll in course</a>
                 </div>

              </div>
            </div><br>

            <?php
          }
            ?>
  <br></div>
  </div>

<br>



     <div id="about" class="p-1 mb-2 bg-primary text-white" id="about" width="100%" font-size="18px"><center><h4>About us</h4></center></div>
   <br>
   <div  class="container">
     <p><b>Learning Hub is an Online Training program to facilitate the students to learn remotely, free of cost without any limitation of time by enabling theme to log in or register themselves as teacher or learner and enjoy different services provided by the LMS like addition of a course or enrollment in a course, asking questions etc.Learning-Hub is aimed at equipping students with knowledge, skills, tools & techniques necessary to seize the opportunities available internationally in online marketplaces as well as locally to earn a decent living</b></p>
   </div>
   <br>
   <div class="p-1 mb-2 bg-primary text-white" width="100%" id="contact" font-size="18px"><center><h4>Contact us</h4></center></div>
   <br>
   <div id="contact" class="container">
    <!--php-->
    <?php

                if ($_SERVER['REQUEST_METHOD'] == 'POST')
              {
                $email = $_POST['email'];
                $Fname = $_POST['fnme'];
                $Lname = $_POST['lnme'];
                $Subject = $_POST['sub'];
                $Message = $_POST['msg'];

                //inserting to database

                  //" Die if failed";
                  $result = mysqli_query($conn,"SELECT * FROM  contactus where  FirstName = '$Fname' AND LastName = '$Lname' AND Email = '$email' AND Subject = '$Subject' AND Message= '$Message'");
                   $rowcount=mysqli_num_rows($result);

                  if($rowcount >0){
                  echo '
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Error!!!</strong> Query Already Submitted.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  ';
                  }
                  else{
                  $sql = "INSERT INTO  `contactus` (`Sr.No`, `FirstName`, `LastName`, `Email`, `Subject`, `Message`) VALUES ('NULL', '$Fname', '$Lname', '$email', '$Subject', '$Message')";
                  $resulst =mysqli_query($conn, $sql);
                  if($resulst){
                                          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong>  Your Query Have Been Submitted
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';

                                      }
                            else{
                                  echo '<div class="alert alert-Danger alert-dismissible fade show" role="alert">
                        <strong>Ooops!</strong>  We are facing some technical issue and your entry was not submitted successfully! We regret the inconvinience caused!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                                }
                  }

                          }
    ?>
      <form action="/ICT_prog_21/view.php" method="POST">
        <div class="row">
          <div class="col">
           <b>First name : </b><input type="text" name ="fnme" id="fnme" class="form-control" placeholder="First name" aria-label="fname">
         </div><br>
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

      </form>
   </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
