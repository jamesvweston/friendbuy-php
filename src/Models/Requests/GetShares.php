<?php

namespace jamesvweston\FriendBuy\Models\Requests;


use jamesvweston\FriendBuy\Models\SimpleSerialize;

class GetShares implements \JsonSerializable
{

    use SimpleSerialize;


    /**
     * @var int|null
     */
    protected $limit;

    /**
     * @var int|null
     */
    protected $offset;

    /**
     * @var string|null
     */
    protected $from_date;

    /**
     * @var string|null
     */
    protected $to_date;

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object                         = $this->simpleSerialize();

        return $object;
    }

    /**
     * @return int|null
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @param int|null $limit
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
    }

    /**
     * @return int|null
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * @param int|null $offset
     */
    public function setOffset($offset)
    {
        $this->offset = $offset;
    }

    /**
     * @return null|string
     */
    public function getFromDate()
    {
        return $this->from_date;
    }

    /**
     * @param null|string $from_date
     */
    public function setFromDate($from_date)
    {
        $this->from_date = $from_date;
    }

    /**
     * @return null|string
     */
    public function getToDate()
    {
        return $this->to_date;
    }

    /**
     * @param null|string $to_date
     */
    public function setToDate($to_date)
    {
        $this->to_date = $to_date;
    }

}