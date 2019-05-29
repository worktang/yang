<?php
	include('conn.php');
	session_start();
	$tid='';
	if(isset($_GET["tid"])){
		$tid=$_GET["tid"];
		$_SESSION["tid"]=$tid;
	}
	if(isset($_POST['submit'])){
			$tid=$_SESSION["tid"];
			$biaoti=$_POST['biaoti'];
			$liuyan=$_POST['liuyan'];
			
			$sql="update xingxi set biaoti='$biaoti',xxingxi='$liuyan' where tid='$tid' ";
			$zhisql=mysql_query($sql);

			if($zhisql){
				echo "<script>alert('修改成功');window.location.href='xinxi.php';</script>";
			}
			else{
				echo "<script>alert('修改失败');";
				die("修改失败".mysql_error());
			}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		<div style=" width: 350px; height: 200px; margin: 0px auto; ">
			<form method="post" action="xiugai.php">
					<table height="300px" style="font-size: 20px;  float: right;margin-top: 226px;margin-right: 60px; " >
						<tr>
							<td>标题：</td>
							<td><input type="text" name="biaoti" /></td>
						</tr>
						<tr>
							<td>留言内容：</td>
							<td><input type="text" name="liuyan"/></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="submit" value="确认修改"/></td>
						</tr>
					</table>
			</form>
		</div>
	</body>
</html>
