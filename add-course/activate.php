<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
    $sl=$_REQUEST['sl'];

      $query_update="UPDATE subject_tbl set stat='1' where sl='$sl' ";
      $result_update=mysqli_query($conn,$query_update);
      if(isset($result_update))
      {
        ?>
          <script language="JavaScript">
          alert("Successfully Activated the subject");
          document.location.href="../manage-subject/index.php";
          </script>
        <?php
      }
 ?>
