<?php
require_once("class/loadClasses.php");

Loader::loadShipsFromJson("ships.json");
Render::init();

$pn1 = readline("Player 1 name: ");
$pn2 = readline("Player 2 name: ");

$game = new Game($pn1, $pn2);
$query = "begin";

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

function ship_power_status(){
	echo "power status\n";
}

function ship_power_to($system){
	echo "$system\n";
}

function list_ships(){
	global $game;
	$p = $game->getCurrentPlayer();
	foreach($p->ships as $k=>$s){
		echo "[$k]$s\n";
	}
}

function ship_status($ship = Null){

}

function ship_place($ship, $place){
	echo "ship placement\n";
}

$game->start();


?>	