<?php

abstract class Loader extends OClass{
	private static $_ships;
	private static $_models;
	private static $_names;

	static function loadShipsFromJson($file){
		if (!file_exists($file))
			die("Unable to load ship file '$file'");
		$json = json_decode(file_get_contents($file), true);
		foreach($json as $k => $s)
			self::$_ships[trim($k)] = new Ship($s);
		self::$_models = array_keys(self::$_ships);
		self::$_names = json_decode(file_get_contents("names.json"), true);
	
		
	}

	static function getModels(){
		return self::$_models;
	}

	static function spawnShip($model) : Ship{
		if (empty(self::$_ships[$model]))
			die("Invalid model: $model");
		$m = self::$_ships[$model];
		$ret = clone $m;
		$n = rand(0, count(self::$_names));
		$ret->name = self::$_names[$n];
		array_splice(self::$_names, $n, 1);
		return $ret;
	}
}

?>