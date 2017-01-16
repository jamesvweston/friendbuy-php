<?php

namespace jamesvweston\FriendBuy\Models\Responses;


use jamesvweston\FriendBuy\Models\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

class Campaign implements \JsonSerializable
{

    use SimpleSerialize;


    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var bool
     */
    protected $published;

    /**
     * @var string
     */
    protected $created_at;

    /**
     * @var ReferralIncentive
     */
    protected $referral_incentive;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->id                       = AU::get($data['id']);
        $this->name                     = AU::get($data['name']);
        $this->published                = AU::get($data['published']);
        $this->created_at               = AU::get($data['created_at']);

        $this->referral_incentive       = AU::get($data['referral_incentive']);
        if (!is_null($this->referral_incentive))
            $this->referral_incentive   = new ReferralIncentive($this->referral_incentive);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object                         = $this->simpleSerialize();
        $object['referral_incentive']   = $this->referral_incentive->jsonSerialize();

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return bool
     */
    public function isPublished()
    {
        return $this->published;
    }

    /**
     * @param bool $published
     */
    public function setPublished($published)
    {
        $this->published = $published;
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
     * @return ReferralIncentive
     */
    public function getReferralIncentive()
    {
        return $this->referral_incentive;
    }

    /**
     * @param ReferralIncentive $referral_incentive
     */
    public function setReferralIncentive($referral_incentive)
    {
        $this->referral_incentive = $referral_incentive;
    }

}