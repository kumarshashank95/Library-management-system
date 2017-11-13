<?php
session_start();
if(isset($_SESSION['user_id']) and isset($_SESSION['user_address_id']))
{
    //echo "helo";
    $user_id=$_SESSION['user_id'];
    require_once("../db/connection.php");
$sql = "SELECT * FROM user WHERE user_id=$user_id";
$result = $conn->query($sql);
}
else
{
    echo "not allow";
    header('Location:../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
      <style>
        .nav-item a:hover{
             background-color: yellow;
         }
      </style> 
  </head>
  <body style="background-image:url('../img/library1.jpg');">
    <div class="container">
        <div class="row ">
                <div class="col-md-2"></div>
            <div class="col-md-8"  style="margin-top:4%;">
                <div class="card text-center "  >
              <div class="card-header"  style="background-color:white;" >
                  <ul class="nav nav-tabs card-header-tabs" >
                    
                  <li class="nav-item" >
                    <a class="nav-link active" href="../user/editOneUser.php">Edit</a>
                  </li>
                      
                      <li class="nav-item">
                    <a class="nav-link active" href="../issueBook/availableBook.php">Issue Book</a>
                  </li>
                      <li class="nav-item">
                    <a class="nav-link active" href="../returnBook/issuedBook.php">Return Book</a>
                  </li>
                      
                       <li class="nav-item">
                          <a class="nav-link active"  href="../changePassword/userPassword.php" >change Password</a>
                    
                  </li>
                       <li class="nav-item">
                          <a class="nav-link active"  href="../logout/logout.php" >Logout</a>
                    
                  </li>
                      
                    <div class="col-md-8 text-left" style="margin-top:8%;background-color:white;">
                
                        <h1>Welcome</h1>
                        <hr>
                        <br>
                        <table class="table" >

                          <thead>
                        </thead>
                        <tbody>
                        <tr>
                            <?php 
                                $row=$result->fetch_assoc();
                                 echo '
                                      <tr>
                                      <th>First Name</th>
                                      <td>'.$row["user_fname"].'</td>
                                      </tr>
                                      <tr>
                                      <th>Last Name</th>
                                      <td>'.$row["user_lname"].'</td>
                                      </tr>
                                      <tr>
                                      <th>Email</th>
                                      <td>'.$row["user_email"].'</td>
                                      </tr>
                                      <tr>
                                      <th>DOB</th>
                                      <td>'.$row["user_dob"].'</td>
                                      </tr>
                                      <tr>
                                      <th>Phone No.</th>
                                      <td>'.$row["user_phone"].'</td>
                                      </tr>
                                ';
                        
                                $address_id=$row['user_address_id'];
                                $sql_address="SELECT * FROM address WHERE address_id=$address_id;";
                                $result_address=$conn->query($sql_address);
                                $row_address=$result_address->fetch_assoc();
                                echo '
                                      <tr>
                                      <th>Street</th>
                                      <td>'.$row_address["address_street"].'</td>
                                      </tr>
                                      <tr>
                                      <th>City</th>
                                      <td>'.$row_address["address_city"].'</td>
                                      </tr>
                                      <tr>
                                      <th>State</th>
                                      <td>'.$row_address["address_state"].'</td>
                                      </tr>
                                      <tr>
                                      <th>Country</th>
                                      <td>'.$row_address["address_country"].'</td>
                                      </tr>
                                      <tr>
                                      <th>Pin</th>
                                      <td>'.$row_address["address_pin"].'</td>
                                      </tr>
                                        </tr>
                                      </thead>
                                ';
                        $conn->close();
                    ?>
                  </tbody>
                </table>
                
            </div>
   
                </ul>
                  <h5 style="background-color:black;color:white;height:30px;margin-top:4%;">Copyright@ Kumar Shashank All Rights Reserved</h5>
              </div>
            </div> 
            </div>
               
        </div>  
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.m-in.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </body>
</html>