<?php
session_start();
if(isset($_SESSION['admin_id']) and isset($_SESSION['admin_address_id']))
{
    //echo "helo";
    $admin_id=$_SESSION['admin_id'];
    require_once("../db/connection.php");

    $sql = "SELECT * FROM admin";
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
      
    <script>
        function editAddress(id){
            
                location.href="editAdmin.php?id="+id;       
        }
        function deleteAddress(id){
            
                location.href="deleteAddress.php?id="+id;       
        }
    </script>
  </head>
  <body>
    <div class="fluid-container">
        <div class="row">
           <!-- <div class="col-md-1"></div>  -->
            <div class="col-md-12" style="margin-top:4%">
                <h1>Admins</h1>
                <hr>
                <br>
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>DOB</th>
                      <th>Phone No.</th>
                      <th>Street</th>
                      <th>City</th>
                      <th>State</th>
                      <th>Country</th>
                      <th>Pin</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                       $a=1;
                    if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $address_id=$row['admin_address_id'];
                                $sql_address="SELECT * FROM address WHERE address_id=$address_id;";
                                $result_address=$conn->query($sql_address);
                                $row_address=$result_address->fetch_assoc();
                               echo '
                                    <tr>
                                      <th scope="row">'.$a.'</th>
                                      <td>'.$row["admin_fname"].'</td>
                                      <td>'.$row["admin_lname"].'</td>
                                      <td>'.$row["admin_email"].'</td>
                                      <td>'.$row["admin_dob"].'</td>
                                      <td>'.$row["admin_phone"].'</td>
                                      
                                      <td>'.$row_address["address_street"].'</td>
                                      <td>'.$row_address["address_city"].'</td>
                                      <td>'.$row_address["address_state"].'</td>
                                      <td>'.$row_address["address_country"].'</td>
                                      <td>'.$row_address["address_pin"].'</td>
                                      <td>
                                        <a href="#" class="btn btn-primary " role="button" aria-pressed="true" onclick="editAddress('.$row["admin_id"].')" >Edit</a>
                                      
                                        
                                        
                                        <button type="button" name="deleteData" class="btn btn-
                                        danger active" onclick="deleteAddress('.$row['admin_id'].')">Delete</button>
                                      </td>
                                    </tr>
                                ';
                                $a++;
                            }
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                    ?>
                  </tbody>
                </table>
                
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