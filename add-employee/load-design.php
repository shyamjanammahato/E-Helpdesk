<?php
include '../connect-db.php';

  $depart_id=$_REQUEST['sl'];
  $course_id=$_REQUEST['course_id'];

?>
  <label for="">Designation <font style="color:red">*</font></label>
  <select class="form-control" id="emp_design" name="emp_design">
      <option value="">----Select----</option>
<?php
      $get_design=mysqli_query($conn,"SELECT * FROM emp_designation where course_id='$course_id' and depart_id='$depart_id' and stat='1' ");
      while($row_design=mysqli_fetch_array($get_design))
        {
          $design_id=$row_design['sl'];
          $designation=$row_design['designation'];
?>
          <option value="<?php echo $design_id;?>"><?php echo $designation;?></option>
<?php
        }
?>
  </select>
<?php
?>
