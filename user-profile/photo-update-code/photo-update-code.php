<?php
  include '../../config.php';
  include '../../functions.php';

$cdate = date("Y-m-d h:i:s A");
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $unique_id=$_POST['unique_id'];
        
        if ($_FILES['file']['name']=='')
        {
          echo "2";
        }
        else
        {
          $r_char1 = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz') , 0 , 5 );
          $nm1=$r_char1."_spic";
          if (basename( $_FILES["file"]["name"])!='')
          {
            $allowedExts = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
            $temp = explode(".", $_FILES["file"]["name"]);
            $extension = end($temp);
            if ((($_FILES["file"]["type"] == "image/gif")
            || ($_FILES["file"]["type"] == "image/jpeg")
            || ($_FILES["file"]["type"] == "image/jpg")
            || ($_FILES["file"]["type"] == "image/pjpeg")
            || ($_FILES["file"]["type"] == "image/x-png")
            || ($_FILES["file"]["type"] == "image/png")
            || ($_FILES["file"]["type"] == "image/GIF")
            || ($_FILES["file"]["type"] == "image/JPEG")
            || ($_FILES["file"]["type"] == "image/JPG")
            || ($_FILES["file"]["type"] == "image/PJPEG")
            || ($_FILES["file"]["type"] == "image/X-PNG")
            || ($_FILES["file"]["type"] == "image/PNG"))
            && ($_FILES["file"]["size"] < 1000000)
            && in_array($extension, $allowedExts))
              {
                if ($_FILES["file"]["error"] > 0)
                {
                  echo "4";
                }
                else
                {
                  if (file_exists("../../images/user_image/".$nm1.".jpg"))
                  {
                    echo "5";
                  }
                  else
                  {
                    $pic2="../../images/user_image/".$nm1.".jpg";
                    $pic_nm1= $nm1;

                    move_uploaded_file($_FILES["file"]["tmp_name"],$pic2);

                    include('../../simpleimgupload/SimpleImage.php');
                    $image1 = new SimpleImage();
                    //pic1
                    $image1->load($pic2);
                    //$image1->resize(1349,480);
                    $image1->save($pic2); //resize(width,height)

                    $query_update = mysqli_query($conn,"UPDATE login_tbl SET dp_pic='$pic_nm1' WHERE u_id='$unique_id' ");
                    echo "8";
                  }
                }
              }
            }
          }
        }
?>
