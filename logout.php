<?php
include 'config.php';
session_start();
//workable code (Advance)
setcookie("rememberCookieUname", "session expired", time() + (86400 * 30), "/");
setcookie("rememberCookiePassword", "gf", time() + (86400 * 30), "/");
// remove al the data from the session (auto logoff)
session_unset();
// remove the session itself
session_destroy();

$llg_out = date('d-m-Y h:i:s a', time());

$get = mysqli_query($conn,"SELECT * FROM login_tbl where mail_id='$id1'");
while($row=mysqli_fetch_array($get))
{
	$llg=$row['llg_in'];
}

$query1 = "UPDATE login_tbl SET llg_out='$llg_out' , llg_in_time='$llg' where mail_id='$id1'";
$result1 = mysqli_query($conn,$query1);
header('location:login');
?>
