<?php
include 'connect-db.php';
$ck=0;
$name_u = $stat_u = $lvl_u = "";
date_default_timezone_set("Asia/Kolkata");

if(isset($_COOKIE["rememberCookieUname"]))
{
	$rememberCookieUname = $_COOKIE["rememberCookieUname"];
	$rememberCookiePassword = $_COOKIE["rememberCookiePassword"];

	//session_start();

	if ($rememberCookiePassword != "" && $rememberCookieUname != "")
	{
		$query = "SELECT * FROM login_tbl where mail_id='".$rememberCookieUname."' and stat=1";
		$result = mysqli_query($conn,$query);
		if ($row = mysqli_fetch_array($result))
		{
			if ($row["pass"] == $rememberCookiePassword)
			{
				$ck=1;
				$_SESSION["pass"] = $rememberCookiePassword;
				$_SESSION["id"] =  $rememberCookieUname;
			}
		}
	}
}

if(isset($_SESSION["id"]))
{
	$id1=$_SESSION["id"];
	$pass1=$_SESSION["pass"];

	$get_ck = mysqli_query($conn,"SELECT * FROM login_tbl where mail_id='$id1' and pass='$pass1' and stat=1");
  while($row_ck = mysqli_fetch_array($get_ck))
	{
		$ck=1;
		$name_u=$row_ck['full_nm'];
		$stat_u=$row_ck['stat'];
		$lvl_u=$row_ck['lvl'];
		$dppic_u=$row_ck['dp_pic'];
	}
}
?>
