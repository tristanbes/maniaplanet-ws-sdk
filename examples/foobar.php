<?php
/**
 * Maniaplanet Web Services SDK for PHP
 *
 * @copyright   Copyright (c) 2009-2011 NADEO (http://www.nadeo.com)
 * @license     http://www.gnu.org/licenses/lgpl.html LGPL License 3
 * @author      $Author: maximeraoust $:
 * @version     $Revision: 2 $:
 * @date        $Date: 2011-09-08 18:03:11 +0200 (jeu., 08 sept. 2011) $:
 */
require_once __DIR__.'/../libraries/autoload.php';

try
{
	$foobar = new Maniaplanet\WebServices\Foobar();
	print_r($foobar->get());
	echo "\n";
	print_r($foobar->delete());
	echo "\n";
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