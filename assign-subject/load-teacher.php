<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}

  $teacher_mob=$_REQUEST['sl'];


?>
  <label for="">Teacher <font style="color:red">*</font></label>
  <select class="form-control" id="teacher_id" name="teacher_id">
    <option>----Select----</option>
<?php
      $get_teacher=mysqli_query($conn,"SELECT * FROM login_tbl where  mob='$teacher_mob' and stat='1' ");
      while($row_teacher=mysqli_fetch_array($get_teacher))
        {
          $teacher_unique_id=$row_teacher['u_id'];
          $f_nm=$row_teacher['full_nm'];
?>
          <option value="<?php echo $teacher_unique_id;?>"><?php echo $f_nm;?></option>
<?php
        }
?>
  </select>
<?php
?>
