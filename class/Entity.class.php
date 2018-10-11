<?php

class Entity extends OClass{

	private $_location = [];
	private $_size = [];

	public function __toString(){
		return "O";
	}

	function getSize(){
		return $this->_size;
	}

	function getLocation(){
		return $this->_location;
	}
}

?>