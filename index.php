<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css">
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
    margin-right: 50px;
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

.home-area, .about-area, .contact-area{
    position: relative;
    display: flex;
    justify-content: space-around;
    align-items: center;
    flex-wrap: wrap;
    flex-direction: row;
    width: 100%;
    height: 800px;
    background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url(image/bookstore.jpg);
    background-size: cover;
}
.text-part{
    width: 65%;
    height: 80%;
}        
.about-area{
    background-color: #fefefe;
}

.contact-area{
    background-color: #262626;
    color: #fff;
}

.start a{
    padding: 20px;
    font-size: 20px;
    text-align: center;
}

.start a:hover {
    border: none;
    padding: 20px;
    background: linear-gradient(left, #8b4513, #a67b5b);;
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
    <p class="logo" style="margin-left:30px;margin-top:10px; color: #DAA520;"> Paper Towns</p>
    <ul class="nav">
<li><a href="#home">Home</a></li>
<li><a href="#about">About</a></li>
<li><a href="#contact">Contact</a></li>
<li><a href="adminlogin.html">Admin Login</a></li>
</ul>
</div>

<section class="home-area" id="home">
    <div class="text-part">
        <h1 style="text-align: center; margin-top: 200px; color:white;">Welcome to Paper Towns!</h1>
        <p class="start" style="text-align: center;"><a href="login.php">Let's get started</a></p>
    </div>
 </section>

<section class="about-area" id="about">
    <div class="text-part">
        <h1 style="color:white; text-decoration:underline; margin-left: 33%;">
About Us</h1>
<p style="color:white;">Paper Towns is an online bookstore for students that guarantees you great quality books at affordable prices. Students can buy and sell their books easily through this website. This initiative is brought to you by a group of engineering students, who have more or less, borne the brunt of buying expensive engineering books. We assure you that our books are checked for their quality before being sold. That being said, <b style="font-style: italic; color:white;">Make yourself at home in these Paper Towns.</b>
</p>
</div>
</section>


<section class="contact-area" id="contact">
    <div class="text-part">
        <h1 style="color:white; text-decoration:underline; margin-left: 32%;">
Contact Us</h1>
<div style="position: center; margin-left: 22%;">
    <form action="contact-form.php" method="post">
        <input class="input-field" type="text" name="name" placeholder="Full Name" required><br>
        <input class="input-field" type="e-mail" name="mail" placeholder="Your e-mail ID" required><br>
        <input class="input-field" type="text" name="subject" placeholder="Subject" required><br>
        <textarea class="input-field" name="message" placeholder="Message" required></textarea><br><br>
        <button onclick="showAlert()" type="submit" name="submit" style="margin-left: 20%;">Submit</button>
    </form>
    </div>
</div>
</section>
</body>
<script>
    function showAlert(){
        alert("Your query has been submitted!")
    }
</script>
</html>