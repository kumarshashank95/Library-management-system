<?php
session_start();
if(isset($_SESSION['admin_id']) and isset($_SESSION['admin_address_id']))
{
    //echo "helo";
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
         a:hover{
             background-color: yellow;
         }
      </style> 
  </head>
  <body style="background-image:url('../img/library1.jpg')";>
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 "  style="margin-top:4%;"> 
                <div class="card text-center" >
              <div class="card-header"  style="background-color:white;">
                  <ul class="nav nav-tabs card-header-tabs" style="background-color;">
                   <div class="col-md-3" style="margin-top:13%;">
                      
                      <li class="nav-item">
                      
                    <a class="nav-link active" href="../admin/addAdmin.php">Add Admin</a>
                  </li>
                      <li class="nav-item">
                          <a class="nav-link active"  href="../admin/editOneAdmin.php" >Edit</a>
                    
                  </li>
                      
                  <li class="nav-item">
                    <a  class="nav-link active"  href="../book/addBook.php" >Add Book</a>

                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="../profile/authorProfile.php"> Author</a>
                  </li>
                    <li class="nav-item">
                    <a class="nav-link active" href="../profile/publicationProfile.php"> Publisher</a>
                      </li>
                    <li class="nav-item">
                    <a class="nav-link active" href="../user/showUser.php"> User</a>
                      </li>
                      <li class="nav-item">
                    <a class="nav-link active" href="../user/addUser.php">Add User</a>
                      </li>
                    
                      <li class="nav-item">
                    <a class="nav-link active" href="../profile/categoryProfile.php">Book Category</a>
                    </li>
                      <li class="nav-item">
                    <a class="nav-link active" href="../changePassword/adminPassword.php">Change Password</a>
                    </li>
                      <li class="nav-item">
                    <a class="nav-link active" href="../logout/logout.php">Logout</a>
                       </li>
                    
                      </div>
                    <div class="col-md-6 text-left" style="margin-top:5%;background-color:white; margin-left:15%; ">
                
                        <h1>Admin</h1>
                        <hr>
                        <br>
                        <table class="table" >

                          <thead>
                        </thead>
                        <tbody>
                        <tr>
                            <?php 
                                $admin_id=$_SESSION['admin_id'];
                                require_once("../db/connection.php");
                                $sql = "SELECT * FROM admin WHERE admin_id=$admin_id";
                                $result = $conn->query($sql);
                                $row=$result->fetch_assoc();
                                 echo '
                                      <tr>
                                      <th>First Name</th>
                                      <td>'.$row["admin_fname"].'</td>
                                      </tr>
                                      <tr>
                                      <th>Last Name</th>
                                      <td>'.$row["admin_lname"].'</td>
                                      </tr>
                                      <tr>
                                      <th>Email</th>
                                      <td>'.$row["admin_email"].'</td>
                                      </tr>
                                      <tr>
                                      <th>DOB</th>
                                      <td>'.$row["admin_dob"].'</td>
                                      </tr>
                                      <tr>
                                      <th>Phone No.</th>
                                      <td>'.$row["admin_phone"].'</td>
                                      </tr>
                                ';
                        
                                $address_id=$row['admin_address_id'];
                               // echo $address_id;
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
                   <div class="col-md-6" style="background-color:white;margin-top:5%"></div>
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