<?php
// Initialize the session
include("procedural.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
        

        if(!empty($_POST['login'])){
            
            $email = mysqli_real_escape_string($db,$_POST['email']);
            $password = mysqli_real_escape_string($db,$_POST['password']);
            
            $sqllogin = "SELECT * from student where EMAIL_ID='$email'";
            $result = mysqli_query($db, $sqllogin);
            
            if (mysqli_num_rows($result) > 0) {
                    $row=mysqli_fetch_assoc($result);
                    $DBpassword=$row['PASSWORD'];
                    if(password_verify($password, $DBpassword)){
                        $_SESSION['user'] = $row['NAME'];
                        $_SESSION['email']= $row['EMAIL_ID'];
                        $_SESSION['branch']=$row['BRANCH'];
                        $_SESSION['year']=$row['YEAR'];
                        $_SESSION['success'] = "You are now logged in";
                        header('location: buy&sell.php');
                    }else{
                        echo '<script type="text/javascript">';
                        echo ' alert("Wrong username/password combination")';
                        header('location:login.php');  //not showing an alert box.
                        echo '</script>';
                    }
            }
            else 
            {
                echo '<script type="text/javascript">';
                echo ' alert("Wrong username/password combination")';  //not showing an alert 
                header('location:login.php');
                echo '</script>';
            }
 
 }
}
 ?>

