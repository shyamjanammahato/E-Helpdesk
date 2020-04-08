<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
    $sl=base64_decode(base64_decode($_REQUEST['sl']));
    $get_notice=mysqli_query($conn,"SELECT * FROM notice_tbl where sl='$sl' and stat='1' ");
    if($row_notice=mysqli_fetch_array($get_notice))
    {
        $file=$row_notice['file'];
        $title=$row_notice['title'];
        $notice_descp=base64_decode($row_notice['notice_descp']);
    }
 ?>
 <script>
     function show_pdf(file)
    {
      window.location.href = "download-file.php?file="+file;
    }

 </script>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"><?php echo $title;?></h4>
        </div>
        <div class="modal-body">
           <div class="row stu-photo-form text-center">
                <div class="col-md-12">
                <?php
                    if($file!='null')
                    {
                        echo $notice_descp;
                ?>
                	 <br><br><button type="submit" class="btn btn-primary" onclick="show_pdf('<?php echo basename($file);?>')">Download File</button>
                <?php
                    }
                    else
                    {
                        echo $notice_descp;
                    }
                ?>
                </div>
           </div>
        </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>

    </div>
</div>