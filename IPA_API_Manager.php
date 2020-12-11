<?php
class BreweryAPI{
	protected $string, $stdInstance;

	function __construct(){
		$this->string = file_get_contents("IPA_API.json");
		$this->stdInstance = json_decode($this->string, true);
	}

	function APIget($requestOne, $requestTwo = NULL){
	if ($requestTwo == NULL){
		print_r($this->stdInstance[$requestOne]);
		$jsonReturnFile = json_encode($this->stdInstance[$requestOne]);
		file_put_contents("IPAgetRequest.json", $jsonReturnFile);
	}
	else{
		print_r($this->stdInstance[$requestOne][$requestTwo]);
		$jsonReturnFile = json_encode($this->stdInstance[$requestOne][$requestTwo]);
		file_put_contents("IPAgetRequest.json", $jsonReturnFile);
	}
	}
	function APIput($putArray){
		$jsonReturnFile = json_encode($putArray);
		array_push($this->stdInstance, $putArray);
		
		file_put_contents("IPA_API.json", json_encode($this->stdInstance));
		file_put_contents("IPAputRequest.json", $jsonReturnFile);
	}
	
}


$API = new BreweryAPI();
$API->APIget('beer', 'IPA');
$API->APIput(array('brewery'));
