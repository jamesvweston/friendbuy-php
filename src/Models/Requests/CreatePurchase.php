<?php

namespace jamesvweston\FriendBuy\Models\Requests;


use jamesvweston\FriendBuy\Models\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;


/**
 * @see https://www.friendbuy.com/rest-api-reference/#purchases
 * Class CreatePurchase
 * @package jamesvweston\FriendBuy\Models\Requests
 */
class CreatePurchase implements \JsonSerializable
{

    use SimpleSerialize;

    /**
     * @var CreateOrder
     */
    protected $order;

    /**
     * Required if coupon_code is not present
     * @var string|null
     */
    protected $referral_code;

    /**
     * Required if referral_code is not present
     * @var string|null
     */
    protected $coupon_code;

    /**
     * @var CreateCustomer|null
     */
    protected $customer;

    /**
     * @var array|null
     */
    protected $products;

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object                         = $this->simpleSerialize();
        $object['order']                = $this->order->jsonSerialize();
        $object['customer']             = is_null($this->customer) ? null : $this->customer->jsonSerialize();

        return $object;
    }

    /**
     * @return CreateOrder
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @return null|string
     */
    public function getReferralCode()
    {
        return $this->referral_code;
    }

    /**
     * @return null|string
     */
    public function getCouponCode()
    {
        return $this->coupon_code;
    }

    /**
     * @return CreateCustomer|null
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @return array|null
     */
    public function getProducts()
    {
        return $this->products;
    }

}