<?php
include 'db.php';
$name="";
if(isset($_POST['submit']))
{
$username=$_POST['username'];
$result1=mysqli_query($con,"select Email from profile where Email='$username'");
if(!mysqli_num_rows($result1))
{
  echo "Enter a valid username";
}
else {
  $result1=mysqli_query($con,"select ResetCode from form where Email='$username'");
  foreach($result1 as $row)
  {
    $resetcode=$row['ResetCode'];
  }
  $link="localhost/Project-Login/reset_password.php?resetkey=".$resetcode;
$result2=mysqli_query($con,"insert into reset values('$link','$username')");
//mail($to,$subject,$message,$header);
die("Mail sent");
}
}
 ?>

<html>
<head>
  <title>Reset Password</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>

  <div class="header">
      <div class="logo">
        <img src="index.jpg" border="3"/>
        <font size="6.7px"><b>National Institute Of Technology, JALANDHAR</b></font>
  </div>
  </div>
  <div class="main">
    <div class="main2">
      <table>
        <form action="forget_password.php" method="post">
          <tr><td><label class="form-labels">Login ID:</label></td>
          <td><input type="text" name="username" value="<?php echo $name; ?>"></td></tr>
          <tr><td colspan="2" align="center"><input type="submit" name="submit"></td></tr>
        </form>
      </table>
    </div>
  </div>
</body>
</html>
<?php
$name=$_GET['username'];
?>
