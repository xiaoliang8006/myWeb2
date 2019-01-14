<?php
//实现数据库连接与关闭的函数 
//第一种连接方式
function getConnect() {
	$host = "localhost"; 
	$database = "TEST"; 
	$userName = "root"; 
	$passWord = "7655289lfh";  
	$link = mysql_connect($host, $userName, $passWord); 
	mysql_select_db($database,$link); 
	mysql_query("set names gbk"); 
	return $link;
} 
function closeConnect($x) { 
	mysql_close($x); 
} 

//****************************************************************//
//第二种连接方式
function getConnect2() {
	$dbms = "mysql";   // 数据库的类型
	$dbName ="TEST";   //使用的数据库名称
	$user = "root";    //使用的数据库用户名
	$pwd = "7655289lfh";  //使用的数据库密码
	$host = "localhost";  //使用的主机名称
	$dsn  = "$dbms:host=$host;dbname=$dbName";	
	$link=new PDO($dsn,$user,$pwd);//初始化一个PDO对象，就是创建了数据库连接对象$pdo
	return $link;
} 
function closeConnect2($x) { 
	$x = null; //关闭数据库连接
} 

?>
