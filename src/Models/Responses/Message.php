<?php

namespace jamesvweston\FriendBuy\Models\Responses;


use jamesvweston\FriendBuy\Models\SimpleSerialize;
use jamesvweston\Utilities\ArrayUtil AS AU;

class Message implements \JsonSerializable
{


    use SimpleSerialize;


    /**
     * @var string
     */
    protected $content;

    /**
     * @var string
     */
    protected $network;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->content                  = AU::get($data['content']);
        $this->network                  = AU::get($data['network']);
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
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getNetwork()
    {
        return $this->network;
    }

    /**
     * @param string $network
     */
    public function setNetwork($network)
    {
        $this->network = $network;
    }
}