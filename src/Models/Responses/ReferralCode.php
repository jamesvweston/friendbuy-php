<?php

namespace jamesvweston\FriendBuy\Models\Responses;


use jamesvweston\FriendBuy\Models\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

class ReferralCode implements \JsonSerializable
{


    use SimpleSerialize;


    /**
     * @var string
     */
    protected $referral_code;

    /**
     * @var string
     */
    protected $trackable_link;

    /**
     * @var string
     */
    protected $destination_url;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->referral_code            = AU::get($data['referral_code']);
        $this->trackable_link           = AU::get($data['trackable_link']);
        $this->destination_url          = AU::get($data['destination_url']);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object                         = $this->simpleSerialize();

        return $object;
    }

    /**
     * @return string
     */
    public function getReferralCode()
    {
        return $this->referral_code;
    }

    /**
     * @param string $referral_code
     */
    public function setReferralCode($referral_code)
    {
        $this->referral_code = $referral_code;
    }

    /**
     * @return string
     */
    public function getTrackableLink()
    {
        return $this->trackable_link;
    }

    /**
     * @param string $trackable_link
     */
    public function setTrackableLink($trackable_link)
    {
        $this->trackable_link = $trackable_link;
    }

    /**
     * @return string
     */
    public function getDestinationUrl()
    {
        return $this->destination_url;
    }

    /**
     * @param string $destination_url
     */
    public function setDestinationUrl($destination_url)
    {
        $this->destination_url = $destination_url;
    }

}