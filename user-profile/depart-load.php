<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
  $sl=$_REQUEST['sl'];
?>
  <label for="">Department</label>
  <select  class="form-control" id="user_department_id" name="user_department_id" onchange="show_design(this.value)">
      <option value="">----Select----</option>
<?php
      $get_album=mysqli_query($conn,"SELECT * FROM depart_tbl where course_id='$sl' and stat='1' ");
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
