<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SisDosen - Jab Akademik</title>
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="../assets/css/font-awesome.min.css" rel="stylesheet">
	<link href="../assets/css/datepicker3.css" rel="stylesheet">
	<link href="../assets/css/styles.css" rel="stylesheet">
	<link href="../assets/DataTables/datatables.min.css" rel="stylesheet">
	<style type="text/css">
		table{
			font-size: 15px;
		}
	</style>
	
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>

	<!-- navbar here -->
	<?php require_once("../layout/navbar.php");	?>
	<!-- end-navbar -->
	
	<!-- sidebar here -->
	<?php $hal = "jabakademik"; ?>
	<?php require_once("../layout/sidebar.php");	?>
	<!-- end-sidebar -->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Jab.Akademik</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data Jabatan Akademik</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Manajemen Data Jabatan Akademik
					<div class="panel-body">
						<a href="form_add_jabakademik.php" class="btn btn-primary">Tambah</a>
						<br>
						<table class="table table-bordered" id="table-jaak">
							<thead>
								<tr>
									<th>No</th>
									<th>NIDN</th>
									<th>Tahun Diangkat</th>
									<th>Posisi</th>
									<th>No SK</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>1123456789</td>
									<td>2015</td>
									<td>Pengajar</td>
									<td>XXI/2016/12</td>
									<td>
										<a href="form_edit_jabakademik.php" class="btn btn-warning btn-sm"><span class="fa fa-edit"></span></a>
										<a href="delete_jabakademik.php" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
									</td>
								</tr>
							</tbody>
						</table>
						
					</div>
				</div>
			</div>
		</div><!--/.row-->
		
	</div>	<!--/.main-->
	
<!-- footer -->
	<script src="../assets/js/jquery-1.11.1.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/bootstrap-datepicker.js"></script>
	<script src="../assets/js/custom.js"></script>
	<script type="text/javascript" src="../assets/DataTables/datatables.min.js"></script>
	<script>


	$(document).ready(function() {
	    $('#table-jaak').DataTable();
	} );
	</script>

</body>
</html>
<!-- end-footer -->