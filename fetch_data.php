<?php

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
<a href="cart.php">
    <?php
    // count products in cart
    $cart_item->ISBN=1; // default to user with ID "1" for now
    $cart_count=$cart_item->count();
    ?>
    Cart <span class="badge" id="comparison-count"><?php echo $cart_count; ?></span>
</a>
<?php
function exists(){
 
    // query to count existing cart item
    $query = "SELECT count(*) FROM " . $this->book . " WHERE ISBN=:ISBN AND EMAIL_ID=:EMAIL_ID";
 
    // prepare query statement
    $stmt = $this->mysqli->prepare( $query );
 
    // sanitize
    $this->ISBN=htmlspecialchars(strip_tags($this->ISBN));
    $this->EMAIL_ID=htmlspecialchars(strip_tags($this->EMAIL_ID));
 
    // bind category id variable
    $stmt->bindParam(":ISBN", $this->ISBN);
    $stmt->bindParam(":EMAIL_ID", $this->EMAIL_ID);
 
    // execute query
    $stmt->execute();
 
    // get row value
    $rows = $stmt->fetch(PDO::FETCH_NUM);
 
    // return
    if($rows[0]>0){
        return true;
    }
 
    return false;
}
//creating cart record
function create(){
 
     // query to insert cart item record
    $query = "INSERT INTO
                " . $this->cart . "
            SET
                ISBN = :ISBN,
                EMAIL_ID= :EMAIL_ID,
                QUANTITY = :QUANTITY,
               	TRANSACTION_ID = :TRANSACTION_ID";
 
    // prepare query statement
    $stmt = $this->mysqli->prepare($query);
 
    // sanitize
    $this->ISBN=htmlspecialchars(strip_tags($this->ISBN));
    $this->QUANTITY=htmlspecialchars(strip_tags($this->QUANTITY));
    $this->EMAIL_ID=htmlspecialchars(strip_tags($this->EMAIL_ID));
 
    // bind values
    $stmt->bindParam(":ISBN", $this->ISBN);
    $stmt->bindParam(":QUANTITY", $this->QUANTITY);
    $stmt->bindParam(":EMAIL_ID", $this->EMAIL_ID);
    $stmt->bindParam(":TRANSACTION_ID", $this->TRANSACTION_ID);
 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
}
// read items in the cart
function read(){
 
    $query="SELECT book.ISBN, book.TITLE, book.PRICE, cart.quantity, cart.QUANTITY * book.PRICE AS subtotal
            FROM " . $this->table_name . " cart
                LEFT JOIN book book
                    ON cart.ISBN = book.ISBN
            WHERE cart.EMAIL_ID=:EMAIL_ID";
 
    // prepare query statement
    $stmt = $this->mysqli->prepare($query);
 
    // sanitize
    $this->EMAIL_ID=htmlspecialchars(strip_tags($this->EMAIL_ID));
 
    // bind value
    $stmt->bindParam(":EMAIL_ID", $this->EMAIL_ID, PDO::PARAM_INT);
 
    // execute query
    $stmt->execute();
 
    // return values
    return $stmt;
}
function readByIds($ISBN){
 
    $ids_arr = str_repeat('?,', count($ISBN) - 1) . '?';
 
    // query to select products
    $query = "SELECT ISBN, TITLE, PRICE FROM " . $this->table_name . " WHERE ISBN IN ({$ids_arr}) ORDER BY TITLE";
 
    // prepare query statement
    $stmt = $this->mysqli->prepare($query);
 
    // execute query
    $stmt->execute($ISBN);
 
    // return values from database
    return $stmt;
}