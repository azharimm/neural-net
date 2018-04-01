<?php 
require("../koneksi.php");
ini_set('max_execution_time', 300);
if (isset($_POST['submit'])) {//Script akan berjalan jika di tekan tombol submit..
 
//Script Upload File..
    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
        echo "<h1>" . "File ". $_FILES['filename']['name'] ." Berhasil di Upload" . "</h1>";
    }
 
    //Import uploaded file to Database, Letakan dibawah sini..
    $handle = fopen($_FILES['filename']['tmp_name'], "r"); //Membuka file dan membacanya
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $import="INSERT into tb_data_training (No, InOpen, InHigh, InLow, InClose, OutOpen, OutHigh, OutLow, OutClose) values(NULL,'$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]')"; //data array sesuaikan dengan jumlah kolom pada CSV anda mulai dari “0” bukan “1”
        mysqli_query($koneksi, $import) or die(mysqli_error($koneksi)); //Melakukan Import
    }
 
    fclose($handle); //Menutup CSV file
    header("Location:index.php");//kembali ke index
    
}else { //Jika belum menekan tombol submit, form dibawah akan muncul..
 

} 

mysqli_close($koneksi); //Menutup koneksi SQL?>

 ?>