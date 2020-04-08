<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
    $sl=$_REQUEST['sl'];
    $tbl=$_REQUEST['tbl'];

      $query_delete="DELETE from stud_details where sl='$sl'";
      $result_delete=mysqli_query($conn,$query_delete);
      if(isset($result_delete))
      {
        ?>
          <script language="JavaScript">
          alert("Successfully Deleted");
          document.location.href="manage-student.php";
          </script>
        <?php
      }
 ?>
