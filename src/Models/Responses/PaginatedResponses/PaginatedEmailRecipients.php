<?php

namespace jamesvweston\FriendBuy\Models\Responses\PaginatedResponses;


use jamesvweston\FriendBuy\Models\Responses\EmailRecipient;

class PaginatedEmailRecipients extends PaginatedResponse
{

    /**
     * @return  EmailRecipient[]
     */
    public function getResults()
    {
        return $this->results;
    }

    public function setResults ($results = [])
    {
        foreach ($results AS $item)
            $this->results[]            = new EmailRecipient($item);
    }

}