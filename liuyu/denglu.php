<?php
session_start();
	include("conn.php");
	
	if(isset($_POST["submit"])){
	$name=$_POST["name"];
	$pwd=$_POST["pwd"];
	$ncode=$_POST["ncode"];
	$yanzheng=$_SESSION["authcode"];
		if($name && $pwd){
			if($ncode==$yanzheng){
			$sql="select uid from user where uname='$name' and upwd='$pwd'";
			$zhixing=mysql_query($sql);
			//$hang=mysql_num_rows($zhixing);
			$hang=mysql_fetch_row($zhixing);
			if($hang){
				$_SESSION["uname"]=$name;
				$_SESSION["uid"]=$hang[0];
				echo "<script>alert('登录成功');window.location.href='liuyan.php'</script>";
			}else{
				echo "<script>alert('没有找到您的信息，请先注册');window.location.href='zhuce.php'</script>";
			}
			}else{
				echo "<script>alert('验证码不对');window.location.href='denglu.php';</script>";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
		<style type="text/css">
			.zhu{width: 100%;margin: 0 auto;}
			header{width: 100%; float: left; height:300px ;border: 1px solid black; background-image: url(img/tou.png);background-size: cover;}
			nav{width: 100%; height: 40px;float: left; background: url(img/nav2.png) no-repeat;background-size: cover;  border: 1px solid black; margin-top: 10px;border: 1px solid black;}
			.ar1{width: 25%;height: 600px;float: left;border: 1px solid black;background: url(img/cei.png)no-repeat; background-size: cover;}
			.ar2{width: 74%;height: 600px;float: right;border: 1px solid black;background: url(img/denglu.png) no-repeat;background-size: cover;}
			footer{width: 100%;height: 100px;float: left;background-color: lightgrey;margin-top: 10px;border: 1px solid black;background: url(img/foot.png) no-repeat; background-size: cover;}
			nav li{float: left; list-style-type: none; font-size: 20px;line-height: 40px;  width: 260px;text-align: center;color: azure;}
			nav ul{padding: 0px; margin: 0px;}
			nav ul li a{text-decoration: none;color: black;}
			.xinwen{width: 100%; height: 20px;float: left;background:url(img/xinwen.png) no-repeat; background-size: cover;}
			.arv1{width: 90%; height: 150px;float left; margin-left: 15px; margin-top: 10px;border: 1px solid black; }
			.arv2{width: 90%; height:250px;float: left; margin-left:15px ; margin-top: 20px;border: 1px solid black;  }
			.fp1{float: left;padding: 0; margin: 0; margin-left: 10px;color: azure; line-height: 100px;}
			.fp2{float: right;padding: 0; margin: 0;color: azure; line-height: 100px;}
			.arv1 ul{padding: 0px;margin: 0px;margin-left: 15px;}
			.arv1 ul li{font-size: 10px;line-height:35px;list-style-type: none;}
			.arv2 ul{list-style-type: none; padding: 0px;margin: 0px;margin-left: 15px;}
			.arv2 ul li{font-size: 10px;line-height: 28px;list-style-type: none;}
			.ar2 table td{height: 50px;};
		</style>
	</head>
	<body>
		<div class="zhu">
			<header></header>
			<nav>
				<ul>
					<li><a href="index.php">>>首页</a></li>
					<li><a href="denglu.php">>>登录</a></li>
					<li><a href="zhuce.php">>>注册</a></li>
					<li><a href="liuyan.php">>>留言</a></li>
					<li><a href="xinxi.php">>>留言信息</a></li>
				</ul>
			</nav>
			<div class="xinwen">
				<marquee>
					<span>最新热点:&nbsp;&nbsp;从2009月份开始至2010年年底，宇哥公司将全面启动全国性的品牌宣传推广活动。</span>
				</marquee>
			</div>
			<article class="ar1">
				<div class="arv1">
					<ul>
						<li style="font-size: 20px; border-bottom: 2px solid red; height: 35px;">联系我们</li>
						<li>联系我们</li>
						<li>下载链接</li>
						<li style="color: red;">投诉意见</li>
					</ul>
				</div>
				<div class="arv2">
					<ul>
						<li style="font-size: 20px; border-bottom: 2px solid lightgrey;height: 35px;">联系我们</li>
						<li>宇哥大显通讯有限公司</li>
						<li>电话：0411-872777</li>
						<li>地址：大连市双D港辽河东</li>
						<li>路2号</li>
						<li>服务热线：<span style="color: red;">0411-8732777</span></li>
						<li>E-mail：sales@daxiante</li>
						<li>lecom.com</li>
						
					</ul>
				</div>
			</article>
			<article class="ar2">
				
				<form method="post" action="denglu.php">
					<table align="center" style="text-align: right; margin-top:200px ;">
						<tr>
							<td>用户名：</td>
							<td><input type="text" name="name"></td>
						</tr>
						<tr>
							<td>密码：</td>
							<td><input type="password" name="pwd"></td>
						</tr>
						<tr>
							<tr>
					<td>验证码:</td>
					<td><input type="text" name="ncode"/></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<img src="code.php" onclick="this.src='code.php?nocache='+Math.random()" title="点击换一张" alt="点击换一张" />
					</td>
					
				</tr>
							<td></td>
							<td>
								<input type="submit" name="submit" value="登录">
							</td>
							
						</tr>
					</table>
				</form>
			</article>
			<footer>
				<p class="fp1">
					宇哥大显通讯技术股份有限公司&nbsp;&nbsp;邮箱:518000
				</p>
				<p class="fp2">
					加入收藏&nbsp;|&nbsp;联系我们&nbsp;|&nbsp;版权信息
				</p>
			</footer>
		</div>
	</body>
</html>
