<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改密码</title>
    <link rel="stylesheet" type="text/css" href="./css/login.css"/>
</head>
 
<body>
<div id="login_frame">
	<form action="" method="POST" enctype="multipart/form-data"> 
		<br>
		<p><label class="label_input">注册邮箱</label><input type="text" name="userEmail" class="text_field" placeholder="必须填写邮箱"/></p>
        <p><label class="label_input">旧密码</label><input type="password" name="oldpassword" class="text_field" placeholder="必须填写旧密码"/></p>
		<p><label class="label_input">新密码</label><input type="password" name="newpassword" class="text_field" placeholder="填写新密码"/></p>
		<p><label class="label_input">确认密码</label><input type="password" name="confirmPassword" class="text_field" placeholder="确认新密码"/></p>
		<div id="login_control">
            <input type="submit" id="btn_login" style="cursor: pointer" value="提交"/>
        </div>
	</form>
	<p><?php 
	include_once("data_process/database.php"); 
	$link=getConnect();
	//判断邮箱是否为空
	$userEmail = $_POST['userEmail']; 
	$oldpassword = $_POST['oldpassword']; 
	$newpassword = $_POST['newpassword']; 
	$confirmPassword = $_POST['confirmPassword']; 
	if($userEmail!="" || $oldpassword!="" || $newpassword!="" ||$confirmPassword!=""){
		if ($userEmail=='') {
			header('refresh:2; url=changepwd.php');	
			exit("邮箱不能为空！");
		}  
		if ($newpassword=='') {
			header('refresh:2; url=changepwd.php');	
			exit("新密码不能为空！"); 
		} 
		// 判断新密码与确认密码是否相同 
		if ($newpassword != $confirmPassword) { 
			header('refresh:2; url=changepwd.php');
			exit("输入的新密码与确认密码不相等！");
		} 
		// 判断用户信息是否正确 
		$userinfoSQL = "select * from userData where userEmail = '$userEmail' and passWord = '$oldpassword'"; 
		$resultSet = mysql_query($userinfoSQL); 
		if (mysql_num_rows($resultSet) == 0) { 
			header('refresh:2; url=changepwd.php');
			exit("填写的注册邮箱或旧密码不正确！");		
		}else{
			$userSQL = "update userData set passWord = '$newpassword' where userEmail = '$userEmail'"; 
			mysql_query($userSQL); 
			echo "修改密码成功";
			//写入日志
			shell_exec("echo -n The user changed the password through $userEmail at' ' >> /home/mylog.txt");
			shell_exec(" date '+%Y-%m-%d %H:%M:%S'>> /home/mylog.txt");
			header('refresh:4; url=login.html');
		}
	} 
	//关闭数据库连接
	closeConnect($link);
	?></p>
</div>

</body>
</html>