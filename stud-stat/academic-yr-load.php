<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
  $sl=$_REQUEST['sl'];
?>
  <label for="">Batch</label>
  <select  class="form-control" id="batch_id" name="batch_id">
      <option value="">Select</option>
<?php
      $get_acad_yr=mysqli_query($conn,"SELECT * FROM academic_yr where course_id='$sl' and stat='1' ");
      while($row_acad_yr=mysqli_fetch_array($get_acad_yr))
        {
          $sl=$row_acad_yr['sl'];
          $acad_yr=$row_acad_yr['acad_yr'];
?>
          <option value="<?php echo $sl; ?>"><?php echo $acad_yr;?></option>
<?php
        }
?>
  </select>
<?php
?>
