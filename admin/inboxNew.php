
	<style>
		#myBtn { 
		  position: fixed;
		  bottom: 20px;
		  right: 30px;
		  z-index: 99;
		  font-size: 18px;
		  border: none;
		  outline: none; 
		  cursor: pointer;
		  padding: 15px; 
		}
		#myBtn1 { 
		  position: fixed;
		  bottom: 20px;
		  right: 30px;
		  z-index: 99;
		  font-size: 18px;
		  border: none;
		  outline: none; 
		  cursor: pointer;
		  padding: 15px; 
		}
	</style>
	
<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<?php include('../pages/header-main.php'); ?>

		<!-- Main content -->
		<section class="content container-fluid">
			<h1>Inbox</h1>
			
			<a href="#add_PostToUser" id="myBtn" class="btn btn-primary" data-toggle="modal"><i class="fa fa-plus fa-lg"></i></a>
		</section>
		<!-- /.content -->
		
	<?php include('crudroom_modal.php'); ?>
	<?php include('modal.php'); ?>
  <!-- /.content-wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<?php include "../pages/foobar.php" ?>