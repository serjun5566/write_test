	<br><br><center><iframe src="total_test_question.php" width="98%" height="600pt" frameborder="0" style="position:related;"></iframe></center>

	<a href='main.php?page=1'>
<img id="topbar_LOGO" src="./img/logo.png" >
</img></a>
<div id="father" style="z-index:2;">
<div class="dropdown" id="dropdown0">
  <span class="inside_text">
	<h4 class="spe" id="count-down-timer"></h4></span>
</div>
<meta http-equiv="refresh" content="1800;url=http://localhost/write_test/answer.php?ok=提交">

<div class="dropdown" id="dropdown0">
  <span class="inside_text">
  <a href="History_result.php" class=spe >歷程記錄</a></span>
</div>
<div class="dropdown" id="dropdown0">
  <span class="inside_text">
  <a href="login.php" class=spe>

            <?php
            session_start();

            if(isset($_SESSION['account']) && $_SESSION['account'] != null)
            {
                    echo "<a href='#' class=spe>".$_SESSION['account']."</a>";
                    echo "<a href='login.php' class=spe></a>";

            }
            else
            {
                echo "<a href='login.php' class=spe>登入</a>";
            }
			?>
			</a></span>
</div>

<div class="dropdown" id="dropdown0">
  <span class="inside_text">
  <a href="login.php" class=spe>

            <?php

            if(isset($_SESSION['account']) && $_SESSION['account'] != null)
            {
				    /*$loginout=1;
                    echo "<a href='login.php?loginout=<?=$loginout?>' class=spe>登出</a>";*/
					echo "<a href='login.php?loginout=1' class=spe>登出</a>";
					//session_destroy();

            }
            else
            {
                echo "<a href='registered.php' class=spe>註冊</a>";
            }
			?>
			</a></span>
</div>


<?PHP


unset($_SESSION['right_ans']);
unset($_SESSION['reply']);
unset($_SESSION['id']);

?>
<style>
#topbar_LOGO{
	position:absolute;
	top:-2pt;left:30pt;
	width:50pt;
	z-index:3;
}
.spe{
	color:#FFF;
	text-decoration:none;
}
.spe:hover{
	color:#CCC;
}

#father{
	position:absolute;
	height:60px;
	Top:0pt;
	left:0%;
	width:100%;
    box-shadow: 0px 4px 8px 0px rgba(0,0,0,0.2);
	text-align:right;
	background-color:#222;
}
.dropdown {
    position: relative;
    display: inline-block;
	cursor: pointer;
	margin:15px 30px 10px 0px;
}
.inside_text{
	color:#7AFEC6;font-size:15pt; 
	margin:15pt 0 15pt 0;
	
}
</style>
	<?PHP require_once 'Css_content.php';?>
<script>

function paddedFormat(num) {
    return num < 10 ? "0" + num : num; 
}

function startCountDown(duration, element) {

    let secondsRemaining = duration;
    let min = 0;
    let sec = 0;

    let countInterval = setInterval(function () {

        min = parseInt(secondsRemaining / 60);
        sec = parseInt(secondsRemaining % 60);

        element.textContent = `${paddedFormat(min)}:${paddedFormat(sec)}`;

        secondsRemaining = secondsRemaining - 1;
        if (secondsRemaining < 0) { clearInterval(countInterval) };

    }, 1000);
}

window.onload = function () {
    let time_minutes = 30; // Value in minutes
    let time_seconds = 0; // Value in seconds

    let duration = time_minutes * 60 + time_seconds;

    element = document.querySelector('#count-down-timer');
    element.textContent = `${paddedFormat(time_minutes)}:${paddedFormat(time_seconds)}`;

    startCountDown(--duration, element);
};


</script>