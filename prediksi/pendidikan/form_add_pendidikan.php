<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SisDos - Pendidikan</title>
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
	<?php $hal = "pendidikan"; ?>
	<?php require_once("../layout/sidebar.php");	?>
	<!-- end-sidebar -->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li><a href="index.php">Pendidikan</a></li>
				<li class="active">Tambah Pendidikan</li>

			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data Pendidikan Dosen</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Tambah Data Pendidikan
					<div class="panel-body">
						<a href="index.php" class="btn btn-success">Kembali</a>
						<br>
						<form action="">
							<table class="table table-bordered">
		                    	<tr>
		                        	<td><label for="no">NIDN</label></td>
		                            <td><input type="text" id="no" name="no" class="form-control" /></td>
		                        </tr>
		                        <tr>
		                            <td><label for="tahun">Tahun Lulus</label></td>
		                            <td>
		                            	<div class="form-group">
		                            		<div class='input-group date' id='datetimepicker1'>
		                            			<input type="text" class="form-control" id="tahun_lulus" name="tahun_lulus" readonly>
		                            			<span class="input-group-addon">
		                            				<span class="glyphicon glyphicon-calendar"></span>
		                            			</span>
		                            		</div>
		                            	</div>
		                        	</td>
		                        <tr>
		                        	<td><label for="jenjang">Jenjang</label></td>
		                        	<td><select id="jenjang" name="jenjang" class="form-control">
									<option>Pilih</option>
		                            <option>Profesi</option>
		                            <option>S1</option>
		                            <option>S2</option>
		                            <option>S3</option>
		                            <option></option>
		                            </select>
		                            </td>    
		                        </tr>
		                        <tr>
		                        	<td><label for="gelar">Gelar</label></td>
		                            <td><input type="text" id="gelar" name="gelar" class="form-control" /></td>
		                        </tr>
		                        <tr>
		                            <td><label for="nama_univ">Nama Universitas</label></td>
		                            <td><input type="text" id="nama_universitas" name="nama_universitas" class="form-control" /></td>
		                        </tr>
		                        <tr>
		                            <td><label for="bidang_ilmu">Bidang Ilmu</label></td>
		                            <td><input type="text" id="bidang_ilmu" name="bidang_ilmu" class="form-control" /></td>
		                        </tr>
		                        <tr>
		                            <td><label for="no_ijasah">No. Ijasah</label></td>
		                            <td><input type="text" id="no_ijasah" name="no_ijasah" class="form-control" /></td>
		                        </tr>
		                        <tr>
		                    	<td><label for="foto1">Upload Ijasah</label></td>
		                        <td><input type="file" id="ijasah" name="ijasah"></td>
		                    	</tr>
		                    </table>
		                    <input type="submit" class="btn btn-primary" value="Simpan"> 
						</form>
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
	    $('#table-pendidikan').DataTable();
	} );
	</script>

</body>
</html>
<!-- end-footer -->