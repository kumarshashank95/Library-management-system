<?php

session_start();
if(isset($_SESSION['admin_id']) and isset($_SESSION['admin_address_id']))
{
    //echo "helo";
    $admin_id=$_SESSION['admin_id'];
    
        if(isset($_POST['submit']))
        {
            require_once('../db/connection.php');
            $category=$_POST['bookCategoryData'];
            echo $category;

            $sql="INSERT INTO category (category_name) VALUES('$category');";
               if ($conn->query($sql) === TRUE) {
                    //$msg="New record created successfully";
                    header('Location: addBookCategory.php');
                    exit;
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
        }

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
            <div class="col-md-3"></div>
            <div class="col-md-6" style="background-color:ed;margin-top:4%">
                          
                          <h2>Add Book Category</h2>
                            <hr>
                            <br>
                            <form action="addBookCategory.php" method="post">
                                <div class="form-group">
                                    <label for="bookCategoryLabel">Book Category</label>
                                    <input type="text" class="form-control" id="bookCategoryLabel"  placeholder="Book Category" required name="bookCategoryData">
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