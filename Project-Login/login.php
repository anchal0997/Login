<?php

include "db.php";
include "Functions.php";

if(isset($_SESSION['loginid']) || isset($_COOKIE['loginid']))
{
  header("Location:succesfullogin.php");
  exit();
}
$name="";
$pass1="";
$uname="";
$notpass="";
$notuser="";
$nopass="";
$nouser="";
if(isset($_POST['yes']))
{
  $notpass="";
  $notuser="";
  $nopass="";
  $nouser="";
  $name=$_POST['username'];
  $pass=$_POST['pass'];
  if($name)
  {
    if($pass)
    {
      $result1=mysqli_query($con,"select * from form where Email='$name'");
      if(mysqli_num_rows($result1)!=0)
      {
        $pass1=($result1->fetch_assoc());
        if($pass1["Password"]==$pass)
        {

          $loginid=$pass1['Email'];
          $_SESSION['loginid']=$loginid;
          setcookie('loginid',$name,time()+120);
          header("Location:succesfullogin.php");
          exit();
        }
        else {
          $notpass="Password is not correct";
        }
      }
      else {
        $notuser="Enter a valid username";
      }
    }
    else {
      $nopass="ENter password";
    }
  }
  else {
    $nouser= "Enter Username";
  }
}
?>


<html>
<head>
  <title>Login</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <div class="header">
      <div class="logo">
        <img src="index.jpg" border="3">
        <font size="6.7px"><b>National Institute Of Technology, JALANDHAR</b></font>
  </div>
  </div>
  <div class="main">
    <div class="main2">
      <br/>

    <table align='center'><br/>
    <tr><td colspan="2"><h1><center>LOGIN</center></h1></td></tr>

<form action="login.php" method="post">
<tr><td><label class="form-labels">Login ID:</label></td>
<td><input type="text" name="username" value="<?php echo $name; ?>"></td></tr>
<tr><td>  <label class="form-labels">Password</label></td>
<td><input type="password" name="pass"></td></tr><tr><td colspan="2"><font color="red"><?php echo $notpass.$notuser.$nopass.$nouser ?></font></td></tr>
<tr><td colspan="2"><a href="forget_password.php">forgot password ?</a></td></tr>
<tr><td colspan="2" align='center'><input type="submit" value="Sign Up" name="yes"></td></td>
</center>
</form>
</table>
</div>
<div class="main3">
  <h2>  Quality Policy:</h2>
  <ul align="justify">
    <li>To develop technical human  resource of excellence suitable for global requirements.</li>
    <li>To ensure good quality academic  and industrial research programmes in different areas of engineering and technology.</li>
    <li>To generate industry-institute  synergy for shaping technical education to meet the requirement of industry. </li>
  </ul>
</div>
</div>
</body>
</html>
