<?php
session_start();
if(isset($_SESSION['admin_id']))
{
    require_once("../db/connection.php");
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
       // echo $id;
        $sql="SELECT * FROM admin WHERE admin_id=$id";
            if($conn->query($sql))
            {
                echo "helo";
                    if($result=$conn->query($sql))
                    {
                         $row=$result->fetch_assoc();
                    $address_id=$row['admin_address_id'];
                    echo $address_id;
                        
                    $sql = "DELETE FROM admin WHERE admin_id=$id";
                    if($conn->query($sql))
                    {
                        echo "delete";
                        echo $address_id;
                        $sql = "DELETE FROM address WHERE address_id=$address_id";
                        if($conn->query($sql))
                        {
                            //echo "deleted";
                            header('Location:../admin/showAdmin.php');
                        }
                    }
                    }
                   
                
               
                }
        
    }
    
    $result = $conn->query($sql);
}
else
{
    echo "not allow";
    header('Location:../index.php');
}

?>