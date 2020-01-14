<?php
	require_once 'core.php';
	if(isset($_POST["query"]))
	{
	  $output = '';
	  $query = "SELECT DISTINCT customers_company FROM customers WHERE customers_company LIKE '%".$_POST["query"]."%'";
	  $result = mysqli_query($connect, $query);
	  $output = '<ul class="list-unstyled">';
	  if(mysqli_num_rows($result) > 0)
	  {
		   while($row = mysqli_fetch_array($result))
		   {
				$output .= '<li>'.$row["customers_company"].'</li>';
		   }
	  }
	  else
	  {
		 //  $output .= '<li>Firma Mevcut Değildir.</li>';
	  }
	  $output .= '</ul>';
	  echo $output;
	}
 ?>
