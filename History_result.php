	<?PHP require_once 'topbar.php';?>
	<?PHP require_once 'Css_content.php';?>
	
	<?PHP

					if(!isset($_SESSION['account'])||empty($_SESSION['account']))
					{
					echo "<script>";
					echo '
							window.location.href=\'http://localhost/write_test/main.php\';
							alert("請先登入");
							
							</script>';
					}

	?>
	
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0"
 crossorigin="anonymous">

<div class="wrapper row2" >
			  <main class="hoc container clear"> 
				<!-- main body -->
				<!-- ################################################################################################ -->
				<div class="content" > 
				<br><br><br>
				 <?PHP
				require_once 'database.php';
					$conn = @mysqli_connect($hn, $un, $pw, $db);
				
					$query="SELECT * FROM `history_result` where account='".$_SESSION['account']."' AND unit=0 AND score<85";
					$result=$conn->query($query);
					$rows=$result->num_rows;
					$query="SELECT * FROM `history_result` where account='".$_SESSION['account']."' AND unit=0 AND score>=85";
					$result=$conn->query($query);
					$rows2=$result->num_rows;
					if(($rows2+$rows)==0)
						echo "<p class='answer_percent_p'>合格率 0% </p><br><p>模擬考不及格數：".$rows."  模擬考及格數：".$rows2."</p>";
					else
						echo "<p class='answer_percent_p'>合格率".round((($rows2/($rows+$rows2))*100))."%</p><br><p>模擬考不及格數：".$rows."  模擬考及格數：".$rows2."</p>";
					
				?>
				 <form method=GET action=History_result.php>
				 <table>
				 
				 <tr>
				 <td>
				 <p class='History_result_p'>　單元：
				 <select name='unit'>
				<?PHP 

				
				if(!isset($_GET['unit'])|| empty($_GET['unit'])) echo	"<option value=\"\" selected>全部</option>" ;
						else echo	"<option value=\"\">全部</option>" ;
					  if($_GET['unit']=="0") echo	"<option value=\"0\" selected>模擬考</option>";
					    else echo	"<option value=\"0\">筆試模擬考</option>";
					  if($_GET['unit']==1) echo	"<option value=\"1\" selected>汽車標誌選擇題</option>";
						else echo	"<option value=\"1\">汽車標誌選擇題</option>";
						
					  if($_GET['unit']==2) echo	"<option value=\"2\" selected>汽車標誌是非題</option>";
						else echo "<option value=\"2\">汽車標誌是非題</option>";
						
					  if($_GET['unit']==3) echo	"<option value=\"3\" selected>汽車法規選擇題</option>";
						else echo	"<option value=\"3\">汽車法規選擇題</option>";
						
					  if($_GET['unit']==4) echo	"<option value=\"4\" selected>汽車法規是非題</option>";
					    else echo	"<option value=\"4\">汽車法規是非題</option>";
												
					  ?>
				 </select>
				 </p></td>
				 
				 
				 <td>
				<p class='History_result_p'>　成績：
				 <select name='score'>
				 <?PHP if(!isset($_GET['score'])|| empty($_GET['score'])) echo	"<option value=\"\" selected>全部</option>" ;
						else echo	"<option value=\"\">全部</option>" ;
					if($_GET['score']==" AND score>=85") echo	"<option value=\" AND score>=85\" selected>及格</option>";
						else echo	"<option value=\" AND score>=85\">及格</option>";
					if($_GET['score']==" AND score<85") echo	"<option value=\" AND score<85\" selected>不及格</option>";
						else echo	"<option value=\" AND score<85\">不及格</option>";	

				 ?>
				 </select></p>
				 </td>

				 <td><p class='History_result_p'>　日期時間：
				 <?PHP
				 if(isset($_GET['date_start']))
					echo "<input type=\"datetime-local\" id=\"date_start\" style=\"width:240px;\" value=\"".str_replace( " " , "T" , $_GET['date_start'])."\" name=\"date_start\">";
				else
					echo "<input type=\"datetime-local\" id=\"date_start\" style=\"width:240px;\" name=\"date_start\">";
				
				if(isset($_GET['date_end']))
					echo "至<input type=\"datetime-local\" id=\"date_end\" style=\"width:240px;\" value=\"".str_replace( " " , "T" , $_GET['date_end'])."\" name=\"date_end\">";
				else
					echo "至<input type=\"datetime-local\" id=\"date_end\" style=\"width:240px;\" name=\"date_end\">";
				 ?>

				 </p></td>
				 
				 
				 <td>
				<p class='History_result_p'>　題號區間：
				 <select name='area'>
				<?PHP	
					
					if(!isset($_GET['area'])|| empty($_GET['area'])) echo "<option value=\"\" selected>全部</option>";
					else  echo "<option value=\"\">全部</option>";
					
					if($_GET['area']==1) echo "<option value=\"1\" selected>1~50</option>";
					else  echo "<option value=\"1\">1~50</option>";
					
					if($_GET['area']==51) echo "<option value=\"51\" selected>51~100</option>";
					else  echo "<option value=\"51\">51~100</option>";
					
					if($_GET['area']==101) echo "<option value=\"101\" selected>101~150</option>";
					else  echo "<option value=\"101\">101~150</option>";
					
					if($_GET['area']==151) echo "<option value=\"151\" selected>151~200</option>";
					else  echo "<option value=\"151\">151~200</option>";
					
					if($_GET['area']==201) echo "<option value=\"201\" selected>201~250</option>";
					else  echo "<option value=\"201\">201~250</option>";
					
					if($_GET['area']==251) echo "<option value=\"251\" selected>251~300</option>";
					else  echo "<option value=\"251\">251~300</option>";

					if($_GET['area']==301) echo "<option value=\"301\" selected>301~350</option>";
					else  echo "<option value=\"301\">301~350</option>";
					
					if($_GET['area']==351) echo "<option value=\"351\" selected>351~400</option>";
					else  echo "<option value=\"351\">351~400</option>";
					
					if($_GET['area']==401) echo "<option value=\"401\" selected>401~450</option>";
					else  echo "<option value=\"401\">401~450</option>";
					
					if($_GET['area']==451) echo "<option value=\"451\" selected>451~500</option>";
					else  echo "<option value=\"451\">451~500</option>";

					if($_GET['area']==501) echo "<option value=\"501\" selected>501~550</option>";
					else  echo "<option value=\"501\">501~550</option>";
					
					if($_GET['area']==551) echo "<option value=\"551\" selected>551~600</option>";
					else  echo "<option value=\"551\">551~600</option>";
					
					if($_GET['area']==601) echo "<option value=\"601\" selected>601~650</option>";
					else  echo "<option value=\"401\">401~450</option>";

					
					?>
				 </select>
				 </p>
				 </td>
				 
				 <td><p class='History_result_p'>　<input type='submit' name='ok' class="btn btn-default btn-danger btn-lg" style='width:50pt' value=繳交></p> </td>
				 </tr>
				 
				 </table>
			  <br>

			  <br>
			  <div class="scalable"  align="center">
			   <ul  style="overflow:scroll;overflow-x:hidden;height:450px; width:1300px;">
				<table class="table table-hover"  >
				  <thead>
					<tr>
					  <th>單元</th>
					  <th>分數</th>
					  <th>測驗日期</th>
					  <th>題目區間</th>
					</tr>
				  </thead>
				  <tbody>
				  <?PHP
					$Temp="";
					$query="SELECT * FROM `history_result` where account='".$_SESSION['account']."'";

					  if(isset($_GET['unit'])&&$_GET['unit']!="")
					  $query=$query." AND `unit`=".$_GET['unit'];
					  if(!empty($_GET['score']))
					  $query=$query.$_GET['score'];
					  if(!empty($_GET['area']))
					  $query=$query." AND start_question_number=".$_GET['area'];
					  if(!empty($_GET['date_start']))
					  $query=$query." AND date>='".str_replace( 'T' , ' ' , $_GET['date_start'])."'";
				  	  if(!empty($_GET['date_end']))
					  $query=$query." AND date<='".str_replace( 'T' , ' ' , $_GET['date_end'])."'";

					//echo $query;

				  ?>
				  
				  <?php
					
					
					$result=$conn->query($query);
					$rows=$result->num_rows;
					for($i=0;$i<$rows;$i++){
						$row=$result -> fetch_array(MYSQLI_ASSOC);
						if($row['unit']==0) $chinese_unit='筆試模擬考';
						if($row['unit']==1) $chinese_unit='汽車標誌選擇題';
						if($row['unit']==2) $chinese_unit='汽車標誌是非題';
						if($row['unit']==3) $chinese_unit='汽車法規選擇題';
						if($row['unit']==4) $chinese_unit='汽車法規是非題';
						
						echo "<tr>";
						echo "<td>".$chinese_unit."</td>";
						echo "<td>".$row['score']."</td>";
						echo "<td>".$row['date']."</td>";
						if($row['start_question_number']!=0)
							echo "<td>".$row['start_question_number']."到".$row['end_question_number']."</td>";
						else
							echo "<td>全部題庫</td>";
						echo "</tr>";
					}
				  ?>
				  </tbody>
				</table>
				
				</ul>
				
				
				
			  </div>
			   </main>
		 </div>
	 </div>
