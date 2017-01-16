<?php

namespace jamesvweston\FriendBuy\Api;


use jamesvweston\FriendBuy\Models\Requests\CreatePurchase;
use jamesvweston\FriendBuy\Models\Responses\Purchase;

class PurchaseApi extends BaseApi
{


    protected $path = 'purchases';


    /**
     * @see     https://www.friendbuy.com/rest-api-reference/#purchases
     * @param   CreatePurchase|array    $request
     * @return  Purchase
     */
    public function create ($request = [])
    {
        $request                        = ($request instanceof \JsonSerializable) ? $request->jsonSerialize() : $request;
        $response                       = parent::makeHttpRequest('post', $this->path, $request);
        return new Purchase($response);
    }

}