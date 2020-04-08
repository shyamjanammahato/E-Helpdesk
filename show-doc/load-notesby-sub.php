<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
$get_query=mysqli_query($conn,"SELECT * FROM login_tbl where mail_id='$id1' ");
while($row_query=mysqli_fetch_array($get_query))
{
    $u_id=$row_query['u_id'];
}

    $subject_sl=$_REQUEST['subject_sl'];

    $get_file=mysqli_query($conn,"SELECT * FROM uploaded_file where subject_id='$subject_sl' and stat='1' ");
    while($row_notes=mysqli_fetch_array($get_file))
    {
        $file=$row_notes['file'];
        $edt=$row_notes['edt'];
        $sl=$row_notes['sl'];
        $subject_id=$row_notes['subject_id'];
        $topic_nm=$row_notes['topic_nm'];
        $topic_descp=base64_decode($row_notes['topic_descp']);
        $stat=$row_notes['stat'];
        $sem_id=$row_notes['sem_id'];
        $file_type=$row_notes['file_type'];
        $ext = pathinfo($file, PATHINFO_EXTENSION);

        if($file!='null' && $file_type=='1')
        {
    ?>
            <div class="col-lg-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <?php
                            echo strlen($topic_nm) >= 40 ?
                            substr($topic_nm, 0, 40) . '...' :
                            $topic_nm;
                        ?>
                    </div>
                    <div class="panel-body text-center">
                        <?php
                            if($ext=="pdf")
                            {
                                ?>
                                    <img src="../files/pdflogo.png" alt=" " height="80" width="90" onclick="show_pdf('<?php echo basename($file);?>')"><?php echo basename($file);?>
                                <?php
                            }
                            else if($ext=="docx" || $ext=="doc" )
                            {
                                ?> 
                                    <img src="../files/doc.png" alt=" " height="80" width="90" onclick="show_doc('<?php echo basename($file);?>')"><?php echo basename($file);?>
                                <?php
                            }
                            else
                            {
                                ?> 
                                    <img src="files/<?php echo $file;?>" alt=" " height="80" width="150" onclick="show_doc('<?php echo basename($file);?>')"><?php echo basename($file);?>
                                <?php
                            }
                        ?>
                    </div>
                    <div class="panel-footer">
                        <?php
                            echo strlen($topic_descp) >= 40 ?
                            substr($topic_descp, 0, 40) . '..<a href="#" onclick="show_descp('.$sl.')">View More</a>':
                            $topic_descp;
                        ?>.
                    </div>
                </div>
            </div> 
    <?php 
        }   
    } 
?>