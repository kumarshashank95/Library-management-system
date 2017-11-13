<?php

session_start();

if(isset($_SESSION['admin_id']))
{
    //echo "helo";
   // $user_id=$_SESSION['user_id'];
    //$address_id=$_SESSION['user_address_id'];
            if(isset($_POST["submit"]))
            {
                //echo "hlo";
                require_once("../db/connection.php");
                $data_street=$_POST['StreetData'];
                $data_city=$_POST['CityData'];
                $data_state=$_POST['StateData'];
                $data_country=$_POST['CountryData'];
                $data_pin=$_POST['PinData'];
                $user_id=$_GET['id'];
               $address_id=$_GET['address_id'];
                 //   echo $user_id;
                //echo $address_id;

                //echo $data_street;
                //echo $data_city;
                //echo $data_state;

             if(!empty($data_street) and !empty($data_city) and !empty($data_state) and !empty($data_country) and !empty($data_pin) and !empty($user_id))
                {
                // echo $data_street;
                    $sql = "UPDATE address SET address_street='$data_street', address_city='$data_city', address_state='$data_state', address_pin='$data_pin', address_country='$data_country' WHERE address_id=$address_id";
                   //$result = $conn->query($sql);
                    if ($conn->query($sql) === TRUE) {
                                $data_fname=$_POST['FnameData'];
                                $data_lname=$_POST['LnameData'];
                                $data_email=$_POST['EmailData'];
                                $data_phone=$_POST['PhoneData'];
                                $data_date=$_POST['DobData'];

                   // echo $data_fname;
                      //  echo $admin_id;
            //inserting data in admin table having foregin key address_id
                                if(!empty ($data_fname) and !empty($data_lname) and !empty($data_email) and
                                    !empty ($data_phone) and !empty($data_date))
                                {
                                    $sql = "UPDATE user SET user_fname='$data_fname', user_lname='$data_lname', user_email='$data_email', user_dob='$data_date', user_phone='$data_phone', user_address_id=$address_id WHERE user_id=$user_id";
                                        /*$sql="UPDATE admin SET admin_fname='$data_fname', admin_lname='$data_lname', admin_email='$data_email, admin_dob=$data_date, admin_phone=$data_phone, admin_address_id='$address_id' WHERE admin_id=$admin_id;";*/
                                                if($conn->query($sql))
                                                {
                                                   header('Location: ../profile/adminProfile.php');
                                                    exit;
                                                }

                                            else {
                                                echo "Error: " . $sql . "<br>" . $conn->error;
                                            }
                                }
                        //header('Location: ../address/showAddress.php/');
                        //exit;

                    $conn->close();

                        }
                }
            }
            //if(isset($_GET['id']))
}

if(isset($_GET['id']))
{
    $id=$_GET['id'];
    
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
  </head>
  <body>
      
      <div class="container">
          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10" style="background-color:ed;margin-top:4%">
                <h2>Edit User</h2>
                <hr>
                <br>
                <?php 
                       // $id=$_SESSION['user_id'];
                      // echo $id;
                        require_once("../db/connection.php");
                        $sql = "SELECT * FROM user where user_id=$id";
                        if($conn->query($sql))
                        {
                           // echo "abc";
                            $result = $conn->query($sql);
                            $row=$result->fetch_assoc();
                            $address_id=$row['user_address_id'];
                            //echo $address_id;
                            $sql_address = "SELECT * FROM address where address_id=$address_id";
                            $result_address = $conn->query($sql_address);
                            $row_address=$result_address->fetch_assoc();

                        }
                        else
                        {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                         
                ?>
                <form action="editUser.php?id=<?php echo $row['user_id'];?> & address_id=<?php echo $row_address['address_id'];?>" method="post">
                    <div class="form-group">
                        <label for="fnameLabel">First Name</label>
                        <input type="text" class="form-control" id="fnameLabel"            value="<?php echo $row['user_fname'];?>" required name="FnameData">
                    </div>
                    <div class="form-group">
                        <label for="LnameLabel">Last Name</label>
                        <input type="text" class="form-control" id="LnameLabel"  value="<?php echo $row['user_lname'];?>" required name="LnameData">
                    </div>
                    <div class="form-group">
                        <label for="EmailLabel">Email</label>
                        <input type="email" class="form-control" id="emailLabel"  value="<?php echo $row['user_email'];?>"  required name="EmailData">
                    </div>
                    <div class="form-group">
                        <label for="dobLabel">Date OF Birth</label>
                        <input type="date" class="form-control" id="DobLabel"  required value="<?php echo $row['user_dob'];?>"  name="DobData">
                    </div>
                    <div class="form-group">
                        <label for="PhoneLabel">Phone Number</label>
                        <input type="number" maxlength="13" class="form-control" id="phoneLabel"  value="<?php echo $row['user_phone'];?>"  required name="PhoneData">
                    </div> 
                    <div class="form-group">
                    <label for="streetLabel">Street</label>
                        <input type="text" class="form-control" id="streetLabel"            value="<?php echo $row_address['address_street'];?>" required name="StreetData">
                    </div>
                    <div class="form-group">
                        <label for="CityLabel">City</label>
                        <input type="text" class="form-control" id="CityLabel" value="<?php echo $row_address['address_city'];?>" required name="CityData">
                    </div>
                    <div class="form-group">
                        <label for="stateLabel">State</label>
                        <input type="text" class="form-control" id="stateLabel"  value="<?php echo $row_address['address_state'];?>" required name="StateData">
                    </div>
                    <div class="form-group">
                        <label for="countryLabel">Country</label>
                        <input type="text" class="form-control" id="countryLabel" value="<?php echo $row_address['address_country'];?>" required name="CountryData">
                    </div>
                    <div class="form-group">
                        <label for="pinLabel">Pin Code</label>
                        <input type="number" maxlength="6" class="form-control" id="pinLabel" value="<?php echo $row_address['address_pin'];?>" required name="PinData">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
          </div>
    
      </div>
   <?php  $conn->close(); ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.m-in.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>

