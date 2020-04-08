<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
    $sl=$_REQUEST['sl'];
    $to_del_sl=base64_decode($sl);

      $query_delete="DELETE from depart_tbl  where sl='$to_del_sl' ";
      $result_delete=mysqli_query($conn,$query_delete);
      if(isset($result_delete))
      {
        ?>
          <script language="JavaScript">
          alert("Successfully Deleted");
          document.location.href="../add-department/";
          </script>
        <?php
      }
 ?>
