<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
    $sl=$_REQUEST['sl'];
    $to_delete_sl=base64_decode(base64_decode($sl));

      $query_update="DELETE FROM uploaded_file where sl='$to_delete_sl' ";
      $result_update=mysqli_query($conn,$query_update);
      if(isset($result_update))
      {
        ?>
          <script language="JavaScript">
          alert("Successfully Deleted ..");
          document.location.href="../add-notes/index.php";
          </script>
        <?php
      }
 ?>
