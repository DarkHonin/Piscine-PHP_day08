<?php

class Game extends OClass{

	const Phases = [
		"Placement",
		"Orders",
		"Movement",
		"Fire",
		"Excecute"
	];

	const functions = [
		[
			"place" => "ship_place",
			"status" =>[
				"power" => "ship_power_status",
				"ships" => "list_ships",
				"ship"
			]
		],
		[
			"power" => [
				"to"	=> "ship_power_to"
			]
		],
		"status" =>[
			"power" => "ship_power_status",
			"ships" => "ship_status"
		],
		"quit" => "quit"
	];

	private $_players = [];
	public	$gameMap;
	public	$turn = 0;
	public 	$phase = 0;
	private $_current_player = 0;

	function __construct($p1, $p2){
		$this->_players[0] = new Player($p1);
		$this->_players[1] = new Player($p2);
		$this->gameMap = new Map();
		foreach($this->_players as $p)
			$this->gameMap->registerPlayerShips($p);
		$this->log("Created Game between: $p1 and $p2");
	}

	function getCurrentPlayer(){
		return $this->_players[$this->_current_player];
	}

	function nextPhase(){
		if ($this->_current_player == 2)
			$this->phase++;
	}

	function parse($str){
		$parts = explode(" ", $str);
		$parts = array_reverse($parts);
		$hold = Game::functions[$this->phase];
		while (!is_callable($hold)){
			if (empty($parts))
				return help();
			$prt = array_pop($parts);
			if(!isset($hold[$prt]))
				return help();
			$hold = $hold[$prt];
		}
		$hold = $hold;
		call_user_func_array($hold, $parts);
	}

	function start(){
		while ($query != 'quit'){
			$query = readline(self::Phases[$this->phase].":: ");
			$this->parse($query);
		}
	}

	
}

?>