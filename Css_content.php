	
<head>
	<meta charset="UTF-8">
	<!--以IE瀏覽器相容模式來顯示，預設為微軟最新的edge瀏覽器模式來顯示網頁-->
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<!--網頁寬度設定為行動裝置的螢幕寬度且縮放比例為1:1-->
	<meta name="viewport" content="width-device-width, initial-scale-1">
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<link rel="icon" href="img/logo.png" type="image/x-icon" sizes="16x16"/>
	<title>汽車筆試模擬測驗</title>
	<!--Bookstrap 核心 css 檔案-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!--Bookstrap 佈景主題 css 檔案-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
	<!--jquery 的核心檔案-->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<!--Bootstrap 核心 js 檔案-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<meta name='viewport' content='width=device-width, initial-scale=1'>

	
</head>
<style>


.table_problem{
	position:absolute;
	left:20%;
	width:60%;
	border-collapse:separate;
	border-spacing:20px 10px;
}
.table_problem_td{
	background-color:#FFF ;
	padding:30px;
	border: 1px solid #EEE;
	box-shadow: 0px 4px 4px 0px rgba(0,0,0,0.3);
}

p{
	line-height: 24px;
	font-weight:bold;
	font-family:Microsoft JhengHei;
	font-size:14pt;
	color:#333;
}
.answer_percent_p{
	font-size:50pt;
	
}
.History_result_p{
	
	line-height: 24px;
	font-weight:bold;
	font-family:Microsoft JhengHei;
	font-size:13pt;
	color:#333;
}

.problem_radio:hover {
	background-color:#DDD;
	}
	

label {
    line-height: 30pt;
	height:30pt;
	font-size:14pt;
	font-family:Microsoft JhengHei;
	width:100%;
    display:inline-block;
}
.submit_show_DE + .problem_radio{
	background-color:#EEE;
}
input:checked + .problem_radio {
	background-color:#EEE;
}

.answer_radio_right {
	background-color:#A2FA9A;
}
.answer_radio_wrong {
	background-color:#E07152;
}
.answer_radio_select {
	background-color:#EEE;
}
input[type=submit]:disabled,
button:disabled {

	  background-color:#DDD;
}
.radio_show{
    display:none;
}
.submit_show{
    display:none;
}
.have_answer[type=submit] {
  width:50px;
  background-color:#BDA;
  color: white;
  padding: 15px 15px;
  margin: 2px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit] {
  width: 50px;
  background-color:#BBB;
  color: white;
  padding: 15px 15px;
  margin: 2px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.background{
	background-color:#AAA;
	text-align:center;
}
.round{

	background-color:#111;
	border-radius:50%;
}
.round i,.round p,.round div{
	width:80px;
	line-height:80px;
	font-size:40px;
	height:80px;
	color:#FFF;
}

.round img
{
	position:relative;
	top:15px;
}
.round p{
	font-size:30px;
}
.icon_table_tr{
	text-align:center;
}
.icon_table_tr td{
	padding: 15px;
	line-height: 50px;
	font-weight:bold;
	font-family:Microsoft JhengHei;
	font-size:20pt;
	color:#111;
}
a:hover{
	text-decoration:none;
}

.icon_table_tr:hover{
	cursor: pointer;
}
.icon_table_tr:hover td{
	color:#BBB;
}

.icon_table_tr:hover .round{
	background-color:#BBB;
}
.submit_show_DE[type=submit]{
	background-color:#57B6D0;
	display:none;
}

</style>