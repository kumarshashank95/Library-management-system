<?php
session_start();
if(isset($_SESSION['user_id']))
{
    //echo "helo";
    $user_id=$_SESSION['user_id'];
    require_once("../db/connection.php");

    $sql = "SELECT * FROM book WHERE book_status=1";
    $result = $conn->query($sql);
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
      
    <script>
        function editAddress(id){
            
                location.href="returnBook.php?id="+id;       
        }
    </script>
  </head>
  <body>
    <div class="fluid-container">
        <div class="row">
           <!-- <div class="col-md-1"></div>  -->
            <div class="col-md-12" style="margin-top:4%">
                <h1>Issued Books  <a href="../profile/userProfile.php" style="color:black;">Home</a></h1>
                <hr>
                <br>
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Book Name</th>
                      <th>Edition</th>
                      <th>Category</th>
                      <th>Publication</th>
                      <th>Author</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                       $a=1;
                    if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $book_author_id=$row['book_author_id'];
                                $sql_author="SELECT * FROM author WHERE author_id=$book_author_id;";
                                $result_author=$conn->query($sql_author);
                                $row_author=$result_author->fetch_assoc();
                                
                                $book_category_id=$row['book_category_id'];
                                $sql_category="SELECT * FROM category WHERE category_id=$book_category_id;";
                                $result_category=$conn->query($sql_category);
                                $row_category=$result_category->fetch_assoc();
                                
                                $book_publication_id=$row['book_publication_id'];
                                $sql_publication="SELECT * FROM publication WHERE publication_id=$book_publication_id;";
                                $result_publication=$conn->query($sql_publication);
                                $row_publication=$result_publication->fetch_assoc();
                               echo '
                                    <tr>
                                      <th scope="row">'.$a.'</th>
                                      <td>'.$row["book_name"].'</td>
                                      <td>'.$row["book_edition"].'</td>
                                      
                                      
                                      <td>'.$row_category["category_name"].'</td>
                                      <td>'.$row_publication["publication_name"].'</td>
                                      <td>'.$row_author["author_name"].'</td>
                                      <td>
                                        <a href="#" class="btn btn-primary " role="button" aria-pressed="true" onclick="editAddress('.$row["book_id"].')" >Return</a>
                                      
                                      </td>
                                    </tr>
                                ';
                                $a++;
                            }
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                    ?>
                  </tbody>
                </table>
                
            </div>
        </div>  
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.m-in.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </body>
</html>