
	<?PHP require_once 'topbar.php';?>
	<?PHP require_once 'Css_content.php';?>
	
<?PHP

	unset($_SESSION['right_ans']);
	unset($_SESSION['reply']);
	unset($_SESSION['id']);
?>

<?PHP
$_SESSION['isrelode']=0;
	require_once 'database.php';
	$conn= new mysqli($hn,$un,$pw,$db);
	$query="SELECT * FROM `problems` where `unit`=".$_GET['unit']." AND `Question number`<=".(($_GET['area']+1)*50)." AND `Question number`>".($_GET['area']*50)."  ORDER BY RAND()";
	$result=$conn->query($query);
	$rows=$result->num_rows;
	
	echo "<form method=POST action=answer.php>
	<table class='table_problem'>";
	for($i=0;$i<$rows;$i++)
	{		
			$result->data_seek($i);
		$problem_id=$result->fetch_assoc()['id'];
			$result->data_seek($i);
		$problem_img=$result->fetch_assoc()['image file name'];
			$result->data_seek($i);
		$answer=$result->fetch_assoc()['Answer'];
			$result->data_seek($i);
		$problem=$result->fetch_assoc()['topic'];
			$result->data_seek($i);
		$Ans1=$result->fetch_assoc()['1'];
			$result->data_seek($i);
		$Ans2=$result->fetch_assoc()['2'];
			$result->data_seek($i);
		$Ans3=$result->fetch_assoc()['3'];

		if($_GET['unit']==1||$_GET['unit']==3)
		{
			echo "<tr><td class='table_problem_td'><p>".($i+1).".</p>";
			if($problem_img!="")
				echo "
					<img src='./img/".$_GET['unit']."/".$problem_img.".png' with='300' heigh='300' alt='一張圖片'><br>
					";
				
			echo "<p>".$problem."</p>
			<input type='hidden' name='answer[".$i."]' value=".$answer.">
			<input type='hidden' name='problemid[".$i."]' value=".$problem_id.">
			<div><input class='radio_show' type='radio' id='radio_1".$i."' name='reply[".$i."]' value=1><label class='problem_radio' for=\"radio_1".$i."\">(1)".$Ans1."</label></div>
			<div><input class='radio_show' type='radio' id='radio_2".$i."' name='reply[".$i."]' value=2><label class='problem_radio' for=\"radio_2".$i."\">(2)".$Ans2."</label></div>
			<div><input class='radio_show' type='radio' id='radio_3".$i."' name='reply[".$i."]' value=3><label class='problem_radio' for=\"radio_3".$i."\">(3)".$Ans3."</label></div>
			</td></tr>
			";
		}
		          
      
		else
		{
			echo "<tr><td class='table_problem_td'><p>".($i+1).".</p>";
			if($problem_img!="")
				echo "<br>
					<img src='./img/".$_GET['unit']."/".$problem_img.".png' with='300' heigh='300' alt='一張圖片'><br>
					";
				
			echo "<p>".$problem."</p>
				<input type='hidden' name='answer[".$i."]' value=".$answer.">
				<input type='hidden' name='problemid[".$i."]' value=".$problem_id.">
			<div><input class='radio_show' type='radio' id='radio_1".$i."' name='reply[".$i."]' value=1><label class='problem_radio' for=\"radio_1".$i."\">(1)".$Ans1."</label></div>
			<div><input class='radio_show' type='radio' id='radio_2".$i."' name='reply[".$i."]' value=2><label class='problem_radio' for=\"radio_2".$i."\">(2)".$Ans2."</label></div>


			</td></tr>
			";
		}
	}
	
	echo"<input type='hidden' name='unit' value=".$_GET['unit'].">";
	echo"<input type='hidden' name='start' value=".(($_GET['area']*50)+1).">";
	echo"<input type='hidden' name='end' value=".(($_GET['area']*50)+$rows).">";
	echo "
	<tr><td align=\"right\"> <input type='submit' name='ok' class=\"btn btn-default btn-danger btn-lg\" style='width:80pt' value=繳交 onclick=\"{if(confirm('確定提交嗎?')){
this.document.formname.submit();
return true;}return false;
}\"> </td></tr></table>
	<input type='hidden' name='row' value=".$rows.">

	";
	
	$conn->close();
?>