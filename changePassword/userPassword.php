<?php
session_start();
if(isset($_SESSION['user_id']))
{
    $user_id=$_SESSION['user_id'];
    //echo $user_id;
    if(isset($_POST['submit']))
    {
        $change_password=$_POST['userNewPassword'];
        $change_password1=$_POST['userNewPassword1'];
       // echo $change_password;
       // echo $change_password1;
        if($change_password===$change_password1)
        {
            require_once('../db/connection.php');
        $sql = "UPDATE user SET user_password='$change_password' , user_check_password=1 WHERE user_id=$user_id";
               //$result = $conn->query($sql);
                if ($conn->query($sql) === TRUE) {
                    
                    header('Location: ../profile/userProfile.php/');
                    exit;
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
        }
        else
        {
            echo "password not match";
        }
        
    }
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
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

      
<style>
/* Full-width input fields */
input[type=text], input[type=password],input[type=email] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

      </style>
  </head>
  <body>
    <!--<h1>Hello, world!</h1>  -->
      <div class="container">
          <div class="row">
              <div class="col-md-3"></div>
            <div class="col-md-6">
                   <form class="modal-content animate" action="userPassword.php" method="post">
                    <div class="container">
                        <br>
                        Change Password
                        <hr>
                      <label><b>New Password</b></label>
                      <input type="password" placeholder="Enter New Password" name="userNewPassword" required>

                      <label><b>Re-Enter Password</b></label>
                      <input type="password" placeholder="Re-Enter New Password" name="userNewPassword1" required>

                      <button type="submit" name="submit">Submit</button>
                    </div>

                    <div class="container" style="background-color:#f1f1f1">
                      
                      <span class="psw">Forgot <a href="#">password?</a></span>
                    </div>
                  </form>
        
                </div>
                         
            </div>
        </div>
          
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>