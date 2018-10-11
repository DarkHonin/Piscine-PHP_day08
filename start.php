<?php
require_once("class/loadClasses.php");

Loader::loadShipsFromJson("ships.json");
Render::init();

$pn1 = readline("Player 1 name: ");
$pn2 = readline("Player 2 name: ");

$game = new Game($pn1, $pn2);
$query = "begin";
$phases = [
	"Placement",
	"Orders",
	"Movement",
	"Fireing"
];

function help(){
	echo "Orders: \n";
	echo "\tPower status\n";
	echo "\tPower to {sysetem}\n";
	echo "\t\tEngines\n";
	echo "\t\tShields\n";
	echo "\t\tWeapons\n";
	readline("Press the return key to continue");
}


function quit(){
	echo "Praise the Empiror!";
	exit();
}

while ($query != 'quit'){
	Render::display();
	$query != readline(":: ");
	
}

?>