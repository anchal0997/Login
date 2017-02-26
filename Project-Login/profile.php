<<?php include "Functions.php"; ?>
<html>
<head>
  <title>Profile</title>
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
  <h2>UPDATE YOUR PROFILE</h2>
  <p>
  <?php
  echo "<b>Welcome ";
  echo $_SESSION['loginid'];
  echo"</b>";
  ?>
  <br/><br/>
  <table width="350px" >
<form method="post" action="profile.php">
  <tr><td><b>Branch:</b></td>
<td><input type="text" name="branch"/></td>
</td></tr>
<tr><td><b>Designation:</b></td>
<td><input type="text" name="desgn"/></td>
</td></tr>
<tr><td><b>No. of Subjects you teach:</b></td>
<td><input type="number" name="subjects"/></td>
</tr>
<tr>
  <td colspan="2" align="center">
    <input type="submit" value="Submit" name="submit"/></td>
</form>
</table>
</p>
</div>
<div class="main3">
  <table border="2" height="150px" width="260px">
    <tr>
      <td><a href="home.html"><b>HOME</b></a></td>
    </tr>
    <tr>
      <td><a href="contactus.php"><b>ABOUT US</b></a></td>
    </tr>
    <tr>
      <td><a href="login.php"><b>LOG OUT</b></a></td>
    </tr>
  </table>
</div>
</div>
</body>
</html>
