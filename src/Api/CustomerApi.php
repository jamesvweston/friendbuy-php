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
     * @return  PaginatedCustomers|array
     */
    public function index ($request = [])
    {
        $request                        = ($request instanceof GetCustomers) ? $request->jsonSerialize() : $request;
        $response                       = parent::makeHttpRequest('get', $this->path, $request);
        return $this->config->isJsonOnly() ? $response : new PaginatedCustomers($response);
    }

    /**
     * @param   int         $id
     * @return  Customer|array
     */
    public function show ($id)
    {
        $response                       = parent::makeHttpRequest('get', $this->path . '/' . $id);
        return $this->config->isJsonOnly() ? $response : new Customer($response);
    }

    /**
     * @param   int         $id
     * @return  PaginatedConversions|array
     */
    public function getConversions ($id)
    {
        $response                       = parent::makeHttpRequest('get', $this->path . '/' . $id . '/conversions');
        return $this->config->isJsonOnly() ? $response : new PaginatedConversions($response);
    }

    /**
     * @param   int         $id
     * @return  PaginatedEmailRecipients|array
     */
    public function getEmailRecipients ($id)
    {
        $response                       = parent::makeHttpRequest('get', $this->path . '/' . $id . '/email-recipients');
        return $this->config->isJsonOnly() ? $response : new PaginatedEmailRecipients($response);
    }

    /**
     * @param   int         $id
     * @return  PaginatedReferralCodes|array
     */
    public function getReferralCodes ($id)
    {
        $response                       = parent::makeHttpRequest('get', $this->path . '/' . $id . '/referral_codes');
        return $this->config->isJsonOnly() ? $response : new PaginatedReferralCodes($response);
    }

    /**
     * @param   int         $id
     * @return  PaginatedRewards|array
     */
    public function getRewards ($id)
    {
        $response                       = parent::makeHttpRequest('get', $this->path . '/' . $id . '/rewards');
        return $this->config->isJsonOnly() ? $response : new PaginatedRewards($response);
    }

    /**
     * @param   int         $id
     * @return  PaginatedShares|array
     */
    public function getShares ($id)
    {
        $response                       = parent::makeHttpRequest('get', $this->path . '/' . $id . '/shares');
        return $this->config->isJsonOnly() ? $response : new PaginatedShares($response);
    }

}