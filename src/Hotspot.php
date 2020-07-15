<?php

namespace Mikrotik;

use ArrayObject;
use Mikrotik\Exceptions\ConnectionException;
use Mikrotik\Exceptions\Exception;
use Mikrotik\Hotspot\Models\User;

class Hotspot
{
    private const CONNNECTION_ERROR_MESSAGE = 'Connection error with Mikrotik';

    /**
     * @return ArrayObject
     * @throws ConnectionException
     */
    public function all()
    {
        if (API::getInstance()->connect()) {
            $users = new ArrayObject();
            API::getInstance()->write('/ip/hotspot/user/print');

            $read = API::getInstance()->read(false);
            $array = API::getInstance()->parseResponse($read);

            foreach ($array as $userArray) {
                $id = $userArray['.id'];
                unset($userArray['.id']);
                $userArray['id'] = $id;
                $user = new User();
                $user->id = $userArray['id'];
                $user->name = $userArray['name'];
                $user->uptime = $userArray['uptime'];
                $user->bytesIn = $userArray['bytes-in'];
                $user->bytesOut = $userArray['bytes-out'];
                $user->packetsIn = $userArray['packets-in'];
                $user->packetsOut = $userArray['packets-out'];
                $user->dynamic = $userArray['dynamic'];
                $user->disabled = $userArray['disabled'];
                if (isset($userArray['comment'])) $user->comment = $userArray['comment'];
                $users->append($user);
            }
            API::getInstance()->disconnect();
            var_dump($users);
            return $users;
        } else {
            throw new ConnectionException(Hotspot::CONNNECTION_ERROR_MESSAGE);
        }
    }

    /**
     * @return ArrayObject
     * @throws ConnectionException
     */
    public function actives()
    {
        if (API::getInstance()->connect()) {
            $users = new ArrayObject();
            API::getInstance()->write('/ip/hotspot/active/print');

            $read = API::getInstance()->read(false);
            $array = API::getInstance()->parseResponse($read);

            foreach ($array as $userArray) {
                $id = $userArray['.id'];
                unset($userArray['.id']);
                $userArray['id'] = $id;
                $user = new User();
                $user->id = $userArray['id'];
                $user->username = $userArray['user'];
                $user->server = $userArray['server'];
                $user->address = $userArray['address'];
                $user->macAddress = $userArray['mac-address'];
                $user->loginBy = $userArray['login-by'];
                $user->uptime = $userArray['uptime'];
                $user->idleTime = $userArray['idle-time'];
                $user->keepaliveTimeout = $userArray['keepalive-timeout'];
                $user->bytesIn = $userArray['bytes-in'];
                $user->bytesOut = $userArray['bytes-out'];
                $user->packetsIn = $userArray['packets-in'];
                $user->packetsOut = $userArray['packets-out'];
                $user->radius = $userArray['radius'];
                if (isset($userArray['comment'])) $user->comment = $userArray['comment'];
                $users->append($user);
            }
            API::getInstance()->disconnect();
            return $users;
        } else {
            throw new ConnectionException(Hotspot::CONNNECTION_ERROR_MESSAGE);
        }
    }

    /**
     * @param $name
     * @param $password
     * @param null $comment
     * @param null $profile
     * @throws ConnectionException|Exception
     */
    public function addUser($name, $password, $comment = null, $profile = null)
    {
        if (API::getInstance()->connect()) {
            API::getInstance()->write('/ip/hotspot/user/add
   =name=' . $name . '
   =password=' . $password . '
   =profile=' . (!is_null($profile) ? $profile : '') . '
   =comment=' . (!is_null($comment) ? $comment : '') . '
   ');
            $read = API::getInstance()->read(false);
            $array = API::getInstance()->parseResponse($read);

            if (isset($array['!trap'])) {
                if (isset($array['!trap'][0])) {
                    if (isset($array['!trap'][0]['message'])) {
                        if ($this->contains($array['!trap'][0]['message'], 'already have user with this name')) {
                            throw new Exception($array['!trap'][0]['message']);
                        } else {
                            throw new Exception($array['!trap'][0]['message']);
                        }
                    }
                }
            }
            $id = $array;
            API::getInstance()->disconnect();
            return ['id' => $id];
        } else {
            throw new ConnectionException(Hotspot::CONNNECTION_ERROR_MESSAGE);
        }
    }

    private function contains($text, $textToFind, $ignoreCase = false)
    {
        {
            if ($ignoreCase) {
                $text = strtolower($text);
                $textToFind = strtolower($textToFind);
            }
            $needlePos = strpos($text, $textToFind);
            return ($needlePos === false ? false : ($needlePos + 1));
        }
    }
}