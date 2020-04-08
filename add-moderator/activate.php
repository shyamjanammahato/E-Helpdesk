<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
    $id=$_REQUEST['u_id'];
    $u_id=base64_decode(base64_decode(base64_decode($id)));

      $query_update="UPDATE user_details set stat='1' where unique_id='$u_id' ";
      $result_update=mysqli_query($conn,$query_update);
      $query_update1="UPDATE login_tbl set stat='1' where u_id='$u_id' ";
      $result_update1=mysqli_query($conn,$query_update1);
      if(isset($result_update))
      {
        ?>
          <script language="JavaScript">
          alert("Successfully Activated the account");
          document.location.href="../add-moderator/index.php";
          </script>
        <?php
      }
 ?>
