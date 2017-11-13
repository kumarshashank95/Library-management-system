<?php

session_start();
if(isset($_SESSION['admin_id']) and isset($_SESSION['admin_address_id']))
{
    //echo "helo";
    $admin_id=$_SESSION['admin_id'];
    require_once("../db/connection.php");

    $sql = "SELECT * FROM admin";
    $result = $conn->query($sql);
}
else
{
    echo "not allow";
    header('Location:../index.php');
}

?>