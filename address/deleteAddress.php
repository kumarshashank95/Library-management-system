<?php 

if(isset($_GET['id']))
{
    echo 'helo';
    $id=$_GET['id'];
    echo $id;
    require_once('../db/connection.php');
   $sql = "DELETE FROM category WHERE category_id=$id";
if ($conn->query($sql) === TRUE) {
            $msg="Deleted successfully";
            echo $msg;
            header('Location: ../bookCategory/showBookCategory.php/');
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
     
        $conn->close();
}
?>