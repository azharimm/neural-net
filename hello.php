<?php 

$datas = array(array(3,2,1), array(1,2,2), array(1,5,4));
$datax = array(array(array(1,2,3), array(1,2,3)), array(array(1,2,3), array(1,2,3)));
$j = 0;
$l = 0;

$jumlah = array_keys($datas);
$jumlah2 = array_keys($datax);

$max = array_column(input, column_key)
echo "<pre>";
print_r($datas);
print_r($datax);
print_r($jumlah);
print_r($max);
echo "</pre>";
;

for($i = 0; $i < count($datas); $i++) {
    foreach($datas[$jumlah[$i]] as $key => $value) {
        $j++;
    }
}
echo $j;
echo "<br>";

for($i = 0; $i < count($datax); $i++) {
    foreach($datax[$jumlah2[$i]] as $key) {
        foreach ($key as $k => $value) {

        	$l++;
        	# code...
        }
    }
}

echo $l;

 ?>