<?php

namespace jamesvweston\FriendBuy\Api;


use jamesvweston\FriendBuy\Models\Responses\EmailOptOut;
use jamesvweston\FriendBuy\Models\Responses\PaginatedResponses\PaginatedEmailOptOuts;

class OptOutApi extends BaseApi
{


    protected $path = 'opt_outs/emails';


    /**
     * @param   array       $request
     * @return  PaginatedEmailOptOuts|array
     */
    public function index ($request = [])
    {
        $response                       = parent::makeHttpRequest('get', $this->path, $request);
        return $this->config->isJsonOnly() ? $response : new PaginatedEmailOptOuts($response);
    }

    /**
     * @param   array       $request
     * @return  EmailOptOut|array
     */
    public function create ($request = [])
    {
        $response                       = parent::makeHttpRequest('post', $this->path, $request);
        return $this->config->isJsonOnly() ? $response : new EmailOptOut($response);
    }

}