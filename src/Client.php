<?php

namespace Comgate;

use Comgate\Request\RequestInterface;
use Comgate\Response\CreatePaymentResponse;

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
            'base_uri' => 'https://payments.comgate.cz/v1.0/'
        ]);
    }


    /**
     * @param \GuzzleHttp\Client $client
     * @return $this
     */
    public function setClient(\GuzzleHttp\Client $client)
    {
        $this->client = $client;

        return $this;
    }


    /**
     * @param RequestInterface $request
     * @return CreatePaymentResponse
     */
    public function send(RequestInterface $request)
    {
        $baseParams = [
            'merchant' => $this->merchantId,
            'test' => $this->test ? 'true' : 'false',
            'secret' => $this->secret
        ];

        if ($request->isPost()) {
            $response = $this->client->request('POST', $request->getEndPoint(), [
                'form_params' => $baseParams + $request->getData()
            ]);
        } else {
            $response = $this->client->request('GET', $request->getEndPoint(), [
                'query' => $baseParams + $request->getData()
            ]);
        }

        $body = (string)$response->getBody();
        parse_str($body, $data);

        $responseClass = $request->getResponseClass();

        return new $responseClass($data);
    }
}