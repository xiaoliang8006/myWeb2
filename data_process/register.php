<?php 
header("Content-type:text/html;charset=utf-8");	//定义编码和页面
include_once("database.php"); 
$link=getConnect();
if (empty($_POST)) { 
	header('refresh:1; url=../register.html');
	exit("您提交的表单数据超过post_max_size! <br>"); 
} 
//判断用户名是否为空
$userName = $_POST['userName']; 
if ($userName=='') {
	header('refresh:1; url=../register.html');	
	exit("用户名不能为空！"); 
} 
// 判断输入密码是否为空 
$password = $_POST['password']; 
if ($password=='') {
	header('refresh:1; url=../register.html');	
	exit("密码不能为空！"); 
} 
// 判断输入密码与确认密码是否相同 
$confirmPassword = $_POST['confirmPassword']; 
if ($password != $confirmPassword) { 
	header('refresh:1; url=../register.html');
	exit("输入的密码与确认密码不相等！");
} 
$sex = $_POST['sex']; //获取性别
if ($sex=='') {
	header('refresh:1; url=../register.html');	
	exit("性别不能为空！"); 
} 
$userEmail = $_POST['userEmail']; //获取邮箱
if ($userEmail=='') {
	header('refresh:1; url=../register.html');	
	exit("邮箱不能为空！"); 
} 

// 判断用户名是否重复 
$userNameSQL = "select * from userData where userName = '$userName'"; 
$resultSet = mysql_query($userNameSQL); 
if (mysql_num_rows($resultSet) > 0) { 
	header('refresh:1; url=../register.html');
	exit("用户名已被占用，请更换其他用户名！"); 
} 
// 判断邮箱是否重复 
$userNameSQL = "select * from userData where userEmail = '$userEmail'"; 
$resultSet = mysql_query($userNameSQL); 
if (mysql_num_rows($resultSet) > 0) { 
	header('refresh:1; url=../register.html');
	exit("此邮箱已注册，请更换其他邮箱！"); 
} 
// 获取行数
$userNameSQL2 = "select * from userData"; 
$resultSet2 = mysql_query($userNameSQL2); 
$num=mysql_num_rows($resultSet2);
$registerSQL = "insert into userData values($num,'$userName', '$password','$sex','$userEmail','no')"; 
mysql_query($registerSQL);
echo "注册完成！<br>";
echo "您注册的用户名为：" . $userName; 
//写入日志
shell_exec("echo -n $userName registered at' ' >> /home/mylog.txt");
shell_exec(" date '+%Y-%m-%d %H:%M:%S'>> /home/mylog.txt");
echo "<br>请等待管理员审核，稍后再尝试登录...<br>";
shell_exec('python email_admin.py '.$userName);
//关闭数据库连接
closeConnect($link);
?>