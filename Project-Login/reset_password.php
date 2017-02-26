<?php
include 'db.php';
$success="";
$resetkey=$_GET['resetkey'];

echo $resetkey;
$result=mysqli_query($con,"select ResetCode from form where ResetCode='$resetkey'");

$count=mysqli_num_rows($result);
echo $count;
if($count==0)
{
  die('Invalid link');
}

if(isset($_POST['submit']))
{
$pass=$_POST['pass'];
$repass=$_POST['repass'];
if($repass==$pass)
{
  $resetcode=md5(uniqid(rand()));

  $result3=mysqli_query($con,"update form SET Password='$pass' and ResetCode='$resetcode' where ResetCode='$resetkey'");
  $success="Password Updated Successfully.";
  header("Location:reset_password.php?msg=$success");

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
        <form action="<?php $_PHP_SELF; ?>" method="post" enctype="multipart/form-data">
          <tr><td><label class="form-labels">Enter new Password:</label></td>
          <td><input type="password" name="pass" ></td></tr>
          <tr><td><label class="form-labels">Renter Password:</label></td>
          <td><input type="password" name="repass" ></td></tr>
          <tr><td colspan="2" align="center"><input type="submit" name="submit"></td></tr>

          <tr><td colspan="2">
            <?php
            if($success!="")
            echo "<font color=\"green\">".$_GET['msg']."</font>";
            ?>

          </td></tr>
        </form>
      </table>
    </div>
  </div>
</body>
</html>
