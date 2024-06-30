

<?PHP
session_start();

require_once 'Css_content.php';

require_once 'database.php';
$conn= new mysqli($hn,$un,$pw,$db);
$_SESSION['isrelode']=0;
echo "<form method=GET action=total_test_question.php>";
if(!isset($_SESSION['id'][1]))
{

	$query="SELECT * FROM `problems` ORDER BY RAND() LIMIT 40";
	$result=$conn->query($query);
	$rows=$result->num_rows;
	
	for($i=0;$i<$rows;$i++)
		{
				$result->data_seek($i);
			$id=$result->fetch_assoc()['id'];
			$_SESSION['id'][$i+1]=$id;
				$result->data_seek($i);
			$right_ans=$result->fetch_assoc()['Answer'];
			$_SESSION['right_ans'][$i+1]=$right_ans;
			echo $_SESSION['right_ans'][$i+1];
		}
	
}
if(isset($_GET['前後題']) && $_GET['前後題']=="下一題")
{
	$now_id=$_GET['作答題號']+1;
}
else if(isset($_GET['前後題']) && $_GET['前後題']=="上一題")
{
	$now_id=$_GET['作答題號']-1;
}
else if(!isset($_GET['選擇題號']))
{
	$now_id=1;
}
else 
{
	$now_id=$_GET['選擇題號'];
}

	if(isset($_GET['reply_submit']))
		$_SESSION['reply'][$_GET['作答題號']]=$_GET['reply_submit'];

	$query="SELECT * FROM `problems` where `id`=".$_SESSION['id'][$now_id];
		$result=$conn->query($query);
			$result->data_seek(0);
		$problem_img=$result->fetch_assoc()['image file name'];
			$result->data_seek(0);
		$unit=$result->fetch_assoc()['unit'];
			$result->data_seek(0);
		$answer=$result->fetch_assoc()['Answer'];
			$result->data_seek(0);
		$problem=$result->fetch_assoc()['topic'];
			$result->data_seek(0);
		$Ans1=$result->fetch_assoc()['1'];
			$result->data_seek(0);
		$Ans2=$result->fetch_assoc()['2'];
			$result->data_seek(0);
		$Ans3=$result->fetch_assoc()['3'];
		
		echo "<div style='height:48%;'><br><br><p>".$now_id.".</p>";
		if($problem_img!="")
				echo"
					<img src='./img/".$unit."/".$problem_img.".png' with='300' heigh='300' alt='一張圖片'><br>";
		
		echo "<p>".$problem."</p></div>";
		
		
		echo '<div id=tatal_test_question_reply_area style=" position:relative; top:50%; width:100%;">';
		if($Ans3=="")
		{
			if(isset($_SESSION['reply'][$now_id])&&$_SESSION['reply'][$now_id]==1)
				
					echo "<div><input class='submit_show_DE' id='1' type='submit' name='reply_submit' value=1><label class='problem_radio' for='1'>(1)".$Ans1."</label></div>
					<div><input class='submit_show' id='2' type='submit' name='reply_submit' value=2><label class='problem_radio' for='2'>(2)".$Ans2."</label></div>";
			else if(isset($_SESSION['reply'][$now_id])&&$_SESSION['reply'][$now_id]==2)

					echo "<div><input class='submit_show' id='1' type='submit' name='reply_submit' value=1><label class='problem_radio' for='1'>(1)".$Ans1."</label></div>
					<div><input class='submit_show_DE' id='2' type='submit' name='reply_submit' value=2><label class='problem_radio' for='2'>(2)".$Ans2."</label></div>";
			else
				echo "
					<div><input class='submit_show' id='1' type='submit' name='reply_submit' value=1><label class='problem_radio' for='1'>(1)".$Ans1."</label></div>
					<div><input class='submit_show' id='2' type='submit' name='reply_submit' value=2><label class='problem_radio' for='2'>(2)".$Ans2."</label></div>";
		}
		else
		{
			if(isset($_SESSION['reply'][$now_id])&&$_SESSION['reply'][$now_id]==1)
				echo "
					<div><input class='submit_show_DE' id='1' type='submit' name='reply_submit' value=1><label class='problem_radio' for='1'>(1)".$Ans1."</label></div>
					<div><input class='submit_show' id='2' type='submit' name='reply_submit' value=2><label class='problem_radio' for='2'>(2)".$Ans2."</label></div>
					<div><input class='submit_show' id='3' type='submit' name='reply_submit' value=3><label class='problem_radio' for='3'>(3)".$Ans3."</label></div>";
			else if(isset($_SESSION['reply'][$now_id])&&$_SESSION['reply'][$now_id]==2)
				echo "
					<div><input class='submit_show' id='1' type='submit' name='reply_submit' value=1><label class='problem_radio' for='1'>(1)".$Ans1."</label></div>
					<div><input class='submit_show_DE' id='2' type='submit' name='reply_submit' value=2><label class='problem_radio' for='2'>(2)".$Ans2."</label></div>
					<div><input class='submit_show' id='3' type='submit' name='reply_submit' value=3><label class='problem_radio' for='3'>(3)".$Ans3."</label></div>";
			else if(isset($_SESSION['reply'][$now_id])&&$_SESSION['reply'][$now_id]==3)
				echo "
					<div><input class='submit_show' id='1' type='submit' name='reply_submit' value=1><label class='problem_radio' for='1'>(1)".$Ans1."</label></div>
					<div><input class='submit_show' id='2' type='submit' name='reply_submit' value=2><label class='problem_radio' for='2'>(2)".$Ans2."</label></div>
					<div><input class='submit_show_DE' id='3' type='submit' name='reply_submit' value=3><label class='problem_radio' for='3'>(3)".$Ans3."</label></div>";
			else
				echo "
					<div><input class='submit_show' id='1' type='submit' name='reply_submit' value=1><label class='problem_radio' for='1'>(1)".$Ans1."</label></div>
					<div><input class='submit_show' id='2' type='submit' name='reply_submit' value=2><label class='problem_radio' for='2'>(2)".$Ans2."</label></div>
					<div><input class='submit_show' id='3' type='submit' name='reply_submit' value=3><label class='problem_radio' for='3'>(3)".$Ans3."</label></div>";
			 
		}	 
	echo '</div>';
	
	
	
	if($now_id!=40)
		echo "<input type='hidden' name='選擇題號' value=".($now_id+1).">";
	else
		echo "<input type='hidden' name='選擇題號' value=".$now_id.">";
		echo "<input type='hidden' name='作答題號' value=".$now_id.">";
	
	
	
	echo '<div id=tatal_test_answer_area style=" position:relative; top:80%;">';
	
	
	
	if($now_id!=1)
		echo "<input class=\"btn btn-default btn-lg btn-warning\" style='width:80pt' type='submit' name='前後題' value='上一題'>";
	else
		echo "<input class=\"btn btn-default btn-lg btn-warning\" style='width:80pt' type='submit' name='前後題' value='上一題' disabled>";
	
	for($i=1;$i<=40;$i++)
	{ 
		if($now_id==$i)		
		{
			echo "<input type='submit' name='選擇題號' value=".$i." disabled>"; 
		}
		else
		{	
			if(isset($_SESSION['reply'][$i]))
				echo "<input type='submit' class='have_answer' name='選擇題號' value=".$i.">"; 
			else
				echo "<input type='submit' name='選擇題號' value=".$i.">"; 
		}
	}
	if($now_id!=40)
		echo "<input class=\"btn btn-default btn-lg btn-warning\" style='width:80pt' type='submit' name='前後題' value='下一題'>";
	else
		echo "<input class=\"btn btn-default btn-lg btn-warning\" style='width:80pt' type='submit' name='前後題' value='下一題' disabled> ";


	
			if(isset($_GET['ok']) && $_GET['ok']=='提交')
			{
				echo "<script type='text/javascript'>";
				echo "parent.window.location.assign(\"answer.php?ok=提交\");";
				echo "</script>"; 
			}
		echo "<input type='hidden' name='unit' value=0>";
echo "
		<input type='submit' name='ok' style='width:80pt' value=提交 class=\"btn btn-default btn-danger btn-lg\" onclick=\"{if(confirm('確定提交嗎?')){
this.document.formname.submit();
return true;}return false;
}\"></form>";
		
		echo '</div>';
		
		
/*	for($i=1;$i<=50;$i++)
	{
		echo $i.". ".$_SESSION['right_ans'][$i]."<br>";//$i.".  ".$_SESSION['reply'][$i]."<br>"; 
	}*/

?>
