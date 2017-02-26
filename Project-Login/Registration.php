<?php

include "db.php";

$emailErr="";

if(isset($_POST['yes']))
{

  $name=$_POST['name1'];
  $pass=$_POST['pass'];
  $Email=$_POST['Email'];
  $repass=$_POST['repass'];
  if($name)
  {
    if($pass)
    {
      if($Email)
      {
        if($repass)
        {
          if(strlen($pass)>=8&&strlen($pass)<=32)
          {
            if(strcmp($pass,$repass)!=0)
            {
              echo"Both the Passwords dont match<br/> Check Again";
            }
              if (!filter_var($Email, FILTER_VALIDATE_EMAIL))
               {
                 $emailErr = "Invalid email format";

               }
            else {
              $random_digit=rand(00000,99999);
              $resetCode=md5($Email.$random_digit);
              $result1=mysqli_query($con,"insert into form values('','$name','$Email','$pass','$resetCode')");
              $result3=mysqli_query($con,"insert into profile values('$name','$Email','','',NULL,'')");
              if(!$result1||!$result3)
              {
                echo"ERROR".mysqli_error($con);
              }
              else {
                echo "<font color='green'><b>Successfully Registered</b></font>";
              }
            }
          }
          else
          {
            echo "Password length is not sufficient";
        }
      }
    else
    {
      echo"Enter E-mail ID";
    }
  }
      else
      {
        echo"Re-enter Password";
      }
    }
    else
     {
      echo"Enter Password";
    }
  }
  else {
    echo"Enter name";
  }
}

 ?>
<html>
<head>
  <title>Registration</title>
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
      <table>
  <form method="post" action="Registration.php">
    <h1><center>REGISTRATION FORM</center></h1>
<tr><td><label class="form-labels">  <b>Name:</b></label></td>
<td><input type="text" name="name1"></td></tr>
<tr><td><label class="form-labels"> <b>Email ID:</label?</b>
<td><input type="text" name="Email"><?php  echo $emailErr; ?>
<tr><td> <label class="form-labels"> <b>Password:</b></label></td>
<td><input type="password" name="pass"></td></tr>
<tr><td> <label class="form-labels"> <b>Re-enter Password:</b></label></td>
<td><input type="password" name="repass"></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Submit" name="yes"></td></tr>
</form>
</table>
</div>
</div>
</body>
</html>
<?php
 ?>
