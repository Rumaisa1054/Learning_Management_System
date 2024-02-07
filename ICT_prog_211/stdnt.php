<?php
session_start();
if (!isset($_SESSION['email'])){
  header('location:log.php');
}
if (isset($_SESSION['email'])){
  if (isset($_SESSION['roles'])){
  if($_SESSION['roles'] == 'Teacher')
  {
    header('location: upload.php');
  }
}
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

    <title>Student Profile!</title>
    <style>
    #bac{
    background-image: url("image/bacc.png");
      height: 100vh;
      background-position: cover;
  background-repeat: no-repeat;
  background-size: contain;
    }
    </style>

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
              <a class="nav-link text-white active" aria-current="page" href="stdnt.php">   HOME   </a>
            </li>
            <li class="nav-item">
              <a class="nav-link  text-white " href="#about">   ABOUT US   </a>
          </li>
          <li class="nav-item">
            <a class="nav-link  text-white " href="#contact"> CONTACTUS   </a>
        </li>
          <li class="nav-item">

              <a class="nav-link  text-white " href="logout.php">   LOG-OUT   </a>
          </li>

          </ul>
        </div>
      </div>
  </nav>
  <div id="bac" class="container-fluid">
    <br><br>
    <div class="row justify-content-evenly row-cols-3">

      <?php
      $servername = "localhost";
       $username = "root";
       $password = "";
       $database = "ict_indexform";


       $conn =mysqli_connect($servername, $username,$password,$database );
       $emailid=$_SESSION['email'];
        $sql="SELECT * From reg WHERE `email`='$emailid'";
        $query=mysqli_query($conn,$sql);

        while($row=mysqli_fetch_array($query)){

       ?>
      <div class="col-md-6 border border-darkme-5 p-4 rounded bg-white text-primary">
        <br>
        <h1><center>-Learning Hub-</center></h1>
        <h3><center>Your Credientials</center></h3><br><br>
        <b>Email address : <?php echo $emailid; ?></b><br><br>

        <b>Password : <?php echo $row["passw"]; ?></b><br><br>

        <b>Role : <?php echo $row["role"]; ?></b><br><br>

        <b>Date of Birth : <?php echo $row['dob']; ?></b><br><br>
       </div>

      </div>
      <?php
    }
       ?>

      <div class="col-md-5">

      </div>

            <div class="col-md-1">
            </div>

    </div>
    </div>
  <div class="p-1 mb-2 bg-primary text-white" style="margin-top: -190px;" id="Courseac" width="100%" font-size="18px"><center><h4>Your Enrolled Courses</h4></center>
  </div>
  <div class="container">
    <div class="row  justify-content-center">

      <?php
      $servername = "localhost";
       $username = "root";
       $password = "";
       $database = "ict_indexform";


       $conn =mysqli_connect($servername, $username,$password,$database );
       $emailid=$_SESSION['email'];
        $sql="SELECT * From enroll WHERE `emailid`='$emailid'";
        $query=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($query)){
          $teachern= $row["teacher"];
          $cats= $row["Course"];
          $filedest=$row['file'];
          $CID=$row['id'];
            ?>

            <div class="col-md-4 col-sm-4">
              <div class="card border border-primary mt-2 mb-2 ms-2 me-2">
                <div class="card-body">
                  <h5 class="card-title">Course : <?php echo $cats; ?></h5>
                  <p class="card-text"> Teacher name : <?php echo $teachern; ?></p>
                  <p class="card-text"> Course ID : <?php echo $CID; ?></p>
                  <video width="100%" controls>
                    <source src="<?php echo $filedest; ?>">
                  </video>
                  <button > review</button>
                 </div>

              </div>
            </div><br>

            <?php
          }
            ?>
  <br></div>
  </div>
  <div class="p-1 mb-2 bg-primary text-white" id="Courseac" width="100%" font-size="18px"><center><h4><a  style="text-decoration: none;" class="text-white" href="feed.php">Click Here to Give Feedback or Ask Questions</a></h4></center></div>

  <div class="p-1 mb-2 bg-primary text-white" id="Courseac" width="100%" font-size="18px"><center><h4>Enter Course ID to Enroll in  Course</h4></center></div>
      <div class="container">
        <div class="row  justify-content-center">
          <form action="stdnt.php" method="post">
          <div class="card border border-primary text-center">
            <div class="card-header">
              An Investment in Knowledge Pays the Best
            </div>
            <div class="card-body">
              <h5 class="card-title">Enroll In Course</h5>
              <p class="card-text">Course ID.</p><input type="number" name="id" class="form-control" required placeholder="Create ID"><br>
              <button type="submit" name="submit" value="submit" class="btn btn-success">Submit To Enroll</button>
            </div>
            <div class="card-footer text-muted">
              Do Your Best
          </div></form>
        </div>
      </div>
    </div>
