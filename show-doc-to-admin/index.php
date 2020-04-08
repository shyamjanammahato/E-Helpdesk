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
$doc_type=base64_decode($_REQUEST['file_type']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="content" content="GIMT HelpDesk">
    <meta name="keyword" content="Final Year Project @ 2017 Batch | GIMT HelpDesk">
    <meta name="description" content="Global Institute of Management & Technology | Final Year Project @ 2017 Batch">
    <meta name="author" content="Shyam Janam Mahato | Jayanta Pal">

    <title>Documents - GIMT HelpDesk</title>

    <!-- StyleSheet Link-->
    <?php include '../link-plugins/stylesheet.php';?>
    <!-- StyleSheet Link-->
    <script>
        
     function show_fileby_sub(subject_sl)
        {
            $('#auto_load').html("<strong><label>Loading...Please Wait..</label><br></strong>").fadeIn("fast");
            setTimeout(function(){
              $('#auto_load').load('load-notesby-sub.php?subject_sl='+subject_sl).fadeIn("fast");
            }, 1000);
        }
          function show_fileby_type(file_type)
        {
            var sub_sl=document.getElementById("select_sub").value;
            $('#auto_load').html("<strong><label>Loading...Please Wait..</label><br></strong>").fadeIn("fast");
            setTimeout(function(){
              $('#auto_load').load('load-notesby-type.php?sub_sl='+sub_sl+'&file_type='+file_type).fadeIn("fast");
            }, 1000);
        }
        function show_videoby_sub(file_type)
        {
            var sub_sl=document.getElementById("select_sub").value;
            $('#auto_load').html("<strong><label>Loading...Please Wait..</label><br></strong>").fadeIn("fast");
            setTimeout(function(){
              $('#auto_load').load('../show-student-videos/load-videosby-sub.php?subject_sl='+sub_sl).fadeIn("fast");
            }, 1000);
        }
    function show_pdf(file)
    {
      window.location.href = "show-pdf.php?file="+file;
    }
    function show_doc(file)
    {
      $('#light_box1').load('show-docum.php?file='+file).fadeIn("fast");
      $('#lightbox_model1').modal('show');
    }
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
</head>

<body>

    <div id="wrapper">
        <!--Top Navbar Include-->
        <?php include '../navbar/top-nav.php';?>
        <!--Top Navbar Include-->

        <!--Sidebar Include-->
        <?php include '../navbar/sidebar.php';?>
        <!--Sidebar Include-->

        <!-- Main Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header"><?php if($doc_type=='1') echo "<i class='fa fa-file-text fa-fw'></i>"."  Documents" ;else echo "<i class='fa fa-youtube-play fa-fw'></i>"."  Video Tutorials";?></h1>
                    </div>
                </div>
                <div class="row">
            <?php 
                $c=0;
                $get_file=mysqli_query($conn,"SELECT * FROM uploaded_file where stat='1' order by sl desc");
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
                    $doc_type1=$row_sem['file_type'];
                    $ext = pathinfo($file, PATHINFO_EXTENSION);
                    
                    if($doc_type=='1' && $doc_type1=='1')
                    {
                        if($file!='null')
                        {
            ?>
                    <div class="col-lg-4">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <?php
                                    echo strlen($topic_nm) >= 30 ?
                                    substr($topic_nm, 0, 30) . '...' :
                                    $topic_nm;
                                    ?><strong><?php echo ". "."[".date("d, M'y", strtotime($edt))."]";?></strong><?php
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
                    }}
                    else
                    {
                            if($doc_type=='2' && $doc_type1=='2')
                            {
                                $userfile_extn = explode("/",$file);
                ?>
                                <div class="col-lg-4">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                    <?php
                                        echo strlen($topic_nm) >= 30 ?
                                        substr($topic_nm, 0, 30) . '...' :
                                        $topic_nm;
                                        ?><strong><?php echo ". "."[".date("d, M'y", strtotime($edt))."]";?></strong><?php
                                    ?>
                                </div>
                                <div class="panel-body text-center">
                                        <div class="video-container"><iframe src="http://www.youtube.com/embed/<?php echo $userfile_extn[3];?>" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" webkitallowfullscreen="webkitallowfullscreen"></iframe></div>
                                </div>
                                <div class="panel-footer">
                                    <?php
                                        echo strlen($topic_descp) >= 30 ?
                                        substr($topic_descp, 0, 30) . '..<a href="#" onclick="show_descp('.$sl.')">View More</a>' :
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
                </div>
            </div>
        </div>
        <!-- Main Page Content -->
    </div>
    <div id="lightbox_model1" class="modal fade" role="dialog">
        <div id="light_box1">

        </div>
    </div>
    <!-- /#wrapper -->

    <!--JavascriptsLink-->
    <?php include '../link-plugins/javascripts.php';?>
    <!--JavascriptsLink-->
</body>

</html>
