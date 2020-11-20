<?php
// Include config file
require_once "connect.php";
 
// Define variables and initialize with empty values
$name = $email = $branch= $year= $address= $mobile= $password = $confirm = "";
$name_err = $email_err = $branch_err = $year_err = $address_err = $mobile_err = $password_err = $confirm_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter a name.";
    } else{
        // Prepare a select statement
        $sql = "SELECT ID FROM student WHERE NAME = :name";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":name", $param_name, PDO::PARAM_STR);
            
            // Set parameters
            $param_name = trim($_POST["name"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                $name = trim($_POST["name"]);
                }
            else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }
    
        if(empty(trim($_POST["email"]))){
        $email_err = "Please enter valid email id.";
    } else{
        // Prepare a select statement
        $sql = "SELECT ID FROM student WHERE EMAIL_ID = :email";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                $email = trim($_POST["email"]);
                }
            else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }

    if(empty(trim($_POST["branch"]))){
        $branch_err = "Please enter a branch.";
    } else{
        // Prepare a select statement
        $sql = "SELECT ID FROM student WHERE BRANCH = :branch";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":branch", $param_branch, PDO::PARAM_STR);
            
            // Set parameters
            $param_branch = trim($_POST["branch"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                $branch = trim($_POST["branch"]);
                }
            else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }

    if(empty(trim($_POST["year"]))){
        $year_err = "Please enter a year.";
    } else{
        // Prepare a select statement
        $sql = "SELECT ID FROM student WHERE YEAR = :year";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":year", $param_year, PDO::PARAM_STR);
            
            // Set parameters
            $param_year = trim($_POST["year"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                $year = trim($_POST["year"]);
                }
            else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }

    if(empty(trim($_POST["address"]))){
        $address_err = "Please enter address.";
    } else{
        // Prepare a select statement
        $sql = "SELECT ID FROM student WHERE ADDRESS = :address";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":address", $param_address, PDO::PARAM_STR);
            
            // Set parameters
            $param_address = trim($_POST["address"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                $address = trim($_POST["address"]);
                }
            else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }

        if(empty(trim($_POST["mobile"]))){
        $mobile_err = "Please enter mobile no.";
    } else{
        // Prepare a select statement
        $sql = "SELECT ID FROM student WHERE MOBILE_NO = :mobile";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":mobile", $param_mobile, PDO::PARAM_STR);
            
            // Set parameters
            $param_mobile = trim($_POST["mobile"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                $mobile = trim($_POST["mobile"]);
                }
            else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm"]))){
        $confirm_err = "Please confirm password.";     
    } else{
        $confirm = trim($_POST["confirm"]);
        if(empty($password_err) && ($password != $confirm)){
            $confirm_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($password_err) && empty($confirm_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO student (EMAIL_ID,NAME,BRANCH,YEAR,ADDRESS,MOBILE_NO,PASSWORD) VALUES (:email,:name,:branch,:year,:address,:mobile,:password)";
         
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            $stmt->bindParam(":name", $param_name, PDO::PARAM_STR);
            $stmt->bindParam(":branch", $param_branch, PDO::PARAM_STR);
            $stmt->bindParam(":year", $param_year, PDO::PARAM_STR);
            $stmt->bindParam(":address", $param_address, PDO::PARAM_STR);
            $stmt->bindParam(":mobile", $param_mobile, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
            
            // Set parameters
            $param_email = $email;
            $param_name = $name;
            $param_branch=$branch;
            $param_year=$year;
            $param_address=$address;
            $param_mobile=$mobile;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
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
    unset($pdo);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
</head>
<style>
    ::placeholder {
        color:white;
        font-size: 20px;
       }

    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    text-decoration: none;
}

body{
    font-family: 'Nunito', sans-serif;
    background: #000;
}

.background{
    background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)), url(image/bookstore1.jpg) no-repeat;
    background-size: 100% 100%;
    height: 100vh;
    display: flex;
}

.text, .box{
    margin-top: 25vh;
    flex: 1;
}

.text{
    margin-left: 10%;
    font-weight: 300px;
}


.text h1{
    font-size: 70px;
    color: #fff;
    font-weight: 500 bolder;
}

.text p{
    font-size: 20px;
    color: white;
    font-weight: 300;
}

.text p a{
    color: #fff;
    font-weight: 700;
}

.form{
    background: transparent;
    color: white;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    width: 250px;

}

input{
    margin: 20px 0;
    padding: 10px;
    background: transparent;
    border: none;
    outline: none;
    color: white;
    font-size: 20px;
    font-family: 'Nunito', sans-serif;
}

.input-field{
    border-bottom: 1px solid #fff;
    font-weight: bolder;
}

.a {
    margin-left: 20%;
    margin-right: 0;
    width: 150px;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 30px;
    background: -webkit-linear-gradient(left, #8b4513, #a67b5b);
    font-family: 'Nunito', sans-serif;
    font-size: 15px;
    font-weight: bold;
    position: relative;
    text-align: center;
}


</style>
<body>
        <div class="background">
            <div class="text">
                <h1>Sign Up</h1>
                <p>Already an existing user? <a href="login.php">Login</a></p>
            </div>
            <div class="box">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input type="text" name="name"class="input-field" placeholder="Name" required>
                    <input type="e-mail" name="email"class="input-field" placeholder="E-mail ID" required>
                    <input type="text" name="branch"class="input-field" placeholder="Branch eg. CMPN, ETRX" required>
                    <input type="text" name="year"class="input-field" placeholder="Year eg. FE,SE" required>
                    <input type="text" name="address"class="input-field" placeholder="Address" required>
                    <input type="number" name="mobile"class="input-field" placeholder="Phone no." required>
                    <input type="password" name="password"class="input-field" placeholder="Password" required>
                    <input type="password" name="confirm"class="input-field" placeholder="  confirm Password" required><br>
                    <button class="a" onclick="showAlert()">Sign Up</button>
                </form>
            </div>
        </div>
</body>

<script>
    function showAlert(){
        alert("Your details have been registered! Move to Login page.");
    }
</script>
</html>