<?php 
header("Content-type:text/html;charset=utf-8");	//定义编码和页面
include_once("database.php");
//连接数据库
$link=getConnect2();
$userName = $_POST['nameval']; //获取用户名
$flag = $_POST['flag'];

// 修改权限 
if($flag=='no'){
	$idSQL = "update userData set permission='no' where userName=\"$userName\" "; //不允许
	$res = $link->query($idSQL); 
	$res->execute(); 
}
if($flag=='yes'){
	$idSQL = "update userData set permission='yes' where userName=\"$userName\" "; 	//允许
	$res = $link->query($idSQL); 
	$res->execute(); 
	//发邮件啊给用户，提示注册成功！
	$email_newuser = "select * from userData where userName=\"$userName\" ";
	$res = $link->query($email_newuser); 
	$res->execute(); 
	$result_user=$res->fetchAll(PDO::FETCH_ASSOC);
	$userEmail=$result_user[0]['userEmail'];
	shell_exec('python ./email_user.py '.$userEmail);
	//写入日志
	shell_exec("echo -n $userName passed the audit at' ' >> /home/mylog.txt");
	shell_exec(" date '+%Y-%m-%d %H:%M:%S'>> /home/mylog.txt");
}

//删除用户
if($flag=='del'){
	//获取id
	$getname = "select * from userData where userName=\"$userName\" ";
	$res = $link->query($getname);
	$res->execute();
	$result_user=$res->fetchAll(PDO::FETCH_ASSOC);
	$id=$result_user[0]['Id'];
	//删除用户
	$del_user = "delete from userData where Id =$id"; 	
	$res = $link->query($del_user); 
	$res->execute(); 
	//写入日志
	shell_exec("echo -n $userName was deleted at' ' >> /home/mylog.txt");
	shell_exec(" date '+%Y-%m-%d %H:%M:%S'>> /home/mylog.txt");
	//修改后面用户Id
	$query = "select * from userData";  
	$res = $link->query($query); 
	$res->execute(); 
	$result=$res->fetchAll(PDO::FETCH_ASSOC);
	for ($i=$id+1;$i<=count($result);$i++){  
		$changeId = "update userData set Id =$i-1 where Id =$i"; 	//修改Id
		$res = $link->query($changeId); 
		$res->execute(); 
	}
}

//关闭数据库连接
closeConnect2($link); 
?>