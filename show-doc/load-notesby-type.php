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

    $file_ext=$_REQUEST['file_type'];
    $sub_sl=$_REQUEST['sub_sl'];

    $get_file=mysqli_query($conn,"SELECT * FROM uploaded_file where subject_id='$sub_sl' and stat='1' ");
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

        $get_subs=mysqli_query($conn,"SELECT * FROM subject_tbl where sl='$subject_id' and stat='1' ");
        if($row_sub=mysqli_fetch_array($get_subs))
        {
            $subj=$row_sub['subject_nm'];
        }
        $get_sem1=mysqli_query($conn,"SELECT * FROM semester_tbl where sl='$sem_id' and stat='1' ");
        if($row_sem1=mysqli_fetch_array($get_sem1))
        {
            $stud_sem=$row_sem1['sem'];
        }
        if($file_ext=='0')
        {
            if($ext=='jpg' || $ext=='png' || $ext=='doc' || $ext=='docx' || $ext=='pdf')
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
                                <img src="../files/pdflogo.png" alt=" " height="80" width="100" onclick="show_pdf('<?php echo basename($file);?>')"><?php echo basename($file);?>
                        <?php
                            }
                            else if($ext=="docx" || $ext=="doc" )
                            {
                        ?> 
                                <img src="../files/doc.png" alt=" " height="80" width="100" onclick="show_doc('<?php echo basename($file);?>')"><?php echo basename($file);?>
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
                            substr($topic_descp, 0, 40) . '..<a href="#" onclick="show_descp('.$sl.')">View More</a>' :
                            $topic_descp;
                        ?>.
                    </div>
                </div>
            </div>                    
<?php 
            }
        }
        else if($file_ext=='1')
        {
                if($ext=="pdf")
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
                                        <img src="../files/pdflogo.png" alt=" " height="80" width="100" onclick="show_pdf('<?php echo basename($file);?>')"><?php echo basename($file);?>
                            <?php
                                    }
                            ?>
                        </div>
                        <div class="panel-footer">
                            <?php
                                echo strlen($topic_descp) >= 40 ?
                                substr($topic_descp, 0, 40) . '..<a href="#" onclick="show_descp('.$sl.')">View More</a>' :
                                $topic_descp;
                            ?>.
                        </div>
                    </div>
                </div>
        <?php
                }
        }
        else if($file_ext=='2')
        {
                if($ext=="docx" || $ext=="doc" )
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
                                    if($ext=="docx" || $ext=="doc" )
                                    {
                            ?>
                                        <img src="../files/doc.png" alt=" " height="80" width="100" onclick="show_doc('<?php echo basename($file);?>')"><?php echo basename($file);?>
                            <?php
                                    }
                            ?>
                        </div>
                        <div class="panel-footer">
                            <?php
                                echo strlen($topic_descp) >= 40 ?
                                substr($topic_descp, 0, 40) . '..<a href="#" onclick="show_descp('.$sl.')">View More</a>' :
                                $topic_descp;
                            ?>.
                        </div>
                    </div>
                </div>
        <?php
                }
    
        }
         else if($file_ext=='3')
        {
                if($ext=="jpg" || $ext=="png" )
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
                                    if($ext=="jpg" || $ext=="png" )
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
                                substr($topic_descp, 0, 40) . '..<a href="#" onclick="show_descp('.$sl.')">View More</a>' :
                                $topic_descp;
                            ?>.
                        </div>
                    </div>
                </div>
        <?php
                }
        }
    } 
?>