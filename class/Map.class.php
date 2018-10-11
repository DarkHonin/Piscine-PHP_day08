<?php

class Map extends OClass{

	private $_grid		= array();
	private $_entities	= array();
	private $_ships		= array();
	private $_obsticles = array();


	function __construct(){
		for($i = 0; $i < 100; $i++)
			$this->_grid[$i] = array_fill(0, 150, '-');
		$this->log("Created Map");
	}

	function registerObsticle(Obsticle $o){
		if (array_search($o, $this->_entities))
			return $this->log("Obsticle aready registered on map");


		array_push($this->_obsticles, $o);
		array_push($this->_entities, $o);

		$this->log("Obsticle regitered");
		return true;
	}

	function registerPlayerShips(Player $p){
		foreach($p->ships as $o){
			if (array_search($o, $this->_entities))
				return $this->log("Ship aready registered on map");
			array_push($this->_ships, $o);
			array_push($this->_entities, $o);
		}
		$this->log("Ships regitered for player $p");
		return true;
	}

	function renderState($pos = [0, 0], $size = [10, 10]){
		echo "<div class='field'>";
		for($y = 0; $y < $size[1]; $y++){
			echo "<div class='row'>";
			for($x = 0; $x < $size[0]; $x++){
				echo "<div class='tile' posx='$x' posy='$y'></div>";
			}
			echo "</div>";
		}
		echo "</div>";
	}

}

?>