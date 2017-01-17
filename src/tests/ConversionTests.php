<?php

namespace jamesvweston\FriendBuy\tests;


use jamesvweston\FriendBuy\tests\Factories\FriendBuyConfigFactory;

class ConversionTests extends \PHPUnit_Framework_TestCase
{

    public function testIndex ()
    {
        $client                     = FriendBuyConfigFactory::getFromEnv();
        $results                    = $client->conversionApi->index();
        /**
        $results                    = $client->conversionApi->index();
        print_r($results->getResults()[0]);
        die;
         */
        /**
        $client->getConfig()->setJsonOnly(true);
        $results                    = $client->conversionApi->index();
        print_r($results['results'][0]);
        die;
         */
    }

}