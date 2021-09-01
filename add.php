<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php

include_once("fun.php");

$crud = new crud();

if(isset($_POST['Submit'])) {	
	$name = $_POST['pname'];
	$price = $_POST['pprice'];
		
	
	
	
	if($name ==""&&$price=="") {
		echo $msg;		
		echo "<br/><a href='result.php'>Go Back</a>";
	} 	
	else { 
			
		$result = $crud->execute("INSERT INTO products(product_name,pprice) VALUES('$name','$price')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='result.php'>View Products</a>";
	}
}
?>
</body>
</html>