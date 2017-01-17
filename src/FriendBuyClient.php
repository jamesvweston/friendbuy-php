<?php

namespace jamesvweston\FriendBuy;


use Dotenv\Dotenv;
use jamesvweston\FriendBuy\Api\BaseApi;
use jamesvweston\FriendBuy\Api\ConversionApi;
use jamesvweston\FriendBuy\Api\CustomerApi;
use jamesvweston\FriendBuy\Api\OptOutApi;
use jamesvweston\FriendBuy\Api\PurchaseApi;
use jamesvweston\FriendBuy\Api\ReferralCodeApi;
use jamesvweston\FriendBuy\Api\ShareApi;
use jamesvweston\Utilities\ArrayUtil AS AU;

class FriendBuyClient
{

    /**
     * @var FriendBuyConfiguration
     */
    protected $config;


    /**
     * @var BaseApi
     */
    public $baseApi;

    /**
     * @var ConversionApi
     */
    public $conversionApi;

    /**
     * @var CustomerApi
     */
    public $customerApi;

    /**
     * @var OptOutApi
     */
    public $optOutApi;

    /**
     * @var PurchaseApi
     */
    public $purchaseApi;

    /**
     * @var ReferralCodeApi
     */
    public $referralCodeApi;

    /**
     * @var ShareApi
     */
    public $shareApi;


    /**
     * FriendBuyIntegration constructor.
     * @param FriendBuyConfiguration|string|array   $config
     */
    public function __construct($config = null)
    {
        if ($config instanceof FriendBuyConfiguration)
            $this->config               = $config;
        else if (is_array($config))
        {
            $data                       = [
                'username'              => AU::get($config['username']),
                'password'              => AU::get($config['password']),
            ];
            $this->config               = new FriendBuyConfiguration($data);
        }
        else if (is_string($config))
        {
            if (!is_dir($config))
                throw new \InvalidArgumentException('A configuration must be provided');

            $dotEnv                         = new Dotenv($config);
            $dotEnv->load();

            $data = [
                'username'              => getenv('FRIEND_BUY_USERNAME'),
                'password'              => getenv('FRIEND_BUY_PASSWORD'),
            ];
            $this->config               = new FriendBuyConfiguration($data);
        }
        else
            throw new \InvalidArgumentException('A configuration must be provided');

        $this->baseApi                  = new BaseApi($this->config);
        $this->conversionApi            = new ConversionApi($this->config);
        $this->customerApi              = new CustomerApi($this->config);
        $this->optOutApi                = new OptOutApi($this->config);
        $this->purchaseApi              = new PurchaseApi($this->config);
        $this->referralCodeApi          = new ReferralCodeApi($this->config);
        $this->shareApi                 = new ShareApi($this->config);
    }

    /**
     * @return FriendBuyConfiguration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param FriendBuyConfiguration $config
     */
    public function setConfig($config)
    {
        $this->config = $config;
    }

    /**
     * @return BaseApi
     */
    public function getBaseApi()
    {
        return $this->baseApi;
    }

}