<?php
  include '../../config.php';
  include '../../functions.php';

$get_query=mysqli_query($conn,"SELECT * FROM login_tbl where mail_id='$id1' ");
if($row_query=mysqli_fetch_array($get_query))
{
    $unique_id=$row_query['u_id'];
}
$dt=date("Y/m/d");
$time= date("h:i:sa");
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $notice_title=$_POST['notice_title'];
      $sem_id=$_POST['sem_id'];
      $notice_descp=$_POST['notice_descp'];
      $notice_descp_encode=base64_encode($notice_descp);
      
      if($notice_title=='')
      {
        echo '2';
      }
      else if($sem_id=='')
      {
        echo '3';
      }
      else if($notice_descp=='')
      {
        echo '0';
      }
      else
      {
        if (basename( $_FILES["file"]["name"])!='')
        {
          $folder = "../../files/notice";
          $temp = explode(".", $_FILES["file"]["name"]);
          $newfilename = round(microtime(true)).'.'. end($temp);
          $db_path =$newfilename  ;
          echo $newfilename;
          $listtype = array(
          '.doc'=>'application/msword',
          '.docx'=>'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
          '.jpeg'=> 'image/jpeg',
          '.pdf'=>'application/pdf'); 

          $pic2="../../files/notice/".$db_path;

          move_uploaded_file($_FILES["file"]["tmp_name"],$pic2);

          $table="notice_tbl";
          $data='';
          $data.="'$unique_id'";
          $data.=",'$sem_id'";
          $data.=",'$notice_title'";
          $data.=",'$notice_descp_encode'";
          $data.=",'$db_path'";
          $data.=",'1'";
          $data.=",'-1'";
          $data.=",'$dt'";
          $data.=",'$time'";
          $data.=",'$id1'";
          $data.=",'1'";

          $insert = insert($table,$data);
          echo "1";
        }
        else
        {
          $table="notice_tbl";
          $data='';
          $data.="'$unique_id'";
          $data.=",'$sem_id'";
          $data.=",'$notice_title'";
          $data.=",'$notice_descp_encode'";
          $data.=",'null'";
          $data.=",'1'";
          $data.=",'-1'";
          $data.=",'$dt'";
          $data.=",'$time'";
          $data.=",'$id1'";
          $data.=",'1'";

          $insert = insert($table,$data);
          echo "1";
        }
      }
    }
?>
