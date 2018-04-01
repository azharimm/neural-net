<?php 

require_once ("class_neuralnetwork.php");

$n = new NeuralNetwork(4, 3, 4);
$n->setVerbose(false);

$load = $n->load("nn.ini");

if(!$load){
	echo "Tidak ada jaringan yang telah dilatih";
} else{



$output = $n->calculate(array(0.04100, 0.04151, 0.04094, 0.04151)); // Gives [-1].
$output1 = $n->calculate(array(0.04151, 0.04205, 0.04130, 0.04161)); // Gives [-1].
$output2 = $n->calculate(array(0.04161, 0.04198, 0.04100, 0.04110)); // Gives [-1].
$output3 = $n->calculate(array(0.04110, 0.04189, 0.04100, 0.04189)); // Gives [-1].
$output4 = $n->calculate(array(0.04189, 0.04210, 0.04150, 0.04210)); // Gives [-1].
echo "<p>Hasil Prediksi</p>";
echo "<pre>";
print_r($output);
print_r($output1);
print_r($output2);
print_r($output3);
print_r($output4);
echo "</pre>";
}



 ?>