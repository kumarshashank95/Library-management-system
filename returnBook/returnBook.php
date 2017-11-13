<?php
session_start();
if(isset($_SESSION['user_id']))
{
    //echo "helo";
    $user_id=$_SESSION['user_id'];
    if(isset($_GET['id']))
    {
        require_once("../db/connection.php");
        $book_id=$_GET['id'];
   // $sql = "UPDATE book SET book_status=1 WHERE book_id=id";
        $sql = "UPDATE book SET book_status=0 WHERE book_id=$book_id";
        if($conn->query($sql))
        {
        //    echo "issued";
		echo "<script> alert('book returned');
				window.location.href='../issuebook/availableBook.php';</script>";
            //header('Locaton: ../issuedbook/availableBook.php');
        }
        
    }
    
}
else
{
    echo "not allow";
    header('Location:../index.php');
}

?>