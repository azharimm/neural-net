<?php 
//objective function f(x) = x
// ini_set('max_execution_time', 300);
$velocity = array();
$position = array();
$pbest = array();
$gbest = 0;
$particle = array(0.145, -0.192, 0.11, 0.176);
$dim = 1;
$iteration = 1;
$c1 = 1;
$c2 = 1;
$r1 = 0;
$r2 = 0;

//Inisialisasi

for($i = 0; $i < count($particle); $i++){

	for($j = 0; $j < $dim; $j++){

		$position[$i][$j] = $particle[$i];

		$velocity[$i][$j] = 0;


	}

	$pbest[$i] = $position[$i][0];
		
}


//Cari global best	
do{

	for($i = 0; $i < count($particle); $i++){

			if($pbest[$i] > $position[$i][0]){

				$pbest[$i] = $position[$i][0];
			}

			$gbest = min($pbest);

			for($j = 0; $j < $dim; $j++){

				$r1 = ((mt_rand(0, 1000) / 1000) - 0.5) / 2;
				$r2 = ((mt_rand(0, 1000) / 1000) - 0.5) / 2;
		
				$velocity[$i][$j] = $velocity[$i][$j]*($i - 1) + $c1*$r1*($pbest[$i]-$position[$i][$j]) + $c2 * $r2 * ($gbest - $position[$i][$j]);
				$position[$i][$j] = $position[$i][$j] + $velocity[$i][$j];

			}
			
	}
	// echo $iteration;
	$selisih = max($pbest) - min($pbest);
	echo $selisih;
	echo " - ";
	$iteration++;

}while($iteration < 100 && $selisih < 0.5);

	


		echo "<pre>";
		echo "Posisi";
		print_r($position);
		echo "Velocity";
		print_r($velocity);
		echo "Pbest";
		print_r($pbest);
		echo "Gbest : ";
		echo $gbest;
		echo "</pre>";



 ?>