<?php

namespace jamesvweston\FriendBuy\Models\Responses;


use jamesvweston\FriendBuy\Models\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

class Purchase implements \JsonSerializable
{


    use SimpleSerialize;


    /**
     * @var string
     */
    protected $date;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $ip_address;

    /**
     * @var string
     */
    protected $new_customer;

    /**
     * @var string
     */
    protected $order_id;

    /**
     * @var Product[]
     */
    protected $products;

    /**
     * @var float
     */
    protected $total;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->date                     = AU::get($data['date']);
        $this->email                    = AU::get($data['email']);
        $this->ip_address               = AU::get($data['ip_address']);
        $this->new_customer             = AU::get($data['new_customer']);
        $this->order_id                 = AU::get($data['order_id']);

        $this->products                 = [];
        $products                       = AU::get($data['products'], []);
        foreach ($products AS $item)
            $this->products[]           = new Product($item);

        $this->total                    = AU::get($data['total']);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object                         = $this->simpleSerialize();

        $object['products']             = [];
        foreach ($this->products AS $product)
            $object['products'][]       = $product->jsonSerialize();
        return $object;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate($date)
    {
        $this->date = $date;
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
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ip_address;
    }

    /**
     * @param string $ip_address
     */
    public function setIpAddress($ip_address)
    {
        $this->ip_address = $ip_address;
    }

    /**
     * @return string
     */
    public function getNewCustomer()
    {
        return $this->new_customer;
    }

    /**
     * @param string $new_customer
     */
    public function setNewCustomer($new_customer)
    {
        $this->new_customer = $new_customer;
    }

    /**
     * @return string
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * @param string $order_id
     */
    public function setOrderId($order_id)
    {
        $this->order_id = $order_id;
    }

    /**
     * @return Product[]
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param Product[] $products
     */
    public function setProducts($products)
    {
        $this->products = $products;
    }

    /**
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param float $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }
}