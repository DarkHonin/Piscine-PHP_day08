<?php

abstract class	Render{
	static public $view = [150, 100];
	static private $_image = [];

	static function init(){
		for($i = 0; $i < self::$view[1]; $i++)
			self::$_image[$i] = array_fill(0, self::$view[0], '-');
	}

	static function display(){
		foreach(self::$_image as $k=>$r){
			printf("%4.0f | %s\n",$k, implode("", $r));
		}
	}
}

?>