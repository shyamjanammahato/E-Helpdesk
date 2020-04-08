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

    <title>Notes - GIMT HelpDesk</title>

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
              $('#auto_load').load('load-notesby-type.php?file_type='+file_type+'&sub_sl='+sub_sl).fadeIn("fast");
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
                    <div class="col-lg-12">
                        <h1 class="page-header">Notes</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2" style="text-align:right;"><p><strong><label>Select Subject</label></strong></p></div>
                    <div class="col-md-4">
                        <div class="form-group"> 
                            <select class="form-control" name="select_sub" id="select_sub" onchange="show_fileby_sub(this.value);">
                                <option>----Select----</option>
                                <?php
                                    $get_details=mysqli_query($conn,"SELECT * FROM user_details where unique_id='$u_id' ");
                                    if($row_details=mysqli_fetch_array($get_details))
                                    {
                                        $course=$row_details['course_id'];
                                        $depart=$row_details['depart_id'];
                                        $sem_id=$row_details['sem_id'];
                                    }
                                    $get_sub=mysqli_query($conn,"SELECT * FROM subject_tbl where course_id='$course' and depart_id='$depart' and sem_id='$sem_id' ");
                                    while($row_sub=mysqli_fetch_array($get_sub))
                                    {
                                        $subject_sl=$row_sub['sl'];
                                        $sub_name=$row_sub['subject_nm'];
                                ?>
                                        <option value="<?php echo $subject_sl;?>"><?php echo $sub_name;?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class=""></div>
                    <div class="col-md-1" style="text-align:left;"><p><strong><label>Select File</label></strong></p></div>
                    <div class="col-md-4">
                        <div class="form-group"> 
                            <select class="form-control" name="file_type" id="file_type" onchange="show_fileby_type(this.value);">
                                <option value="0" selected>All</option>
                                <option value="1">PDF</option>
                                <option value="2">Word File</option>
                                <option value="3">Images</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row" id="auto_load">
                </div>
            </div>
        </div>
        <!-- Main Page Content -->
    </div>
    <!-- /#wrapper -->
    <div id="lightbox_model1" class="modal fade" role="dialog">
        <div id="light_box1">

        </div>
    </div>

    <!--JavascriptsLink-->
    <?php include '../link-plugins/javascripts.php';?>
    <!--JavascriptsLink-->
</body>

</html>
