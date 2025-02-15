<?php
require_once 'topbar.php';
?>
<head>
	<meta charset="UTF-8">
	<!--以IE瀏覽器相容模式來顯示，預設為微軟最新的edge瀏覽器模式來顯示網頁-->
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<!--網頁寬度設定為行動裝置的螢幕寬度且縮放比例為1:1-->
	<meta name="viewport" content="width-device-width, initial-scale-1">
	<title>註冊-汽車筆試模擬測驗</title>
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
header{
	border-bottom:inset;
	font-size:30px;
}
</style>
<header class="header">

</header>
<div class="container">	
	<div class="row">
		<ul class="nav nav-pills nav-justified">	<!--nav-pills:按鈕式導覽頁-->
			<li><a href="login.php">登入</a></li>	<!--active:啟用導覽標籤-->
			<li class="active"><a href="#">註冊</a></li>
		</ul>

	<p style="font-size:62px">註冊</p>
	<p style="font-size:16px">請輸入您的個人資料</p>
	<form method="POST" class="form-horizontal">	<!--form-horizontal:將表單元素水平擺放，可設定網格-->
		<div class="form-group">				
			<label for="userAcct" class="col-sm-4 control-label">帳號</label>
			<div class="col-sm-4">				<!--控制項要設定網格，必須包在div裡面-->
				<input type="text" name="account" class="form-control" id="userAcct"> 
			</div>
		</div>
		<div class="form-group">
			<label for="userPWD" class="col-sm-4 control-label">密碼</label>
			<div class="col-sm-4">
				<input type="password" name="password" class="form-control" id="userPWD">
			</div>
		</div>
		<div class="form-group">
			<label for="userCPWD" class="col-sm-4 control-label">確認密碼</label>
			<div class="col-sm-4">
				<input type="password" name="cpassword" class="form-control" id="userCPWD">
			</div>
		</div>
		<div class="form-group">				
			<label for="userName" class="col-sm-4 control-label">真實姓名</label>
			<div class="col-sm-4">				<!--控制項要設定網格，必須包在div裡面-->
				<input type="text" name="name" class="form-control" id="userName"> 
			</div>
		</div>
		<div class="form-group">				
			<label for="userEmail" class="col-sm-4 control-label">電子郵件</label>
			<div class="col-sm-4">				<!--控制項要設定網格，必須包在div裡面-->
				<input type="email" name="email" class="form-control" id="userEmail"> 
			</div>
		</div>
		<div class="form-group">				
			<label for="userPhone" class="col-sm-4 control-label">行動電話</label>
			<div class="col-sm-4">				<!--控制項要設定網格，必須包在div裡面-->
				<input type="text" name="phone" class="form-control" id="userPhone"> 
			</div>
		</div>
		<!--<div class="form-group">	
				老闆<input type="radio" name="by" value="1">
				求職者<input type="radio" name="by" value="2" checked>
		</div>-->
		<div class="form-group">
			<div class="col-sm-8 col-sm-offset-2">			<!--位移兩個col並佔用10個col-->
				<button type="submit" name="registered" class="btn btn-default btn-lg btn-warning" value="註冊">註冊</button>
			</div>
		</div>
	</form>
</div>
<?php
	require_once "database.php";
	$db_link = @mysqli_connect($hn,$un,$pw,$db);
	if(isset($_POST['registered']) && $_POST['registered'] != null )
	{
		if(empty($_POST['account']) || empty($_POST['password']) || empty($_POST['cpassword'])|| empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']))
		{
			echo "<script>alert('資料未輸入完整')</script>";
		}
		else if($_POST['password'] != $_POST['cpassword'])
		{
			echo "<script>alert('確認密碼錯誤')</script>";
		}
		else
		{
			$sql_select = "SELECT * FROM `signin` where account='".$_POST['account']."'";
			$select_result = mysqli_query($db_link,$sql_select);
			$flag=mysqli_fetch_assoc($select_result);
			
			$sql_select = "SELECT * FROM `signin` where email='".$_POST['email']."'";
			$select_result = mysqli_query($db_link,$sql_select);
			$email_flag=mysqli_fetch_assoc($select_result);
			if($flag == 0 && $email_flag==0)
			{
				$_SESSION['re_account']=$_POST['account'];
				$_SESSION['re_password']=$_POST['password'];
				$_SESSION['re_name']=$_POST['name'];
				$_SESSION['re_email']=$_POST['email'];
				$_SESSION['re_phone']=$_POST['phone'];
				
				$TEMP="";
				for($i=0;$i<4;$i++)
					$TEMP=$TEMP.rand(0,9);
				
				$_SESSION['right_verify']=$TEMP;
				
				$receiver = $_SESSION['re_email'];
				$subject = "汽車筆試模擬測驗-驗證碼";
				$body = "您好，您的驗證碼為:".$_SESSION['right_verify'];
				$sender = "From:helloqooopp@gmail.com";
				mail($receiver, $subject, $body, $sender);
				
				

				//echo $sql_insert;
				echo "<script>alert('請至電子信箱收取驗證碼');window.location.href='verify.php'</script>";
			}
			else if($flag != 0)
			{
				echo "<center><font color='red'>該帳號已被使用</font></center>";
			}
			else if($email_flag != 0)
			{
				echo "<center><font color='red'>該電子郵件已被使用</font></center>";
			}			
		}	
			
	}
	
	
	
	
	if(isset($_POST['update']) && $_POST['update'] !=null )
	{
		//$sql_select = "SELECT * FROM `login` where account='".$_GET['unum']."'";
		//$select_result = mysqli_query($db_link,$sql_select);
		//$flag=mysqli_fetch_assoc($select_result);
		//if($flag == 0)
		//{
			$sql_update = "UPDATE `login` SET `account`='".$_POST['uaccount']."',`pwd`='".
			$_POST['upwd']."',`name`='".$_POST['uname']."' WHERE account='".$_GET['unum']."'";
			mysqli_query($db_link,$sql_update);
			//echo $sql_update;
		//}
		//else
		//{
		//	echo "<center><font color='red'>該帳號已被使用</font></center>";
		//}
	}
	
	if(isset($_GET['dnum'])&& $_GET['dnum'] !=null)
	{	
		$sql_delete = "DELETE FROM `login` WHERE account = '".$_GET['dnum']."'";
		mysqli_query($db_link,$sql_delete);
		//echo $sql_delete;
	}
		



