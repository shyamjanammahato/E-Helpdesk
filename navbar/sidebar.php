<?php
include "../config.php";
if($ck!='1')
{
    header("Location: ../login/index.php");
}
$get_query=mysqli_query($conn,"SELECT * FROM login_tbl where mail_id='$id1' ");
while($row_query=mysqli_fetch_array($get_query))
{
    $lvl=$row_query['lvl'];
    $u_id=$row_query['u_id'];
}
?>
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="../dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <!-- <li>
                <a href="../messenger/active-user.php"><i class="fa fa-dashboard fa-fw"></i> Messenger</a>
            </li> -->
            <?php
                if($lvl=='0')
                {
            ?>
                <li>
                    <a href="#"><i class="fa fa-cog fa-fw"></i> Manage Accounts<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="../add-moderator/index.php"><i class="fa fa-user-plus fa-fw"></i> Add / Manage Moderator</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            <?php
                }
                if($lvl=='0' || $lvl=='-5')
                {
            ?>
                <li>
                    <a href="#"><i class="fa fa-calendar fa-fw"></i> Academic<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="../add-course/index.php"><i class="fa fa-user-plus fa-fw"></i> Add Course</a>
                        </li>
                        <li>
                            <a href="../add-department/index.php"><i class="fa fa-sitemap fa-fw"></i> Add Department</a>
                        </li>
                        <li>
                            <a href="../add-sem/index.php"><i class="fa fa-sort-numeric-desc fa-fw"></i> Add Semester</a>
                        </li>
                        <li>
                            <a href="../academic-year/index.php"><i class="fa fa-sort-amount-asc fa-fw"></i> Add Batch</a>
                        </li>
                        <li>
                            <a href="../add-subject/index.php"><i class="fa fa-book fa-fw"></i> Add Subject</a>
                        </li>
                        <li>
                            <a href="../manage-subject/index.php"><i class="fa fa-navicon fa-fw"></i> Manage Subject</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            <li>
                <a href="#"><i class="fa fa-user fa-fw"></i> Student<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="../add-student/index.php"><i class="fa fa-user-plus fa-fw"></i> Add Student</a>
                    </li>
                    <li>
                        <a href="../manage-student/index.php"><i class="fa fa-navicon fa-fw"></i> Manage Student</a>
                    </li>
                    <li>
                        <a href="../promote-student/index.php"><i class="fa fa-arrow-circle-up fa-fw"></i> Promote Student</a>
                    </li>
                     <li>
                        <a href="../demote-student/index.php"><i class="fa fa-arrow-circle-down fa-fw"></i> Demote Student</a>
                    </li>
                    <li>
                        <a href="../stud-stat/index.php"><i class="fa fa-info-circle fa-fw"></i> Student Status</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-users fa-fw"></i> Employee / Teacher<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="../add-employee/index.php"><i class="fa fa-user-plus fa-fw"></i> Add</a>
                    </li>
                    <li>
                        <a href="../assign-subject/index.php"><i class="fa fa-book fa-fw"></i> Assign Subject</a>
                    </li>
                    <li>
                        <a href="../manage-employee/index.php"><i class="fa fa-navicon fa-fw"></i> Manage</a>
                    </li>                </ul>
                <!-- /.nav-second-level -->
            </li>
            <?php
            }
                if($lvl=='-10')
                {
            ?>
                <li>
                    <a href="#"><i class="fa fa-camera-retro fa-fw"></i> Notes<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="../add-notes/index.php"><i class="fa fa-navicon fa-fw"></i> Add / Manage</a>
                        </li>
                        <li>
                            <a href="../show-doc/index.php?file_type=<?php echo base64_encode(1);?>"><i class="fa fa-eye fa-fw"></i> Show Documents</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-video-camera fa-fw"></i> Videos<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="../add-utube-link/index.php"><i class="fa fa-youtube-play fa-fw"></i> Add Youtube Link</a>
                        </li>
                        <li>
                            <a href="../show-doc/index.php?file_type=<?php echo base64_encode(2);?>"><i class="fa fa-eye fa-fw"></i> Show Links</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                   <a href="#"><i class="fa fa-bell-o fa-fw"></i> Notice<span class="fa arrow"></span></a>
                   <ul class="nav nav-second-level">
                        <li>
                            <a href="../add-notice-sem-wise/index.php"><i class="fa fa-navicon fa-fw"></i> Sem wise</a>
                        </li>
                        <li>
                            <a href="../add-notice-depart-wise/index.php?type=<?php echo base64_encode(base64_encode(2));?>"><i class="fa fa-eye fa-fw"></i> Department wise</a>
                        </li>
                    </ul>
                </li>
            <?php
            }
                if($lvl=='-15')
                {
            ?>
                <li>
                    <a href="../show-student-notes/index.php"><i class="fa fa-camera-retro fa-fw"></i> Notes</a>
                </li>
                <li>
                    <a href="../show-student-videos/index.php"><i class="fa fa-camera-retro fa-fw"></i> Videos</a>
                </li>
                <li>
                    <a href="../ask-question/index.php"><i class="fa fa-question-circle fa-fw"></i> Ask a Question</a>
                </li>
            <?php
                }
                if($lvl=='0' || $lvl=='-5')
                {
            ?>
                 <li>
                   <a href="../add-notice-depart-wise/index.php?type=<?php echo base64_encode(base64_encode(3));?>"><i class="fa fa-bell-o fa-fw"></i> Add Notice</a>
                </li>
            <?php
                }
            ?>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav> <!-- Top Nav End-->
