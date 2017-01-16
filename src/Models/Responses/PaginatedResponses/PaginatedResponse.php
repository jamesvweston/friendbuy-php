<?php

namespace jamesvweston\FriendBuy\Models\Responses\PaginatedResponses;


use jamesvweston\FriendBuy\Models\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

abstract class PaginatedResponse implements \JsonSerializable
{


    use SimpleSerialize;


    /**
     * @var int
     */
    protected $this_page_results_count;

    /**
     * @var int
     */
    protected $total_results_count;

    /**
     * @var int
     */
    protected $offset;

    /**
     * @var object[]
     */
    protected $results;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->this_page_results_count  = AU::get($data['this_page_results_count']);
        $this->total_results_count      = AU::get($data['total_results_count']);
        $this->offset                   = AU::get($data['offset']);

        $this->results                  = [];
        $this->results                  = $this->setResults(AU::get($data['results'], []));
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object                         = $this->simpleSerialize();
        $object['results']              = [];

        foreach ($this->results AS $result)
            $object['results']          = $result->jsonSerialize();

        return $object;
    }


    abstract function getResults();

    abstract function setResults($results = []);

    /**
     * @return int
     */
    public function getThisPageResultsCount()
    {
        return $this->this_page_results_count;
    }

    /**
     * @param int $this_page_results_count
     */
    public function setThisPageResultsCount($this_page_results_count)
    {
        $this->this_page_results_count = $this_page_results_count;
    }

    /**
     * @return int
     */
    public function getTotalResultsCount()
    {
        return $this->total_results_count;
    }

    /**
     * @param int $total_results_count
     */
    public function setTotalResultsCount($total_results_count)
    {
        $this->total_results_count = $total_results_count;
    }

    /**
     * @return int
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * @param int $offset
     */
    public function setOffset($offset)
    {
        $this->offset = $offset;
    }

}