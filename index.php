<!DOCTYPE HTML>
<html>
<head>
    <title>一路上有你</title>
	<meta charset="UTF-8"><!--字符编码：utf-8国际编码  gb2312中文编码-->		
	<meta name="Keywords" content="关键词">		
	<meta name="Description" content="描述">		
	<link rel="stylesheet" type="text/css" href="./css/index.css"/>
	
	<script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
	<script>
	var _hmt = _hmt || [];
	(function() {
	  var hm = document.createElement("script");
	  hm.src = "https://hm.baidu.com/hm.js?83d67a72130f37be3911a680867f6bd9";
	  var s = document.getElementsByTagName("script")[0]; 
	  s.parentNode.insertBefore(hm, s);
	})();
	</script>
	
	<script type="text/javascript">
	function change(){
		document.cookie = 'islogin=no';
		//$.post("index.php",{islogin:'no'},function(){});
		//location.href='index.php';
		location.reload(true);//刷新页面
	};
	</script>


</head>


<body >

 <!-- 一个存放canvas和img的盒子 -->
    <div align="center" class="father">
        <canvas class="canvas"   id="cas"></canvas>
		<iframe id="iframe" class="canvas_bgp" src="http://www.17sucai.com/preview/66735/2018-04-23/texiao/demo.html"  width="800px" height="500px"></iframe>
    </div>



<div class="txt">

	<div >
	<table>
	<tr>
		<td>
		<div class="pre3">
			<img src="images/1089.png" alt="Baidu" style="margin:0px 40px 0px 400px;"  >
		</div>
		</td>
		<td>
		<div class="phpstyle" align="right">
		<?php 
			header('Content-type:text/html; charset=utf-8');			
			// 开启Session
			session_start();
			// 若已经登录
			if ($_SESSION['islogin'] || $_COOKIE['islogin']=='yes') {
				//首次登录成功后，存入cookie
				if($_SESSION['islogin']){
					setcookie('islogin','yes',time()+60*60*24*7);//设置时效,之后这个cookie失效
					$userName = $_SESSION['username'];
					setcookie('username',$userName,time()+60*60*24*7);
					$_SESSION['islogin'] = 0;
					header('location:index.php');//刷新cookie
				}			
				//输出登录后用户界面
				echo "<label style=\"color:#00FF00;font-size:18px;\">你好! ".$_COOKIE['username'].',欢迎登录!</label>&nbsp;';
				echo "<input type='button' value='注销' class='btn' onclick=\"change()\" onMouseOver=\"this.style.backgroundColor='#8DB6CD'; this.style.color = 'red';\" onMouseOut=\"this.style.backgroundColor='pink'\">&nbsp;";
				if($_COOKIE['username']=='admin')
					echo "<input type='button' value='审核' class='btn' onclick=\"location.href='http://zhangkeai.ml:81/myWeb2/audit_user.php'\" onMouseOver=\"this.style.backgroundColor='#8DB6CD'; this.style.color = 'red';\" onMouseOut=\"this.style.backgroundColor='pink'\">";
				else
					echo "<input type='button' value='修改密码' class='btn' style=\"width:80px\" onclick=\"location.href='http://zhangkeai.ml:81/myWeb2/changepwd.php'\" onMouseOver=\"this.style.backgroundColor='#8DB6CD'; this.style.color = 'red';\" onMouseOut=\"this.style.backgroundColor='pink'\">";
			} else {
				// 若没有登录
				echo "你还没有登录,请先登录...";
				header('location:login.html');
			}

		?>
		</div>
		</td>
	</td>
	</table>
	</div>




<CENTER><FONT face=隶书 color=red size=6>

<MARQUEE direction=up behavior=alternate width=60 height=55>开</MARQUEE><FONT color=green>
<MARQUEE direction=up behavior=alternate width=60 height=60>心</MARQUEE><FONT color=blue>
<MARQUEE direction=up behavior=alternate width=60 height=70>快</MARQUEE><FONT color=violet>
<MARQUEE direction=up behavior=alternate width=60 height=56>乐</MARQUEE><FONT color=skyblue>
<MARQUEE direction=up behavior=alternate width=60 height=59>每</MARQUEE><FONT color=purple >
<MARQUEE direction=up behavior=alternate width=60 height=59>一</MARQUEE><FONT color=yellow >
<MARQUEE direction=up behavior=alternate width=60 height=66>天</MARQUEE></FONT></B></MARQUEE></FONT></FONT></FONT></FONT></FONT></FONT></CENTER></FONT></FONT></FONT></FONT></FONT></FONT>



<form action="http://www.baidu.com/s" target="_blank">
<table ><tr><td>
<input name=tn type=hidden value=baidu>
<a href="http://www.baidu.com"><img src="./images/keai.jpg" alt="Baidu" style="height:40px;float:left;clear:both;margin:0px 10px 7px 10px;border-radius:18px"  ></a>
<input type=text name=word size=70 style="height:35px;width:490px;font-size:21px;background:transparent;border:2px solid #008080;color:#F00078">
<input type="submit" value="搜索" style="height:35px;width:70px;font-size:22px;border:1.8px solid #EE7621;" onMouseOver="this.style.backgroundColor='#8DB6CD'; this.style.color = 'red';" onMouseOut="this.style.backgroundColor='pink'">
</td></tr></table>
</form>


		
	
