<?php

if(isset($_POST["submit"]))
{
    echo "hlo";
    require_once("../db/connection.php");
    $data_street=$_POST['StreetData'];
    $data_city=$_POST['CityData'];
    $data_state=$_POST['StateData'];
    $data_country=$_POST['CountryData'];
    $data_pin=$_POST['PinData'];
    $data_id=$_GET['id'];
    
    echo $data_street;
 if(!empty($data_street) and !empty($data_city) and !empty($data_state) and !empty($data_country) and !empty($data_pin) and !empty($data_id))
    {
      echo $data_street;
        $sql = "UPDATE address SET address_street='$data_street', address_city='$data_city', address_state='$data_state', address_pin='$data_pin', address_country='$data_country' WHERE address_id=$data_id";
       //$result = $conn->query($sql);
        if ($conn->query($sql) === TRUE) {
            $msg="New record created successfully";
            echo $msg;
            header('Location: ../address/showAddress.php/');
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
     
        $conn->close();
     
}
}
if(isset($_GET['id']))
{
    $id=$_GET['id'];
   echo $id;
    require_once("../db/connection.php");
$sql = "SELECT * FROM address where address_id=$id";
$result = $conn->query($sql);
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
                <h2>Edit Address</h2>
                <hr>
                <br>
                <?php $row= $result->fetch_assoc(); ?>
                <form action="editAddress.php?id=<?php echo $row['address_id']; ?>" method="post">
                    <div class="form-group">
                        <label for="streetLabel">Street</label>
                        <input type="text" class="form-control" id="streetLabel"            value="<?php echo $row['address_street'];?>" required name="StreetData">
                    </div>
                    <div class="form-group">
                        <label for="CityLabel">City</label>
                        <input type="text" class="form-control" id="CityLabel" value="<?php echo $row['address_city'];?>" required name="CityData">
                    </div>
                    <div class="form-group">
                        <label for="stateLabel">State</label>
                        <input type="text" class="form-control" id="stateLabel"  value="<?php echo $row['address_state'];?>" required name="StateData">
                    </div>
                    <div class="form-group">
                        <label for="countryLabel">Country</label>
                        <input type="text" class="form-control" id="countryLabel" value="<?php echo $row['address_country'];?>" required name="CountryData">
                    </div>
                    <div class="form-group">
                        <label for="pinLabel">Pin Code</label>
                        <input type="number" maxlength="6" class="form-control" id="pinLabel" value="<?php echo $row['address_pin'];?>" required name="PinData">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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

