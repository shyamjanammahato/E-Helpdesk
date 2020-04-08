<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
  $sl=$_REQUEST['sl'];
  $teacher_id=$_REQUEST['t_id'];

?>
   <label for="">Semester <font style="color:red">*</font></label>
  <select  class="form-control" id="subjects" name="subjects">
      <option value="">----Select----</option>
<?php
  $get=mysqli_query($conn,"SELECT * FROM assign_subject where teacher_id='$teacher_id' and sem_id='$sl' and stat='1' ");
  while($row=mysqli_fetch_array($get))
  {
    $subject_id=$row['subjects'];
    $get_subs=mysqli_query($conn,"SELECT * FROM subject_tbl where sl='$subject_id' and stat='1' ");
    if($row_sub=mysqli_fetch_array($get_subs))
    {
      $subj=$row_sub['subject_nm'];
      $sl=$row_sub['sl'];
    }
?>
    <option value="<?php echo $sl;?>"><?php echo $subj ;?></option>
<?php 
  } 
?>
