<?php

 $host = "localhost";   //Host
$username = "root";    //User
$password = ""; //Passsword
$database = "macarte";     // Database Name
 
//creating a new connection object using mysqli 
$conn = new mysqli($host, $username, $password, $database);
 
//if there is some error connecting to the database
//with die we will stop the further execution by displaying a message causing the error.
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}


$sql="SELECT * FROM endroit where maj='false' and etat='true'";


$result=mysqli_query($con,$sql);
if($result)
{
	while($row=mysqli_fetch_array($result))
	{
		$flag[]=$row;
	}
	
	print(json_encode($flag));
}

$sqll = "UPDATE endroit SET maj='true' WHERE etat='true' ";
$result=mysqli_query($con,$sqll);

mysqli_close($con);

?>