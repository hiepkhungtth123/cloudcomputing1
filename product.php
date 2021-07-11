<?php
/* Attempt Heroku Postgres connection 
	Assuming you are running Heroku Postgres add-on
	with default setting*/
	$link = pg_connect("host=ec2-34-234-228-127.compute-1.amazonaws.com 
	dbname=d36sv7mjck4h8 port=5432 
	user=gvdmloycusjmer
	password=faeadc6d10feb6b3776f74273cc91eed25ad5e23c47779956ae28e8018837a05
	sslmode=require");
	 
	// Check connection
	if($link === false){
		die("ERROR: Could not connect.");
	} else {
		echo "Connection to Heroku Postgres has been established";
	}
	
	$productname = $_REQUEST['productname'];
	$productcat = $_REQUEST['productcat'];
	$price = $_REQUEST['price'];

	// Attempt insert query execution
	$sql = "INSERT INTO product(product_name, price, category) VALUES ('$productname','$price', '$productcat')";
	
	//$sql = "INSERT INTO public.Product (id, product_name, category, date, price, descriptions) VALUES			('001','My Product','Default','04/24/2020','100','Default')";
	
	if(pg_query($link, $sql)){
		echo "Records added successfully.";
	} else{
		echo "ERROR: Could not able to execute $sql" . pg_error($link);
	}
	
	// Close connection
	pg_close($link);
?>