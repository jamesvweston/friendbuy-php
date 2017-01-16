<?php

namespace jamesvweston\FriendBuy\Api;


use jamesvweston\FriendBuy\Exceptions\FriendBuyException;
use jamesvweston\FriendBuy\FriendBuyConfiguration;
use jamesvweston\Utilities\ArrayUtil AS AU;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class BaseApi
{


    /**
     * @var FriendBuyConfiguration
     */
    protected $config;

    /**
     * @var Client
     */
    protected $guzzle;


    /**
     * FriendBuyIntegration constructor.
     * @param FriendBuyConfiguration        $config
     */
    public function __construct($config)
    {
        $this->config                       = $config;
        $this->guzzle                       = new Client();
    }


    /**
     * @param   string      $method
     * @param   string      $path
     * @param   array|null  $query
     * @return  array
     * @throws  FriendBuyException
     */
    public function makeHttpRequest($method, $path, $query = [])
    {
        $method                     = strtolower($method);
        $url                        = $this->config->getUrl() . $path;

        $data       = [
            'query'                 => $query,
        ];

        try
        {
            switch ($method)
            {
                case 'post':
                    $response       = $this->guzzle->post($url, $data);
                    break;
                case 'put':
                    $response       = $this->guzzle->put($url, $data);
                    break;
                case 'delete':
                    $response       = $this->guzzle->delete($url, $data);
                    break;
                case 'get':
                    $response       = $this->guzzle->get($url, $data);
                    break;
                default:
                    return null;
            }
        }
        catch (ClientException $ex)
        {
            $errorMessage           = json_decode($ex->getResponse()->getBody()->getContents(), true);
            if (is_array($errorMessage))
                $errorMessage       = AU::get($errorMessage['message']);

            throw new FriendBuyException($errorMessage, $ex->getCode());
        }

        $result                     = json_decode($response->getBody(), true);
        return $result;
    }

}