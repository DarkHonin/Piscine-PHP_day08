<?php

class Player extends OClass{

	public $ships = array();
	public	$name = "Undefined";

	function __construct($name){
		$this->name = $name;
		foreach(Loader::getModels() as $m){
			array_push($this->ships, $ship = Loader::spawnShip($m));
			$this->log("Ship registered to player $this->name: $ship");
		}
	}

	function __toString(){
		return $this->name;
	}

}

?>