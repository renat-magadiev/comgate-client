<?php

namespace Comgate;

use Comgate\Request\RequestInterface;

class Client
{
    /**
     * @var string
     */
    private $merchantId;

    /**
     * @var bool
     */
    private $test;

    /**
     * @var null|string
     */
    private $secret;

    /**
     * @var \GuzzleHttp\Client
     */
    private $client;


    /**
     * @param string      $merchantId
     * @param bool        $test   (use test env)
     * @param string|null $secret (if not set you cannot create transaction in background)
     */
    public function __construct(string $merchantId, bool $test = false, string $secret = null)
    {
        $this->merchantId = $merchantId;
        $this->test       = $test;
        $this->secret     = $secret;

        $this->client = new \GuzzleHttp\Client([
            'base_url' => [
                'https://payments.comgate.cz/{version}',
                [
                    'version' => 'v1.0'
                ]
            ]
        ]);
    }


    public function send(RequestInterface $request)
    {
        if ($request->isPost()) {
            $response = $this->client->request('POST', $request->getEndPoint(), [
                'form_params' => $request->getData()
            ]);
        } else {
            $response = $this->client->request('GET', $request->getEndPoint(), [
                'query' => $request->getData()
            ]);
        }

        return $response;
    }
}