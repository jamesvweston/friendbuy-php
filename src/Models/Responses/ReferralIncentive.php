<?php

namespace jamesvweston\FriendBuy\Models\Responses;


use jamesvweston\FriendBuy\Models\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

class ReferralIncentive implements \JsonSerializable
{


    use SimpleSerialize;


    /**
     * @var string
     */
    protected $type;

    /**
     * @var float
     */
    protected $value;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->type                     = AU::get($data['type']);
        $this->value                    = AU::get($data['value']);
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
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param float $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

}