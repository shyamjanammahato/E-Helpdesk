<?php
  include '../../config.php';
  include '../../functions.php';

  $cdate = date("Y-m-d h:i:s A");

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $sem_id= $_POST['sem_id'];
      $subjects= $_POST['subjects'];
      $topic_name= $_POST['topic_name'];
      $descp= base64_encode($_POST['descp']);
      $sl= $_POST['sl'];

      $get_valid = mysqli_query($conn,"SELECT * FROM uploaded_file where topic_nm='$topic_name' and sl!='$sl' ");
        if($row_valid = mysqli_fetch_array($get_valid))
        {
            echo "2";
        }
        else
        {
          $query_update=mysqli_query($conn,"UPDATE uploaded_file set topic_nm='$topic_name' , topic_descp='$descp' , subject_id='$subjects' , sem_id='$sem_id' where sl='$sl' ");
            echo "1";
          }
    }
  ?>
