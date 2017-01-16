<?php

namespace jamesvweston\FriendBuy\tests;


use jamesvweston\FriendBuy\tests\Factories\FriendBuyConfigFactory;

class CustomerTests extends \PHPUnit_Framework_TestCase
{


    public function testStuff ()
    {
        $client                     = FriendBuyConfigFactory::getFromEnv();

        print_r($client->customerApi->index()->jsonSerialize());
    }
}