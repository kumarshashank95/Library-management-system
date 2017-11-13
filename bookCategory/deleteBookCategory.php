<?php 

session_start();
if(isset($_SESSION['admin_id']) and isset($_SESSION['admin_address_id']))
{
    //echo "helo";
    $admin_id=$_SESSION['admin_id'];
            if(isset($_GET['id']))
        {
          $id=$_GET['id'];

              require_once('../db/connection.php');
              $sql = "DELETE FROM category WHERE category_id=$id";

        if ($conn->query($sql) === TRUE) {
                    $msg="Deleted successfully";
                    echo $msg;
                   // header('Location: ../bookCategory/showBookCategory.php/');
                   // exit;
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