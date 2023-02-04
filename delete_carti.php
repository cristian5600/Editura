<!DOCTYPE html>
<html>

<head>
	<title>Insert Page page</title>
</head>

<body>
	<center>
		<?php

		// servername => localhost
		// username => root
		// password => empty
		// database name => staff
		$serverName = "DESKTOP-R85N9OG\SQLEXPRESS";
	//	$servername = "localhost";
$database = "Editura";
$uid = "Cristi";
$username = "Cristi";
$pass = "shadow200";
$password = "";
$connection =[
    "Database" => $database,
    "Uid" => $uid,
    "PWD" => $pass
];
$connectioninfo = array("Database"=>"Editura");
sqlsrv_configure('WarningsReturnAsErrors', 0);
$conn = sqlsrv_connect($serverName,$connectioninfo);
//$conn=mysqli_connect("localhost", "", "",$database );		
	
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

// Taking all 5 values from the form data(input)

$titlu = $_REQUEST['titlu'];
	
		
		// Performing insert query execution
		// here our table name is college
		$sql = $sql = "DELETE FROM Carti WHERE titlu='$titlu'";
		if(sqlsrv_query($conn, $sql)){
			echo "<h3>data updated in a database successfully."
				. " Please browse your localhost php my admin"
				. " to view the updated data</h3>";

			echo nl2br("\n$titlu");
		} else{
			echo "ERROR: Hush! Sorry $sql. ";
		}
		
		// Close connection
		sqlsrv_close($conn);
		?>
	</center>
</body>

</html>
