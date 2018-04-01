<?php 
class neural {
	public $nodeCount = array ();
	public $nodeValue = array ();
	public $nodeThreshold = array ();
	public $edgeWeight = array ();
	public $learningRate = array (0.1);
	public $layerCount = 0;
	public $previousWeightCorrection = array ();
	public $momentum = 0.8;
	public $isVerbose = true;
	public $weightsInitialized = false;
	public $trainInputs = array ();
	public $trainOutput = array ();
	public $trainDataID = array ();
	public $controlInputs = array ();
	public $controlOutput = array ();
	public $controlDataID = array ();
	public $epoch;
	public $errorTrainingset;
	public $errorControlset;
	public $success;
	public $position = array();
	public $velocity = array();
	public $pbest = array();
	public $gbest = 0;
	public $max = 0;
	public	$c1 = 0;
	public	$c2 = 0;
	public	$r1 = 0;
	public	$r2 = 0;
	public $it = 0;
	

	public function __construct($nodeCount) {
		if (!is_array($nodeCount)) {
			$nodeCount = func_get_args();
		}
		$this->nodeCount = $nodeCount;
		// store the number of layers
		$this->layerCount = count($this->nodeCount);
	}

	public function getRandomWeight($layer) {
		return ((mt_rand(0, 1000) / 1000) - 0.5) / 2;
	}

	public function initWeights() {
		// assign a random value to each edge between the layers, and randomise each threshold
		//
		// 1. start at layer '1' (so skip the input layer)
		for ($layer = 1; $layer < $this->layerCount; $layer ++) {
			$prev_layer = $layer -1;
			// 2. in this layer, walk each node
			for ($node = 0; $node < $this->nodeCount[$layer]; $node ++) {
				// 3. randomise this node's threshold
				$this->nodeThreshold[$layer][$node] = $this->getRandomWeight($layer);
				// 4. this node is connected to each node of the previous layer
				for ($prev_index = 0; $prev_index < $this->nodeCount[$prev_layer]; $prev_index ++) {
					// 5. this is the 'edge' that needs to be reset / initialised
					$this->edgeWeight[$prev_layer][$prev_index][$node] = $this->getRandomWeight($prev_layer);
					// 6. initialize the 'previous weightcorrection' at 0.0
					$this->previousWeightCorrection[$prev_layer][$prev_index] = 0.0;
				}
			}
		}
		$this->nodeThresholdPSO($this->nodeThreshold);
	}

	//Optimasi nilai bias dengan Algoritma PSO
	public function nodeThresholdPSO($nodeThreshold){


		for ($layer = 1; $layer < $this->layerCount; $layer ++) {
			$prev_layer = $layer -1;
			for ($node = 0; $node < $this->nodeCount[$layer]; $node ++) {

				$this->position[$layer][$node] = $nodeThreshold[$layer][$node];
				$this->velocity[$layer][$node] = ((mt_rand(0, 1000) / 1000) - 0.5) / 2;
				//fungsi tujuan partikel single min f(x) = x
				$this->pbest[$layer][$node] = $this->position[$layer][$node];

			}
		}

		do{

			for ($layer = 1; $layer < $this->layerCount; $layer ++) {
				$prev_layer = $layer -1;
				for ($node = 0; $node < $this->nodeCount[$layer]; $node ++) {

					if($this->pbest[$layer][$node] > $this->position[$layer][$node]){

						$this->pbest[$layer][$node] = $this->position[$layer][$node];
					}

					if($this->pbest[$layer][$node] < $this->gbest){

						$this->gbest = $this->pbest[$layer][$node];
						
					}

					if($this->pbest[$layer][$node] > $this->max){

						$this->max = $this->pbest[$layer][$node];
						
					}


					$this->c1 = mt_rand(0,1);
					$this->c2 = mt_rand(0,1);
					$this->r2 = mt_rand(0,1);
					$this->r2 = mt_rand(0,1);
		
					$this->velocity[$layer][$node] = $this->velocity[$layer][$node] * ($layer - 1) + $this->c1 * $this->r1 * ($this->pbest[$layer][$node]-$this->position[$layer][$node]) + $this->c2 * $this->r2 * ($this->gbest - $this->position[$layer][$node]);
					$this->position[$layer][$node] = $this->position[$layer][$node] + $this->velocity[$layer][$node];





				}
			}

			$selisih = $this->max - $this->gbest;
			echo $this->it;
			$this->it++;

		}while($selisih < 0.5 && $selisih > 0);

		$this->nodeThreshold = $this->pbest;
	}

	public function addTestData($input, $output, $id = null) {
		$index = count($this->trainInputs);
		foreach ($input as $node => $value) {
			$this->trainInputs[$index][$node] = $value;
		}
		foreach ($output as $node => $value) {
			$this->trainOutput[$index][$node] = $value;
		}
		$this->trainDataID[$index] = $id;
	}

