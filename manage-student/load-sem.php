<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
  $sl1=$_REQUEST['sl'];
?>
  <label for="">Semester <font style="color:red">*</font></label>
  <select  class="form-control" id="sem_id" name="sem_id">
      <option value="">----Select----</option>
<?php
      $get_sem=mysqli_query($conn,"SELECT * FROM semester_tbl where course_id='$sl1' and stat='1' ");
      while($row_sem=mysqli_fetch_array($get_sem))
        {
          $sem_id=$row_sem['sl'];
          $sem=$row_sem['sem'];
?>
          <option value="<?php echo $sem_id;?>"><?php echo $sem;?></option>
<?php
        }
?>
  </select>
<?php
?>
