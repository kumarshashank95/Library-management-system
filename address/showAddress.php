<?php
require_once("../db/connection.php");
$sql = "SELECT * FROM address";
$result= $conn->query($sql);


/*if($_SERVER["REQUEST_METHOD"]=="GET"){
    
       // echo "asd";
       // $id=$_GET['id'];
        // sql to delete a record
        $sql = "DELETE FROM address WHERE address_id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Record deleted successfully');</script>";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    
    
}*/
 $conn->close();
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
            
                location.href="editAddress.php?id="+id;       
        }
        function deleteAddress(id){
            
                location.href="deleteAddress.php?id="+id;       
        }
    </script>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10" style="margin-top:4%">
                <h1>Show  Address</h1>
                <hr>
                <br>
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
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
                            $row1=$result->fetch_row();
                       // echo $row1;
                        foreach($row1 as $doc )
                        {
                            echo $doc;
                        }
                            while($row = $result->fetch_assoc()) {
                               
                
                                echo '
                                    <tr>
                                      <th scope="row">'.$a.'</th>
                                      <td>'.$row["address_street"].'</td>
                                      <td>'.$row["address_city"].'</td>
                                      <td>'.$row["address_state"].'</td>
                                      <td>'.$row["address_country"].'</td>
                                      <td>'.$row["address_pin"].'</td>
                                      <td>
                                        <a href="#" class="btn btn-primary " role="button" aria-pressed="true" onclick="editAddress('.$row["address_id"].')" >Edit</a>
                                      
                                        
                                        
                                        <button type="button" name="deleteData" class="btn btn-
                                        danger active" onclick="deleteAddress('.$row['address_id'].')">Delete</button>
                                      </td>
                                    </tr>
                                ';
                                $a++;
                            }
                        } else {
                            echo "0 results";
                        }
                        
                    ?>
                  </tbody>
                </table>
                
                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
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