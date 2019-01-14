<?php 
	include_once("database.php");
	//$link=getConnect();
	$dbms = "mysql";                                  // 数据库的类型
	$dbName ="TEST";                                //使用的数据库名称
	$user = "root";                                   //使用的数据库用户名
	$pwd = "7655289lfh";                                    //使用的数据库密码
	$host = "localhost";  
	$dsn  = "$dbms:host=$host;dbname=$dbName";			//使用的主机名称
	$link=new PDO($dsn,$user,$pwd);//初始化一个PDO对象，就是创建了数据库连接对象$pdo
	$query = "select * from userData";  
	$res = $link->query($query); 
	$res->execute(); 
	$result=$res->fetchAll(PDO::FETCH_ASSOC);
	//$result=$resultLogin->fetchAll();
	echo $result[0]['userName'];
	echo $result[1]['passWord'];
	echo $result[2]['sex'];
	echo $result[3]['userEmail'];
	echo $result[4]['permission'];
	//closeConnect($link); 
?>
<table border="1" width="500">
	<tr>
		<td height="22" align="center" valign="middle">用户名</td>
		<td height="22" align="center" valign="middle">密码</td>
		<td height="22" align="center" valign="middle">性别</td>
		<td height="22" align="center" valign="middle">邮箱</td>
		<td height="22" align="center" valign="middle">权限</td>
	</tr>
	<?php for ($i=0;$i<count($result);$i++){  //循环读取二维数组中的数据。?>
	<tr>
		<td height="22" align="center" valign="middle"><?php echo $result[$i]['userName'];?></td>
		<td height="22" align="center" valign="middle"><?php echo $result[$i]['passWord'];?></td>
		<td height="22" align="center" valign="middle"><?php echo $result[$i]['sex'];?></td>
		<td height="22" align="center" valign="middle"><?php echo $result[$i]['userEmail'];?></td>
		<td height="22" align="center" valign="middle"><?php echo $result[$i]['permission'];?></td>
	</tr>
	<?php } ?>
</table>