<?php
  include '../../config.php';
  include '../../functions.php';

  $cdate = date("Y-m-d ");
  $ctime=date("h:i:s");

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $receiver= $_POST['receiver'];
      $msg= $_POST['msg'];
      $messg=base64_encode($msg);

      $table="tech_messenger";
      $data='';
      $data.="'$id1'";
      $data.=",'$receiver'";
      $data.=",'$messg'";
      $data.=",'$cdate'";
      $data.=",'ctime'";
      $data.=",'null'";

      $insert = insert($table,$data);
      echo "1";
    }
?>
