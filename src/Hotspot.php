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
                $user->setId($userArray['id']);
                $user->setUsername($userArray['name']);
                $user->setUptime($userArray['uptime']);
                $user->setBytesIn($userArray['bytes-in']);
                $user->setBytesOut($userArray['bytes-out']);
                $user->setPacketsIn($userArray['packets-in']);
                $user->setPacketsOut($userArray['packets-out']);
                $user->setDynamic($userArray['dynamic']);
                $user->setDisabled($userArray['disabled']);
                if (isset($userArray['comment'])) $user->setComment($userArray['comment']);
                $users->append($user);
            }
            API::getInstance()->disconnect();
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
                $user->setId($userArray['id']);
                $user->setUsername($userArray['user']);
                $user->setServer($userArray['server']);
                $user->setAddress($userArray['address']);
                $user->setMacAddress($userArray['mac-address']);
                $user->setLoginBy($userArray['login-by']);
                $user->setUptime($userArray['uptime']);
                $user->setIdleTime($userArray['idle-time']);
                if(isset($userArray['keepalive-timeout'])) $user->setKeepaliveTimeout($userArray['keepalive-timeout']);
                $user->setBytesIn($userArray['bytes-in']);
                $user->setBytesOut($userArray['bytes-out']);
                $user->setPacketsIn($userArray['packets-in']);
                $user->setPacketsOut($userArray['packets-out']);
                $user->setRadius($userArray['radius']);
                if (isset($userArray['comment'])) $user->setComment($userArray['comment']);
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