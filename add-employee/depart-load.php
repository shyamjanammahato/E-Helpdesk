<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}

$course_id=$_REQUEST['sl'];
?>
  <label for="">Department</label>
  <select class="form-control" name="emp_department_id" id="emp_department_id">
      <option value="">----Select----</option>
<?php
      $get_album=mysqli_query($conn,"SELECT * FROM depart_tbl where course_id='$course_id' and stat='1' ");
      while($row_album=mysqli_fetch_array($get_album))
        {
          $sl=$row_album['sl'];
          $depart_nm=$row_album['depart_nm'];
?>
          <option value="<?php echo $sl;?>"><?php echo $depart_nm;?></option>
<?php
        }
?>
  </select>
<?php
?>
