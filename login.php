<?php
require_once 'topbar.php';

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
<header class="header">
</header>
<div class="container">	
		<ul class="nav nav-pills nav-justified">	<!--nav-pills:按鈕式導覽頁-->
			<li class="active"><a href="#">登入</a></li>	<!--active:啟用導覽標籤-->
			<li><a href="registered.php">註冊</a></li>
		</ul>
		<h1 style="font-size:62px">登入</h1>
		<h2 style="font-size:16px">請輸入您的帳號密碼</h2>
		<form method="POST" class="form-horizontal">	<!--form-horizontal:將表單元素水平擺放，可設定網格-->
			<div class="form-group">				
				<label for="userAcct" class="col-sm-4 control-label">帳號</label>
				<div class="col-sm-4">			<!--控制項要設定網格，必須包在div裡面-->
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
				<div class="col-sm-8 col-sm-offset-2">			<!--位移兩個col並佔用10個col-->
				<a href='http://localhost/write_test/forget_password.php'><h2 style="font-size:16px">忘記帳號密碼?</h2></a>
					<button type="submit" name="signin" value="登入" class="btn btn-default btn-danger btn-lg">登入</button>
					<button type="button" class="btn btn-default btn-lg " onclick="window.location.href='main.php'">首頁</button>
				</div>
			</div>
		</form>
</div>
<div align="center">

<?php
	$loginout=0;
	require_once "database.php";
	$db_link = @mysqli_connect($hn,$un,$pw,$db);
	if(isset($_GET['loginout']))
		$loginout = $_GET['loginout'];
	setcookie('account',"",time()-600);
	setcookie('password',"",time()-600);

    if($loginout==1)
	{
		unset($_SESSION['account']);
		$loginout=0;
		 echo "<script>window.location.href='login.php'</script>";
	}
	if(isset($_POST['signin'])&&$_POST['signin'] !=null)
    {
        if(empty($_POST['account']) || empty($_POST['password']))
        {
            echo "<script>alert('帳密未輸入完整')</script>";
        }
        else 
        {
            $sql_select = "SELECT * FROM signin where account='".$_POST['account']."'";
            //echo $sql_select;
            $select_result = mysqli_query($db_link,$sql_select);
            $num_rows=mysqli_num_rows($select_result);//mysqli_num_row()取得查詢結果筆數
            $row = mysqli_fetch_assoc($select_result);//mysqli_fetch_assoc()取得欄位索引鍵的陣列
            if($num_rows==0)
            {
                echo "<script>alert('沒有此帳號請先註冊')</script>";
            }
            else if( $_POST['password'] != $row['password'] )
            {
                echo "<script>alert('密碼輸入錯誤')</script>";
            }
            else
            {
                $_SESSION['account']=$row['account'];
                $_SESSION['password']=$row['password'];
                echo "<script>window.location.href='main.php'</script>";
            }
        }
    }
?>
</div>