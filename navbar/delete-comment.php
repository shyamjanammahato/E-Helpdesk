<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
    $comment_del_sl=$_POST['comment_sl'];
    $del_comment_btn=$_POST['del_comment_btn'];

    if(isset($del_comment_btn))
    {
      $query_update="UPDATE post_question set p_stat='2' where sl='$comment_del_sl' ";
      $result_update=mysqli_query($conn,$query_update);
      if(isset($result_update))
      {
        ?>
          <script language="JavaScript">
          window.location.href="show-all-notification.php";
          </script>
        <?php
      }
}
 ?>