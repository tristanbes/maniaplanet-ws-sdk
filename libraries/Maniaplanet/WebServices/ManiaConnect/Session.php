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

namespace Maniaplanet\WebServices\ManiaConnect;

class Session implements Persistance
{

    /**
     * Local array to store variables for the setVariable()/getVariable() methods.
     *
     * @var array
     */
    protected $vars;

    /**
     * Generates an almost safe key to store stuff in the PHP session without
     * collisioning with other variables.
     */
    private function getVariableKey($name)
    {
        return md5(sprintf('maniaplanet:%s:', $name));
    }

    public function init()
    {
        if (!session_id()) {
            if (!session_start()) {
                throw new \Maniaplanet\WebServices\Exception('Failed to start session');
            }
        }
        $this->vars = array();
    }

    public function destroy()
    {
        session_destroy();
        $this->vars = array();
    }

    public function getVariable($name, $default=null)
    {
        $key = $this->getVariableKey($name);
        if (!array_key_exists($key, $this->vars)) {
            if (!array_key_exists($key, $_SESSION)) {
                return $default;
            }
            $this->vars[$key] = unserialize($_SESSION[$key]);
        }

        return $this->vars[$key];
    }

    public function setVariable($name, $value)
    {
        $key = $this->getVariableKey($name);
        $this->vars[$key] = $value;
        $_SESSION[$key] = serialize($value);
    }

    public function deleteVariable($name)
    {
        $key = $this->getVariableKey($name);
        unset($this->vars[$key]);
        unset($_SESSION[$key]);
    }

}
