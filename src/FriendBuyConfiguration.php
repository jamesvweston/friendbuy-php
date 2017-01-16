<?php

namespace jamesvweston\FriendBuy;


use jamesvweston\Utilities\ArrayUtil AS AU;

class FriendBuyConfiguration
{

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $version;

    /**
     * @var string
     */
    protected $url;


    /**
     * FriendBuyIntegration constructor.
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->username                 = AU::get($data['username']);
        $this->password                 = AU::get($data['password']);
        $this->version                  = AU::get($data['version'], 'v1');

        $this->setUrl();
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
        $this->setUrl();
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
        $this->setUrl();
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param string $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
        $this->setUrl();
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    private function setUrl ()
    {
        if (is_null($this->username) || is_null($this->password) || is_null($this->version))
            return;

        $this->url                      = 'https://' . $this->username . ':' . $this->password . '@api.friendbuy.com/' . $this->version . '/';
    }

}