<?php

namespace jamesvweston\FriendBuy\Api;


use jamesvweston\FriendBuy\Models\Requests\GetShares;
use jamesvweston\FriendBuy\Models\Responses\PaginatedResponses\PaginatedShares;
use jamesvweston\FriendBuy\Models\Responses\Share;

class ShareApi extends BaseApi
{


    protected $path = 'shares';


    /**
     * @param  GetShares|array $request
     * @return array|PaginatedShares
     */
    public function index ($request = [])
    {
        $request                        = ($request instanceof GetShares) ? $request->jsonSerialize() : $request;
        $response                       = parent::makeHttpRequest('get', $this->path, $request);
        return $this->config->isJsonOnly() ? $response : new PaginatedShares($response);
    }

    /**
     * @param   int         $id
     * @return  Share|array
     */
    public function show ($id)
    {
        $response                       = parent::makeHttpRequest('get', $this->path . '/' . $id);
        return $this->config->isJsonOnly() ? $response : new Share($response);
    }

}