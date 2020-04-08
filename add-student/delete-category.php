<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
    $sl=$_REQUEST['sl'];

      $query_delete="DELETE from adm_category  where sl='$sl' ";
      $result_delete=mysqli_query($conn,$query_delete);
      if(isset($result_delete))
      {
        ?>
          <script language="JavaScript">
          alert("Successfully Deleted");
          document.location.href="../adm-cat/";
          </script>
        <?php
      }
 ?>
