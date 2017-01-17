<?php

namespace jamesvweston\FriendBuy\Models\Responses;


use jamesvweston\FriendBuy\Models\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

class Share implements \JsonSerializable
{


    use SimpleSerialize;


    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $referral_code;

    /**
     * @var string
     */
    protected $created_at;

    /**
     * @var string
     */
    protected $detail_uri;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var int
     */
    protected $facebook_friends_count;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $ip_address;

    /**
     * @var int
     */
    protected $twitter_followers_count;

    /**
     * @var Message
     */
    protected $message;

    /**
     * @var Campaign
     */
    protected $campaign;

    /**
     * @var string[]
     */
    protected $email_recipients;

    /**
     * @var Sharer
     */
    protected $sharer;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->id                       = AU::get($data['id']);
        $this->referral_code            = AU::get($data['referral_code']);
        $this->created_at               = AU::get($data['created_at']);
        $this->detail_uri               = AU::get($data['detail_uri']);
        $this->email                    = AU::get($data['email']);
        $this->facebook_friends_count   = AU::get($data['facebook_friends_count'], []);
        $this->name                     = AU::get($data['name']);
        $this->ip_address               = AU::get($data['ip_address']);
        $this->twitter_followers_count  = AU::get($data['twitter_followers_count']);
        $this->message                  = new Message(AU::get($data['message']));
        $this->campaign                 = new Campaign(AU::get($data['campaign']));
        $this->email_recipients         = AU::get($data['email_recipients'], []);
        $this->sharer                   = new Sharer(AU::get($data['sharer']));
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object                         = $this->simpleSerialize();
        $object['message']              = $this->message->jsonSerialize();
        $object['campaign']             = $this->campaign->jsonSerialize();
        $object['sharer']               = $this->sharer->jsonSerialize();

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
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return int
     */
    public function getFacebookFriendsCount()
    {
        return $this->facebook_friends_count;
    }

    /**
     * @param int $facebook_friends_count
     */
    public function setFacebookFriendsCount($facebook_friends_count)
    {
        $this->facebook_friends_count = $facebook_friends_count;
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
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ip_address;
    }

    /**
     * @param string $ip_address
     */
    public function setIpAddress($ip_address)
    {
        $this->ip_address = $ip_address;
    }

    /**
     * @return int
     */
    public function getTwitterFollowersCount()
    {
        return $this->twitter_followers_count;
    }

    /**
     * @param int $twitter_followers_count
     */
    public function setTwitterFollowersCount($twitter_followers_count)
    {
        $this->twitter_followers_count = $twitter_followers_count;
    }

    /**
     * @return Message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param Message $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
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
     * @return \string[]
     */
    public function getEmailRecipients()
    {
        return $this->email_recipients;
    }

    /**
     * @param \string[] $email_recipients
     */
    public function setEmailRecipients($email_recipients)
    {
        $this->email_recipients = $email_recipients;
    }

    /**
     * @return Sharer
     */
    public function getSharer()
    {
        return $this->sharer;
    }

    /**
     * @param Sharer $sharer
     */
    public function setSharer($sharer)
    {
        $this->sharer = $sharer;
    }
}