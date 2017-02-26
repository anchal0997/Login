<?php
include "Functions.php";
include "db.php";

if(!isset($_SESSION['loginid']) && !isset($_COOKIE['loginid']))
{
  header("Location:login.php");
  exit();
}

if(isset($_SESSION['loginid']))
$smthing= $_SESSION['loginid'];
else
$smthing=$_COOKIE['loginid'];

if(isset($_POST['Upload']))
{
  $path="Profile-Photos/";
  $file_name=$_FILES['Photo']['name'];

  $file_size=$_FILES['Photo']['size'];
  $file_name_array=explode(".",$file_name);
  $file_extension=strtolower(end($file_name_array));

  $allowed_ext=array('jpg','jpeg','bmp','png');
  $date=date("y.m.d.h.m.s");
  $random_digit=rand(00000,99999);
  $file_name=$random_digit.$date.".".$file_extension;
  $path=$path.$file_name;
      if($_FILES['Photo']['name']=="")
      {
        echo "Please Select a Photo.";
      }
      elseif($file_size>307200)
      {
          echo "File Size must be less than 200kb.";
      }
      elseif(!in_array($file_extension,$allowed_ext))
      {
        echo "File extension not allowed. (Please upload jpg, png or bmp file.)";
      }
      else
      {
        if(move_uploaded_file($_FILES['Photo']['tmp_name'],$path))
        {
          $sql=mysqli_query($con,"update profile set Photo='$file_name' where Email='$smthing'");
          if($sql)
          {

        ?>
        <?php
      }
          else
          echo "Error";
        }
        else {
          echo "Error to uploading file ! Please try again.";
        }

        }
}
if(isset($_POST['update']))
{
  $username=$_POST['username'];
  $Branch=$_POST['branch'];
  $Designation=$_POST['Designation'];
  $Subjects=$_POST['Subjects'];
  $result3=mysqli_query($con,"update profile set  Name='$username',Branch='$Branch',Designation='$Designation',Subjects=$Subjects where Email='$smthing'");
if(!$result3)
{
  echo "ERROR-".mysqli_error();
}
else {
  echo "<font color='red'>Updated Succesfully</font>";

  ?>
  <?php
}
}

?>

<html>
<head>
  <title>LOGIN_SUCCESSFULL</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <div class="header">
      <div class="logo">
        <img src="index.jpg" border="3">
        <font size="6.7px"><b>National Institute Of Technology, JALANDHAR</b></font>
  </div>
</div><div class="main">
  <div class="main2">
<h1>Hello-

<?php

echo $smthing;
?>
</h1>

<table WIDTH="100%">
<tr align="center">
    <td><a href="home.html"><b>HOME</b></a></td>
    <td><a href="profile.php"><b>PROFILE</b></a></td>
    <td><a href="contactus.php"><b>ABOUT US</b></a></td>
    <td><a href="logout.php"><b>LOGOUT</b></a></td>
</tr>
</table>
<br/>
<form method="post" action="succesfullogin.php" enctype="multipart/form-data">
  <?php  $result1=mysqli_query($con,"select * from profile where Email='$smthing'");
    $pass1=($result1->fetch_assoc());
    $pass=$pass1["Branch"];
    $pass3=$pass1["Designation"];
    $pass4=$pass1["Subjects"];
    $passs=$pass1["Name"]
    ?>
    <table width="50%">
    <tr align="center" ><td>NAME:</td><td> <input type="text" name="username" width="25%" value="<?php echo $passs; ?>"></td></tr>
      <tr align="center"><td>BRANCH:</td><td> <input type="text" name="branch" width="25%" value="<?php echo $pass; ?>"></td></tr>
      <tr align="center"><td>DESIGNATION: </td><td><input type="text" width="25%" name="Designation" value="<?php echo $pass3; ?>"></td></tr>
      <tr align="center"><td>NO. OF SUBJECTS: </td><td><input type="number" width="25%" name="Subjects" value="<?php echo $pass4; ?>"></td></tr>
      <tr><td colspan="2" align="center"><input type="file" name="Photo"> <input type="submit" name="Upload" value="Add/Change Photo"></tr></td>
      <tr><td colspan="2" align="center"><input type="submit" value="Update" name="update"></td></tr>
      <tr><td colspan="2">

        <img src="Profile-Photos/<?php if($pass1["Photo"]==NULL) echo "no_profile_image.jpg"; else echo $pass1["Photo"]; ?>" width="120" height="150"/>
      </td></tr>
</table>
</div>
</form>
</div>
</body>
</html>
