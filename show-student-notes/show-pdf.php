<?php 
include "../config.php";
if($ck=='1')
{
    header("Location: ../dashboard/index.php");
}
$file=$_REQUEST['file'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<head>

</head>
<body>
<object data="../files/<?php echo $file;?>" type="application/pdf" width="100%" height="100%"></object>
</body>
</html>