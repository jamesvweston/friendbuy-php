<?php

namespace jamesvweston\FriendBuy\Models\Responses;


use jamesvweston\FriendBuy\Models\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

class Sharer implements \JsonSerializable
{


    use SimpleSerialize;


    /**
     * @var Customer
     */
    protected $customer;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->customer                 = new Customer(AU::get($data['customer']));
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object                         = $this->simpleSerialize();
        $object['customer']             = $this->customer->jsonSerialize();

        return $object;
    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }
}