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

class Transaction
{

    public $id;
    public $creatorLogin;
    public $creatorPassword;
    public $creatorSecurityKey;
    public $fromLogin;
    public $toLogin;
    public $message;
    public $cost;

}
