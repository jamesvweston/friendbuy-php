<?php

namespace jamesvweston\FriendBuy\Api;


use jamesvweston\FriendBuy\Models\Responses\Conversion;
use jamesvweston\FriendBuy\Models\Responses\PaginatedResponses\PaginatedConversions;

class ConversionApi extends BaseApi
{


    protected $path = 'conversions';


    /**
     * @param   array       $request
     * @return  PaginatedConversions
     */
    public function index ($request = [])
    {
        $response                       = parent::makeHttpRequest('get', $this->path, $request);
        return new PaginatedConversions($response);
    }

    /**
     * @param   int         $id
     * @return  Conversion
     */
    public function show ($id)
    {
        $response                       = parent::makeHttpRequest('get', $this->path . '/' . $id);
        return new Conversion($response);
    }

}