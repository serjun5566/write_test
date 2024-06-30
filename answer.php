<?PHP
$right=0;
$wrong=0;
$empty=0;
$start=0;
$end=0;
$unit=0;
$score=28;

	require_once "topbar.php";
	require_once "database.php";
	require_once "Css_content.php";
	$conn= new mysqli($hn,$un,$pw,$db);
	

if( $_SESSION['isrelode']==1 || (substr($_SERVER['HTTP_REFERER'],0,40)!="http://localhost/write_test/problems.php" && substr($_SERVER['HTTP_REFERER'],0,42)!="http://localhost/write_test/total_test_que"))
{
echo "<script>";
echo '
		alert("將回到主頁面");
		window.location.href=\'http://localhost/write_test/main.php\';
		</script>';
}
else
	$_SESSION['isrelode']=1;
//-------------------------------------------------------四個個別單元--------------------------------------------------------------------------
if(isset($_POST['ok']) && $_POST['ok']=='繳交')
{
		$unit=$_POST['unit'];
		$start=$_POST['start'];
		$end=$_POST['end'];
		echo "<table class='table_problem'>";
		
//--------------------取得題目資訊
	for($i=0;$i<$_POST['row'];$i++)
	{			echo "<tr><td class='table_problem_td'><p>".($i+1).".</p>";
				$query="SELECT * FROM `problems` where id=".$_POST['problemid'][$i];
				$result=$conn->query($query);
				$rows=$result->num_rows;
		
						$result->data_seek(0);
					$problem_id=$result->fetch_assoc()['id'];
						$result->data_seek(0);
					$problem_img=$result->fetch_assoc()['image file name'];
						$result->data_seek(0);
					$answer=$result->fetch_assoc()['Answer'];
						$result->data_seek(0);
					$problem=$result->fetch_assoc()['topic'];
						$result->data_seek(0);
					$Ans1[1]=$result->fetch_assoc()['1'];
						$result->data_seek(0);
					$Ans1[2]=$result->fetch_assoc()['2'];
						$result->data_seek(0);
					$Ans1[3]=$result->fetch_assoc()['3'];
					
		if($problem_img!="")
				echo "<img src='./img/".$unit."/".$problem_img.".png' with='300' heigh='300' alt='一張圖片'><br>";
			
//-------------------------------------------------------如果題目回答對
		if(isset($_POST['reply'][$i]))
		{
			if($_POST['reply'][$i]==$_POST['answer'][$i])
			{
				$right+=1;
					
				//echo $problem_id."<br>".$problem_img."<br>".$answer."<br>".$problem."<br>".$Ans1[1].$Ans1[2].$Ans1[3]."<br><br><br><br>";
	
//--------------------在題目回答對的時候RADIO跟LABEL顏色要做改變
				if($unit==1||$unit==3)
				{	
					echo "<p>".$problem."</p>";
					for($j=1;$j<4;$j++)
					{
						if($_POST['answer'][$i]==$j)
						echo "<div><input class='radio_show' type='radio' id='radio_".$i.$j."' name='reply[".$i."]' value=1  checked disable><label class=\"answer_radio_right\" for=\"radio_".$i.$j."\">(".$j.")".$Ans1[$j]."</label></div>";
						
						else
						echo "<div><input class='radio_show' type='radio' id='radio_".$i.$j."' name='reply[".$i."]' value=1 disable><label class=\"answer_radio\" for=\"radio_".$i.$j."\">(".$j.")".$Ans1[$j]."</label></div>";
						
					}
				}
				else
				{
					echo "<p>".$problem."</p>";
					for($j=1;$j<3;$j++)
					{
						
						if($_POST['answer'][$i]==$j)
						echo "<div><input class='radio_show' type='radio' id='radio_".$i.$j."' name='reply[".$i."]' value=1  checked disable><label class=\"answer_radio_right\" for=\"radio_".$i.$j."\">(".$j.")".$Ans1[$j]."</label></div>";
						
						else
						echo "<div><input class='radio_show' type='radio' id='radio_".$i.$j."' name='reply[".$i."]' value=1 disable><label class=\"answer_radio\" for=\"radio_".$i.$j."\">(".$j.")".$Ans1[$j]."</label></div>";
						
					}
				}
	
			}
//-------------------------------------------------------如果題目回答錯
			else
			{	
				$wrong+=1;
					
				//echo $problem_id."<br>".$problem_img."<br>".$answer."<br>".$problem."<br>".$Ans1[1].$Ans1[2].$Ans1[3]."<br><br><br><br>";

//--------------------在題目回答錯的時候RADIO跟LABEL顏色要做改變
				if($unit==1||$unit==3)
				{	
					echo "<p>".$problem."</p>";
					for($j=1;$j<4;$j++)
					{
						
						if($_POST['answer'][$i]==$j)
						echo "<div><input class='radio_show' type='radio' id='radio_".$i.$j."' name='reply[".$i."]' value=1  checked disable><label class=\"answer_radio_wrong\" for=\"radio_".$i.$j."\">(".$j.")".$Ans1[$j]."</label></div>";
						
						else
						{
							if($_POST['reply'][$i]==$j)
								echo "<div><input class='radio_show' type='radio' id='radio_".$i.$j."' name='reply[".$i."]' value=1 disabled><label class=\"answer_radio_select\" for=\"radio_".$i.$j."\">(".$j.")".$Ans1[$j]."</label></div>";
							else
								echo "<div><input class='radio_show' type='radio' id='radio_".$i.$j."' name='reply[".$i."]' value=1 disabled><label class=\"answer_radio\" for=\"radio_".$i.$j."\">(".$j.")".$Ans1[$j]."</label></div>";
						
						}
					}
				}
				else
				{
					echo "<p>".$problem."</p>";
					for($j=1;$j<3;$j++)
					{
						
						if($_POST['answer'][$i]==$j)
						echo "<div><input class='radio_show' type='radio' id='radio_".$i.$j."' name='reply[".$i."]' value=1  checked><label class=\"answer_radio_wrong\" for=\"radio_".$i.$j."\">(".$j.")".$Ans1[$j]."</label></div>";
						
						else
						{
							if($_POST['reply'][$i]==$j)
								echo "<div><input class='radio_show' type='radio' id='radio_".$i.$j."' name='reply[".$i."]' value=1 disabled><label class=\"answer_radio_select\" for=\"radio_".$i.$j."\">(".$j.")".$Ans1[$j]."</label></div>";
							else
								echo "<div><input class='radio_show' type='radio' id='radio_".$i.$j."' name='reply[".$i."]' value=1 disabled><label class=\"answer_radio\" for=\"radio_".$i.$j."\">(".$j.")".$Ans1[$j]."</label></div>";
						
						}
					}
				}
			}	
		}
		
//-------------------------------------------------------如果題目沒回答
		else
		{
			$empty+=1;
			
				//echo $problem_id."<br>".$problem_img."<br>".$answer."<br>".$problem."<br>".$Ans1[1].$Ans1[2].$Ans1[3]."<br><br><br><br>";
				
				
				if($unit==1||$unit==3)
				{	
					echo "<p>".$problem."</p>";
					for($j=1;$j<4;$j++)
					{
						if($_POST['answer'][$i]==$j)
						echo "<div><input class='radio_show' type='radio' id='radio_".$i.$j."' name='reply[".$i."]' value=1  checked><label class=\"answer_radio_wrong\" for=\"radio_".$i.$j."\">(".$j.")".$Ans1[$j]."</label></div>";
						
						else
						echo "<div><input class='radio_show' type='radio' id='radio_".$i.$j."' name='reply[".$i."]' value=1 disabled><label class=\"answer_radio\" for=\"radio_".$i.$j."\">(".$j.")".$Ans1[$j]."</label></div>";
						
					}
				}
				else
				{
					echo "<p>".$problem."</p>";
					for($j=1;$j<3;$j++)
					{
						if($_POST['answer'][$i]==$j)
						echo "<div><input class='radio_show' type='radio' id='radio_".$i.$j."' name='reply[".$i."]' value=1  checked disabled><label class=\"answer_radio_wrong\" for=\"radio_".$i.$j."\">(".$j.")".$Ans1[$j]."</label></div>";
						
						else
						echo "<div><input class='radio_show' type='radio' id='radio_".$i.$j."' name='reply[".$i."]' value=1 disabled><label class=\"answer_radio\" for=\"radio_".$i.$j."\">(".$j.")".$Ans1[$j]."</label></div>";
						
					}
				}
		}
				echo "</td></tr>";
	
	}
	echo "</table>";
}

