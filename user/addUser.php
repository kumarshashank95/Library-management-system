<?php

require_once("../db/connection.php");

if(isset($_POST["submit"])){
    $data_street=$_POST['StreetData'];
    $data_city=$_POST['CityData'];
    $data_state=$_POST['StateData'];
    $data_country=$_POST['CountryData'];
    $data_pin=$_POST['PinData'];
    
    //inserting in address table
    if(!empty($data_street) and !empty($data_city) and !empty($data_state) and !empty($data_country) and !empty($data_pin))
    {
        $sql = "INSERT INTO address (address_street, address_city, address_state, address_pin, address_country) VALUES ('$data_street', '$data_city', '$data_state', $data_pin, '$data_country')";

        if ($conn->query($sql) === TRUE) {
        //fetching address_id from address table
            $sql="SELECT * FROM address WHERE address_id=LAST_INSERT_ID();";
                if($conn->query($sql)){
                    
                    $result=$conn->query($sql);
                    $row=$result->fetch_assoc();

                    $address_id=$row['address_id'];
                    
                    $data_fname=$_POST['FnameData'];
                    $data_lname=$_POST['LnameData'];
                    $data_email=$_POST['EmailData'];
                    $data_phone=$_POST['PhoneData'];
                    $data_date=$_POST['DobData'];
                    
                    $str='abcd8634ghi';
                    $shuffled=str_shuffle($str);
//inserting data in admin table having foregin key address_id
                    if(!empty ($data_fname) and !empty($data_lname) and !empty($data_email) and
                        !empty ($data_phone) and !empty($data_date))
                    {
                            $sql="INSERT INTO user (user_fname,user_lname,user_email,user_phone,user_dob,
                            user_address_id,user_password) VALUES('$data_fname','$data_lname','$data_email',$data_phone,'$data_date',$address_id,'$shuffled');";
                                    if($conn->query($sql))
                                    {
                                        header('Location: addUser.php');
                                        exit;
                                    }
 
                                else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }
                    }

            }
            else
            {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
    $conn->close();
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
                <h2>Add User   <a href="../profile/adminProfile.php" Style="color:black">Home</a></h2>
                <hr>
                <br>
                <form action="addUser.php" method="post">
                    <div class="form-group">
                        <label for="FnameLabel">First Name</label>
                        <input type="text" class="form-control" id="FnameLabel"  placeholder="First Name" required name="FnameData">
                    </div>
                    <div class="form-group">
                        <label for="LnameLabel">Last Name</label>
                        <input type="text" class="form-control" id="LnameLabel"  placeholder="Last Name" required name="LnameData">
                    </div>
                    <div class="form-group">
                        <label for="EmailLabel">Email</label>
                        <input type="email" class="form-control" id="emailLabel"  placeholder="Email" required name="EmailData">
                    </div>
                    <div class="form-group">
                        <label for="dobLabel">Date OF Birth</label>
                        <input type="date" class="form-control" id="DobLabel"  required name="DobData">
                    </div>
                    <div class="form-group">
                        <label for="PhoneLabel">Phone Number</label>
                        <input type="number" maxlength="13" class="form-control" id="phoneLabel"  placeholder="Phone Number" required name="PhoneData">
                    </div>
                <div class="form-group">
                  <label for="addressLabel">Address</label>
                    <hr>
                    <div class="form-group">
                        <label for="streetLabel">Street</label>
                        <input type="text" class="form-control" id="streetLabel"  placeholder="Street" required name="StreetData">
                    </div>
                    <div class="form-group">
                        <label for="CityLabel">City</label>
                        <input type="text" class="form-control" id="CityLabel"  placeholder="City" required name="CityData">
                    </div>
                    <div class="form-group">
                        <label for="stateLabel">State</label>
                        <input type="text" class="form-control" id="stateLabel"  placeholder="State" required name="StateData">
                    </div>
                    <div class="form-group">
                        <label for="countryLabel">Country</label>
                        <input type="text" class="form-control" id="countryLabel"  placeholder="Country" required name="CountryData">
                    </div>
                    <div class="form-group">
                        <label for="pinLabel">Pin Code</label>
                        <input type="number" maxlength="6" class="form-control" id="pinLabel"  placeholder="Pin Code" required name="PinData">
                    </div>
                </div>
                    <div class="form-group">
                        <hr>
                        <label for="imageLabel">Upload Image</label>
                        <input type="file"  class="form-control" id="imageLabel" name="imageData">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-info">Reset</button>
                </form>
            </div>
          </div>
    
      </div>
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.m-in.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>