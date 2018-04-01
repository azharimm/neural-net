<?php 

require_once ("class_neuralnetwork.php");
require_once ("koneksi.php");
// Create a new neural network with 3 input neurons,
// 4 hidden neurons, and 1 output neuron
$n = new NeuralNetwork(4, 3, 4);
$n->setVerbose(false);

$a = array();
// Add test-data to the network. In this case, 
// we want the network to learn the 'XOR'-function
$sql = "SELECT * FROM tb_data_training";
$query = mysqli_query($koneksi, $sql);

while($row=mysqli_fetch_array($query)){

$n->addTestData(array ( $row['InOpen'], $row['InHigh'], $row['InLow'], $row['InClose'] ), array ($row['OutOpen'], $row['OutHigh'], $row['OutLow'], $row['OutClose']));

}


// we try training the network for at most $max times
$max = 3;
$i = 0;
echo "<h1>Training Data</h1>";
// train the network in max 1000 epochs, with a max squared error of 0.01
while (!($success = $n->train(1000, 0.01)) && ++$i<$max) {
	echo "Round $i: No success...<br />";
}
// print a message if the network was succesfully trained
if ($success) {
    $epochs = $n->getEpoch();
	echo "Success in $epochs training rounds!<br />";
	$n->save("nn.ini");
	echo "Neural Net Berhasil Disimpan";
}


 ?>