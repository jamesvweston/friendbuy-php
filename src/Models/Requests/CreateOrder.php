<?php

namespace jamesvweston\FriendBuy\Models\Requests;


use jamesvweston\FriendBuy\Models\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

class CreateOrder implements \JsonSerializable
{

    use SimpleSerialize;


    /**
     * @var string
     */
    protected $id;

    /**
     * @var float
     */
    protected $amount;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var bool
     */
    protected $new_customer;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->id                       = AU::get($data['id']);
        $this->amount                   = AU::get($data['amount']);
        $this->email                    = AU::get($data['email']);
        $this->new_customer             = AU::get($data['new_customer']);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object                         = $this->simpleSerialize();

        return $object;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
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

    /**
     * @return bool
     */
    public function isNewCustomer()
    {
        return $this->new_customer;
    }

    /**
     * @param bool $new_customer
     */
    public function setNewCustomer($new_customer)
    {
        $this->new_customer = $new_customer;
    }
}