	public function calculate($input) {
		// put the input vector on the input nodes
		foreach ($input as $index => $value) {
			$this->nodeValue[0][$index] = $value;
		}
		// iterate the hidden layers
		for ($layer = 1; $layer < $this->layerCount; $layer ++) {
			$prev_layer = $layer -1;
			// iterate each node in this layer
			for ($node = 0; $node < ($this->nodeCount[$layer]); $node ++) {
				$node_value = 0.0;
				// each node in the previous layer has a connection to this node
				// on basis of this, calculate this node's value
				for ($prev_node = 0; $prev_node < ($this->nodeCount[$prev_layer]); $prev_node ++) {
					$inputnode_value = $this->nodeValue[$prev_layer][$prev_node];
					$edge_weight = $this->edgeWeight[$prev_layer][$prev_node][$node];
					$node_value = $node_value + ($inputnode_value * $edge_weight);
				}
				// apply the threshold
				$node_value = $node_value - $this->nodeThreshold[$layer][$node];
				// apply the activation function
				$node_value = $this->activation($node_value);
				// remember the outcome
				$this->nodeValue[$layer][$node] = $node_value;
			}
		}
		// return the values of the last layer (the output layer)
		return $this->nodeValue[$this->layerCount - 1];
	}

	protected function activation($value) {
		return tanh($value);
		// return (1.0 / (1.0 + exp(- $value)));
	}

	private function backpropagate($output, $desired_output) {
		$errorgradient = array ();
		$outputlayer = $this->layerCount - 1;
		$momentum = $this->getMomentum();
		// Propagate the difference between output and desired output through the layers.
		for ($layer = $this->layerCount - 1; $layer > 0; $layer --) {
			for ($node = 0; $node < $this->nodeCount[$layer]; $node ++) {
				// step 1: determine errorgradient
				if ($layer == $outputlayer) {
					// for the output layer:
					// 1a. calculate error between desired output and actual output
					$error = $desired_output[$node] - $output[$node];
					// 1b. calculate errorgradient
					$errorgradient[$layer][$node] = $this->derivativeActivation($output[$node]) * $error;
				} else {
					// for hidden layers:
					// 1a. sum the product of edgeWeight and errorgradient of the 'next' layer
					$next_layer = $layer +1;
					$productsum = 0;
					for ($next_index = 0; $next_index < ($this->nodeCount[$next_layer]); $next_index ++) {
						$_errorgradient = $errorgradient[$next_layer][$next_index];
						$_edgeWeight = $this->edgeWeight[$layer][$node][$next_index];
						$productsum = $productsum + $_errorgradient * $_edgeWeight;
					}
					// 1b. calculate errorgradient
					$nodeValue = $this->nodeValue[$layer][$node];
					$errorgradient[$layer][$node] = $this->derivativeActivation($nodeValue) * $productsum;
				}
				// step 2: use the errorgradient to determine a weight correction for each node
				$prev_layer = $layer -1;
				$learning_rate = $this->getlearningRate($prev_layer);
				for ($prev_index = 0; $prev_index < ($this->nodeCount[$prev_layer]); $prev_index ++) {
					// 2a. obtain nodeValue, edgeWeight and learning rate
					$nodeValue = $this->nodeValue[$prev_layer][$prev_index];
					$edgeWeight = $this->edgeWeight[$prev_layer][$prev_index][$node];
					// 2b. calculate weight correction
					$weight_correction = $learning_rate * $nodeValue * $errorgradient[$layer][$node];
					// 2c. retrieve previous weight correction
					$prev_weightcorrection = @$this->previousWeightCorrection[$layer][$node];
					// 2d. combine those ('momentum learning') to a new weight
					$new_weight = $edgeWeight + $weight_correction + $momentum * $prev_weightcorrection;
					// 2e. assign the new weight to this edge
					$this->edgeWeight[$prev_layer][$prev_index][$node] = $new_weight;
					// 2f. remember this weightcorrection
					$this->previousWeightCorrection[$layer][$node] = $weight_correction;
				}
				// step 3: use the errorgradient to determine threshold correction
				$threshold_correction = $learning_rate * -1 * $errorgradient[$layer][$node];
				$new_threshold = $this->nodeThreshold[$layer][$node] + $threshold_correction;
				$this->nodeThreshold[$layer][$node] = $new_threshold;
			}
		}
	}
	
}
// $in = array(1,1,1,1);
// $out = array(0,0,0,0);
$n = new neural(4,3,4);
$datas = array(array(3,2,1), array(1,2,2), array(1,5,4));
// $n->addTestData(array ( 0, 0, 0, 0), array (1, 1, 1, 1));
// $n->addTestData(array ( 0, 0, 0, 1), array (1, 1, 1, 0));
// $n->addTestData(array ( 0, 0, 1, 1), array (1, 1, 0, 0));
// $n->addTestData(array ( 0, 1, 1, 1), array (1, 0, 0, 0));
$n->initWeights();

$n->calculate(array(1,1,0,0));





?>
<pre>
<!-- 	<p>Train Input</p>
	<?php print_r($n->trainInputs); ?>
	<p>Train Output</p>
	<?php print_r($n->trainOutput); ?> -->
	<p>Node Treshold</p>
	<?php print_r($n->nodeThreshold); ?>
<!-- 	<p>Edge Weight</p>
	<?php print_r($n->edgeWeight); ?>
	<p>Prev Weight Correction</p>
	<?php print_r($n->previousWeightCorrection); ?>
	<p>Random</p>
	<?php echo $index = mt_rand(0, 4 - 1); ?>
	<p>Hasil Calculate</p>
	<p><?php print_r($n->nodeValue); ?></p> -->


	<p>Position</p>
	<p><?php print_r($n->position) ?></p>

	<p>Velocity</p>
	<p><?php print_r($n->velocity) ?></p>
	<p>Pbest</p>
	<p><?php print_r($n->pbest); ?></p>
	<p>Gbest</p>
	<p><?php echo $n->gbest; ?></p>
	<p>Max</p>
	<p><?php echo $n->max; ?></p>
</pre>






 