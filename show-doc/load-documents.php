<?php 
include "../config.php";
if($ck=='1')
{
    header("Location: ../dashboard/index.php");
}

$file_ext=$_REQUEST['file_ext'];

    $get_query=mysqli_query($conn,"SELECT * FROM login_tbl where mail_id='$id1' ");
    if($row_query=mysqli_fetch_array($get_query))
    {
        $teacher_id=$row_query['u_id'];
    }
    $c=0;
    $get_file=mysqli_query($conn,"SELECT * FROM uploaded_file where teacher_id='$teacher_id' order by sl desc");
    while($row_sem=mysqli_fetch_array($get_file))
    {
        $c++;
        $file=$row_sem['file'];
        $edt=$row_sem['edt'];
        $sl=$row_sem['sl'];
        $subject_id=$row_sem['subject_id'];
        $topic_nm=$row_sem['topic_nm'];
        $topic_descp=base64_decode($row_sem['topic_descp']);
        $stat=$row_sem['stat'];
        $sem_id=$row_sem['sem_id'];
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