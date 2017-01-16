<?php

namespace jamesvweston\FriendBuy\Models\Responses;


use jamesvweston\FriendBuy\Models\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

class Fraud implements \JsonSerializable
{


    use SimpleSerialize;


    /**
     * @var bool
     */
    protected $fuzzy_email;

    /**
     * @var bool
     */
    protected $same_customer;

    /**
     * @var bool
     */
    protected $same_email;

    /**
     * @var bool
     */
    protected $same_shopper;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->fuzzy_email              = AU::get($data['fuzzy_email']);
        $this->same_customer            = AU::get($data['same_customer']);
        $this->same_email               = AU::get($data['same_email']);
        $this->same_shopper             = AU::get($data['same_shopper']);
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
     * @return bool
     */
    public function isFuzzyEmail()
    {
        return $this->fuzzy_email;
    }

    /**
     * @param bool $fuzzy_email
     */
    public function setFuzzyEmail($fuzzy_email)
    {
        $this->fuzzy_email = $fuzzy_email;
    }

    /**
     * @return bool
     */
    public function isSameCustomer()
    {
        return $this->same_customer;
    }

    /**
     * @param bool $same_customer
     */
    public function setSameCustomer($same_customer)
    {
        $this->same_customer = $same_customer;
    }

    /**
     * @return bool
     */
    public function isSameEmail()
    {
        return $this->same_email;
    }

    /**
     * @param bool $same_email
     */
    public function setSameEmail($same_email)
    {
        $this->same_email = $same_email;
    }

    /**
     * @return bool
     */
    public function isSameShopper()
    {
        return $this->same_shopper;
    }

    /**
     * @param bool $same_shopper
     */
    public function setSameShopper($same_shopper)
    {
        $this->same_shopper = $same_shopper;
    }

}