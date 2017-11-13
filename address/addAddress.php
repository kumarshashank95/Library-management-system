<?php

require_once("../db/connection.php");

if(isset($_POST["submit"])){
    $data_street=$_POST['StreetData'];
    $data_city=$_POST['CityData'];
    $data_state=$_POST['StateData'];
    $data_country=$_POST['CountryData'];
    $data_pin=$_POST['PinData'];
    
    echo $data_street;
    echo "<br>";
    echo $data_city;
    echo "<br>";
    echo $data_state;
    echo "<br>";
    echo $data_country;
    echo "<br>";
    echo $data_pin;
    echo "<br>";
    
    
    if(!empty($data_street) and !empty($data_city) and !empty($data_state) and !empty($data_country) and !empty($data_pin))
    {
        $sql = "INSERT INTO address (address_street, address_city, address_state, address_pin, address_country) VALUES ('$data_street', '$data_city', '$data_state', $data_pin, '$data_country')";

        if ($conn->query($sql) === TRUE) {
            $msg="New record created successfully";
            header('Location: addAddress.php');
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    else
    {
        echo "data can not be empty";
    }

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
        var a=document.getElementById('diss');
        
        function asd(){
            a.
        }
    </script>
  </head>
  <body>
      
      <div class="container">
          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10" style="background-color:ed;margin-top:4%">
                
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
</div>
                
                <?php 
                    if(isset($_GET['msg'])){
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                              <button type="button" onclick="asd()" id="diss">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                            </div>';
                    }
                ?>
                
                
                <h2>Add Address</h2>
                <hr>
                <br>
                <form action="addAddress.php" method="post">
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