<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}

    $aa=$_REQUEST['sl'];
    $sl=base64_decode($aa);

      $query_delete="DELETE from academic_yr  where sl='$sl' ";
      $result_delete=mysqli_query($conn,$query_delete);
      if(isset($result_delete))
      {
        ?>
          <script language="JavaScript">
          alert("Successfully Deleted");
          document.location.href="../academic-year/";
          </script>
        <?php
      }
 ?>