//-------------------------------------------------------總體模擬測驗--------------------------------------------------------------------------


else if(isset($_GET['ok']) && $_GET['ok']=="提交")
{
	echo "<table class='table_problem'>";
	for($i=1;$i<41;$i++)
	{
		
		echo "<tr><td class='table_problem_td'><p>".($i).".</p>";
		$query="SELECT * FROM `problems` where id=".$_SESSION['id'][$i];
				$result=$conn->query($query);
				$rows=$result->num_rows;
		
						$result->data_seek(0);
					$problem_id=$result->fetch_assoc()['id'];
						$result->data_seek(0);
					$problem_img=$result->fetch_assoc()['image file name'];
						$result->data_seek(0);
					$answer=$result->fetch_assoc()['Answer'];
						$result->data_seek(0);
					$total_unit=$result->fetch_assoc()['unit'];
						$result->data_seek(0);
					$problem=$result->fetch_assoc()['topic'];
						$result->data_seek(0);
					$Ans1[1]=$result->fetch_assoc()['1'];
						$result->data_seek(0);
					$Ans1[2]=$result->fetch_assoc()['2'];
						$result->data_seek(0);
					$Ans1[3]=$result->fetch_assoc()['3'];
		
		
		if($problem_img!="")
			echo "<img src='./img/".$total_unit."/".$problem_img.".png' with='300' heigh='300' alt='一張圖片'><br>";
		
		if(isset($_SESSION['reply'][$i]))
		{
			if($_SESSION['right_ans'][$i]==$_SESSION['reply'][$i])
			{	
				$right+=1;
				
				if($total_unit==1||$total_unit==3)
				{	
					echo "<p>".$problem."</p>";
					for($j=1;$j<4;$j++)
					{
						if($_SESSION['right_ans'][$i]==$j)
						echo "<div><input class='radio_show' type='radio' id='radio_".$i.$j."' name='reply[".$i."]' value=1  checked><label class=\"answer_radio_right\" for=\"radio_".$i.$j."\">(".$j.")".$Ans1[$j]."</label></div>";
						
						else
						echo "<div><input class='radio_show' type='radio' id='radio_".$i.$j."' name='reply[".$i."]' value=1 disabled><label class=\"answer_radio\" for=\"radio_".$i.$j."\">(".$j.")".$Ans1[$j]."</label></div>";
						
					}
				}
				else
				{
					echo "<p>".$problem."</p>";
					for($j=1;$j<3;$j++)
					{
						if($_SESSION['right_ans'][$i]==$j)
						echo "<div><input class='radio_show' type='radio' id='radio_".$i.$j."' name='reply[".$i."]' value=1  checked disabled><label class=\"answer_radio_right\" for=\"radio_".$i.$j."\">(".$j.")".$Ans1[$j]."</label></div>";
						
						else
						echo "<div><input class='radio_show' type='radio' id='radio_".$i.$j."' name='reply[".$i."]' value=1 disabled><label class=\"answer_radio\" for=\"radio_".$i.$j."\">(".$j.")".$Ans1[$j]."</label></div>";
						
					}
				}
			}
			else
			{
				$wrong+=1;
				
				if($total_unit==1||$total_unit==3)
				{	
					echo "<p>".$problem."</p>";
					for($j=1;$j<4;$j++)
					{
						
						if($_SESSION['right_ans'][$i]==$j)
						echo "<div><input class='radio_show' type='radio' id='radio_".$i.$j."' name='reply[".$i."]' value=1  checked disable><label class=\"answer_radio_wrong\" for=\"radio_".$i.$j."\">(".$j.")".$Ans1[$j]."</label></div>";
						
						else
						{
							if($_SESSION['reply'][$i]==$j)
								echo "<div><input class='radio_show' type='radio' id='radio_".$i.$j."' name='reply[".$i."]' value=1 disabled><label class=\"answer_radio_select\" for=\"radio_".$i.$j."\">(".$j.")".$Ans1[$j]."</label></div>";
							else
								echo "<div><input class='radio_show' type='radio' id='radio_".$i.$j."' name='reply[".$i."]' value=1 disabled><label class=\"answer_radio\" for=\"radio_".$i.$j."\">(".$j.")".$Ans1[$j]."</label></div>";
						
						}
					}
				}
				else
				{
					echo "<p>".$problem."</p>";
					for($j=1;$j<3;$j++)
					{
						
						if($_SESSION['right_ans'][$i]==$j)
						echo "<div><input class='radio_show' type='radio' id='radio_".$i.$j."' name='reply[".$i."]' value=1  checked><label class=\"answer_radio_wrong\" for=\"radio_".$i.$j."\">(".$j.")".$Ans1[$j]."</label></div>";
						
						else
						{
							if($_SESSION['reply'][$i]==$j)
								echo "<div><input class='radio_show' type='radio' id='radio_".$i.$j."' name='reply[".$i."]' value=1 disabled><label class=\"answer_radio_select\" for=\"radio_".$i.$j."\">(".$j.")".$Ans1[$j]."</label></div>";
							else
								echo "<div><input class='radio_show' type='radio' id='radio_".$i.$j."' name='reply[".$i."]' value=1 disabled><label class=\"answer_radio\" for=\"radio_".$i.$j."\">(".$j.")".$Ans1[$j]."</label></div>";
						
						}
					}
				}
			}
		}
		else
		{
			$empty+=1;
			if($total_unit==1||$total_unit==3)
				{	
					echo "<p>".$problem."</p>";
					for($j=1;$j<4;$j++)
					{
						if($_SESSION['right_ans'][$i]==$j)
						echo "<div><input class='radio_show' type='radio' id='radio_".$i.$j."' name='reply[".$i."]' value=1  checked><label class=\"answer_radio_wrong\" for=\"radio_".$i.$j."\">(".$j.")".$Ans1[$j]."</label></div>";
						
						else
						echo "<div><input class='radio_show' type='radio' id='radio_".$i.$j."' name='reply[".$i."]' value=1 disabled><label class=\"answer_radio\" for=\"radio_".$i.$j."\">(".$j.")".$Ans1[$j]."</label></div>";
						
					}
				}
				else
				{
					echo "<p>".$problem."</p>";
					for($j=1;$j<3;$j++)
					{
						if($_SESSION['right_ans'][$i]==$j)
						echo "<div><input class='radio_show' type='radio' id='radio_".$i.$j."' name='reply[".$i."]' value=1  checked disabled><label class=\"answer_radio_wrong\" for=\"radio_".$i.$j."\">(".$j.")".$Ans1[$j]."</label></div>";
						
						else
						echo "<div><input class='radio_show' type='radio' id='radio_".$i.$j."' name='reply[".$i."]' value=1 disabled><label class=\"answer_radio\" for=\"radio_".$i.$j."\">(".$j.")".$Ans1[$j]."</label></div>";
						
					}
				}
		}
		echo "</td></tr>";
	}
	echo "</table>";
}

