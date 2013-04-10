<?php
/**
 * Maniaplanet Web Services SDK for PHP
 *
 * @copyright   Copyright (c) 2009-2011 NADEO (http://www.nadeo.com)
 * @license     http://www.gnu.org/licenses/lgpl.html LGPL License 3
 * @author      $Author: baptiste33@gmail.com $:
 * @version     $Revision: 172 $:
 * @date        $Date: 2012-12-18 14:59:15 +0100 (mar., 18 déc. 2012) $:
 */
require_once __DIR__.'/../libraries/autoload.php';

echo "Enter your API username:\n";
$username = trim(fgets(STDIN));

echo "Enter your API password:\n";
$password = trim(fgets(STDIN));

$players = new \Maniaplanet\WebServices\Players($username, $password);


try
{
	echo "A server list:";
	$service = new \Maniaplanet\WebServices\Servers($username, $password);
	$list = $service->getFilteredList(array('environment'=>'Storm', 'title'=>'SMStorm', 'mode'=>'Melee', 'playersMin'=>1, 'hideFull'=>true, 'visibility'=>'visible', 'zone'=>'World|France','length'=>20));
	print_r($list);
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