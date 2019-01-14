<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>找回账户</title>
</head>
<body><p>
<?php 
include_once("database.php"); 
session_start();//开启会话
//连接数据库
$link=getConnect2();
//产生随机数
function GetRandStr($length){
	$str='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	$len=strlen($str)-1;
	$randstr='';
	for($i=0;$i<$length;$i++){
	$num=mt_rand(0,$len);
	$randstr .= $str[$num];
	}
	return $randstr;
}

//获得邮箱
$userEmail = $_POST['userEmail']; 
//获得验证码
$authCode = $_POST['authCode'];
//系统自动生产验证码
$number=GetRandStr(6);

// 判断邮箱是否存在 
$userEmailSQL = "select * from userData where userEmail = '$userEmail'"; 
$res = $link->query($userEmailSQL); 
$res->execute(); 
$result_email=$res->fetchAll(PDO::FETCH_ASSOC);
if(is_string($userEmail)){
	$_SESSION['number']=$number;//把验证码存到session内
	$_SESSION['username'] = $result_email[0]['userName'];
	$_SESSION['password'] = $result_email[0]['passWord'];
}
if(count($result_email) > 0) { 
	shell_exec('python ./email_forgetinfo.py '.$userEmail.' '.$number);
	//shell_exec('echo '.$userEmail.' '.$number.' '.$userName.' >> /home/mylog.txt');
}
if($authCode==$_SESSION['number']){
	$a=$_SESSION['username'];
	$b=$_SESSION['password'];
	echo "您的用户名为：$a <br>";
	echo "您的密码为：$b ";
	//写入日志
	$userName=$_SESSION['username'];
	shell_exec("echo -n $userName got his account back at' ' >> /home/mylog.txt");
	shell_exec(" date '+%Y-%m-%d %H:%M:%S'>> /home/mylog.txt");
}else{
	echo "您的验证码不正确！";
	header('refresh:1; url=../forgetinfo.html');
}

//关闭数据库连接
closeConnect2($link);
?>
</p></body>
</html>