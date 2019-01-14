<?php 
	//实现登录功能 
	header("Content-type:text/html;charset=utf-8");	//定义编码和页面
	header("Access-Control-Allow-Origin: *");	//跨域问题
	include_once("database.php");
	session_start();	//开启会话

	$link=getConnect();
	//验证用户名密码
	$userName = $_POST['username']; 
	$passWord = $_POST['password']; 
	$loginSQL = "select * from userData where userName='$userName' and passWord='$passWord' and permission='yes'";  

	//shell_exec("echo $password >> /home/mylog.txt");
	$resultLogin = mysql_query($loginSQL); 
	//shell_exec("echo $loginSQL $resultLogin >> /home/mylog.txt");
	if (mysql_num_rows($resultLogin) > 0) {
		echo "登录成功";
		//写入日志
		shell_exec("echo -n $userName logged in at' ' >> /home/mylog.txt");
		if($userName=='admin'){
			shell_exec("echo -n $(date '+%Y-%m-%d %H:%M:%S') >> /home/mylog.txt");
			shell_exec(" echo ' <-----------' >> /home/mylog.txt");
		}else
			shell_exec("echo $(date '+%Y-%m-%d %H:%M:%S') >> /home/mylog.txt");
		$_SESSION['username'] = $userName;
		//$_SESSION['password'] = $passWord;
		$_SESSION['islogin'] = 1;
		
		header('location:../index.php');
	} else {
		echo "登录失败<br>"; 
		$_SESSION['islogin'] = 0;
		echo "用户名或密码错误!<br>";
		echo "系统将跳转到登录界面,请重新填写登录信息!";
		header('refresh:2; url=../login.html');
	} 

	//关闭数据库连接
	closeConnect($link); 
?>
