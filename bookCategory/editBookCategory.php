<?php

session_start();
if(isset($_SESSION['admin_id']) and isset($_SESSION['admin_address_id']))
{
    //echo "helo";
    $admin_id=$_SESSION['admin_id'];
    
if(isset($_POST["submit"]))
{
    echo "hlo";
    require_once("../db/connection.php");
    $data_category=$_POST['CategoryData'];
    $data_id=$_GET['id'];
    
         if(!empty($data_category) and !empty($data_id))
            {

                $sql = "UPDATE category SET category_name='$data_category' WHERE category_id=$data_id";
               //$result = $conn->query($sql);
                if ($conn->query($sql) === TRUE) {
                    $msg="New record created successfully";
                    echo $msg;
                    header('Location: ../bookCategory/showBookCategory.php/');
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
        $sql = "SELECT * FROM category where category_id=$id";
        $result = $conn->query($sql);
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
            <div class="col-md-1"></div>
            <div class="col-md-10" style="background-color:ed;margin-top:4%">
                <h2>Edit Book Category</h2>
                <hr>
                <br>
                <?php $row= $result->fetch_assoc(); ?>
                <form action="editBookCategory.php?id=<?php echo $row['category_id']; ?>" method="post">
                    <div class="form-group">
                        <label for="bookCategoryLabel">Book Category</label>
                        <input type="text" class="form-control" id="bookCategoryLabel"            value="<?php echo $row['category_name'];?>" required name="CategoryData">
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

