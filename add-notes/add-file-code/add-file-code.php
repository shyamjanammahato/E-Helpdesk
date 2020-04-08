<?php
  include '../../config.php';
  include '../../functions.php';

$cdate = date("Y-m-d h:i:s A");
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $sl=$_POST['sl'];
        
      if ($_FILES['file']['name']=='')
      {
        echo "2";
      }
      else
      {
        $folder = "../../files/";
        $temp = explode(".", $_FILES["file"]["name"]);
        $newfilename = round(microtime(true)).'.'. end($temp);
        $db_path ="$folder".$newfilename  ;
        $listtype = array(
        '.doc'=>'application/msword',
        '.docx'=>'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        '.jpeg'=> 'image/jpeg',
        '.pdf'=>'application/pdf'); 
        if ( is_uploaded_file( $_FILES['file']['tmp_name'] ) )
        {    
          if($key = array_search($_FILES['file']['type'],$listtype))
          {
            if (move_uploaded_file($_FILES['file']  ['tmp_name'],"$folder".$newfilename))
            {
              $update_query=mysqli_query($conn,"UPDATE uploaded_file SET file='$db_path' where sl='$sl' ");
              echo "1";
            }
          }
        }
        else    
        {
          echo "3";
        }
      }
    }
?>
