<?php 

require_once 'core.php';

if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "SELECT * FROM tests WHERE tests_date >= '$start_date' AND tests_date <= '$end_date'";
	$query = $connect->query($sql);

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>Test Date</th>
			<th>Customer Name</th>
			<th>Formula</th>
			<th>Test Output</th>
			<th>Test By</th>
		</tr>

		<tr>';
		$x = 0;
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				<td><center>'.$result['tests_date'].'</center></td>
				<td><center>'.$result['companies_id'].'</center></td>
				<td><center>'.$result['tests_formula'].'</center></td>
				<td><center>'.$result['tests_output'].'</center></td>
				<td><center>'.$result['tests_by'].'</center></td>
			</tr>';	
			$x++;
		}
		$table .= '
		</tr>

		<tr>
			<td colspan="3"><center>Total Test</center></td>
			<td><center>'.$x.'</center></td>
		</tr>
	</table>
	';	

	echo $table;

}

?>