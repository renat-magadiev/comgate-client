<?php

namespace ComgateTest;

use Comgate\Exception\LabelTooLongException;
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


    public function test__constructLabelError()
    {
        $this->expectException(LabelTooLongException::class);

        new CreatePayment(
            self::TEST_PRICE,
            self::TEST_REF_ID,
            self::TEST_EMAIL,
            'soooooooooo-long-text-really-looooooong',
            self::TEST_METHOD,
            self::TEST_CURRENCY
        );
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
        $createPayment = $this->create();
        $createPayment->setCurr('PLN');

        $this->assertSame('PLN', $createPayment->getCurr());
    }


    public function testSetCurr()
    {
        $createPayment = $this->create();
        $object        = $createPayment->setCurr(self::TEST_CURRENCY);

        $this->assertInstanceOf(CreatePayment::class, $object);
    }


    public function testGetCountry()
    {
        $createPayment = $this->create();
        $createPayment->setCountry('CZ');

        $this->assertSame('CZ', $createPayment->getCountry());
    }


    public function testSetCountry()
    {
        $createPayment = $this->create();
        $object        = $createPayment->setCountry('CZ');

        $this->assertInstanceOf(CreatePayment::class, $object);
    }


    public function testGetPayerId()
    {
        $createPayment = $this->create();
        $createPayment->setPayerId('9');

        $this->assertSame('9', $createPayment->getPayerId());
    }


    public function testSetPayerId()
    {
        $createPayment = $this->create();
        $object        = $createPayment->setPayerId('9');

        $this->assertInstanceOf(CreatePayment::class, $object);
    }


    public function testGetAccount()
    {
        $createPayment = $this->create();
        $createPayment->setAccount('account');

        $this->assertSame('account', $createPayment->getAccount());
    }


    public function testSetAccount()
    {
        $createPayment = $this->create();
        $object        = $createPayment->setAccount('account');

        $this->assertInstanceOf(CreatePayment::class, $object);
    }


    public function testGetPhone()
    {
        $createPayment = $this->create();
        $createPayment->setPhone('777777777');

        $this->assertSame('777777777', $createPayment->getPhone());
    }


    public function testSetPhone()
    {
        $createPayment = $this->create();
        $object        = $createPayment->setPhone('777777777');

        $this->assertInstanceOf(CreatePayment::class, $object);
    }


    public function testGetName()
    {
        $createPayment = $this->create();
        $createPayment->setName('name');

        $this->assertSame('name', $createPayment->getName());
    }


    public function testSetName()
    {
        $createPayment = $this->create();
        $object        = $createPayment->setName('name');

        $this->assertInstanceOf(CreatePayment::class, $object);
    }


    public function testGetLang()
    {
        $createPayment = $this->create();
        $createPayment->setLang('cs');

        $this->assertSame('cs', $createPayment->getLang());
    }


    public function testSetLang()
    {
        $createPayment = $this->create();
        $object        = $createPayment->setLang('cs');

        $this->assertInstanceOf(CreatePayment::class, $object);
    }


    public function testIsPrepareOnly()
    {
        $createPayment = $this->create();
        $createPayment->setPrepareOnly(false);

        $this->assertSame(false, $createPayment->isPrepareOnly());
    }


    public function testSetPrepareOnly()
    {
        $createPayment = $this->create();
        $object        = $createPayment->setPrepareOnly(false);

        $this->assertInstanceOf(CreatePayment::class, $object);
    }


    public function testIsPreauth()
    {
        $createPayment = $this->create();
        $createPayment->setPreauth(true);

        $this->assertSame(true, $createPayment->isPreauth());
    }


    public function testSetPreauth()
    {
        $createPayment = $this->create();
        $object        = $createPayment->setPreauth(true);

        $this->assertInstanceOf(CreatePayment::class, $object);
    }


    public function testIsInitRecurring()
    {
        $createPayment = $this->create();
        $createPayment->setInitRecurring(false);

        $this->assertSame(false, $createPayment->isInitRecurring());
    }


    public function testSetInitRecurring()
    {
        $createPayment = $this->create();
        $object        = $createPayment->setInitRecurring(false);

        $this->assertInstanceOf(CreatePayment::class, $object);
    }


    public function testIsVerification()
    {
        $createPayment = $this->create();
        $createPayment->setVerification(true);

        $this->assertSame(true, $createPayment->isVerification());
    }


    public function testSetVerification()
    {
        $createPayment = $this->create();
        $object        = $createPayment->setVerification(true);

        $this->assertInstanceOf(CreatePayment::class, $object);
    }


    public function testIsEmbedded()
    {
        $createPayment = $this->create();
        $createPayment->setEmbedded(false);

        $this->assertSame(false, $createPayment->isEmbedded());
    }


    public function testSetEmbedded()
    {
        $createPayment = $this->create();
        $object        = $createPayment->setEmbedded(false);

        $this->assertInstanceOf(CreatePayment::class, $object);
    }


    public function testIsEetReport()
    {
        $createPayment = $this->create();
        $createPayment->setEetReport(true);

        $this->assertSame(true, $createPayment->isEetReport());
    }


    public function testSetEetReport()
    {
        $createPayment = $this->create();
        $object        = $createPayment->setEetReport(true);

        $this->assertInstanceOf(CreatePayment::class, $object);
    }


    public function testGetEetData()
    {
        $createPayment = $this->create();
        $createPayment->setEetData('{}');

        $this->assertSame('{}', $createPayment->getEetData());
    }


    public function testSetEetData()
    {
        $createPayment = $this->create();
        $object        = $createPayment->setEetData('{}}');

        $this->assertInstanceOf(CreatePayment::class, $object);
    }


    public function testGetData()
    {
        $createPayment = $this->create();

        $this->assertArraySubset(
            [
                'price'  => self::TEST_PRICE,
                'refId'  => self::TEST_REF_ID,
                'email'  => self::TEST_EMAIL,
                'label'  => self::TEST_LABEL,
                'method' => self::TEST_METHOD,
                'curr'   => self::TEST_CURRENCY,
            ],
            $createPayment->getData()
        );
    }


    public function testIsPost()
    {
        $createPayment = $this->create();

        $this->assertSame(true, $createPayment->isPost());
    }


    public function testGetEndPoint()
    {
        $createPayment = $this->create();

        $this->assertSame('/create', $createPayment->getEndPoint());
    }
}
