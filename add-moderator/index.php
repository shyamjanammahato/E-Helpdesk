<?php 
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
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

    <title>Moderator - GIMT HelpDesk</title>

    <!-- StyleSheet Link-->
    <?php include '../link-plugins/stylesheet.php';?>
    <!-- StyleSheet Link-->
      <script>
     function deactivate(u_id)
        {

          var r = confirm("Are you sure to Deactivate this account ?");
          if (r == true) {
            window.location.href = "deactivate.php?u_id="+u_id;
          } else {
            return false;
          }
        }
        function activate(u_id)
           {

             var r = confirm("Are you sure to activate this account ?");
             if (r == true) {
               window.location.href = "activate.php?u_id="+u_id;
             } else {
               return false;
             }
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
                        <h1 class="page-header"><i class="fa fa-plus-square fa-fw"></i>Add Moderator</h1>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <i class="fa fa-edit fa-fw"></i>Subject Form
                                    </div>
                                    <div class="panel-body">
                                            <form class="" role="form" id="add_moderator" name="add_moderator">
                                                <div class="col-lg-6">
                                                  <div class="form-group">
                                                      <label>Full Name <font style="color:red">*</font></label>
                                                      <input class="form-control" type="text" name="mode_name" id="mode_name">
                                                  </div>
                                                </div>
                                                <div class="col-lg-6">
                                                  <div class="form-group">
                                                      <label>Email/Login-ID <font style="color:red">*</font></label>
                                                      <input class="form-control" type="text" name="mode_email" id="mode_email">
                                                  </div>
                                                </div>
                                                <div class="col-lg-6">
                                                  <div class="form-group">
                                                      <label>Gender <font style="color:red">*</font></label>
                                                      <select class="form-control" name="mode_gender" id="mode_gender">
                                                          <option value="">----Select-----</option>
                                                          <option value="Male">Male</option>
                                                          <option value="Female">Female</option>
                                                        </select>
                                                  </div>
                                                </div>
                                                  <div class="col-lg-6">
                                                  <div class="form-group">
                                                      <label>Mobile <font style="color:red">*</font></label>
                                                      <input class="form-control" type="text" name="mode_mob" id="mode_mob" maxlength="10">
                                                  </div>
                                                </div>
                                                <!--2nd Part-->
                                                <!--Full Part Button col 12-->
                                                <div class="col-lg-12">
                                                    <div class="form-group" style="text-align: right;">
                                                        <button type="reset" class="btn btn-default">Reset</button>
                                                        <button type="button" class="btn btn-primary" onclick="show_data_tbl();" name="add_mod_submit" id="add_mod_submit">Submit</button>
                                                    </div>
                                                </div>
                                                <!--Full Part Button col 12-->
                                            </form>
                                        </div>
                                        <div class="panel-footer" style="background:white">
                                          <div class="" id="error_id">

                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <i class="fa fa-search"></i> View Created Student
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <table id="dataTables-example" width="100%" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                  <th>#</th>
                                                  <th>Action</th>
                                                  <th>Name</th>
                                                  <th>Id</th>
                                                  <th>Email/Login-Id</th>
                                                  <th>Password</th>
                                                  <th>Mobile</th>
                                                  <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <tr class="">
                                              <?php
                                                $scl=0;
                                                $get_name=mysqli_query($conn,"SELECT * FROM user_details where user_type='1' order by sl desc");
                                                while($row_name=mysqli_fetch_array($get_name))
                                                {
                                                  $scl++;
                                                  $sl=$row_name['sl'];
                                                  $unique_id=$row_name['unique_id'];
                                                  $stat=$row_name['stat'];

                                                  $get_query=mysqli_query($conn,"SELECT * from login_tbl where u_id='$unique_id' ");
                                                  while($row_query=mysqli_fetch_array($get_query))
                                                  {
                                                    $name=$row_query['full_nm'];
                                                    $email=$row_query['mail_id'];
                                                    $mob=$row_query['mob'];
                                                    $u_id=$row_query['u_id'];
                                                    $pass=base64_decode($row_query['pass']);
                                                
                                                ?>
                                                <td><?php echo $scl; ?></td>
                                                <td>
                                                  <div class="btn-group">
                                                    <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="edit-moderator.php?u_id=<?php echo base64_encode($u_id);?>">Edit</a></li>
                                                        <?php
                                                      //for intro page background
                                                      if($stat=='1')
                                                        {
                                                      ?>
                                                         <li><a href="javascript:void(0);" onclick="deactivate('<?php echo base64_encode(base64_encode(base64_encode($u_id)));?>')">Deactivate</a></li>
                                                      <?php
                                                         }
                                                         else
                                                         {
                                                      ?>
                                                          <li><a href="javascript:void(0);" onclick="activate('<?php echo base64_encode(base64_encode(base64_encode($u_id)));?>');">Activate</a></li>
                                                      <?php # code...
                                                         }
                                                         //end intro page background
                                                      ?>
                                                    </ul>
                                                  </div>
                                                </td>
                                                <td><?php echo $name; ?></td>
                                                <td><?php echo $u_id; ?></td>
                                                <td><?php echo $email; ?></td>
                                                <td><?php echo $pass; ?></td>
                                                <td><?php echo $mob; ?></td>             
                                                <td>
                                                  <?php
                                                  if($stat=='1')
                                                  {
                                                    echo "<span class='label label-success'>ACTIVE</span>";
                                                  }
                                                  else
                                                  {
                                                    echo "<span class='label label-danger'>Deactive</span>";
                                                  }
                                                  ?>
                                                </td>
                                            </tr>
                                            <?php }}
                                            ?>
                            </div>
                            <!-- Main Page Content -->
                        </div>
                      </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Page Content -->
    </div>
    <!-- /#wrapper -->

    <!--JavascriptsLink-->
    <?php include '../link-plugins/javascripts.php';?>
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>
    <!--JavascriptsLink-->
    <script src="add-moderator-js/add-moderator.js"></script>
</body>

</html>
