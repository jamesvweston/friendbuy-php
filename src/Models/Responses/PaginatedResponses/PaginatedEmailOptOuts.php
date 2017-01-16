<?php

namespace jamesvweston\FriendBuy\Models\Responses\PaginatedResponses;


use jamesvweston\FriendBuy\Models\Responses\EmailOptOut;

class PaginatedEmailOptOuts extends PaginatedResponse
{

    /**
     * @return  EmailOptOut[]
     */
    public function getResults()
    {
        return $this->results;
    }

    public function setResults ($results = [])
    {
        foreach ($results AS $item)
            $this->results[]            = new EmailOptOut($item);
    }

}