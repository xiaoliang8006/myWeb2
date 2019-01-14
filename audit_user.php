<?php
session_start();
//找session
if($_SESSION['username']!='admin')
    header("Location:login.html");//如果不是管理员，不能看此页面
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>审核页面</title>
</head>
<?php 
	include_once("data_process/database.php");
	$link=getConnect2();
	$query = "select * from userData";  
	$res = $link->query($query); 
	$res->execute(); 
	$result=$res->fetchAll(PDO::FETCH_ASSOC);
	closeConnect2($link); //关闭数据库连接
?>
<body bgcolor="#FFDCB9">
	<h1 align="center">注册审核页面 </h1>
	<table border="1" width="80%" align="center">
	<tr>
		<td height="22" width="50" align="center" valign="middle">ID</td>
		<td height="22" width="150" align="center" valign="middle">用户名</td>
		<td height="22" width="150" align="center" valign="middle">密码</td>
		<td height="22" width="150" align="center" valign="middle">性别</td>
		<td height="22" width="250" align="center" valign="middle">邮箱</td>
		<td height="22" width="150" align="center" valign="middle">权限</td>
		<td height="22" width="150" align="center" valign="middle">审核状态</td>
		<td height="22" width="150" align="center" valign="middle">删除用户</td>
	</tr>

	<?php for ($i=0;$i<count($result);$i++){  //循环读取二维数组中的数据。?>
		<tr>
			<td height="22" width="50" align="center" valign="middle" ><?php echo $result[$i]['Id'];?></td>
			<td height="22" width="150" align="center" valign="middle"><?php echo $result[$i]['userName'];?></td>
			<td height="22" width="150" align="center" valign="middle">
			<?php 
			if($result[$i]['userName']!='system' && $result[$i]['userName']!='admin'){
				echo $result[$i]['passWord'];
			}else{
				echo "*****";
			}
			?> 
			
			</td>			
			<td height="22" width="150" align="center" valign="middle"><?php echo $result[$i]['sex'];?></td>
			<td height="22" width="250" align="center" valign="middle"><?php echo $result[$i]['userEmail'];?></td>
			<td height="22" width="150" align="center" valign="middle"><?php echo $result[$i]['permission'];?></td>
			<td height="22" width="150" align="center" valign="middle">
			<?php 
			if($result[$i]['userName']!='system' && $result[$i]['userName']!='admin'){
				$name=$result[$i]['userName'];
				echo "<input type=\"submit\" onclick=\"change($i)\" id=\"$i\" name=\"$name\" ";
				if($result[$i]['permission']=='yes')
					echo "style=\"color:green;cursor:pointer\" value='已审核!'/>";
				else
					echo "style=\"color:red;cursor:pointer\" value='待审核...'/>";
			}else{
				echo "--";
			}
			?> 
			</td>
			<td height="22" width="150" align="center" valign="middle">
			<?php 
			if($result[$i]['userName']!='system' && $result[$i]['userName']!='admin'){
				echo "<input type=\"submit\" onclick=\"del($i)\" id=\"a$i\" ";
				echo "style=\"color:black;cursor:pointer\" value='删除'/>";
			}else{
				echo "--";
			}
			?> 
			</td>

		</tr>
		<?php  } ?>
	</table>


	<script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
	<script type="text/javascript">
        function change(id){
			id=String(id);
            var v=document.getElementById(id);
            if (v.value=="待审核...") {
                v.value="已审核!";
				v.style="color:green;cursor:pointer"; 
				$.post("data_process/alter.php",{nameval:v.name,flag:'yes'},function(){});
            }else{
                v.value="待审核...";
				v.style="color:red;cursor:pointer";
				$.post("data_process/alter.php",{nameval:v.name,flag:'no'},function(){});
            }
        };
		
		function del(id){
			id=String(id);
			var v0=document.getElementById(id);
			var aid="a"+id;
			var v=document.getElementById(aid);
			if(v.value=="删除"){	
				v.value="已删除!";
				v.style="color:red"; 
				v0.setAttribute("disabled", true);
				v.setAttribute("disabled", true);
				$.post("data_process/alter.php",{nameval:v0.name,flag:'del'},function(){});
			}
        };

	</script>
	
</body>
</html>
