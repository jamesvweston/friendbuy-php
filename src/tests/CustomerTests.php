<?php

namespace jamesvweston\FriendBuy\tests;


use jamesvweston\FriendBuy\tests\Factories\FriendBuyConfigFactory;

class CustomerTests extends \PHPUnit_Framework_TestCase
{


    public function testIndex ()
    {
        $client                     = FriendBuyConfigFactory::getFromEnv();
        $results                    = $client->customerApi->index();
    }
}