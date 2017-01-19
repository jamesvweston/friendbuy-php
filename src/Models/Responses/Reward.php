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
     * @var Fraud|null
     */
    protected $rejected_reasons;

    /**
     * @var Conversion
     */
    protected $conversion;


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

        $this->rejected_reasons         = AU::get($data['rejected_reasons']);
        if (!is_null($this->rejected_reasons))
            $this->rejected_reasons     = new Fraud($this->rejected_reasons);

        $this->conversion               = AU::get($data['conversion']);
        if (!is_null($this->conversion))
            $this->conversion           = new Conversion($this->conversion);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object                         = $this->simpleSerialize();
        $object['rejected_reasons']     = is_null($this->rejected_reasons) ? null : $this->rejected_reasons->jsonSerialize();
        $object['conversion']           = is_null($this->conversion) ? null : $this->conversion->jsonSerialize();
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
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @return string
     */
    public function getEvaluateAt()
    {
        return $this->evaluate_at;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return Fraud|null
     */
    public function getRejectedReasons()
    {
        return $this->rejected_reasons;
    }

    /**
     * @return Conversion
     */
    public function getConversion()
    {
        return $this->conversion;
    }

}