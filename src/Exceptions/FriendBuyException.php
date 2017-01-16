<?php

namespace jamesvweston\FriendBuy\Exceptions;


class FriendBuyException extends \Exception
{

    public function __construct($message, $code, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}