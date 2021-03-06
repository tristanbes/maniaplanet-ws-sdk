<?php
/**
 * Maniaplanet Web Services SDK for PHP
 *
 * @see		    http://code.google.com/p/maniaplanet-ws-sdk/
 * @copyright   Copyright (c) 2009-2011 NADEO (http://www.nadeo.com)
 * @license     http://www.gnu.org/licenses/lgpl.html LGPL License 3
 * @author      $Author: baptiste33@gmail.com $:
 * @version     $Revision: 113 $:
 * @date        $Date: 2012-07-11 14:56:37 +0200 (mer., 11 juil. 2012) $:
 */

namespace Maniaplanet\WebServices;

/**
 * Access to public zones data.
 * You can either work with zones using their IDs of their full paths.
 */
class Zones extends HTTPClient
{

    /**
     * @param  int                                $id A zone id
     * @return object
     * @throws \Maniaplanet\WebServices\Exception
     */
    public function get($id)
    {
        if (!$id) {
            throw new Exception('Invalid zone id');
        }

        return $this->execute('GET', '/zones/id/%s/', array($id));
    }

    /**
     *
     * @param  string                             $path A valid path, eg. "World|France"
     * @return object
     * @throws \Maniaplanet\WebServices\Exception
     */
    public function getByPath($path)
    {
        if (!$path) {
            throw new Exception('Invalid zone path');
        }

        return $this->execute('GET', '/zones/path/%s/', array($path));
    }

    /**
     *
     * @param  int                                $offset Offset starting from 0
     * @param  int                                $length Length of the response
     * @param  string                             $sort   Sort by: 'id', 'name'
     * @param  int                                $order  Order by 1 or -1
     * @return array                              Array of zones
     * @throws \Maniaplanet\WebServices\Exception
     */
    public function getAll($offset = 0, $length = 10, $sort = '', $order = '')
    {
        return $this->execute('GET',
                '/zones/all/?offset=%s&length=%s&sort=%s&order=%s',
                array($offset, $length, $sort, $order));
    }

    /**
     *
     * @param  int                                $id     A zone id
     * @param  int                                $offset Offset starting from 0
     * @param  int                                $length Length of the response
     * @param  string                             $sort   Sort by: 'id', 'name'
     * @param  int                                $order  Order by 1 or -1
     * @return array                              Array of zones
     * @throws \Maniaplanet\WebServices\Exception
     */
    public function getChildren($id, $offset = 0, $length = 10, $sort = '', $order = '')
    {
        if (!$id) {
            throw new Exception('Invalid zone id');
        }

        return $this->execute('GET',
                '/zones/id/%s/children/?offset=%s&length=%s&sort=%s&order=%s',
                array($id, $offset, $length, $sort, $order));
    }

    /**
     *
     * @param  string                             $path   A valid path, eg. "World|France"
     * @param  int                                $offset Offset starting from 0
     * @param  int                                $length Length of the response
     * @param  string                             $sort   Sort by: 'id', 'name'
     * @param  int                                $order  Order by 1 or -1
     * @return array                              Array of zones
     * @throws \Maniaplanet\WebServices\Exception
     */
    public function getChildrenByPath($path, $offset = 0, $length = 10, $sort = '',
        $order = '')
    {
        if (!$path) {
            throw new Exception('Invalid zone path');
        }

        return $this->execute('GET',
                '/zones/path/%s/children/?offset=%s&length=%s&sort=%s&order=%s',
                array($path, $offset, $length, $sort, $order));
    }

    /**
     *
     * @param  string                             $path A valid path, eg. "World|France"
     * @return int
     * @throws \Maniaplanet\WebServices\Exception
     */
    public function getId($path)
    {
        if (!$path) {
            throw new Exception('Invalid zone path');
        }

        return $this->execute('GET', '/zones/path/%s/id/', array($path));
    }

    /**
     *
     * @param  ind                                $id Integer identifier of the zone
     * @return int                                Number of players in this zone
     * @throws \Maniaplanet\WebServices\Exception
     */
    public function getPopulation($id)
    {
        if (!$id) {
            throw new Exception('Invalid zone id');
        }

        return $this->execute('GET', '/zones/id/%s/population/', array($id));
    }

}
