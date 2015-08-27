<?php
session_start();
if (!isset($_SESSION['alogin']))
{
	echo "<br><h2>You are not Logged On Please Login to Access this Page</h2>";
	echo "<a href=index.php><h3 align=center>Click Here for Login</h3></a>";
	exit();
}
?>
<link href="../quiz.css" rel="stylesheet" type="text/css">



<?php
include("header.php");
require("../database.php");

if(isset($_POST['submit']))
{
$subid=$_POST['subid'];//variable ang $Username kag ang $_POST['UserName'] ay value sang textbox nga UserName
$testname=$_POST['testname'];
$totque=$_POST['totque'];
//variable ang $Username kag ang $_POST['Password'] ay value sang textbox nga Password
$result=mysql_query("select * from mst_subject where sub_id='$subid'")or die (mysql_error());//query sang database 
$row=mysql_fetch_array($result);
$suid=$row['sub_id'];
$rs=mysql_query("select * from mst_test where test_name='$testname'");
if (mysql_num_rows($rs)>0)
{
	echo "<br><br><br><div class=head1>Test is Already Exists</div>";
	exit;
}
mysql_query("insert into mst_test(sub_id,test_name,total_que) values ('$suid','$testname','$totque')",$cn) or die(mysql_error());
echo "<p align=center>Subject  <b> \"$testname \"</b> Added Successfully.</p>";
$submit="";
}
?>