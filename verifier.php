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
    $id=$_POST['id'];
    $lng=$_POST['lng'];
    $lat=$_POST['lat'];
    $type=$_POST['type'];
    $etat = 'true' ;
    if(isset($_POST['approuver']))
    {
      $sql = "UPDATE endroit SET etat='$etat' WHERE id='$id' ";
    }
  else if (isset($_POST['modifier']))
   {
    $sql = "UPDATE endroit SET lng ='$lng',lat='$lat',type='$type',etat='$etat'  WHERE id='$id' ";
  }
  else if (isset($_POST['supprimer'])) 
  {
    $sql = "DELETE  FROM endroit where id = '$id' ";
  }

  $current_id = mysql_query($sql) or die("<b>Error:</b> il y a un probleme <br/>" . mysql_error());
  if(isset($current_id)) 
  {
    {
      header("Location: admin.php");
    }
  }
   
?>
