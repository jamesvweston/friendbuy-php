<?php

namespace jamesvweston\FriendBuy\Models\Responses\PaginatedResponses;


use jamesvweston\FriendBuy\Models\Responses\ReferralCode;

class PaginatedReferralCodes extends PaginatedResponse
{

    /**
     * @return  ReferralCode[]
     */
    public function getResults()
    {
        return $this->results;
    }

    public function setResults ($results = [])
    {
        foreach ($results AS $item)
            $this->results[]            = new ReferralCode($item);
    }

}