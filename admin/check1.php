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
$testid=$_POST['testid'];//variable ang $Username kag ang $_POST['UserName'] ay value sang textbox nga UserName
$addque=$_POST['addque'];
$ans1=$_POST['ans1'];
$ans2=$_POST['ans2'];
$ans3=$_POST['ans3'];
$ans4=$_POST['ans4'];
$anstrue=$_POST['anstrue'];
//variable ang $Username kag ang $_POST['Password'] ay value sang textbox nga Password
$result=mysql_query("select * from mst_test where test_id='$testid'")or die (mysql_error());//query sang database 
$row=mysql_fetch_array($result);
$testidid=$row['test_id'];
$numque=$row['total_que'];
$rs=mysql_query("select * from mst_question where que_desc='$addque'");
if (mysql_num_rows($rs)>0)
{
	echo "<br><br><br><div class=head1>Question is Already Exists</div>";
	exit;
}
mysql_query("insert into mst_question(test_id,que_desc,ans1,ans2,ans3,ans4,true_ans) values ('$testidid','$addque','$ans1','$ans2','$ans3','$ans4','$anstrue')",$cn) or die(mysql_error());
echo "<p align=center>Subject  <b> \"$addque \"</b> Question Added Successfully</p>";
$submit="";
}
?>
