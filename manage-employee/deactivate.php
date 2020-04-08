<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
    $sl=$_REQUEST['sl'];
    $to_update_sl=base64_decode(base64_decode(base64_decode($sl)));

      $query_update="UPDATE user_details,login_tbl set stat='0' where sl='$to_update_sl' ";
      $result_update=mysqli_query($conn,$query_update);
      if(isset($result_update))
      {
        ?>
          <script language="JavaScript">
          alert("Successfully Deactivated the account");
          document.location.href="../manage-employee/index.php";
          </script>
        <?php
      }
 ?>
