<?php
include "db.php";

if(isset($_POST['Upload']))
{
  $path="Profile-Photos/";
  $file_name=$_FILES['Photo']['name'];

  $file_size=$_FILES['Photo']['size'];
  $file_name_array=explode(".",$file_name);
  $file_extension=strtolower(end($file_name_array));

  $allowed_ext=array('jpg','jpeg','bmp','png');

  $random_digit=rand(00000,99999);
  $file_name=$file_name.$random_digit;
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
          $sql=mysqli_query($con,"update profile set Photo='$file_name' where Email='anchal@gmail.com'");
          if($sql)
          {
        ?>
        <img src="Profile-Photos/<?php echo $file_name; ?>" width="80" height="150"/>
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
?>

<form action="Upload-Photo.php" method="post" enctype="multipart/form-data">

<input type="file" name="Photo">
<input type="submit" name="Upload" value="Add/Change Photo">

</form>
