<?php

class Game extends OClass{

	private $_players = [];
	public	$gameMap;

	function __construct($p1, $p2){
		$this->_players[0] = new Player($p1);
		$this->_players[1] = new Player($p2);
		$this->gameMap = new Map();
		foreach($this->_players as $p)
			$this->gameMap->registerPlayerShips($p);
		$this->log("Created Game between: $p1 and $p2");
	}


}

?>