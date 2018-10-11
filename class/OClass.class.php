<?php

abstract class OClass{

	static $verbose = true;

	protected function log($str){
		if (self::$verbose && isset($_SERVER["SESSIONNAME"]) && ($_SERVER["SESSIONNAME"] == "Console"))
			echo "[".get_class($this)."] ".$str."\n";
	}

	static function doc(){
		$file = fopen(__DIR__."/doc/".get_class().".doc.txt", "r");
		echo "\n";
		while ($file && !feof($file)){
			echo fgets($file);
		}
		echo "\n";
		fclose($file);
	}
}

?>