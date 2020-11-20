<?php
include("connect.php");
$YEAR = $BRANCH = $SEMESTER= $TITLE = $AUTHOR = $EMAIL_ID = $PUBLISHER = $PRICE = "";
$YEAR_err = $BRANCH_err = $SEMESTER_err = $TITLE_err = $AUHTOR_err = $EMAIL_ID_err = $PUBLISHER_err = $PRICE_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // YEAR INPUT
    if(empty(trim($_POST["YEAR"]))){
            $YEAR_err = "Please enter a year.";
        } else{
            // Prepare a select statement
            $sql = "SELECT ISBN FROM book WHERE YEAR = ?";
            
            if($stmt = $mysqli->prepare($sql)){
                // Bind variables to the prepared statement as parameters
                $stmt->bindParam(":YEAR", $param_YEAR,PDO::PARAM_STR);
                
                // Set parameters
                $param_YEAR = trim($_POST["YEAR"]);
                
                // Attempt to execute the prepared statement
                if($stmt->execute()){
                    // store result
                    $YEAR = trim($_POST["YEAR"]);
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                $stmt->close();
            }
        }
    //BRANCH INPUT    
    if(empty(trim($_POST["BRANCH"]))){
        $BRANCH_err = "Please enter a BRANCH.";
    } else{
        // Prepare a select statement
        $sql = "SELECT ISBN FROM book WHERE BRANCH = ?";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":BRANCH", $param_BRANCH,PDO::PARAM_STR);
            
            // Set parameters
            $param_BRANCH = trim($_POST["BRANCH"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $BRANCH = trim($_POST["BRANCH"]);
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    //SEMESTER INPUT
    if(empty(trim($_POST["SEMESTER"]))){
        $SEMESTER_err = "Please enter a year.";
    } else{
        // Prepare a select statement
        $sql = "SELECT ISBN FROM book WHERE SEMESTER = ?";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":SEMESTERR", $param_SEMESTER,PDO::PARAM_INT);
            
            // Set parameters
            $param_SEMESTER= trim($_POST["SEMESTER"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $SEMESTER = trim($_POST["SEMESTER"]);
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    
    //TITLE INPUT
    if (empty($_POST["TITLE"])) {
    $TITLE_err = "TITLE is required";
    } else {
       $sql = "SELECT ISBN FROM book WHERE TITLE = ?";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":TITLE", $param_TITLE,PDO::PARAM_STR);
            
            // Set parameters
            $param_TITLE = trim($_POST["TITLE"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                
                $TITLE = trim($_POST["TITLE"]);
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            // Close statement
            $stmt->close();
        }
    }

    // AUTHOR INPUT
    if(empty(trim($_POST["AUTHOR"]))){
        $AUTHOR_err = "Please enter author name.";
    } else{
        // Prepare a select statement
        $sql = "SELECT ISBN FROM book WHERE AUTHOR_NAME = ?";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":AUTHOR", $param_AUTHOR,PDO::PARAM_STR);
            
            // Set parameters
            $param_AUTHOR = trim($_POST["AUTHOR"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $AUTHOR= trim($_POST["AUTHOR"]);
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    // EMAIL_ID INPUT
    if (empty($_POST["EMAIL_ID"])) {
      $EMAIL_ID_err = "Email is required";
    } else {
      $sql = "SELECT ISBN FROM book WHERE EMAIL_ID = ?";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":EMAIL_ID", $param_EMAIL_ID,PDO::PARAM_STR);
            
            // Set parameters
            $param_EMAIL_ID = trim($_POST["EMAIL_ID"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $EMAIL_ID = trim($_POST["EMAIL_ID"]);
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
      }
    
    //PUBLISHER INPUT
    if(empty(trim($_POST["PUBLISHER"]))){
        $PUBLISHER_err = "Please enter a PUBLISHER.";
    } else{
        // Prepare a select statement
        $sql = "SELECT ISBN FROM book WHERE PUBLISHER_NAME = ?";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":PUBLISHER", $param_PUBLISHER,PDO::PARAM_STR);
            
            // Set parameters
            $param_PUBLISHER = trim($_POST["PUBLISHER"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $PUBLISHER=trim($_POST["PUBLISHER"]);
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    //PRICE INPUT
    if(empty(trim($_POST["PRICE"]))){
        $PRICE_err = "Please enter a PRICE.";
    } else{
        // Prepare a select statement
        $sql = "SELECT ISBN FROM book WHERE PRICE = ?";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":PRICE", $param_PRICE,PDO::PARAM_INT);
            
            // Set parameters
            $param_PRICE = trim($_POST["PRICE"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $PRICE=trim($_POST["PRICE"]);
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
}
   if(isset($_POST["submit"])) {
        $target= "image/".basename($_FILES['IMAGE']['NAME']);
        $image= $_FILES['IMAGE']['NAME'];

        $sql_1="INSERT INTO book(IMAGE) VALUES('$IMAGE')";
        pdo_query($mysqli,$sql_1);
        if(move_uploaded_file($_FILES['IMAGE']['tmp_name'], $target)){
            $msg="Image uploaded successfully";
        }
        else{
            $msg="please try again";
        }
  }

    // Check input errors before inserting in database
    if(empty($YEAR_err) && empty($BRANCH_err) && empty($TITLE_err) && empty($EMAIL_ID_err) && empty($SEMESTER_err) && empty($AUTHOR_err) && empty($PRICE_err) && empty($PUBLISHER_err)){
        
        // Prepare an insert statement
        // $sql2= "INSERT INTO author (AUTHOR_NAME) VALUES (:AUTHOR)";

        // if($stmt= $pdo->prepare($sql2)){
        //     $stmt->bindParam(":AUTHOR",$param_AUTHOR,PDO::PARAM_STR);
        //     $param_AUTHOR=$AUTHOR;
        //     $stmt->execute();
        //     unset($stmt);
        // }
        // $sql3= "INSERT INTO publisher(PUBLISHER_NAME) VALUES (:PUBLISHER)";

        // if($stmt= $pdo->prepare($sql2)){
        //     $stmt->bindParam(":PUBLISHER",$param_PUBLISHER,PDO::PARAM_STR);
        //     $param_PUBLISHER=$PUBLISHER;
        //     $stmt->execute();
        //     unset($stmt);
        // }
        $sql = "INSERT INTO book (TITLE, YEAR, BRANCH ,SEMESTER,PRICE, EMAIL_ID, AUTHOR_NAME, PUBLISHER_NAME) VALUES (:TITLE,:YEAR,:BRANCH,:SEMESTER,:PRICE,:EMAIL_ID,:AUTHOR,:PUBLISHER)";
         
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":TITLE", $param_TITLE,PDO::PARAM_STR);
            $stmt->bindParam(":YEAR",$param_YEAR,PDO::PARAM_STR);
            $stmt->bindParam(":BRANCH",$param_BRANCH,PDO::PARAM_STR);
            $stmt->bindParam(":SEMESTER",$param_SEMESTER,PDO::PARAM_INT);
            $stmt->bindParam(":PRICE",$param_PRICE,PDO::PARAM_INT);
            $stmt->bindParam(":EMAIL_ID",$param_EMAIL_ID,PDO::PARAM_STR);
            $stmt->bindParam(":AUTHOR",$param_AUTHOR,PDO::PARAM_STR);
            $stmt->bindParam(":PUBLISHER",$param_PUBLISHER,PDO::PARAM_STR);
            
            // Set parameters
            $param_TITLE= $TITLE;
            $param_YEAR = $YEAR;
            $param_BRANCH= $BRANCH;
            $param_SEMESTER = $SEMESTER;
            $param_PRICE = $PRICE;
            $param_EMAIL_ID = $EMAIL_ID;
            $param_AUTHOR= $AUTHOR;
            $param_PUBLISHER=$PUBLISHER;
            
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }
    
    // Close connection
    uinset($pdo);
?>
?>
<!DOCTYPE html>
<html>
<head>
    <title>Select Branch</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
    <script type="text/javascript" src="jquery-3.5.1.min.js"></script>
</head>

<style>
    html {
    scroll-behavior: smooth;
}
body{
    margin: 0;
    padding: 0;
    font-family:'Nunito', sans-serif;
    
}
h1{
    font-size: 50px;
    font-family: 'Nunito', sans-serif;
}
p{
    font-size: 24px;
    line-height: 50px;
}
.navbar{
    top: 0;
    position: fixed;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: row;
    flex-wrap: wrap;
    background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url(image/bookstore1.jpg);
    width: 100%;
    height: 70px;
    z-index: 1;
}
.nav{
    display: flex;
    justify-content: right;
    list-style: none;
    margin-right: 15%;
    margin-bottom: 40px;
}
.logo {
    flex: 1 1 auto;
    margin-left: 10%;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: bold;
    font-size: 35px;
    color: (left, #8b4513, #a67b5b);
}

a{
    margin: 15px;
    color: #fff;
    text-decoration: none;
    text-transform: uppercase;
    font-size: 15px;
}
a:hover{
    color: #fff;
    padding: 10px;
    border-radius: 40px;
    background: -webkit-linear-gradient(left, #8b4513, #a67b5b);
}

.choices h1 {
    text-align: left;
    margin-left: 100px;
    margin-top: 100px;  
}

hr {
    margin-left: 100px;
    top:0;
    margin-right: 200px;
}

.form {
    margin: 35px;
}

.input-field {
    width: 400px;
    height: 40px;
    margin-left: 10%;
    margin-top: 20px;
    padding-left: 10px;
    padding-right: 10px;
    border: 1px solid #777;
    border-radius: 14px;
    outline: none;
    font-family: 'Nunito', sans-serif;
}

button {
    width: 200px;
    margin: 20px;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 40px;
    background: -webkit-linear-gradient(left, #8b4513, #a67b5b);
    margin-left: 20%;
    font-family: 'Nunito', sans-serif;
    font-size: 20px;
}

label {
    font-size: 24px;
    font-weight: bold;
}


</style>

<body>
    <div class="navbar">
        <p class="logo" style="margin-left:30px;margin-top:10px; color: #DAA520;"> Paper Towns</p>
        <ul class="nav">
            <li><a href="buy&sell.html">Home</a></li>
            <li><a href="profile.html">My Profile</a></li>
            <li><a href="sellcart.html">Order Summary</a></li>
            <li><a href="frontpage.html">Log Out</a></li>
        </ul>
    </div>


    <section class="choices">
        <h1 style="margin-bottom: 10px; ">Choose your branch, year and book:</h1><hr>
    </section><br>

    <div style="position: center; margin-left: 25%;" >
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"> 
            <p style="margin-bottom: 0px; font-weight: bold; margin-top:5px; margin-left: 90px;">Enter Year:</p>
            <input id="year" name="YEAR" class="input-field" type="text" placeholder="published year Eg: 2019,2018" required><br>
            <p style="margin-bottom: 0px; font-weight: bold; margin-top:5px; margin-left: 90px;">Enter Branch:</p>
            <p style="margin-bottom: 0px; font-size: 15px; font-weight: bold; margin-top:5px; margin-left: 90px;">NOTE: FOR FE BOOKS, BRANCH NAME IS "COMMON"</p>
            <input id="branch" name="BRANCH"class="input-field" type="text" placeholder="Eg: COMMON,CMPN,EXTC,ETRX,IT,INSTRU" required><br>
            <p style="margin-bottom: 0px; font-weight: bold; margin-top:5px; margin-left: 90px;">Enter Semester:</p>
            <input id="sem" name="SEMESTER" class="input-field" type="text" placeholder="Eg: 1, 3 etc." required><br>
            <p style="margin-bottom: 0px; font-weight: bold; margin-top:5px; margin-left: 90px;">Book Title:</p>
            <input id="title" name="TITLE" class="input-field" type="text" placeholder="Enter book name" required><br>
            <p style="margin-bottom: 0px; font-weight: bold; margin-top:5px; margin-left: 90px;">Author:</p>
            <input id="author" name="AUTHOR"class="input-field" type="text" placeholder="Enter Author's name" required><br>
            <p style="margin-bottom: 0px; font-weight: bold; margin-top:5px; margin-left: 90px;">Publisher:</p>
            <input id="author" name="PUBLISHER"class="input-field" type="text" placeholder="Enter Publisher's name" ><br>
            <p style="margin-bottom: 0px; font-weight: bold; margin-top:5px; margin-left: 90px;">Price (max: ₹500):</p>
            <input id="title" name="PRICE" class="input-field" type="text" placeholder="Enter price" required><br>
            <p style="margin-bottom: 0px; font-weight: bold; margin-top:5px; margin-left: 90px;">Email ID:</p>
            <input id="title" name="EMAIL_ID" class="input-field" type="text" placeholder="Enter ves Email ID" required><br>
            <p style="margin-bottom: 0px; font-weight: bold; margin-top: 5px; margin-left: 90px;">Upload Book Image:</p>
            <form method="post" enctype="multipart/form-data">
            <input style="align-content: center;" class="input-field" type="file" name= "IMAGE" id="IMAGE"><br><br>
            </form>
            <form method="post">
            <button type="submit" name="submit"><a href="response.php">Upload Data</a></button>
            </form>
            <br><br><br><br><br>
        </form>
        </div>
    </body>
</html>