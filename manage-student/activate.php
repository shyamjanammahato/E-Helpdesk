<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
    $sl=$_REQUEST['sl'];
    $to_update_sl=base64_decode(base64_decode(base64_decode($sl)));

      $query_update="UPDATE stud_details set stat='1' where sl='$to_update_sl' ";
      $result_update=mysqli_query($conn,$query_update);
      if(isset($result_update))
      {
        ?>
          <script language="JavaScript">
          alert("Successfully Activated the account");
          document.location.href="../manage-student/index.php";
          </script>
        <?php
      }
 ?>
