<?php
include("conn.php");
	session_start();
	if(!isset($_SESSION['uname'])){
		echo "<script>alert('你还没有登录,请先登录');window.location.href='denglu.php';</script>";
	}else{
		$username=$_SESSION['uname'];
	}
	
	
	
$uid=$_SESSION['uid'];
include("conn.php");
$sql3="select * from user where uid='$uid'";
$zhisql3=mysql_query($sql3);
$rowsql3=mysql_fetch_array($zhisql3);
if(isset($_GET["page"])){
			$page=$_GET["page"];
		}else{
			$page=1;
		}
		
		$pagesize=5;//每页显示的数量
		
		$startsize=($page-1)*$pagesize;//从哪条数据开始
		$sql="select * from xingxi where uid='$uid' limit {$startsize},{$pagesize} ";
		$sresult=mysql_query($sql);
		$sql2="select * from xingxi  where uid='$uid'";
		$re2=mysql_query($sql2);
		$rowscount=mysql_num_rows($re2);//获取总记录
		$pagecounts=ceil($rowscount/$pagesize);//计算总共有多少页
		
		if(isset($_POST['submit'])){
			$name=$_POST['uname'];
			$pwd=$_POST['upwd'];
			$sex=$_POST['sex'];
			$num=$_POST['unum'];
			$aihao=$_POST['aihao'];
			$uid=$_POST['id'];
			$sql5="update user set uname='$name',upwd=$pwd,sex='$sex',unum=$num,aihao='$aihao' where uid='$uid'  ";
			$zhisql5=mysql_query($sql5);
			if($zhisql5){
			echo "<script>alert('修改成功,请按F5再次刷新页面');</script>";}
		}
		$tid='';
		if(isset($_GET['tid'])){
			$tid=$_GET['tid'];
			$sql6="delete from xingxi where tid='$tid'";
			$zhisql6=mysql_query($sql6);
			if($zhisql6){
				echo "<script>alter('删除成功');window.location.href='xinxi.php';</script>";
					
			}else{
				die("修改失败".mysql_error());
			}
		}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
	  	<style type="text/css">
			.zhu{width: 100%; margin: 0 auto;}
			header{width: 100%; float: left; height:300px;border: 1px solid black; background-image: url(img/tou.png);background-size: cover;}
			nav{width: 100%; height: 40px;border: solid 1px black;float: left; background: url(img/nav2.png) no-repeat;background-size: cover;  border: 1px solid black; margin-top: 10px;}
			.ar1{width: 25%;height: 600px;border: solid 1px black;float: left; background: url(img/cei.png)no-repeat; background-size: cover;}
			.ar2{width: 74%;height: 600px;border: solid 1px black;float: right; background: url(img/xingxi.jpg) no-repeat;background-size: cover;}
			footer{width: 100%;height: 100px;border: solid 1px black;float: left;background: url(img/foot.png) no-repeat; background-size: cover;margin-top: 10px;}
			nav li{float: left; list-style-type: none; font-size: 20px;line-height: 40px;  width: 260px; text-align: center;color: azure;}
			nav ul{padding: 0px; margin: 0px;}
			nav ul li a{text-decoration: none;color: azure;color: black;}
			.xinwen{width: 100%; height: 20px;float: left;background:url(img/xinwen.png) no-repeat; background-size: cover;}
			.arv1{width: 90%; height: 150px;float left; margin-left: 15px; margin-top: 10px; border: solid 1px black;}
			.arv2{width: 90%; height:250px;float: left; margin-left:15px ; margin-top: 20px; border: solid 1px black; }
			.fp1{float: left;padding: 0; margin: 0; margin-left: 10px; line-height: 100px;color: azure;font-weight: 700;}
			.fp2{float: right;padding: 0; margin: 0; line-height: 100px;color: azure;font-weight: 700;}
			.arv1 ul{padding: 0px;margin: 0px;margin-left: 15px;}
			.arv1 ul li{font-size: 10px;line-height:35px;list-style-type: none;}
			.arv2 ul{list-style-type: none; padding: 0px;margin: 0px;margin-left: 15px;}
			.arv2 ul li{font-size: 10px;line-height: 28px;list-style-type: none;}
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
				
					<form>
			<table  width="550px" height="300px"  style="font-size: 20px; float: left; margin-top: 220px;margin-left: 20px; ">
				<tr>
						<th>ID</th>
						<th>标题</th>
						<th>留言内容</th>
						<th>留言时间</th>
						<th>删改</th>
					</tr>
					<?php
						while($row=mysql_fetch_array($sresult)){
							echo "<tr align=center>";
							echo "<td>".$row["uid"]."</td>";
							echo "<td>".$row["biaoti"]."</td>";
							echo "<td>".$row["xxingxi"]."</td>";
							echo "<td>".$row["time"]."</td>";
							echo "<td><a href='xiugai.php?tid=".$row['tid']."'>修改</a>&nbsp;&nbsp;<a href='xinxi.php?tid=".$row['tid']."'>删除</a>";
							echo "</tr>";
						}	
					?>
					<tr align="center">
						<td colspan="6">
							<?php
							if($page==1){
								echo "首页&nabla;&nabla;";
							}else{
								echo "<a href=xinxi.php?page=1>首页&nbsp;&nbsp;&nbsp</a>";
							}
							
							if($page==1){
								echo "上一页&nabla;&nabla;";
							}else{
								echo "<a href=xinxi.php?page=".($page-1).">上一页&nbsp;&nbsp;</a>";
							}
							
							if($page==$pagecounts){
								echo "下一页&nabla;&nabla;";
							}else{
								echo "<a href=xinxi.php?page=".($page+1).">下一页&nbsp;&nbsp;</a>";
							}
							
							if($page==$pagecounts){
								echo "末页&nabla;&nabla;";
							}else{
								echo "<a href=xinxi.php?page=".$pagecounts.">末页&nbsp;&nbsp;</a>";
							}
						?>
						</td>
					</tr>
			</table>
		</form>
				
				
				<form method="post" action="xinxi.php">
					<table height="300px" style="font-size: 20px;  float: right;margin-top: 226px;margin-right: 60px; " align="center">
						<tr>
							<td>用户名：</td>
							<td><input type="hidden" name="id" value="<?php echo $rowsql3['uid']; ?>" /><input type="text" name="uname" value="<?php echo $rowsql3['uname'];  ?>"/></td>
						</tr>
						<tr>
							<td>密码：</td>
							<td><input type="text" name="upwd" value="<?php echo $rowsql3['upwd'];  ?>"/></td>
						</tr>
						<tr>
							<td>性别：</td>
							<td><input type="text" name="sex" value="<?php echo $rowsql3['sex'];  ?>"/></td>
						</tr>
						<tr>
							<td>年龄：</td>
							<td><input type="text" name="unum" value="<?php echo $rowsql3['unum'];  ?>"/></td>
						</tr>
						<tr>
							<td>兴趣爱好：</td>
							<td><input type="text" name="aihao" value="<?php echo $rowsql3['aihao'];  ?>"/></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="submit" value="修改"/></td>
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
