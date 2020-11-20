<?php
// Initialize the session
session_start();
require_once"connect.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Buy or Sell</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
</head>

<style>
	html {
    scroll-behavior: smooth;
}
body{
    margin: 0;
    padding: 0;
    font-family:'Nunito', sans-serif;
    background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url(image/bookstore1.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    height:100vh;
    
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
	top:0;
    position: fixed;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: row;
    flex-wrap: wrap;
    background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6));
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

button{
    margin: 15px;
    color: #fff;
    text-decoration: none;
    text-transform: uppercase;
    font-size: 15px;
}
button:hover{
    color: #fff;
    padding: 10px;
    border-radius: 40px;
    background: -webkit-linear-gradient(left, #8b4513, #a67b5b);
}


.home-area {
    position: relative;
    display: flex;
    justify-content: space-around;
    align-items: center;
    flex-wrap: wrap;
    flex-direction: row;
    width: 100%;
    height: 100vh;
    background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url(image/bookstore1.jpg);
    background-size: cover;
}
.text-part{
    width: 65%;
    height: 80%;
}        



</style>

<body>
	<div class="navbar">
    	<p class="logo" style="margin-left:30px;margin-top:10px; color: #DAA520;"> Paper Towns</p>
    	<ul class="nav">
			<li><a href="buy&sell.php">Home</a></li>
			<li><a href="profile.php">My Profile</a></li>
			<li><a href="index.php">Log Out</a></li>
		</ul>
	</div>


	<section class="home-area" id="home">
    <div class="text-part">
        <h1 style="text-align: center; margin-top: 200px; color:white;">Welcome <?=$_SESSION['user'];?></h1>
        <p style="text-align: center; color: #fff;">What would you like to do today?</p>
        	<ul class="nav" style="margin-left: 32%; margin-top: 20px;">
				<li><a href="shopping_window.php" style="font-size: 20px;">Buy Books</a></li>
				<li><a href="sell.php" style="font-size: 20px;">Sell Books</a></li>
			</ul>
    </div>
 </section>

<script>
    

</script>
</body>
</html>