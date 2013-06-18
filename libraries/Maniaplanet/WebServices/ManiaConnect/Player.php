<?php
/**
 * Maniaplanet Web Services SDK for PHP
 *
 * @see		    http://code.google.com/p/maniaplanet-ws-sdk/
 * @copyright   Copyright (c) 2009-2011 NADEO (http://www.nadeo.com)
 * @license     http://www.gnu.org/licenses/lgpl.html LGPL License 3
 * @author      $Author: baptiste33@gmail.com $:
 * @version     $Revision: 197 $:
 * @date        $Date: 2013-05-23 15:05:08 +0200 (jeu., 23 mai 2013) $:
 */

namespace Maniaplanet\WebServices\ManiaConnect;

/**
 * The base class for using OAuth2.
 */
class Player extends Client
{

    /**
     * This is the first method to call when you have an authorization code.
     * It will retrieve an access token if possible and then call the service to
     * retrieve a basic object about the authentified player.
     *
     * You do not need any special scope to call this service, as long as you
     * have an access token.
     *
     * If an access token is not found, it will return false
     *
     * @return object A player object or false if no access token is found
     */
    public function getPlayer()
    {
        $player = self::$persistance->getVariable('player');
        if (!$player) {
            if ($this->getAccessToken()) {
                $player = $this->executeOAuth2('GET', '/player/');
                self::$persistance->setVariable('player', $player);
            }
        }

        return $player;
    }

    /**
     * Returns an object containing the online status and the dedicated server
     * info on which the player is playing, if applicable.
     *
     * Scope needed: online_status
     *
     * @return object
     */
    public function getOnlineStatus()
    {
        return $this->executeOAuth2('GET', '/player/status/');
    }

    /**
     * Returns the email associated with the player's account.
     *
     * Scope needed: email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->executeOAuth2('GET', '/player/email/');
    }

    /**
     * Returns the buddies of the player as an array of player objects
     *
     * Scope needed: buddies
     *
     * @return array[object]
     */
    public function getBuddies()
    {
        return $this->executeOAuth2('GET', '/player/buddies/');
    }

    /**
     * Gets the list of the player's registered dedicated servers and their
     * online statuses.
     *
     * Scope needed: dedicated
     *
     * @return array[object]
     */
    public function getDedicated()
    {
        return $this->executeOAuth2('GET', '/player/dedicated/');
    }

    /**
     * Gets the list of server loing's report abuses
     *
     * Scope needed: dedicated
     *
     * @return array[object]
     */
    public function getReportAbuses($serverLogin)
    {
        return $this->executeOAuth2('GET', '/player/dedicated/%s/reportAbuse/',array($serverLogin));
    }

    /**
     * Gets the list of the player's registered Manialinks.
     *
     * Scope needed: manialinks
     *
     * @return array[object]
     */
    public function getManialinks()
    {
        return $this->executeOAuth2('GET', '/player/manialinks/');
    }

    /**
     * Get the player's list of contracts team
     *
     * scope needed : teams
     *
     * @return array[object]
     */
    public function getContracts()
    {
        return $this->executeOAuth2('GET', '/player/contracts/');
    }

    /**
     * Get team's whose player is admin
     *
     * scope needed : teams
     *
     * @return array[object]
     */
    public function getTeams()
    {
        return $this->executeOAuth2('GET', '/player/teams/');
    }

    /**
     * scope needed : titles
     */
    public function getOwnedTitles()
    {
        return $this->executeOAuth2('GET', '/player/titles/owned/');
    }

    /**
     * scope needed : titles
     */
    public function getInstalledTitles()
    {
        return $this->executeOAuth2('GET', '/player/titles/installed/');
    }

    /**
     * scope needed : favorite_servers
     */
    public function getFavoriteServers()
    {
        return $this->executeOAuth2('GET', '/favorites/servers/');
    }

}
