<?php
session_start();

if(isset($_SESSION['admin_id']) and isset($_SESSION['admin_address_id']))
{
    //echo "helo";
    $admin_id=$_SESSION['admin_id'];
    require_once("../db/connection.php");

if(isset($_POST["submit"])){
    $data_name=$_POST['nameData'];
    $data_isbn=$_POST['isbnData'];
    $data_author=$_POST['authorData'];
    $data_edition=$_POST['editionData'];
    $data_category=$_POST['categoryData'];
    $data_publication=$_POST['publicationData'];
    
    /*echo $data_name;
     echo $data_name;
    echo $data_isbn;
    echo $data_author;
    echo $data_edition;
    echo $data_category;
    echo $data_publication;*/
    //inserting in address table
    if(!empty($data_name) and !empty($data_isbn) and !empty($data_author) and !empty($data_edition) and !empty($data_category) and !empty($data_publication))
    {
        //echo $data_author;
        $sql_author = "INSERT INTO author (author_name) VALUES ('$data_author')";
        if($conn->query($sql_author)=== TRUE)
        {
            $id_author=$conn->insert_id;
         //   echo $id_author;
            
            $sql_category= "INSERT INTO category (category_name) VALUES ('$data_category')";
             if($conn->query($sql_category)=== TRUE)
                {
                    $id_category=$conn->insert_id;
                 //   echo $id_author;
                    
                    $sql_publication= "INSERT INTO publication (publication_name) VALUES ('$data_publication')";
                        if($conn->query($sql_publication)=== TRUE)
                            {
                                $id_publication=$conn->insert_id;
                            //    echo $id_publication;
                                
                            
                            //inserting data in admin table having foregin key address_id
                    $sql="INSERT INTO book (book_name,book_isbn,book_author_id,book_edition,book_category_id,book_publication_id) VALUES('$data_name','$data_isbn',$id_author,'$data_edition',$id_category,$id_publication);";
                                    if($conn->query($sql))
                                    {
                                      //  echo "inserted";
									  echo "<script>alert('book added ');
												window.location.href='../book/addBook.php';</script>";
                         
                                        exit();
                                    }
                                    else {
                                        echo "Error: " . $sql . "<br>" . $conn->error;
                                    }
                        }
                        else
                            {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
        
                }
                else
                    {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
        
        }
        else
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        
      
                            
                    
               }
           }
            
    $conn->close();
}
                  
else
{
  //  echo "not allow";
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
                <h2>Add Book</h2>
                <hr>
                <br>
                <form action="addbook.php" method="post">
                    <div class="form-group">
                        <label for="bookLabel">Book Name</label>
                        <input type="text" class="form-control" id="bookLabel"  placeholder="Book Name" required name="nameData">
                    </div>
                    <div class="form-group">
                        <label for="isbnLabel">ISBN No.</label>
                        <input type="text" class="form-control" id="isbnLabel"  placeholder="ISBN No." required name="isbnData">
                    </div>
                    <div class="form-group">
                        <label for="authorLabel">Author</label>
                        <input type="text" class="form-control" id="authorLabel"  placeholder="Author" required name="authorData">
                    </div>
                    <div class="form-group">
                        <label for="editionLabel">Edition</label>
                        <input type="text" class="form-control" id="editionLabel"  required placeholder="Edition" name="editionData">
                    </div>
                    <div class="form-group">
                        <label for="categoryLabel">Category</label>
                        <input type="text" class="form-control" id="categoryLabel"  placeholder="Category" required name="categoryData">
                    </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="publicationLabel">Publication</label>
                        <input type="text" class="form-control" id="publicationLabel"  placeholder="Publication" required name="publicationData">
                    </div>
                   </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-info">Reset</button>
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