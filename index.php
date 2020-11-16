<?php 

//index.php

include('config.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shopping Window</title>

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href = "css/jquery-ui.css" rel = "stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
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
    font-size: 17px;
    line-height: 20px;
    color: black;
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
    margin-left: 180px;
    margin-top:0;
    margin-right: 200px;
    margin-bottom: 20px;
}

.display h1{
    text-align: left;
    margin-top: 100px;
    margin-left: 180px;
    color: black;
}

h3 {
    font-family: 'Nunito', sans-serif;
    font-size: 24px;
    color: black;
    margin-bottom: 0px;
    font-weight: 700 bold;
}

</style>
 

<body>
    <!-- Page Content -->
    <div class="navbar">
        <p class="logo" style="margin-left:30px; margin-top:10px; color: #DAA520;">Paper Towns</p>
        <ul class="nav">
            <li><a href="buy&sell.html">Home</a></li>
            <li><a href="profile.html">My Profile</a></li>
            <li><a href="buycart.html">My Cart</a></li>
            <li><a href="frontpage.html">Log Out</a></li>
        </ul>
    </div>

    <section class="display">
        <h1 style="margin-bottom: 10px;"><b>Books:</b></h1>
        <hr>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-md-3">                				
				<div class="list-group">
					<h3><strong>Semester:</strong></h3>
                    <div style="height: 200px; overflow-y: auto; overflow-x: hidden;">
					<?php

                    $query = "SELECT DISTINCT(SEMESTER) FROM book WHERE product_status='1' ORDER BY ISBN ASC";
                    $statement = $mysqli->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector SEM" value="<?php echo $row['SEMESTER']; ?>" > SEM <?php echo $row['SEMESTER']; ?></label>
                    </div>
                    <?php
                    }

                    ?>
                    </div>
                </div>

				<div class="list-group">
					<h3><strong>Branch:</strong></h3>
                    <?php

                    $query = "
                    SELECT DISTINCT(BRANCH) FROM book WHERE product_status='1' ORDER BY ISBN ASC
                    ";
                    $statement = $mysqli->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector BRANCH" value="<?php echo $row['BRANCH']; ?>" > <?php echo $row['BRANCH']; ?></label>
                    </div>
                    <?php    
                    }

                    ?>
                </div>
                <div class="list-group">
                    <h3><strong>Authors:</strong></h3>
                    <div style="height: 200px; overflow-y: auto; overflow-x: hidden;">
                    <?php

                    $query = "
                    SELECT DISTINCT AUTHOR_NAME FROM book WHERE product_status='1' ORDER BY ISBN ASC
                    ";
                    $statement = $mysqli->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector AUTHOR" value="<?php echo $row['AUTHOR_NAME']; ?>" > <?php echo $row['AUTHOR_NAME']; ?></label>
                    </div>
                    <?php    
                    }

                    ?>
                </div>
            </div>
        
    </div>
<div class="col-md-9">
            <br />
            <div class="row filter_data">
                
            </div>
        </div>
    </div>

<!-- <style>
#loading
{
	text-align:center; 
	background: url('loader.gif') no-repeat center; 
	height: 150px;
}
</style> -->

<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var SEM = get_filter('SEM');
        var BRANCH = get_filter('BRANCH');
        var AUTHOR= get_filter('AUTHOR');
        $.ajax({
            url:"fetch_data.php",
            method:"POST",
            data:{action:action,SEM:SEM, BRANCH:BRANCH,AUTHOR:AUTHOR},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

});
</script>

</body>

</html>
