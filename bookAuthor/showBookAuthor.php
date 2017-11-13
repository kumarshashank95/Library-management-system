<?php

session_start();
if(isset($_SESSION['admin_id']) and isset($_SESSION['admin_address_id']))
{
    //echo "helo";
    $admin_id=$_SESSION['admin_id'];
   
    require_once('../db/connection.php');
    $sql="SELECT * FROM author";
    $result=$conn->query($sql);

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
            
                location.href="editBookAuthor.php?id="+id;       
        }
        function deleteAddress(id){
            
                location.href="deleteBookAuthor.php?id="+id;       
        }
    </script>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6" style="margin-top:4%">
                <table class="table">
                <thead>
                    <tr>
                      <th>#</th>
                        <th>Book Author</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                       $a=1;
                    if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                               
                
                                echo '
                                    <tr>
                                      <th scope="row">'.$a.'</th>
                                      <td>'.$row["author_name"].'</td>
                                      <td>
                                        <a href="#" class="btn btn-primary " role="button" aria-pressed="true" onclick="editAddress('.$row["author_id"].')" >Edit</a>
                                      
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
                
                <!-- Button trigger modal -->
                
                
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