$score=ceil(((100/($right+$wrong+$empty))*$right));
if($score>=85)
	$fontcolor="#000";
else
	$fontcolor="RED";

echo "<p  style=\"text-align:right;font-size:30pt;\">對:".$right."錯:".$wrong."空:".$empty."</p><br><br><p style=\"text-align:right;color:".$fontcolor."; font-size:50pt;\">總分:".$score."</p>";
echo '<input type ="button" class="btn btn-default btn-danger btn-lg" style=" position:absolute;right:15%;TOP:8%;" onclick="javascript:location.href=\'http://localhost/write_test/main.php?page=1\'" value="回到首頁"></input>';
if(isset($_SESSION['account']))
	{
		$score_insert="INSERT INTO `history_result`(`account`, `unit`, `score`, `date`, `start_question_number`, `end_question_number`)
		 VALUES ('".$_SESSION['account']."',".$unit.",".$score.",'".date("Y-m-d h:i:s",(time()+(6*3600)))."',".$start.",".$end.")";	
		mysqli_query($conn,$score_insert);
	}


//echo $score_insert;
//session_destroy();
//)


/*for($i=1;$i<=50;$i++)
	{
		echo $i.". ".$_SESSION['right_ans'][$i]."<br>";//$i.".  ".$_SESSION['reply'][$i]."<br>"; 
	}*/
	unset($_SESSION['right_ans']);
	unset($_SESSION['reply']);
	//echo "<script type='text/javascript'>";

echo "<script>";
echo '
		document.onkeydown = function () {
            if ((event.keyCode == 116) || (event.keyCode == 122)) {
                event.keyCode = 0;
				alert("將回到主頁面");
				window.location.href=\'http://localhost/write_test/main.php\';
                return false;
            }
        };
		</script>';
		
?>