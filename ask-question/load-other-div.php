<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
$value=$_REQUEST['value'];
if($value=='0')
{
?>
<div class="form-group">
  <label>Enter Subject <font style="color:red">*</font></label>
  <input class="form-control" name="other_sub" id="other_sub">
</div>
<?php
}