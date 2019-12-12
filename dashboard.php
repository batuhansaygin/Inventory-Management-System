<?php require_once 'includes/header.php'; ?>

<?php 

$sql = "SELECT * FROM product WHERE status = 1";
$query = $connect->query($sql);
$countProduct = $query->num_rows;

$sql = "SELECT * FROM brands WHERE brand_status = 1";
$query = $connect->query($sql);
$countBrand = $query->num_rows;

$sql = "SELECT * FROM categories WHERE categories_status = 1";
$query = $connect->query($sql);
$countCategories = $query->num_rows;

$formulasql = "SELECT categories_name , categories_status FROM categories WHERE categories_active = 1 GROUP BY categories_id";
$categoriesQuery = $connect->query($formulasql);
$formulaQuery = $categoriesQuery->num_rows;

$connect->close();

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
	<?php  if(isset($_SESSION['userId']) && $_SESSION['userId']==1) { ?>
	<div class="col-md-4">
			<div class="panel panel-info">
			<div class="panel-heading">
				<a href="brand.php" style="text-decoration:none;color:white;">
					Toplam Şirket
					<span class="badge pull pull-right" ><?php echo $countBrand; ?></span>
				</a>
					
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
		</div> <!--/col-md-4-->
	
	<div class="col-md-4">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<a href="categories.php" style="text-decoration:none;color:black;">
					Toplam Formül
					<span class="badge pull pull-right"><?php echo $countCategories; ?></span>	
				</a>
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
	</div> <!--/col-md-4-->
	
	<?php } ?>
		<div class="col-md-4">
		<div class="panel panel-success">
			<div class="panel-heading">
				
				<a href="product.php" style="text-decoration:none;color:black;">
					Toplam Ürün
					<span class="badge pull pull-right"><?php echo $countProduct; ?></span>	
				</a>
				
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
	</div> <!--/col-md-4-->
	
	<div class="col-md-4">
		<div class="card">
		  <div class="cardHeader">
		    <h1><?php echo date('d'); ?></h1>
		  </div>

		  <div class="cardContainer">
		    <p><?php echo date('l') .' '.date('d').', '.date('Y'); ?></p>
		  </div>
		</div>
		<br/>
		<div class="card text-white bg-info mb-3">
		  <div class="card-body">
			<h2 class="card-title">Deneyimsel Geliştirme</h2>
			<p class="card-text">Bu kısım deneyimsel geliştirme alanıdır.</p>
		  </div>
		</div>
	</div>
	
	<?php  if(isset($_SESSION['userId']) && $_SESSION['userId']==1) { ?>
	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading"> <i class="glyphicon glyphicon-tint"></i>&emsp;Aktif Formüller</div>
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
						<?php while ($categoriesResult = $categoriesQuery->fetch_assoc()) { ?>
							<tr>
								<td><?php echo $categoriesResult['categories_name']?></td>
								<td><?php echo "<label class='label label-success'>Aktif</label>";?></td>
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