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
      $teacher_id= $_POST['teacher_id'];
      $video_link= $_POST['video_link'];
      $course_id= $_POST['course_id'];

      $get_valid = mysqli_query($conn,"SELECT * FROM uploaded_file where teacher_id='$teacher_id' and subject_id='$subjects' and topic_nm='$topic_name' ");
        if($row_valid = mysqli_fetch_array($get_valid))
        {
            echo "2";
        }
        else
        {
            $table="uploaded_file";
            $data='';
            $data.="'$teacher_id'";
            $data.=",'$course_id'";
            $data.=",'$subjects'";
            $data.=",'$sem_id'";
            $data.=",'$topic_name'";
            $data.=",'$descp'";
            $data.=",'$video_link'";
            $data.=",'2'";
            $data.=",'1'";
            $data.=",'$cdate'";
            $data.=",'$id1'";

            $insert = insert($table,$data);
            echo "1";
          }
    }
  ?>
