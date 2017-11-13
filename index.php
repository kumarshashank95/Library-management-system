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
      <div  id="id03"  class="fluid-container">
          <div class="row">
            <div class="col-md-12">
                     <div class="card text-center" >
              <div class="card-header" >
                  <ul class="nav nav-tabs card-header-tabs">
                    
                  <li class="nav-item">
                    <a class="nav-link active" href="#" onclick="document.getElementById('id03').style.display='block'" style="margin-top:4%;">Home</a>
                  </li>
                      <li class="nav-item">
                          <a class="nav-link active" href="#" onclick="document.getElementById('id01').style.display='block'" style="margin-top:4%;">Login</a>
                    
                  </li>
                      
                  <li class="nav-item">
                    <a class="nav-link active" href="#" onclick="document.getElementById('id02').style.display='block'" style="margin-top:4%;">Admin Login</a>

                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="#" onclick="document.getElementById('id03').style.display='block'" style="margin-top:4%;">About Us</a>
                  </li>
                      <img class="card-img-bottom" src="img/banner.png" alt="Card image cap" >
                      
                      <div class="col-md-4" style="background-color:hsl(0, 0%, 90%);margin-top:4%;height:380px;">
                <div class="w3-container">
                  <h2>All Authors</h2>
                 
                 <a href="../webApp/public/author.php"><img src="img/books.jpg" class="w3-circle" alt="Norway" style="width:100%;margin-top:5%;"></a> 
                    </div>
              </div>
              <div class="col-xl-4"  style="background-color:#f5f5f0;margin-top:4%;height:380px;">
                <div class="w3-container" >
                  <h2>Publishers</h2>
                  <h2> Of Books</h2> 
                 <a href="../webApp/public/publication.php"><img src="img/publisher1.jpg" class="w3-circle" alt="Norway" style="width:100%;margin-top:6%;"></a> 
                    </div>
              </div>
              <div class="col-xl-4"  style="background-color:#f2e6d9;margin-top:4%; height:380px;">
                <div class="w3-container" >
                    <h2>Available</h2>
                    <h2>Categories Book</h2>
                 <a href="../webApp/public/category.php"><img src="img/book_category.jpg" class="w3-circle" alt="Norway" style="width:100%;margin-top:4%;"></a> 
                    </div>
              </div>
                </ul>
                  <h5 style="background-color:black;color:white;height:30px;margin-top:4%;">Copyright@ Kumar Shashank All Rights Reserved</h5>
              </div>
        
                </div>
              </div>
          </div>
</div>
      
      <!-- for user login form -->
      <div class="container">
          </div>
  <!-- Trigger the modal with a button -->
  
  
      <!-- user login -->
<div id="id01" class="modal">
  
  <form class="modal-content animate" action="login/userLogin.php" method="post">
    <div class="container">
      <label><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="userEmail" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="userPassword" required>
        
      <button type="submit" name="submit">Login</button>
      <input type="checkbox" checked="checked"> Remember me
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>
      
      <!-- admin login -->

<div id="id02" class="modal">
  
  <form class="modal-content animate" action="login/adminLogin.php" method="post">
    <div class="container">
      <label><b>Username/UserEmail</b></label>
      <input type="text" placeholder="Enter Username" name="adminName" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="adminPassword" required>
        
      <button type="submit" name="submit">Login</button>
      <input type="checkbox" checked="checked"> Remember me
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>


      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>