<?php

namespace jamesvweston\FriendBuy\tests;


use jamesvweston\FriendBuy\tests\Factories\FriendBuyConfigFactory;

class ShareTests extends \PHPUnit_Framework_TestCase
{

    public function testIndex ()
    {
        $client                     = FriendBuyConfigFactory::getFromEnv();
        $results                    = $client->shareApi->index();
        print_r($results->getResults()[0]);
        die;
    }

}