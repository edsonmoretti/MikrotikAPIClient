<?php


namespace Mikrotik\Hotspot\Models;


class User
{
    private $id;
    private $username;
    private $server;
    private $address;
    private $macAddress;
    private $loginBy;
    private $uptime;
    private $idleTime;
    private $keepaliveTimeout;
    private $bytesIn;
    private $bytesOut;
    private $packetsIn;
    private $packetsOut;
    private $radius;
    private $comment;
    private $dynamic;
    private $disabled;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * @param mixed $server
     */
    public function setServer($server): void
    {
        $this->server = $server;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getMacAddress()
    {
        return $this->macAddress;
    }

    /**
     * @param mixed $macAddress
     */
    public function setMacAddress($macAddress): void
    {
        $this->macAddress = $macAddress;
    }

    /**
     * @return mixed
     */
    public function getLoginBy()
    {
        return $this->loginBy;
    }

    /**
     * @param mixed $loginBy
     */
    public function setLoginBy($loginBy): void
    {
        $this->loginBy = $loginBy;
    }

    /**
     * @return mixed
     */
    public function getUptime()
    {
        return $this->uptime;
    }

    /**
     * @param mixed $uptime
     */
    public function setUptime($uptime): void
    {
        $this->uptime = $uptime;
    }

    /**
     * @return mixed
     */
    public function getIdleTime()
    {
        return $this->idleTime;
    }

    /**
     * @param mixed $idleTime
     */
    public function setIdleTime($idleTime): void
    {
        $this->idleTime = $idleTime;
    }

    /**
     * @return mixed
     */
    public function getKeepaliveTimeout()
    {
        return $this->keepaliveTimeout;
    }

    /**
     * @param mixed $keepaliveTimeout
     */
    public function setKeepaliveTimeout($keepaliveTimeout): void
    {
        $this->keepaliveTimeout = $keepaliveTimeout;
    }

    /**
     * @return mixed
     */
    public function getBytesIn()
    {
        return $this->bytesIn;
    }

    /**
     * @param mixed $bytesIn
     */
    public function setBytesIn($bytesIn): void
    {
        $this->bytesIn = $bytesIn;
    }

    /**
     * @return mixed
     */
    public function getBytesOut()
    {
        return $this->bytesOut;
    }

    /**
     * @param mixed $bytesOut
     */
    public function setBytesOut($bytesOut): void
    {
        $this->bytesOut = $bytesOut;
    }

    /**
     * @return mixed
     */
    public function getPacketsIn()
    {
        return $this->packetsIn;
    }

    /**
     * @param mixed $packetsIn
     */
    public function setPacketsIn($packetsIn): void
    {
        $this->packetsIn = $packetsIn;
    }

    /**
     * @return mixed
     */
    public function getPacketsOut()
    {
        return $this->packetsOut;
    }

    /**
     * @param mixed $packetsOut
     */
    public function setPacketsOut($packetsOut): void
    {
        $this->packetsOut = $packetsOut;
    }

    /**
     * @return mixed
     */
    public function getRadius()
    {
        return $this->radius;
    }

    /**
     * @param mixed $radius
     */
    public function setRadius($radius): void
    {
        $this->radius = $radius;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @return mixed
     */
    public function getDynamic()
    {
        return $this->dynamic;
    }

    /**
     * @param mixed $dynamic
     */
    public function setDynamic($dynamic): void
    {
        $this->dynamic = $dynamic;
    }

    /**
     * @return mixed
     */
    public function getDisabled()
    {
        return $this->disabled;
    }

    /**
     * @param mixed $disabled
     */
    public function setDisabled($disabled): void
    {
        $this->disabled = $disabled;
    }

}