<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SisDos - Jabatan Fungsional</title>
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
	<?php $hal = "jabfungsional"; ?>
	<?php require_once("../layout/sidebar.php");	?>
	<!-- end-sidebar -->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li><a href="index.php">Jab.Fungsional</a></li>
				<li class="active">Jab.Fungsional</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data Jabatan Fungsional</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Edit Data Jabatan Fungsional
					<div class="panel-body">
						<a href="index.php" class="btn btn-success">Kembali</a>
						<br>
						<form action="">
							<table class="table table-condensed">
		                    	<tr>
		                        	<td style="width: 450px;"><label for="no">NIDN</label></td>
		                            <td><input type="text" id="no" name="no" class="form-control" /></td>
		                        </tr>
		                        <tr>
		                            <td><label for="tahun_jafung">Tahun Jabatan Fungsional</label></td>
		                            <td>
		                            	<div class="form-group">
		                            		<div class='input-group date' id='datetimepicker1'>
		                            			<input type="text" class="form-control" id="tahun_jafung" name="tahun_jafung" readonly>
		                            			<span class="input-group-addon">
		                            				<span class="glyphicon glyphicon-calendar"></span>
		                            			</span>
		                            		</div>
		                            	</div>
		                        	</td>
		                        <tr>
		                        	<td><label for="jafung">Jabatan Fungsional</label></td>
		                        	<td><select id="jafung" name="jafung" class="form-control">
		                            	<option>Pilih</option>
		                                <option>Staf Pengajar</option>
		                                <option>Asisten Ahli</option>
		                                <option>Lektor</option>
		                                <option>Lektor Kepala</option>
		                                <option>Guru Besar</option>
		                                <option></option>
		                                </select>
		                            </td>    
		                        </tr>
		                        <tr>
		                        	<td><label for="sk_jafung">Nomor SK Jabatan Fungsional</label></td>
		                            <td><input type="text" id="sk_jafung" name="sk_jafung" class="form-control" /></td>
		                        </tr>
		                        <tr>
		                        	<td><label for="sk_sertifikasi">SK Sertifikasi</label></td>
		                            <td><input type="text" id="sk_sertifikasi" name="sk_sertifikasi" class="form-control" /></td>
		                        </tr>
		                         <tr>
		                    		<td><label for="foto1">Upload SK Sertifikasi</label></td>
		                        	<td><input type="file" id="sksertifikasi" name="sksertifikasi"></td>
		                    	</tr>
		                    </table>
		                    <input type="submit" class="btn btn-primary" value="Update"> 
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
	    $('#table-jafung').DataTable();
	} );
	</script>

		
</body>
</html>
<!-- end-footer -->