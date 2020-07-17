<?php


namespace Mikrotik;


class API extends RouterosAPI
{
    private $login;
    private $password;
    private $ip;
    public $port;

    private static $instance;

    /**
     * @return API
     */
    public static function getInstance(): API
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function connect(): bool
    {
        return parent::con($this->ip, $this->port, $this->login, $this->password);
    }

    public function disconnect()
    {
        parent::discon();
    }

    public function config(array $config)
    {
        $this->login = $config['login'];
        $this->password = $config['password'];
        $this->ip = $config['ip'];
        $this->port = $config['port'];
    }
}