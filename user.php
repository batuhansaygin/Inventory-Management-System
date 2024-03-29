<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>

<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Anasayfa</a></li>		  
		  <li class="active">Kullanıcılar</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Kullanıcı Yönetimi</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" id="addUserModalBtn" data-target="#addUserModal"> <i class="glyphicon glyphicon-plus-sign"></i> Yeni Kullanıcı </button>
				</div> <!-- /div-action -->				
				
				<table class="table" id="manageUserTable">
					<thead>
						<tr>
							<th style="width:10%;">Kullanıcı Adı</th>
							<th style="width:15%;">Actions</th>
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->


<!-- add user -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitUserForm" action="php_action/createUser.php" method="POST" enctype="multipart/form-data">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Yeni Kullanıcı</h4>
	      </div>

	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div id="add-user-messages"></div>

	      		     	           	       

	        <div class="form-group">
	        	<label for="userName" class="col-sm-3 control-label">Kullanıcı Adı: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="userName" placeholder="Kullanıcı Adı" name="userName" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	    

	        <div class="form-group">
	        	<label for="upassword" class="col-sm-3 control-label">Şifre: </label>
	        	
				    <div class="col-sm-8">
				      <input type="password" class="form-control" id="upassword" placeholder="Şifre" name="upassword" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	        	 

	        <div class="form-group">
	        	<label for="uemail" class="col-sm-3 control-label">Eposta: </label>
	        	
				    <div class="col-sm-8">
				      <input type="email" class="form-control" id="uemail" placeholder="Eposta" name="uemail" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	 
	        	         	        
	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove"></i> Kapat</button>
	        
	        <button type="submit" class="btn btn-primary" id="createUserBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok"></i> Değişiklikleri Kaydet</button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 
<!-- /add categories -->


<!-- edit categories brand -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	    	
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Düzenle</h4>
	      </div>
	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div class="div-loading">
	      		<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Loading...</span>
	      	</div>

	      	<div class="div-result">

				  <!-- Nav tabs -->
				  <ul class="nav nav-tabs" role="tablist">
				    <li role="presentation" class="active"><a href="#userInfo" aria-controls="profile" role="tab" data-toggle="tab">Kullanıcı Bilgileri</a></li>    
				  </ul>

				  <!-- Tab panes -->
				  <div class="tab-content">

				  	
				    
				    <!-- product image -->
				    <div role="tabpanel" class="tab-pane active" id="userInfo">
				    	<form class="form-horizontal" id="editUserForm" action="php_action/editUser.php" method="POST">				    
				    	<br />

				    	<div id="edit-user-messages"></div>

				    	<div class="form-group">
			        		<label for="edituserName" class="col-sm-3 control-label">Kullanıcı Adı: </label>
			        	
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="edituserName" placeholder="Kullanıcı Adı" name="edituserName" autocomplete="off">
						    </div>
			        	</div> <!-- /form-group-->	    

				        <div class="form-group">
				        	<label for="editPassword" class="col-sm-3 control-label">Şifre: </label>
				        	
							    <div class="col-sm-8">
							      <input type="password" class="form-control" id="editPassword" placeholder="Şifre" name="editPassword" autocomplete="off">
							    </div>
				        </div> <!-- /form-group-->	        	 

			         
         	        

			        <div class="modal-footer editUserFooter">
				        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Kapat</button>
				        
				        <button type="submit" class="btn btn-success" id="editProductBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
				      </div> <!-- /modal-footer -->				     
			        </form> <!-- /.form -->				     	
				    </div>    
				    <!-- /product info -->
				  </div>

				</div>
	      	
	      </div> <!-- /modal-body -->
	      	      
     	
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- /categories brand -->

<!-- categories brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeUserModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Kullanıcıyı Sil</h4>
      </div>
      <div class="modal-body">

      	<div class="removeUserMessages"></div>

        <p>Seçilen kullanıcıyı gerçekten silmek istiyor musunuz ?</p>
      </div>
      <div class="modal-footer removeProductFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove"></i> İptal Et</button>
        <button type="button" class="btn btn-primary" id="removeProductBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok"></i> Onayla</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /categories brand -->


<script src="custom/js/user.js"></script>

<?php require_once 'includes/footer.php'; ?>