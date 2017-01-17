<?php

namespace jamesvweston\FriendBuy\Models\Responses\PaginatedResponses;


use jamesvweston\FriendBuy\Models\Responses\ReferralCode;
use jamesvweston\FriendBuy\Models\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

class PaginatedReferralCodes extends PaginatedResponse implements \JsonSerializable
{

    use SimpleSerialize;


    /**
     * @var ReferralCode[]
     */
    protected $results;

    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        parent::__construct($data);

        $this->results                  = [];
        $this->setResults(AU::get($data['results'], []));
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object                         = parent::jsonSerialize();

        $object['results']              = [];

        foreach ($this->results AS $result)
            $object['results'][]        = $result->jsonSerialize();

        return $object;
    }

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