<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
  $subject_sl=$_REQUEST['subject_sl'];
?>
  <select  class="form-control" id="select_teacher" name="select_teacher" onchange="show_videoby_teach(this.value);">
      <option value="">----Select----</option>
<?php
      $get_album=mysqli_query($conn,"SELECT * FROM assign_subject where subjects='$subject_sl' and stat='1' ");
       while($row_album=mysqli_fetch_array($get_album))
        {
          $teacher_sl=$row_album['sl'];
          $teacher_id=$row_album['teacher_id'];

          $get_query=mysqli_query($conn,"SELECT * FROM login_tbl where u_id='$teacher_id' ");
          if($row_query=mysqli_fetch_array($get_query))
          {
              $full_nm=$row_query['full_nm'];
?>
          <option value="<?php echo $teacher_id;?>"><?php echo $full_nm;?></option>
<?php
        }
      }
?>
  </select>
<?php
?>
