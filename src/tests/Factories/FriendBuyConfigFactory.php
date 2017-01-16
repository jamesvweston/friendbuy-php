<?php

namespace jamesvweston\FriendBuy\tests\Factories;


use jamesvweston\FriendBuy\FriendBuyClient;

class FriendBuyConfigFactory
{


    /**
     * @return FriendBuyClient
     */
    public static function getFromEnv ()
    {
        return new FriendBuyClient('./');
    }

}