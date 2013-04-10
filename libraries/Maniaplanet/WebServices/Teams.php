<?php
/**
 * @copyright   Copyright (c) 2009-2012 NADEO (http://www.nadeo.com)
 * @license     http://www.gnu.org/licenses/lgpl.html LGPL License 3
 * @version     $Revision: 170 $:
 * @author      $Author: baptiste33@gmail.com $:
 * @date        $Date: 2012-10-16 11:22:12 +0200 (mar., 16 oct. 2012) $:
 */

namespace Maniaplanet\WebServices;

class Teams extends HTTPClient
{
	/**
	 * @param int $id Id of the team
	 * @return object
	 * @throws Exception
	 */
	function get($id)
	{
		if (!$id)
		{
			throw new Exception('Invalid id');
		}

		return $this->execute('GET', '/teams/%d/', array($id));
	}

	/**
	 * @param int $id Id of the team
	 * @return object
	 * @throws Exception
	 */
	function getContracts($id)
	{
		if (!$id)
		{
			throw new Exception('Invalid id');
		}

		return $this->execute('GET', '/teams/%d/contracts/', array($id));
	}


	/**
	 * @param int $id Id of the team
	 * @return object
	 * @throws Exception
	 */
	function getAdmins($id)
	{
		if (!$id)
		{
			throw new Exception('Invalid id');
		}

		return $this->execute('GET', '/teams/%d/admins/', array($id));
	}
}