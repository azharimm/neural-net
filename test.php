<?php 
require_once ("class_neuralnetwork.php");

$n = new NeuralNetwork(2, 2, 1);
$n->setVerbose(false);

$load = $n->load("nn.ini");

if($load){
	echo "Load Sukses<br>";
}
$output = $n->calculate(array(0,0)); // Gives [-1].
$output2 = $n->calculate(array(1,1)); // Gives [1].
print_r($output)."<br>";
print_r($output2);

// echo $output[0]. " dan ".$output[1]."<br>";
// echo $output2[0]. " dan ".$output2[1];



 ?>