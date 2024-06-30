
	<?PHP require_once 'topbar.php';?>
	<?PHP require_once 'Css_content.php';?>
<?PHP
	require_once 'database.php';
	$conn= new mysqli($hn,$un,$pw,$db);
	$query="SELECT * FROM `problems` where `unit`=".$_GET['unit'];
	$result=$conn->query($query);
	$ROW=$result->num_rows;
	
	
	if($_GET['unit']==1)	
		$unit_chinese="單元一";
	
	else if($_GET['unit']==2)
		$unit_chinese="單元二";
	
	else if($_GET['unit']==3)
		$unit_chinese="單元三";
	
	else if($_GET['unit']==4)
		$unit_chinese="單元四";

	echo '<table table align="center">';
	
		for($i=0;$i<ceil($ROW/50);$i++)
		{
			if($i<ceil($ROW/50)-1)
				echo"<tr class='icon_table_tr' onClick=\"window.location.href='http://localhost/write_test/problems.php?unit=".$_GET['unit']."&&area=".$i."';\"><td>
				<div class='round'><p>".($i+1)."</p></div></td><td>".$unit_chinese.($i*50+1)."到".(($i+1)*50)."</td></tr>";
			
			else
				echo"<tr class='icon_table_tr' onClick=\"window.location.href='http://localhost/write_test/problems.php?unit=".$_GET['unit']."&&area=".$i."';\"><td>
				<div class='round'><p>".($i+1)."</p></div></td><td>".$unit_chinese.($i*50+1)."到".$ROW."</td></tr>";
				
		}
	echo '</table>';
$conn->close();
?>