<?php
/**
 * @copyright   Copyright (c) 2009-2012 NADEO (http://www.nadeo.com)
 * @license     http://www.gnu.org/licenses/lgpl.html LGPL License 3
 * @version     $Revision: 191 $:
 * @author      $Author: baptiste33@gmail.com $:
 * @date        $Date: 2013-04-23 12:31:31 +0200 (mar., 23 avr. 2013) $:
 */

namespace Maniaplanet\WebServices;

class Teams extends HTTPClient
{
    /**
     * @param  int       $id Id of the team
     * @return object
     * @throws Exception
     */
    public function get($id)
    {
        if (!$id) {
            throw new Exception('Invalid id');
        }

        return $this->execute('GET', '/teams/%d/', array($id));
    }

    /**
     * @param  int       $id Id of the team
     * @return object
     * @throws Exception
     */
    public function getContracts($id)
    {
        if (!$id) {
            throw new Exception('Invalid id');
        }

        return $this->execute('GET', '/teams/%d/contracts/', array($id));
    }

    /**
     * @param  int       $id Id of the team
     * @return object
     * @throws Exception
     */
    public function getAdmins($id)
    {
        if (!$id) {
            throw new Exception('Invalid id');
        }

        return $this->execute('GET', '/teams/%d/admins/', array($id));
    }

    public function getRank($id)
    {
        if (!$id) {
            throw new Exception('Invalid id');
        }

        return $this->execute('GET', '/teams/%d/rank/', array($id));
    }
}
