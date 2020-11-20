<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
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
    opacity: 1;
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
    margin-left: 13%;
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
                <h1>Login</h1>
                <p>New User? <a href="signup.php">Sign Up</a></p>
            </div>
            <div class="box">
                <form id="login" action="validation.php" method="post">
                    <input type="email" name="email"class="input-field" placeholder="Email ID" required><br>
                    <input type="password" name="password"class="input-field" placeholder="Password" required><br>
                    <input type="submit"class="a"name="login" href="buy&sell.php"value="login"></button><br><!-- <a class="a" name="login"href="buy&sell.php">Login</a> -->
                    <?php
                    session_start();
                    if(isset($_SESSION['errmsg'])){
                        echo $_SESSION['errmsg'];
                        unset($_SESSION['errmsg']);
                    }
                    ?>
                </form>
                    <input type="submit" href="forgot.php" class="a"name="Forgot"value="Forgot Password"></button>
                    <!-- <a class="a" href="forgot.php">Forgot Password?</a><br><br> -->
                
            </div>
        </div>
</body>

</html>