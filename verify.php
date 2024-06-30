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
		
		<h1 style="font-size:62px">請輸入驗證碼</h1>

		<form method="GET" class="form-horizontal">	<!--form-horizontal:將表單元素水平擺放，可設定網格-->
			<div class="form-group">				
				<label for="userAcct" class="col-sm-4 control-label"></label>
				<div class="col-sm-4">			<!--控制項要設定網格，必須包在div裡面-->
					<input type="text" name="verify" class="form-control" id="userAcct"> 
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-8 col-sm-offset-2">			<!--位移兩個col並佔用10個col-->
					<button type="submit" name="signin" value="確定" class="btn btn-default btn-danger btn-lg">確定</button>
					<button type="submit" name="signin" value="重寄驗證碼"class="btn btn-default btn-lg" >重寄驗證碼</button>
				</div>
			</div>
		</form>
</div>

<?php


//echo $_SESSION['right_verify']."  adsa  ".$_SESSION['re_email'];

if(isset($_GET['signin'])&&$_GET['signin']=="確定")
{
	if($_SESSION['right_verify']==$_GET['verify'])
	{
				$sql_insert="INSERT INTO `signin`(`account`, `password`,`Cpassword`, `name` ,`email`,`phone`) 
				VALUES ('".$_SESSION['re_account']."',
				'".$_SESSION['re_password']."','".$_SESSION['re_password']."',
				'".$_SESSION['re_name']."','".$_SESSION['re_email']."',
				'".$_SESSION['re_phone']."')";

				mysqli_query($db_link,$sql_insert);
				//echo $sql_insert;
				
				$_SESSION['account']=$_SESSION['re_account'];
                $_SESSION['password']=$_SESSION['re_password'];
				echo "<script>alert('註冊成功');window.location.href='main.php'</script>";
				
				unset($_SESSION['re_password']);
				unset($_SESSION['re_name']);
				unset($_SESSION['re_email']);
				unset($_SESSION['re_phone']);
				
	}
	else
		echo "<script>alert('驗證碼錯誤');</script>";
}
if(isset($_GET['signin'])&&$_GET['signin']=="重寄驗證碼")
	{
				$TEMP="";
				for($i=0;$i<4;$i++)
					$TEMP=$TEMP.rand(0,9);
				
				$_SESSION['right_verify']=$TEMP;
				
				$receiver = $_SESSION['re_email'];
				$subject = "汽車筆試模擬測驗-驗證碼";
				$body = "您好，您的驗證碼為:".$_SESSION['right_verify'];
				$sender = "From:helloqooopp@gmail.com";
				mail($receiver, $subject, $body, $sender);
	}


?>