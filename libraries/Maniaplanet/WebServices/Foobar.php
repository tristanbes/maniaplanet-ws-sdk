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
 * Test class so you can make dummy calls on the API
 */
class Foobar extends HTTPClient
{

    /**
     * Gets a dummy object from the API.
     *
     * @throws \Maniaplanet\WebServices\Exception
     */
    public function get()
    {
        return $this->execute('GET', '/foobar/');
    }

    /**
     * Allows you to post any data on the API. The data you posted will be returned
     * in the response:
     *
     * @param  mixed                              $data Any data
     * @return array
     * @throws \Maniaplanet\WebServices\Exception
     */
    public function post($data)
    {
        return $this->execute('POST', '/foobar/', array($data));
    }

    /**
     * Same as the post() method, but with a PUT request
     *
     * @param  mixed                              $data
     * @return array
     * @throws \Maniaplanet\WebServices\Exception
     */
    public function put($data)
    {
        return $this->execute('PUT', '/foobar/', array($data));
    }

    /**
     * Sends a dummy DELETE request to the server
     *
     * @return string                             "DELETE" will be returned in case of success
     * @throws \Maniaplanet\WebServices\Exception
     */
    public function delete()
    {
        return $this->execute('DELETE', '/foobar/');
    }

}
