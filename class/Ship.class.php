<?php

class Ship extends Entity{

	const	SHIP_CLASS = [
		"Corvet"				=> [1, 2],
		"Heavy Corvet"			=> [1, 3],
		"Friget"				=> [1, 4],
		"Distroyer"				=> [1, 5],
		"Flagship"				=> [2, 7]
	];


	public		$name;
	protected	$class;
	protected	$hull;
	protected	$power;
	protected	$handling;
	protected	$shield;
	protected	$speed;
	protected	$weapons	=	[];

	function __construct($params){
		foreach($params as $k=>$p){
			$this->$k = $p;
		}
		$this->log("Ship created. $this");
	}

	function getSize(){
		return $this->class;
	}

	function __toString(){
		return "$this->class '$this->name'";
	}
}


?>