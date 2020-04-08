<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
    $post_del_sl=base64_decode(base64_decode($_REQUEST['sl']));

      $query_update="UPDATE uploaded_file SET stat='2' where sl='$post_del_sl' ";
      $result_update=mysqli_query($conn,$query_update);
      if(isset($result_update))
      {
        ?>
          <script language="JavaScript">
          alert("Successfully Deleted..")
          window.location.href="../dashboard/index.php";
          </script>
        <?php
      }
 ?>