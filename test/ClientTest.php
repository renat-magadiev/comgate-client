<?php

namespace ComgateTest;

use Comgate\Client;
use Comgate\Exception\ErrorCodeException;
use Comgate\Request\CreatePayment;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{

    public function test__construct()
    {
        $client = new Client('123456', true, 'secret');

        $this->assertInstanceOf(Client::class, $client);
    }


    public function testSend()
    {
        $client = new Client('123456', true, 'secret');

        $mock = new MockHandler([
            new Response(
                200,
                [],
                'code=0&message=OK&transId=test&redirect=https%3A%2F%2Fpayments.comgate.cz%2Fclient%2Finstructions%2Findex%3Fid%3test'
            ),
        ]);

        $handler = HandlerStack::create($mock);
        $guzzleClient = new \GuzzleHttp\Client(['handler' => $handler]);
        $client->setClient($guzzleClient);

        $createPayment = new CreatePayment(1000, '10001', 'test@test.cz', 'Janko Hrasko', 'Product');

        $response = $client->send($createPayment);

        $this->assertSame(true, $response->isOk());
        $this->assertSame('test', $response->getTransId());
        $this->assertSame('https://payments.comgate.cz/client/instructions/index?id%3test', $response->getRedirectUrl());
    }

    public function testSendTooSmallPrice()
    {
        $client = new Client('123456', true, 'secret');

        $mock = new MockHandler([
            new Response(
                200,
                [],
                'code=1107&message=Price+0.01+CZK+is+not+supported+by+any+method+enabled+for+you'
            )
        ]);

        $handler = HandlerStack::create($mock);
        $guzzleClient = new \GuzzleHttp\Client(['handler' => $handler]);
        $client->setClient($guzzleClient);

        $createPayment = new CreatePayment(1, '10001', 'test@test.cz', 'Janko Hrasko', 'Product');

        $this->expectException(ErrorCodeException::class);
        $this->expectExceptionCode(1107);
        $this->expectExceptionMessage('Price 0.01 CZK is not supported by any method enabled for you');
        $client->send($createPayment);
    }
}
