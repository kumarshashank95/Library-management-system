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
        $sql = "UPDATE book SET book_status=1 WHERE book_id=$book_id";
        if($conn->query($sql)===TRUE)
        {
		//	$sql="UPDATE issue SET issue_user_id=$user_id, issue_book_id=$book_id ";
            //echo "issued";
			echo "<script> alert('book issued');
				window.location.href='../issuebook/availableBook.php';</script>";
         //   header('Locaton:../issuebook/availableBook.php');
        }
        
    }
    
}
else
{
    echo "not allow";
    header('Location:../index.php');
}

?>