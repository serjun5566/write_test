<?php
	require_once 'topbar.php';
	require_once "database.php";
	$db_link = @mysqli_connect($hn,$un,$pw,$db);
?>

<head>
	<meta charset="UTF-8">
	<!--以IE瀏覽器相容模式來顯示，預設為微軟最新的edge瀏覽器模式來顯示網頁-->
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<!--網頁寬度設定為行動裝置的螢幕寬度且縮放比例為1:1-->
	<meta name="viewport" content="width-device-width, initial-scale-1">
	<title>立即登入-汽車筆試模擬測驗</title>
	<!--Bookstrap 核心 css 檔案-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!--Bookstrap 佈景主題 css 檔案-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
	<!--jquery 的核心檔案-->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<!--Bootstrap 核心 js 檔案-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
div.container{
	position:relative;
	text-align:center;
	padding:10px;
}
table{
	border:double 5px;
	background:lightyellow;
}
header{
	border-bottom:inset;
	font-size:30px;
}

.line {
	margin: 0 auto;
	width:410px;
	height:1px; 
	border-top: solid #ACC0D8 1px;	
}

</style>

<div class="container">	
		
		<h1 style="font-size:62px">修改密碼</h1>

		<form method="POST" class="form-horizontal">	<!--form-horizontal:將表單元素水平擺放，可設定網格-->
			<div class="form-group">				
				<label for="userAcct" class="col-sm-4 control-label">變更後密碼:</label>
				<div class="col-sm-4">			<!--控制項要設定網格，必須包在div裡面-->
				 <input type="password" name="up_password" class="form-control" id="userAcct"> 
				</div>
			</div>
			<div class="form-group">				
				<label for="userAcct" class="col-sm-4 control-label">確認密碼:</label>
				<div class="col-sm-4">			<!--控制項要設定網格，必須包在div裡面-->
				 <input type="password" name="c_up_password" class="form-control" id="userAcct"> 
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-8 col-sm-offset-2">			<!--位移兩個col並佔用10個col-->
					<button type="submit" name="signin" value="確定" class="btn btn-default btn-danger btn-lg">確定</button>
				</div>
			</div>
		
</div>
<?php
if(isset($_SESSION['right_forget'])&& (isset($_GET['right_forget']) && $_SESSION['right_forget']==$_GET['right_forget']) )
	{
		//echo  $_POST['up_password']."  ".$_POST['c_up_password'];
		if(isset($_POST['up_password'])&&!empty($_POST['up_password'])&&$_POST['up_password']==$_POST['c_up_password'])
		{
			$sql_select = "UPDATE `signin` SET `password`='".$_POST['up_password']."' where email='".$_SESSION['up_email']."'";
			$select_result = mysqli_query($db_link,$sql_select);
			echo "<script>alert('更新成功');</script>";
			
			
			unset($_SESSION['up_email']);
			unset($_SESSION['right_forget']);

		}
		if(isset($_POST['up_password'])&&!empty($_POST['up_password'])&&$_POST['up_password']!=$_POST['c_up_password'])
		{
			echo "<script>alert('確認密碼不相符')</script>";
		}
		if(isset($_POST['up_password'])&&empty($_POST['up_password'])) 
		echo "<script>alert('欄位不可空白')</script>";
	
	
	}
else
	echo "<script>alert('請勿進入');window.location.href='main.php'</script>";

echo '</form>';
?>