<div align="center">

<table style="float:center;margin:auto" >
	
	
	<tr >
	<td>&nbsp;</td>
	<td><a href="https://myspace.com/" target="_blank">Myspace</a>&nbsp;&nbsp;&nbsp;</td>
	<td><a href="http://www.veryins.com" target="_blank">Instagram</a>&nbsp;&nbsp;&nbsp;</td>
	<td><a href="https://www.youtube.com" target="_blank">Youtube</a>&nbsp;&nbsp;&nbsp;</td>
	<td><a href="https://www.google.com" target="_blank" class="font_02" style="font-size:30px;color:#FF00FF;">Google</a>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td><a href="https://github.com" target="_blank" class="font_02" style="font-size:30px;color:#FF00FF;">Github</a>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td><a href="https://dribbble.com/" target="_blank">Dribbble</a>&nbsp;&nbsp;&nbsp;</td>
	<td><a href="http://mysunshine.ga" target="_blank">myBlog</a>&nbsp;&nbsp;&nbsp;</td>
	<td><a href="https://www.youku.com/" target="_blank">优酷</a></td>
	</tr>
	<tr>  </tr><tr>  </tr><tr>  </tr><tr>  </tr><tr>  </tr><tr>  </tr><tr>  </tr><tr>  </tr>
	<tr>
	<td>&nbsp;</td>
	<td><a href="https://zh.wikipedia.org" target="_blank">Wikipeida</a></td>
	<td><a href="https://www.facebook.com" target="_blank">Facebook</a></td>
	<td><a href="https://twitter.com" target="_blank">Twitter</a></td>
	<td><a href="https://stackoverflow.com/" target="_blank">Stackoverflow</a></td>
	<td><a href="https://www.bilibili.com/" target="_blank">Bilibili</a>
	<td><a href="https://www.linkedin.com" target="_blank">Linkedin</a></td>
	<td><a href="https://www.12306.cn" target="_blank">12306</a></td>
	<td><a href="https://www.iqiyi.com/" target="_blank">爱奇艺</a></td>
	</tr>
	<tr>  </tr><tr>  </tr><tr>  </tr><tr>  </tr><tr>  </tr><tr>  </tr><tr>  </tr><tr>  </tr>
	<tr>
	<td>&nbsp;</td>
	<td><a href="https://www.amazon.cn/" target="_blank">亚马逊</a></td>
	<td><a href="https://www.taobao.com" target="_blank">淘宝</a></td>
	<td><a href="https://www.jd.com" target="_blank">京东</a></td>
	<td><a href="https://www.58.com" target="_blank">58同城</a></td>
	<td><a href="http://www.ctrip.com/" target="_blank">携程</a></td>
	<td><a href="https://www.qunar.com/" target="_blank">去哪儿</a>
	<td><a href="https://www.bwh8.net/" target="_blank">bandwagon</a></td>
	<td><a href="https://www.toutiao.com/" target="_blank">头条</a></td>
	</tr>
</table>
</div>
	
	<div align="center" class="pre3">
		<img src="images/1278.png" alt="Baidu" style="width:400px"  >
	</div>

	<div align="center">
		<a href="http://zhangkeai.ml/xiaokeai01/jianmiandaojishi.html" target="_blank" class="font_01" style="font-size:30px;color:#FF00FF;">见面倒计时</a><br /><br />
	</div>
	
	<div align="center">
	<a href="http://zhangkeai.ml/xiaokeai01/lovedaysTheme2.html" target="_blank">相识</a>&nbsp;&nbsp;&nbsp;
	<a href="http://zhangkeai.ml/xiaokeai01/ourlovestory.html" target="_blank">相知</a>&nbsp;&nbsp;&nbsp;
	<a href="http://zhangkeai.ml/xiaokeai01/lovedaysTheme1.html" target="_blank">相爱</a>&nbsp;&nbsp;&nbsp;
	<a href="http://zhangkeai.ml/xiaokeai02/mylove.html" target="_blank">My love</a>&nbsp;&nbsp;&nbsp;
	<a href="http://zhangkeai.ml/xiaokeai02/ZuiBen/index1.html" target="_blank">啊啊啊</a>&nbsp;&nbsp;&nbsp;
	<a href="http://zhangkeai.ml/xiaokeai02/clock.html" target="_blank">My clock</a><br /><br />
	</div>
	

	
	<div align="center">
	<a href="http://zhangkeai.ml/xiaokeai01/heihei/index.html" target="_blank">嘿嘿嘿</a>&nbsp;&nbsp;&nbsp;
	<a href="http://zhangkeai.ml/xiaokeai02/200days/index.html" target="_blank">遇见</a>&nbsp;&nbsp;&nbsp;
	<a href="http://zhangkeai.ml/xiaokeai01/love300dayscountdown.html" target="_blank">恋爱300天倒计时</a>&nbsp;&nbsp;&nbsp;
	<a href="http://zhangkeai.ml/xiaokeai01/loveONEYEARcountdown.html" target="_blank">恋爱一周年倒计时</a><br />
	</div>
</div>


</body>
</html>
