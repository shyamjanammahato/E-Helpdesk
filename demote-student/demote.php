<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
    $unique_id1=$_REQUEST['unique_id'];
    $unique_id=base64_decode(base64_decode(base64_decode($unique_id1)));

    $query=mysqli_query($conn,"SELECT * FROM user_details where unique_id='$unique_id' ");
    if($row_query=mysqli_fetch_array($query))
    {
      $sem_id=$row_query['sem_id']-1;
    }

      $query_update="UPDATE user_details set sem_id='$sem_id' where unique_id='$unique_id' ";
      $result_update=mysqli_query($conn,$query_update);
      if(isset($result_update))
      {
        ?>
          <script language="JavaScript">
          alert("Successfully Demoted.");
          document.location.href="../demote-student/index.php";
          </script>
        <?php
      }
 ?>
