<?php

namespace ComgateTest;

use Comgate\Request\CreatePayment;
use PHPUnit\Framework\TestCase;

class CreatePaymentTest extends TestCase
{
    const TEST_PRICE = 100;
    const TEST_REF_ID = '1';
    const TEST_EMAIL = 'test@test.cz';
    const TEST_LABEL = 'test';
    const TEST_METHOD = 'ALL';
    const TEST_CURRENCY = 'CZK';


    /**
     * @return CreatePayment
     */
    private function create()
    {
        return new CreatePayment(
            self::TEST_PRICE,
            self::TEST_REF_ID,
            self::TEST_EMAIL,
            self::TEST_LABEL,
            self::TEST_METHOD,
            self::TEST_CURRENCY
        );
    }


    public function test__construct()
    {
        $createPayment = $this->create();

        $this->assertSame(self::TEST_PRICE, $createPayment->getPrice());
        $this->assertSame(self::TEST_REF_ID, $createPayment->getRefId());
        $this->assertSame(self::TEST_EMAIL, $createPayment->getEmail());
        $this->assertSame(self::TEST_LABEL, $createPayment->getLabel());
        $this->assertSame(self::TEST_METHOD, $createPayment->getMethod());
        $this->assertSame(self::TEST_CURRENCY, $createPayment->getCurr());
    }


    public function testGetPrice()
    {
        $createPayment = $this->create();
        $createPayment->setPrice(200);

        $this->assertSame(200, $createPayment->getPrice());
    }


    public function testSetPrice()
    {
        $createPayment = $this->create();
        $object        = $createPayment->setPrice(self::TEST_PRICE);

        $this->assertInstanceOf(CreatePayment::class, $object);
    }


    public function testGetRefId()
    {
        $createPayment = $this->create();
        $createPayment->setRefId('2');

        $this->assertSame('2', $createPayment->getRefId());
    }


    public function testSetRefId()
    {
        $createPayment = $this->create();
        $object        = $createPayment->setRefId(self::TEST_REF_ID);

        $this->assertInstanceOf(CreatePayment::class, $object);
    }


    public function testGetEmail()
    {
        $createPayment = $this->create();
        $createPayment->setEmail('test2@test.cz');

        $this->assertSame('test2@test.cz', $createPayment->getEmail());
    }


    public function testSetEmail()
    {
        $createPayment = $this->create();
        $object        = $createPayment->setEmail(self::TEST_EMAIL);

        $this->assertInstanceOf(CreatePayment::class, $object);
    }


    public function testGetLabel()
    {
        $createPayment = $this->create();
        $createPayment->setLabel('test2');

        $this->assertSame('test2', $createPayment->getLabel());
    }


    public function testSetLabel()
    {
        $createPayment = $this->create();
        $object        = $createPayment->setLabel(self::TEST_LABEL);

        $this->assertInstanceOf(CreatePayment::class, $object);
    }


    public function testGetMethod()
    {
        $createPayment = $this->create();
        $createPayment->setMethod('BANK_ALL');

        $this->assertSame('BANK_ALL', $createPayment->getMethod());
    }


    public function testSetMethod()
    {
        $createPayment = $this->create();
        $object        = $createPayment->setMethod(self::TEST_METHOD);

        $this->assertInstanceOf(CreatePayment::class, $object);
    }


    public function testGetCurr()
    {

    }


    public function testSetCurr()
    {

    }


    public function testGetCountry()
    {

    }


    public function testSetCountry()
    {

    }


    public function testGetPayerId()
    {

    }


    public function testSetPayerId()
    {

    }


    public function testGetAccount()
    {

    }


    public function testSetAccount()
    {

    }


    public function testGetPhone()
    {

    }


    public function testSetPhone()
    {

    }


    public function testGetName()
    {

    }


    public function testSetName()
    {

    }


    public function testGetLang()
    {

    }


    public function testSetLang()
    {

    }


    public function testIsPrepareOnly()
    {

    }


    public function testSetPrepareOnly()
    {

    }


    public function testIsPreauth()
    {

    }


    public function testSetPreauth()
    {

    }


    public function testIsInitRecurring()
    {

    }


    public function testSetInitRecurring()
    {

    }


    public function testIsVerification()
    {

    }


    public function testSetVerification()
    {

    }


    public function testIsEmbedded()
    {

    }


    public function testSetEmbedded()
    {

    }


    public function testIsEetReport()
    {

    }


    public function testSetEetReport()
    {

    }


    public function testGetEetData()
    {

    }


    public function testSetEetData()
    {

    }


    public function testGetData()
    {

    }


    public function testIsPost()
    {

    }


    public function testGetEndPoint()
    {

    }
}
