<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
    $post_del_sl=$_POST['post_sl'];
    $del_post_btn=$_POST['del_post_btn'];

    if(isset($del_post_btn))
    {
      $query_update="UPDATE post_question SET p_stat='2' where sl='$post_del_sl' ";
      $result_update=mysqli_query($conn,$query_update);
      if(isset($result_update))
      {
        ?>
          <script language="JavaScript">
          window.location.href="index.php";
          </script>
        <?php
      }
}
 ?>