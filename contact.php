<?php
// Start the session
session_start();
?>
<?php
require_once "config1.php";
$name = $email = $subject = $comment  = "";
$nameErr = $emailErr = $subjectErr = $commentErr = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    } else {
       $sql = "SELECT id FROM comment WHERE Name = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_name);
            
            // Set parameters
            $param_name = trim($_POST["name"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                $name = trim($_POST["name"]);
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            // Close statement
            $stmt->close();
        }
    }

    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $sql = "SELECT id FROM comment WHERE Email = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                $email = trim($_POST["email"]);
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
      }
    if(empty(trim($_POST["subject"]))){
        $subjectErr = "Please enter the subject.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM comment WHERE Subject = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_subject);
            
            // Set parameters
            $param_subject = trim($_POST["subject"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                $subject = trim($_POST["subject"]);
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    if(empty(trim($_POST["comment"]))){
        $commentErr = "Comment cannot be Blank";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM comment WHERE Comment = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_comment);
            
            // Set parameters
            $param_comment = trim($_POST["comment"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                $comment = trim($_POST["comment"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    // Check input errors before inserting in database
    if(empty($nameErr) && empty($emailErr) && empty($subjectErr) && empty($commentErr)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO comment (Name, Email, Subject, Comment) VALUES (?, ?, ? ,?)";
         
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssss", $param_name ,$param_email, $param_subject, $param_comment);
            
            // Set parameters
            $param_name= $name;
            $param_email= $email;
            $param_subject = $subject;
            $param_comment = $comment;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: response.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    // Close connection
    $mysqli->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Shopping Window</title>
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
    background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url(bookstore2.jpg);
    width: 100%;
    height: 70px;
    z-index: 1;
}
.nav{
    display: flex;
    justify-content: right;
    list-style: none;
    margin-right: 15%;
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

hr {
    margin-left: 100px;
    margin-top:0;
    margin-right: 200px;
    margin-bottom: 20px;
}

.filter {
    text-align: left;
    margin-top: -10px;
    margin-left: 100px;
}

.display h1{
    text-align: left;
    margin-top: 100px;
    margin-left: 100px;
}

.contact-box {
    background-color: #fff;
    top: 55%;
    left: 50%;
    transform: translate(-50%,-50%);
    position: absolute;
}

.form {
    margin: 35px;
}

.input-field {
    width: 400px;
    height: 40px;
    margin-top: 20px;
    padding-left: 10px;
    padding-right: 10px;
    border: 1px solid #777;
    border-radius: 14px;
    outline: none;
    font-family: 'Nunito', sans-serif;
}

button {
    width: 150px;
    margin: 20px;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 40px;
    background: -webkit-linear-gradient(left, #8b4513, #a67b5b);
    margin-left: 30%;
    font-family: 'Nunito', sans-serif;
    font-size: 20px;
}

</style>
<body>
    <div class="navbar">
        <p class="logo" style="margin-left:30px; margin-top:10px; color: #DAA520;">Paper Towns</p>
        <ul class="nav">
            <li><a href="buy&sell.html">Home</a></li>
            <li><a href="profile.html">My Profile</a></li>
            <li><a href="buycart.html">My Cart</a></li>
            <li><a href="index.html">Log Out</a></li>
        </ul>
    </div>

    <section class="display">
        <h1 style="margin-bottom: 10px;">Contact Form:</h1>
        <hr>
    </section>

    <div style="position: absolute; margin-left: 30%;">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <input class="input-field" type="text" name="name" placeholder="Full Name"><span class="error">* <?php echo $nameErr;?></span><br><br>
        <input class="input-field" type="e-mail" name="email" placeholder="Your e-mail ID"><span class="error">* <?php echo $emailErr;?></span><br><br>
        <input class="input-field" type="text" name="subject" placeholder="Subject"><span class="error">* <?php echo $subjectErr;?></span><br><br>
        <textarea class="input-field" name="comment" placeholder="Enter your query"></textarea><span class="error">* <?php echo $commentErr;?></span><br><br>
        <form method="post">
        <button type="submit" action="response.php" name="submit">Submit</button>
    </form>
    </form>
    </div>
