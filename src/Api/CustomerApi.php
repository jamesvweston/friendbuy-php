<?php

namespace jamesvweston\FriendBuy\Api;


use jamesvweston\FriendBuy\Models\Requests\GetCustomers;
use jamesvweston\FriendBuy\Models\Responses\Customer;
use jamesvweston\FriendBuy\Models\Responses\PaginatedResponses\PaginatedConversions;
use jamesvweston\FriendBuy\Models\Responses\PaginatedResponses\PaginatedCustomers;
use jamesvweston\FriendBuy\Models\Responses\PaginatedResponses\PaginatedEmailRecipients;
use jamesvweston\FriendBuy\Models\Responses\PaginatedResponses\PaginatedReferralCodes;
use jamesvweston\FriendBuy\Models\Responses\PaginatedResponses\PaginatedRewards;
use jamesvweston\FriendBuy\Models\Responses\PaginatedResponses\PaginatedShares;

class CustomerApi extends BaseApi
{


    protected $path = 'customers';


    /**
     * @param   GetCustomers|array  $request
     * @return  PaginatedCustomers
     */
    public function index ($request = [])
    {
        $request                        = ($request instanceof GetCustomers) ? $request->jsonSerialize() : $request;
        $response                       = parent::makeHttpRequest('get', $this->path, $request);
        return new PaginatedCustomers($response);
    }

    /**
     * @param   int         $id
     * @return  Customer
     */
    public function show ($id)
    {
        $response                       = parent::makeHttpRequest('get', $this->path . '/' . $id);
        return new Customer($response);
    }

    /**
     * @param   int         $id
     * @return  PaginatedConversions
     */
    public function getConversions ($id)
    {
        $response                       = parent::makeHttpRequest('get', $this->path . '/' . $id . '/conversions');
        return new PaginatedConversions($response);
    }

    /**
     * @param   int         $id
     * @return  PaginatedEmailRecipients
     */
    public function getEmailRecipients ($id)
    {
        $response                       = parent::makeHttpRequest('get', $this->path . '/' . $id . '/email-recipients');
        return new PaginatedEmailRecipients($response);
    }

    /**
     * @param   int         $id
     * @return  PaginatedReferralCodes
     */
    public function getReferralCodes ($id)
    {
        $response                       = parent::makeHttpRequest('get', $this->path . '/' . $id . '/referral_codes');
        return new PaginatedReferralCodes($response);
    }

    /**
     * @param   int         $id
     * @return  PaginatedRewards
     */
    public function getRewards ($id)
    {
        $response                       = parent::makeHttpRequest('get', $this->path . '/' . $id . '/rewards');
        return new PaginatedRewards($response);
    }

    /**
     * @param   int         $id
     * @return  PaginatedShares
     */
    public function getShares ($id)
    {
        $response                       = parent::makeHttpRequest('get', $this->path . '/' . $id . '/shares');
        return new PaginatedShares($response);
    }

}