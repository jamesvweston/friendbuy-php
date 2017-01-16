<?php

namespace jamesvweston\FriendBuy\Models\Responses;


use jamesvweston\FriendBuy\Models\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

/**
 * @see https://www.friendbuy.com/webhooks/#webhooks-reward
 * Class Reward
 * @package jamesvweston\FriendBuy\Models\Responses
 */
class Reward implements \JsonSerializable
{


    use SimpleSerialize;


    /**
     * @var int
     */
    protected $id;

    /**
     * The amount of the reward[].type to be given for a valid conversion
     * @var float
     */
    protected $amount;

    /**
     * @var string
     */
    protected $created_at;

    /**
     * Date and time this conversion's validity was evaluated
     * @var string
     */
    protected $evaluate_at;

    /**
     * The unit of the reward to be granted for a valid conversion
     * @var string
     */
    protected $type;

    /**
     * valid, or invalid depending if this reward passed defined validation checks
     * @var string
     */
    protected $status;

    /**
     * @var Fraud
     */
    protected $rejected_reasons;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->id                       = AU::get($data['id']);
        $this->amount                   = AU::get($data['amount']);
        $this->created_at               = AU::get($data['created_at']);
        $this->evaluate_at              = AU::get($data['evaluate_at']);
        $this->type                     = AU::get($data['type']);
        $this->status                   = AU::get($data['status'], []);
        $this->rejected_reasons         = new Fraud(AU::get($data['rejected_reasons']));
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object                         = $this->simpleSerialize();
        $object['rejected_reasons']     = $this->rejected_reasons->jsonSerialize();

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
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
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
    public function getEvaluateAt()
    {
        return $this->evaluate_at;
    }

    /**
     * @param string $evaluate_at
     */
    public function setEvaluateAt($evaluate_at)
    {
        $this->evaluate_at = $evaluate_at;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
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
     * @return Fraud
     */
    public function getRejectedReasons()
    {
        return $this->rejected_reasons;
    }

    /**
     * @param Fraud $rejected_reasons
     */
    public function setRejectedReasons($rejected_reasons)
    {
        $this->rejected_reasons = $rejected_reasons;
    }

}