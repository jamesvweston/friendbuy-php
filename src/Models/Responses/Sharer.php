<?php

namespace jamesvweston\FriendBuy\Models\Responses;


use jamesvweston\FriendBuy\Models\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

class Sharer implements \JsonSerializable
{


    use SimpleSerialize;


    /**
     * @var Customer|null
     */
    protected $customer;

    /**
     * @var int
     */
    protected $facebook_friends_count;

    /**
     * @var int
     */
    protected $twitter_followers_count;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $email;
    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->customer                 = AU::get($data['customer']);
        if (!is_null($this->customer))
            $this->customer             = new Customer($this->customer);

        $this->facebook_friends_count   = AU::get($data['facebook_friends_count']);
        $this->twitter_followers_count  = AU::get($data['twitter_followers_count']);
        $this->twitter_followers_count  = AU::get($data['twitter_followers_count']);
        $this->name                     = AU::get($data['name']);
        $this->email                    = AU::get($data['email']);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object                         = $this->simpleSerialize();
        $object['customer']             = is_null($this->customer) ? null : $this->customer->jsonSerialize();

        return $object;
    }

    /**
     * @return Customer|null
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param Customer|null $customer
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return int
     */
    public function getFacebookFriendsCount()
    {
        return $this->facebook_friends_count;
    }

    /**
     * @param int $facebook_friends_count
     */
    public function setFacebookFriendsCount($facebook_friends_count)
    {
        $this->facebook_friends_count = $facebook_friends_count;
    }

    /**
     * @return int
     */
    public function getTwitterFollowersCount()
    {
        return $this->twitter_followers_count;
    }

    /**
     * @param int $twitter_followers_count
     */
    public function setTwitterFollowersCount($twitter_followers_count)
    {
        $this->twitter_followers_count = $twitter_followers_count;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
}