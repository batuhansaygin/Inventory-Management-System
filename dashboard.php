<?php require_once 'includes/header.php'; ?>

<?php 

$countProductSql = "SELECT * FROM product WHERE status = 1";
$countProductQuery = $connect->query($countProductSql);
$countProduct = $countProductQuery->num_rows;

$countCustomerSql = "SELECT * FROM customers";
$countCustomerQuery = $connect->query($countCustomerSql);
$countCustomer = $countCustomerQuery->num_rows;

$countTestSql = "SELECT * FROM tests";
$countTestQuery = $connect->query($countTestSql);
$countTest = $countTestQuery->num_rows;

$user_id = $_SESSION['userId'];
$sql = "SELECT * FROM users WHERE user_id = {$user_id}";
$query = $connect->query($sql);
$currentUser = $query->fetch_assoc();

$brandSql = "SELECT DISTINCT companies_name, companies_id FROM companies GROUP BY companies_name";
$brandQuery = $connect->query($brandSql);
$showBrandQuery = $brandQuery->num_rows;

$sql = "SELECT * FROM categories WHERE categories_status = 1";
$query = $connect->query($sql);
$countCategories = $query->num_rows;

$connect->close();

date_default_timezone_set("Europe/Istanbul");
setlocale(LC_TIME,'turkish');
$dateTR    = iconv('latin5','utf-8',strftime('%Y %B %d'));

function strftime_tr($date_format){
	$dateTR    = iconv('latin5','utf-8',strftime($date_format)); 
	return $dateTR; 
}

?>

<style type="text/css">
	.ui-datepicker-calendar {
		display: none;
	}
</style>

<!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.print.css" media="print">

<div class="row">
	<?php  if(isset($_SESSION['userId']) /* && $_SESSION['userId']==1 */) { ?>
	<div class="col-md-4">
			<div class="panel panel-info">
			<div class="panel-heading">
				<a href="customers.php" style="text-decoration:none;color:white;">
					Müşteri Bazlı Arama
					<span class="badge pull pull-right" ><?php echo $countCustomer; ?></span>
				</a>
					
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
		</div> <!--/col-md-4-->
	
	<div class="col-md-4">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<a href="products.php" style="text-decoration:none;color:black;">
					Ürün Bazlı Arama
					<span class="badge pull pull-right"><?php echo $countCategories; ?></span>
				</a>
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
	</div> <!--/col-md-4-->
	
	<?php } ?>
		<div class="col-md-4">
		<div class="panel panel-success">
			<div class="panel-heading">
				
				<a href="tests.php" style="text-decoration:none;color:black;">
					Test Bazlı Arama
					<span class="badge pull pull-right"><?php echo $countTest; ?></span>	
				</a>
				
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
	</div> <!--/col-md-4-->
	
	<div class="col-md-4">
		<div class="card">
		  <div class="cardHeaderUser">
		    <h1>
				Hoşgeldiniz
			</h1>
		  </div>

		  <div class="cardContainerUser">
		    <h4>
				<a href="setting.php"><?php echo $currentUser['username']; ?></a>
			</h4>
		  </div>
		</div>
		<br/>
		<div class="card">
		  <div class="cardHeader">
		    <h1>
				<?php 
					echo strftime_tr("%A"); 
				?>
			</h1>
		  </div>

		  <div class="cardContainer">
		    <p>
				<?php
					echo strftime_tr("%d %B %Y");
				?>
			</p>
		  </div>
		</div>
	</div>
	
	<?php  if(isset($_SESSION['userId'])/* && $_SESSION['userId']==1 */ ) { ?>
	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading"> <i class="glyphicon glyphicon-tint"></i>&emsp;Aktif Müşteriler</div>
				<div class="panel-body">
				<div style="max-height: 450px; overflow-x: hidden; overflow-y: auto;">
					<table class="table table-striped" id="manageCategoriesTable">
					<thead>
						<tr>			  			
							<th style="width:40%;">Formül Adı</th>
							<th style="width:15%;">Durum</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($brandResult = $brandQuery->fetch_assoc()) { ?>
							<tr>
								<td><?php echo $brandResult['companies_name']?></td>
								<td style="vertical-align: middle;"><?php echo "<label class='label label-success'>Aktif</label>";?></td>
							</tr>
						<?php } ?>
					</tbody>
					</table>
					<!--<div id="calendar"></div>-->
				</div>
			</div>	
		</div>
	</div> 
	<?php  } ?>
	
</div> <!--/row-->

<!-- fullCalendar 2.2.5 -->
<script src="assests/plugins/moment/moment.min.js"></script>
<script src="assests/plugins/fullcalendar/fullcalendar.min.js"></script>


<script type="text/javascript">
	$(function () {
			// top bar active
	$('#navDashboard').addClass('active');

      //Date for the calendar events (dummy data)
      var date = new Date();
      var d = date.getDate(),
      m = date.getMonth(),
      y = date.getFullYear();

      $('#calendar').fullCalendar({
        header: {
          left: '',
          center: 'title'
        },
        buttonText: {
          today: 'today',
          month: 'month'          
        }        
      });


    });
</script>

<?php require_once 'includes/footer.php'; ?>