<?php
       if(isset($_POST['submit'])){//.
         $servername = "localhost";
          $username = "root";
          $password = "";
          $database = "ict_indexform";


          $conn =mysqli_connect($servername, $username,$password,$database );

              $emailid=$_SESSION['email'];
              $idd=$_POST['id'];
              $sqlqs="SELECT * FROM `videod` Where idd='$idd'";
              $resulti = mysqli_query($conn, $sqlqs);
              $rowscount=mysqli_num_rows($resulti);
               if($rowscount ==0){//.
                 echo '
                 <div class="container">
                 <div class="alert alert-danger alert-dismissible fade show" role="alert">
                 <strong>Error!!!</strong> Enter A Correct Existing ID.
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                 </button>
                 </div>
                 </div>';
               }//close1
               else{//.
                 while($row=mysqli_fetch_array($resulti)){//.
                 $Course= $row['cat'];
                 $teacher= $row['teachername'];
                 $file="upload/".$row['name'];
                 $teacherid=$row['emailid'];
               }//close1
              $sqch="SELECT * From enroll WHERE `emailid`='$emailid' and `id`='$idd' and `Course`='$Course' and `teacher`='$teacher'";
              $resultu = mysqli_query($conn, $sqch);
              $rowsecount=mysqli_num_rows($resultu);
               if($rowsecount >0){//.
                 echo '
                 <div class="container">
                 <div class="alert alert-danger alert-dismissible fade show" role="alert">
                 <strong>Error!!!</strong> You Are Already Enrolled.
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
                 </div>';
               }//close1
               else{//.
                 $sqins="INSERT INTO `enroll` (`sno`, `emailid`, `id`, `Course`, `teacher`, `temail`, `file`) VALUES (NULL, '$emailid', '$idd', '$Course', '$teacher', '$teacherid', '$file')";

               if(mysqli_query($conn, $sqins)){//.
                 echo '
                 <div class="container">
                 <div class="alert alert-success alert-dismissible fade show" role="alert">
                 <strong>Success!</strong>You are enrolled Successfully.Please Refresh Page
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                 </div>
                     </div>';

               }//close1
               else{//.
                 echo '
                 <div class="container">
                 <div class="alert alert-danger alert-dismissible fade show" role="alert">
                 <strong>Error!!!</strong> Unable to Enroll.
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </button>
                 </div>
                 </div>';

               }}}//close1//close1//close1
          }//else first//close1
      ?><br>
      <div class="p-1 mb-2 bg-primary text-white" id="Courseac" width="100%" font-size="18px"><center><h4>Enter Course ID To Delete Enrollment in Respective Course</h4></center></div>
          <div class=" mb-2 container">
            <div class="row  justify-content-center">
              <form action="stdnt.php" method="post">
              <div class="card border border-primary text-center">
                <div class="card-header">Send us your Query If You Are Facing Any Problem;

                </div>
                <div class="card-body">
                  <h5 class="card-title">DELETE ENROLLMENT</h5>
                  <p class="card-text">Course ID.</p><input type="number" name="id" class="form-control" required placeholder="Create ID"><br>
                  <button type="submit" class="btn btn-danger mb-2" name="delt" value="submit">Submit To Delete</button>
                </div>
                <div class="card-footer text-muted">
                 BE ATTENTIVE WHILE ENTERING COURSE ID
              </div></form>
            </div>
          </div>
        </div>
        <?php
       if(isset($_POST['delt'])){
         $servername = "localhost";
          $username = "root";
          $password = "";
          $database = "ict_indexform";


          $conn =mysqli_connect($servername, $username,$password,$database );
          $id=$_POST['id'];
          $emailid=$_SESSION['email'];
          $sql="SELECT * From enroll WHERE `emailid`='$emailid' AND `id`='$id'";
          $query=mysqli_query($conn,$sql);
          if(!$query){
            echo 'OHooooo';
          }
          else
          {
          $delq=" DELETE FROM `enroll` WHERE `enroll`.`emailid`='$emailid' AND `enroll`.`id`='$id' ";
          $querys=mysqli_query($conn,$delq);
          if($querys){

         echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>Success!</strong> ENROLLMENT Deleted Successfully.Please Refresh Page
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
         </div>';
           }
           else{
             '<div class="container">
             <div class="alert alert-danger alert-dismissible fade show" role="alert">
             <strong>Error!</strong> Please Enter A Correct ID.
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
             </div>
                 </div>';
           }

          }
   }
        ?>
     <br>

     <div id="about" class="p-1 mb-2 bg-primary text-white" id="about" width="100%" font-size="18px"><center><h4>About us</h4></center></div>
     <br>
     <div  class="container">
     <p><b>Learning Hub is an Online Training program to facilitate the students to learn remotely, free of cost without any limitation of time by enabling theme to log in or register themselves as teacher or learner and enjoy different services provided by the LMS like addition of a course or enrollment in a course, asking questions etc.Learning-Hub is aimed at equipping students with knowledge, skills, tools & techniques necessary to seize the opportunities available internationally in online marketplaces as well as locally to earn a decent living</b></p>
    </div>
    <br>
    <div class="p-1 bg-primary text-white" width="100%" id="contact" font-size="18px"><center><h4><a  style="text-decoration: none;" class="text-white" href="contactus.php">Click Here To Contact Us</a></h4></center></div>
     <div class="pt-2 pb-1 mb-1 bg-primary text-white" width="100%" font-size="18px"><center><h4  style="text-decoration: none;">Follow us :&nbsp&nbsp
      <button type="button" class="btn btn-primary rounded-circle"><svg xmlns="http://www.w3.org/2000/svg" href="https://www.facebook.com" width="30" height="30" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
  </svg> </button>&nbsp&nbsp<button type="button" class="btn btn-success rounded-circle"><svg xmlns="http://www.w3.org/2000/svg" href="https://www.web.whatsapp.com" width="30" height="30" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
    <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
  </svg></button>&nbsp&nbsp<button type="button" class="btn btn-info rounded-circle"><svg xmlns="http://www.w3.org/2000/svg" href="https://www.Twitter.com" width="30" height="30" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
  </svg></button>&nbsp&nbsp<button type="button" class="btn btn-warning rounded-circle"><svg xmlns="http://www.w3.org/2000/svg"  href="https://www.instagram.com"width="30" height="30" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
  </svg></button>&nbsp&nbsp<button type="button" class="btn btn-danger rounded-circle"><svg href="https://www.youtube.com" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
    <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>
  </svg></button>&nbsp&nbsp</h4></center>

     </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
  </html>
