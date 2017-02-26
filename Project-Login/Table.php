<?php
include 'db.php';
$result2='';
$uname='';
$pass2='';
 ?>
<html>
<head>
  <title>Table</title>
</head>
<body><br/><br/>
  <table width="70%" border="2" align="center">
    <tr align="center">
      <td><b>S.No.</b></td>
      <td><b>Name</b></td>
      <td><b>Email</b></td>
      </tr>
    <?php
    $result1=mysqli_query($con,"select * from form");
    for ($count=mysqli_num_rows($result1); $count >0 ; $count--)
    {
      echo "<tr align='center'>";
      $pass2=($result1->fetch_assoc());
      echo"<td>";$uname=$pass2["SNo"];
      echo $uname;echo "</td>";echo "</td>";
      echo"<td>";$uname=$pass2["Name"];
      echo $uname;echo "</td>";
      echo"<td>";$uname=$pass2["Email"];
      echo $uname;echo "</td>";echo "</td>";
      echo "</tr>";
    }

    //print_r($result1);

    foreach($result1 as $row)
    {
      echo "<pre>".$row['Name']."   ".$row['Email']."   ".$row['Password']."<br /></pre>";
    }

    if(isset($_POST['delete']))
    {
      $get=$_POST['ID'];
      $result5=mysqli_query($con,"delete from form where SNo='$get'");
      if(!$result5)
      {
        echo "error";
      }
      else {
        header("Location:table.php");
      }
    }

 ?>
  </table>
  <form  action="Table.php" method="post">
    <select name="ID">
      <<?php
      foreach($result1 as $row)
      {
      echo "<option value='".$row['SNo']."'>".$row['SNo']."</option>";
    }
    ?>
    </select>
    <input type="submit" value="Delete User" name="delete">

  </form>
</body>
</html>
