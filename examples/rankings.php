<?php
/**
 * Maniaplanet Web Services SDK for PHP
 *
 * @copyright   Copyright (c) 2009-2011 NADEO (http://www.nadeo.com)
 * @license     http://www.gnu.org/licenses/lgpl.html LGPL License 3
 * @author      $Author: baptiste33@gmail.com $:
 * @version     $Revision: 194 $:
 * @date        $Date: 2013-05-17 14:08:26 +0200 (ven., 17 mai 2013) $:
 */
require_once __DIR__.'/../libraries/autoload.php';

echo "Enter your API username:\n";
$username = trim(fgets(STDIN));

echo "Enter your API password:\n";
$password = trim(fgets(STDIN));

$player = new \Maniaplanet\WebServices\Players($username, $password);

try
{
	echo "Canyon rankings:";
	$rankings = new \Maniaplanet\WebServices\Rankings($username, $password);
	print_r($rankings->getMultiplayerWorld('TMCanyon',0,2));
}
catch(\Maniaplanet\WebServices\Exception $e)
{
	echo "Error!\n";
	printf('HTTP Response: %d %s', $e->getHTTPStatusCode(),
		$e->getHTTPStatusMessage());
	echo "\n";
	printf('API Response: %s (%d)', $e->getMessage(), $e->getCode());
	echo "\n";
}
try
{
	echo "Storm rankings:";
	$rankings = new \Maniaplanet\WebServices\Rankings($username, $password);
	print_r($rankings->getMultiplayerWorld('SMStorm',0,2));
}
catch(\Maniaplanet\WebServices\Exception $e)
{
	echo "Error!\n";
	printf('HTTP Response: %d %s', $e->getHTTPStatusCode(),
		$e->getHTTPStatusMessage());
	echo "\n";
	printf('API Response: %s (%d)', $e->getMessage(), $e->getCode());
	echo "\n";
}
try
{
	echo "Elite rankings:";
	$rankings = new \Maniaplanet\WebServices\Rankings($username, $password);
	print_r($rankings->getMultiplayerWorld('SMStormElite@nadeolabs',0,2));
}
catch(\Maniaplanet\WebServices\Exception $e)
{
	echo "Error!\n";
	printf('HTTP Response: %d %s', $e->getHTTPStatusCode(),
		$e->getHTTPStatusMessage());
	echo "\n";
	printf('API Response: %s (%d)', $e->getMessage(), $e->getCode());
	echo "\n";
}
echo "\n";

?>