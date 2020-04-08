<!DOCTYPE html>
 <html>
 <head>
     <title></title>
 </head>
 <script>
      function show_descp(sl)
        {
          $('#light_box1').load('show-descp.php?sl='+sl).fadeIn("fast");
          $('#lightbox_model1').modal('show');
        }
 </script>
 <style type="text/css">
        .video-container {
    position:relative;
    padding-bottom:56.25%;
    padding-top:30px;
    height:0;
    overflow:hidden;
}

.video-container iframe, .video-container object, .video-container embed {
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
}
    </style>
 <body>
 
 </body>
 </html>
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

    $get_file=mysqli_query($conn,"SELECT * FROM uploaded_file where subject_id='$subject_sl' and file_type='2' and stat='1' ");
    while($row_notes=mysqli_fetch_array($get_file))
    {
        $file=$row_notes['file'];
        $file_sl=$row_notes['sl'];
        $subject_id=$row_notes['subject_id'];
        $topic_nm=$row_notes['topic_nm'];
        $topic_descp=base64_decode($row_notes['topic_descp']);
        $file_type=$row_notes['file_type'];
        $ext = pathinfo($file, PATHINFO_EXTENSION);

        $get_subs=mysqli_query($conn,"SELECT * FROM subject_tbl where sl='$subject_id' and stat='1' ");
        while($row_sub=mysqli_fetch_array($get_subs))
        {
            $subj=$row_sub['subject_nm'];
        if($file_type=='2')
        {
            $userfile_extn = explode("/",$file);
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
                            <div class="video-container"><iframe src="http://www.youtube.com/embed/<?php echo $userfile_extn[3];?>" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" webkitallowfullscreen="webkitallowfullscreen"></iframe></div>
                    </div>
                    <div class="panel-footer">
                        <?php
                            echo strlen($topic_descp) >= 36 ?
                            substr($topic_descp, 0, 36) . '..<a href="#" onclick="show_descp('.$file_sl.')">View More</a>':
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