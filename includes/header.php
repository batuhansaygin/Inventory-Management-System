<?php require_once 'php_action/core.php'; ?>

<!DOCTYPE html>
<html>
<head>

	<title>Baerlocher PMS</title>

	<!-- bootstrap -->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- bootstrap theme-->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">

	<!-- custom css -->
	<link rel="stylesheet" href="custom/css/custom.css">

	<!-- DataTables -->
	<link rel="stylesheet" href="assests/plugins/datatables/jquery.dataTables.min.css">

	<!-- file input -->
	<link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">

	<!-- jquery -->
	<script src="assests/jquery/jquery.min.js"></script>
	<!-- jquery ui -->  
	<link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
	<script src="assests/jquery-ui/jquery-ui.min.js"></script>

	<!-- bootstrap js -->
	<script src="assests/bootstrap/js/bootstrap.min.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
</head>
<body>

	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		<span class="sr-only">Gezinti</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
	<a class="navbar-brand" href="dashboard.php" style="padding:0px;">
		<img src="logo.png" alt="">
	</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      

      <ul class="nav navbar-nav navbar-right">        

      	<li id="navDashboard"><a href="index.php"><i class="glyphicon glyphicon-home"></i>&emsp;Ana Sayfa</a></li> 
        <li id="navCustomers"><a href="customers.php"> <i class="glyphicon glyphicon-briefcase"></i>&emsp;Müşteriler</a></li>
        <li id="navProduct"><a href="products.php"> <i class="glyphicon glyphicon-tags"></i>&emsp;Ürünler</a></li> 
        <li id="navTests"><a href="tests.php"> <i class="glyphicon glyphicon-check"></i>&emsp;Testler</a></li>
		<?php if(isset($_SESSION['userId']) && $_SESSION['userId']==1) { ?>
		<li class="dropdown" id="navOrder">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-console"></i> Geliştirme <span class="caret"></span></a>
          <ul class="dropdown-menu">
			<li id="topNavAddOrder"><a href="orders.php?o=add"> <i class="glyphicon glyphicon-plus"></i> Yeni Sipariş</a></li>
            <li id="topNavManageOrder"><a href="orders.php?o=manord"> <i class="glyphicon glyphicon-shopping-cart"></i> Siparişler</a></li>
			<li id="topNavReport"><a href="report.php"> <i class="glyphicon glyphicon-list-alt"></i> Raporlama</a></li>
          </ul>
        </li> 
		<?php } ?>
		
        <li class="dropdown" id="navSetting">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-cog"></i> <span class="caret"></span></a>
          <ul class="dropdown-menu">    
			
            <li id="topNavSetting"><a href="setting.php"> <i class="glyphicon glyphicon-user"></i> Profil</a></li>
            <li id="topNavUser">
			<?php if(isset($_SESSION['userId']) && $_SESSION['userId']==1) { ?>
			<a href="user.php"> <i class="glyphicon glyphicon-wrench"></i> Kullanıcılar</a>
			<?php } ?> 
			</li>
            <li id="topNavLogout"><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Çıkış Yap</a></li>            
          </ul>
        </li>        
           
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
	</nav>

	<div class="container">