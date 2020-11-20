<?php
session_start();
//fetch_data.php
include('config.php');
?>
<style>
	.btn-style{
	margin-left:5%;
    width: 200px;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 30px;
    background: -webkit-linear-gradient(left, #8b4513, #a67b5b);
    font-family: 'Nunito', sans-serif;
    font-size: 15px;
    font-weight: bold;
    position: absolute;
    align-content: center;
	}
</style>
<script>
$(document).ready(function(){
    // add to cart button listener
    $('.add-to-cart-form').on('submit', function(){
 
        // info is in the table / single product layout
        var ISBN = $(this).find('.ISBN').text();
        var quantity = $(this).find('.cart-quantity').val();
 
        // redirect to add_to_cart.php, with parameter values to process the request
        window.location.href = "add_to_cart.php?id=" + ISBN + "&quantity=" + quantity;
        return false;
    });
});
</script>
<?php

if(isset($_POST["action"]))
{
	$query = "
		SELECT * FROM book WHERE product_status='1'	";
	if(isset($_POST["SEM"]))
	{
		$SEM_filter = implode("','", $_POST["SEM"]);
		$query .= "
		 AND SEMESTER IN ('".$SEM_filter."')
		";
	}
	if(isset($_POST["BRANCH"]))
	{
		$BRANCH_filter = implode("','", $_POST["BRANCH"]);
		$query .= "
		 AND BRANCH IN ('".$BRANCH_filter."')
		";
	}
	if(isset($_POST["AUTHOR"]))
	{
		$AUTHOR_filter = implode("','", $_POST["AUTHOR"]);
		$query .= "
		 AND AUTHOR_NAME IN ('".$AUTHOR_filter."')
		";
	}
	$statement = $mysqli->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '';
	if($total_row > 0)
	{
		foreach($result as $row)
		{
			$output .= '
			<div class="col-sm-3 col-lg-4 col-md-9">
				<div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:550px;">
					<img src="image/'. $row['IMAGE'] .'" alt="" class="img-responsive" style="height:300px; width:250px;" >
					<p align="center" style="margin-top: 10px; font-weight: bolder; font-size:21px"><strong>'. $row['TITLE'] .'</strong></p>
					<h4 style="text-align:center;" class="text-danger" > ₹ '. $row['PRICE'] .'</h4>
					<p align="center"> Semester: '. $row['SEMESTER'] .'</p> <br />
					<button class="btn-style" align="center"><a href="#">Add to Cart</a></button>
				</div>

			</div>
			';
		}
	}
	else
	{
		$output = '<h3>No Data Found</h3>';
	}
	echo $output;
}
?>
