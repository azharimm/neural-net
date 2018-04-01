<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SisDos - Dosen</title>
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
	<?php $hal = "training"; ?>
	<?php require_once("../layout/sidebar.php");	?>
	<!-- end-sidebar -->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Data Latih</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data Latih Jaringan</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<form enctype='multipart/form-data' action='upload_training.php' method='post'>
						    Cari CSV File anda:<br />
						    <table class="table">
						    	<tr>
						    		<td width="100px"><input type='file' name='filename' size='100' required=""></td>
						    		<td width="50px;"><input type='submit' name='submit' value='Upload' class="btn btn-primary"></td>
						    		<?php 

						    		require_once("../koneksi.php");

						    		$query = "SELECT * FROM tb_data_training";
						    		$data = mysqli_query($koneksi, $query);
						    		if(mysqli_num_rows($data)){	

							    		if(!file_exists("../nn.ini")){
							    			echo "<td><a href='' class='btn btn-success'>Latih Jaringan</a></td>";
							    		}else{

							    			echo "<td width='50px'><a class='btn btn-danger'>Hapus data dan jaringan</a></td>";
							    			echo "<td><alert class='btn btn-success' disabled>Jaringan Sudah dilatih</alert></td>";
							    		}
						    		}

						    		?>

						    	</tr>
						    </table>
						    
						</form>

						<?php 

						if(mysqli_num_rows($data)){?>
							<table class="table table-bordered" id="table-dosen">
							<thead>
								<tr>
									<th>No</th>
									<th>Input Open</th>
									<th>Input High</th>
									<th>Input Low</th>
									<th>Input Close</th>
									<th>Output Open</th>
									<th>Output High</th>
									<th>Output Low</th>
									<th>Output Close</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$sql = "SELECT * FROM tb_data_training";
								$query = mysqli_query($koneksi, $sql);
								while($row=mysqli_fetch_array($query)){?>
								<tr>
									<td><?php echo $row['No']; ?></td>
									<td><?php echo $row['InOpen']*100000; ?></td>
									<td><?php echo $row['InHigh']*100000; ?></td>
									<td><?php echo $row['InLow']*100000; ?></td>
									<td><?php echo $row['InClose']*100000; ?></td>
									<td><?php echo $row['OutOpen']*100000; ?></td>
									<td><?php echo $row['OutHigh']*100000; ?></td>
									<td><?php echo $row['OutLow']*100000; ?></td>
									<td><?php echo $row['OutClose']*100000; ?></td>
									
									<td>
										<a href="" class="btn btn-warning btn-xs"><span class="fa fa-edit"></span></a>
										<a href="" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
									</td>
								</tr>
								<?php
								}
								 ?>
								
							</tbody>
						</table>
						<?php	
						}else{?>
							<br>
							<div class="panel panel-default">
								<div class="panel-heading">
									<center>Tidak Ada Data Training</center>
								</div>
							</div>
						<?php
						}
						?>
					
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
	    $('#table-dosen').DataTable();
	} );
	</script>
		
</body>
</html>
<!-- end-footer -->