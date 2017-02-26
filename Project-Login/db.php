
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="Login";

$con=mysqli_connect($servername,$username,$password,$dbname);
if(!$con)
{
  echo "Error in Connection";
}
?>
