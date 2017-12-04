<?php

namespace ComgateTest;

use Comgate\Enum\ResponseCode;
use Comgate\Exception\InvalidArgumentException;
use Comgate\Response\CreatePaymentResponse;
use PHPUnit\Framework\TestCase;

class CreatePaymentResponseTest extends TestCase
{

    /**
     * test only if no exception throws
     * @doesNotPerformAssertions
     */
    public function test__construct()
    {
        new CreatePaymentResponse(
            [
                'code'     => ResponseCode::CODE_OK,
                'message'  => 'OK',
                'transId'  => 'asd-asd-asd-asd',
                'redirect' => 'http://test.cz',
            ]
        );
    }


    public function test__constructCodeException()
    {
        $this->expectException(InvalidArgumentException::class);

        new CreatePaymentResponse(
            [
                'message'  => 'OK',
                'transId'  => 'asd-asd-asd-asd',
                'redirect' => 'http://test.cz',
            ]
        );
    }


    public function test__constructMessageException()
    {
        $this->expectException(InvalidArgumentException::class);

        new CreatePaymentResponse(
            [
                'code'     => ResponseCode::CODE_OK,
                'transId'  => 'asd-asd-asd-asd',
                'redirect' => 'http://test.cz',
            ]
        );
    }


    public function test__constructTransIdException()
    {
        $this->expectException(InvalidArgumentException::class);

        new CreatePaymentResponse(
            [
                'code'     => ResponseCode::CODE_OK,
                'message'  => 'OK',
                'redirect' => 'http://test.cz',
            ]
        );
    }


    public function test__constructRedirectException()
    {
        $this->expectException(InvalidArgumentException::class);

        new CreatePaymentResponse(
            [
                'code'    => ResponseCode::CODE_OK,
                'message' => 'OK',
                'transId' => 'asd-asd-asd-asd',
            ]
        );
    }

    public function testIsOk()
    {
        $response = new CreatePaymentResponse(
            [
                'code'     => ResponseCode::CODE_OK,
                'message'  => 'OK',
                'transId'  => 'asd-asd-asd-asd',
                'redirect' => 'http://test.cz',
            ]
        );

        $this->assertSame(true, $response->isOk());
    }

    public function testIsNotOk()
    {
        $response = new CreatePaymentResponse(
            [
                'code'     => ResponseCode::CODE_CHOOSE_CORRECT_METHOD,
                'message'  => 'OK',
                'transId'  => 'asd-asd-asd-asd',
                'redirect' => 'http://test.cz',
            ]
        );

        $this->assertSame(false, $response->isOk());
    }

    public function testGetMessage()
    {
        $response = new CreatePaymentResponse(
            [
                'code'     => ResponseCode::CODE_CHOOSE_CORRECT_METHOD,
                'message'  => 'OK',
                'transId'  => 'asd-asd-asd-asd',
                'redirect' => 'http://test.cz',
            ]
        );

        $this->assertSame('OK', $response->getMessage());
    }

    public function testGetTransId()
    {
        $response = new CreatePaymentResponse(
            [
                'code'     => ResponseCode::CODE_CHOOSE_CORRECT_METHOD,
                'message'  => 'OK',
                'transId'  => 'asd-asd-asd-asd',
                'redirect' => 'http://test.cz',
            ]
        );

        $this->assertSame('asd-asd-asd-asd', $response->getTransId());
    }

    public function testGetRedirect()
    {
        $response = new CreatePaymentResponse(
            [
                'code'     => ResponseCode::CODE_CHOOSE_CORRECT_METHOD,
                'message'  => 'OK',
                'transId'  => 'asd-asd-asd-asd',
                'redirect' => 'http://test.cz',
            ]
        );

        $this->assertSame('http://test.cz', $response->getRedirectUrl());
    }

}
