<?php

namespace jamesvweston\FriendBuy\Models\Responses;


use jamesvweston\FriendBuy\Models\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

class Conversion implements \JsonSerializable
{

    use SimpleSerialize;


    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $created_at;

    /**
     * @var string
     */
    protected $detail_uri;

    /**
     * @var bool
     */
    protected $possible_self_referral;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var Campaign
     */
    protected $campaign;

    /**
     * @var Fraud
     */
    protected $fraud;

    /**
     * @var Purchase
     */
    protected $purchase;

    /**
     * @var PersonalUrl
     */
    protected $personal_url;

    /**
     * @var Reward[]
     */
    protected $rewards;

    /**
     * @var Referrer
     */
    protected $referrer;

    /**
     * @var Share|null
     */
    protected $share;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->id                       = AU::get($data['id']);
        $this->created_at               = AU::get($data['created_at']);
        $this->detail_uri               = AU::get($data['detail_uri']);
        $this->possible_self_referral   = AU::get($data['possible_self_referral']);
        $this->status                   = AU::get($data['status']);
        $this->campaign                 = new Campaign(AU::get($data['campaign']));
        $this->fraud                    = new Fraud(AU::get($data['fraud']));
        $this->purchase                 = new Purchase(AU::get($data['purchase']));
        $this->personal_url             = new PersonalUrl(AU::get($data['personal_url']));

        $this->rewards                  = [];
        $rewards                        = AU::get($data['rewards'], []);
        foreach ($rewards AS $item)
            $this->rewards[]            = new Reward($item);

        $this->referrer                 = new Referrer(AU::get($data['referrer']));

        $this->share                    = AU::get($data['share']);
        if (!is_null($this->share))
            $this->share                = new Share($this->share);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object                         = $this->simpleSerialize();
        $object['campaign']             = $this->campaign->jsonSerialize();
        $object['fraud']                = $this->fraud->jsonSerialize();
        $object['purchase']             = $this->purchase->jsonSerialize();
        $object['personal_url']         = $this->personal_url->jsonSerialize();

        $object['rewards']              = [];
        foreach ($this->rewards AS $reward)
            $object['rewards'][]        = $reward->jsonSerialize();

        $object['referrer']             = $this->referrer->jsonSerialize();
        $object['share']                = is_null($this->share) ? null : $this->share->jsonSerialize();

        return $object;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param string $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return string
     */
    public function getDetailUri()
    {
        return $this->detail_uri;
    }

    /**
     * @param string $detail_uri
     */
    public function setDetailUri($detail_uri)
    {
        $this->detail_uri = $detail_uri;
    }

    /**
     * @return bool
     */
    public function isPossibleSelfReferral()
    {
        return $this->possible_self_referral;
    }

    /**
     * @param bool $possible_self_referral
     */
    public function setPossibleSelfReferral($possible_self_referral)
    {
        $this->possible_self_referral = $possible_self_referral;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return Campaign
     */
    public function getCampaign()
    {
        return $this->campaign;
    }

    /**
     * @param Campaign $campaign
     */
    public function setCampaign($campaign)
    {
        $this->campaign = $campaign;
    }

    /**
     * @return Fraud
     */
    public function getFraud()
    {
        return $this->fraud;
    }

    /**
     * @param Fraud $fraud
     */
    public function setFraud($fraud)
    {
        $this->fraud = $fraud;
    }

    /**
     * @return Purchase
     */
    public function getPurchase()
    {
        return $this->purchase;
    }

    /**
     * @param Purchase $purchase
     */
    public function setPurchase($purchase)
    {
        $this->purchase = $purchase;
    }

    /**
     * @return PersonalUrl
     */
    public function getPersonalUrl()
    {
        return $this->personal_url;
    }

    /**
     * @param PersonalUrl $personal_url
     */
    public function setPersonalUrl($personal_url)
    {
        $this->personal_url = $personal_url;
    }

    /**
     * @return Reward[]
     */
    public function getRewards()
    {
        return $this->rewards;
    }

    /**
     * @param Reward[] $rewards
     */
    public function setRewards($rewards)
    {
        $this->rewards = null;
        $this->rewards = $rewards;
    }

    /**
     * @return Referrer
     */
    public function getReferrer()
    {
        return $this->referrer;
    }

    /**
     * @param Referrer $referrer
     */
    public function setReferrer($referrer)
    {
        $this->referrer = $referrer;
    }

    /**
     * @return Share|null
     */
    public function getShare()
    {
        return $this->share;
    }

    /**
     * @param Share|null $share
     */
    public function setShare($share)
    {
        $this->share = $share;
    }

}