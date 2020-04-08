<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
  $sem_id=$_REQUEST['sem'];
  $course_id=$_REQUEST['course'];
   $depart_id=$_REQUEST['depart'];
  

  
?>
  <label for="">Select Subjects <font style="color:red">*</font></label>
  <select class="form-control" id="subjects" name="subjects">
      <option>----Select----</option>
<?php
      $get_subject=mysqli_query($conn,"SELECT * FROM subject_tbl where course_id='$course_id' and depart_id='$depart_id' and sem_id='$sem_id' and stat='1' ");
      while($row_subject=mysqli_fetch_array($get_subject))
        {
          $sub_id=$row_subject['sl'];
          $subject_nm=$row_subject['subject_nm'];
?>
          <option value="<?php echo $sub_id;?>"><?php echo $subject_nm;?></option>
<?php
        }
?>
  </select>
<?php
?>
