<a href='main.php?page=1'>
<img id="topbar_LOGO" src="./img/logo.png" >
</img></a>
<div id="father" style="z-index:2;">
<div class="dropdown" id="dropdown0">
  <span class="inside_text">
  <a href="History_result.php" class=spe >歷程記錄</a></span>
</div>

<div class="dropdown" id="dropdown0">
  <span class="inside_text">
  <a href="login.php" class=spe>
  
            <?php

			session_start();
            if(isset($_SESSION['account'])&&$_SESSION['account'] != null)
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

            if(isset($_SESSION['account'])&&$_SESSION['account'] != null)
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
 </div><br><br><br><br>
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