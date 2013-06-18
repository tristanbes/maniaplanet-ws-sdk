<?php
/**
 * Maniaplanet Web Services SDK for PHP
 *
 * @see		    http://code.google.com/p/maniaplanet-ws-sdk/
 * @copyright   Copyright (c) 2009-2011 NADEO (http://www.nadeo.com)
 * @license     http://www.gnu.org/licenses/lgpl.html LGPL License 3
 * @author      $Author: maxime $:
 * @version     $Revision: 7090 $:
 * @date        $Date: 2012-05-09 19:54:25 +0200 (mer., 09 mai 2012) $:
 */

namespace Maniaplanet\WebServices;

/**
 * Access to public Manialink data
 */
class Manialinks extends HTTPClient
{

	/**
	 * Retrieves information about a Manialink code.
	 * 
	 * @param string $code Short Manialink code
	 * @return object
	 * @throws \TrackMania\WebServices\Exception 
	 */
	function get($code)
	{
		if(!$code)
		{
			throw new Exception('Invalid Manialink code');
		}
		return $this->execute('GET', '/manialinks/%s/', array($code));
	}

}

?>