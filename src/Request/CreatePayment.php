<?php

namespace Comgate\Request;

use Comgate\Enum\Method;
use Comgate\Exception\LabelTooLongException;

class CreatePayment implements RequestInterface
{
    /**
     * @var int
     */
    private $price;

    /**
     * @var string
     */
    private $refId;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $label;

    /**
     * @var string
     */
    private $method;

    /**
     * @var string
     */
    private $curr;

    /**
     * @var string (default is 'CZ')
     */
    private $country;

    /**
     * @var string (user identifier for saved card info)
     */
    private $payerId;

    /**
     * @var string
     */
    private $account;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string (product identifier)
     */
    private $name;

    /**
     * @var string (lang ISO-639-1, default='cs')
     */
    private $lang;

    /**
     * @var bool (true = background create; false = create with redirect)
     */
    private $prepareOnly;

    /**
     * @var bool
     */
    private $preauth;

    /**
     * @var bool
     */
    private $initRecurring;

    /**
     * @var bool
     */
    private $verification;

    /**
     * @var bool
     */
    private $embedded;

    /**
     * @var bool
     */
    private $eetReport;

    /**
     * @var string (JSON)
     */
    private $eetData;

    /**
     * @param int    $price (price in heller so for 10 CZK you must set 1000)
     * @param string $refId (for example orderId)
     * @param string $email (email of client to send confirmation)
     * @param string $label (label of product 1-16 chars)
     * @param string $method (method of payment to show to customer)
     * @param string $curr
     *
     * @throws LabelTooLongException
     */
    public function __construct(int $price, string $refId, string $email, string $label, string $method = Method::ALL, string $curr = 'CZK')
    {
        $this->price  = $price;
        $this->refId  = $refId;
        $this->email  = $email;
        $this->method = $method;
        $this->curr   = $curr;

        if (mb_strlen($label) > 16) {
            throw new LabelTooLongException('Product label is too long. Max length is 16 chars');
        }
        $this->label = $label;
    }


    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }


    /**
     * @param int $price
     * @return CreatePayment
     */
    public function setPrice(int $price): CreatePayment
    {
        $this->price = $price;

        return $this;
    }


    /**
     * @return string
     */
    public function getRefId(): string
    {
        return $this->refId;
    }


    /**
     * @param string $refId
     * @return CreatePayment
     */
    public function setRefId(string $refId): CreatePayment
    {
        $this->refId = $refId;

        return $this;
    }


    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }


    /**
     * @param string $email
     * @return CreatePayment
     */
    public function setEmail(string $email): CreatePayment
    {
        $this->email = $email;

        return $this;
    }


    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }


    /**
     * @param string $label
     * @return CreatePayment
     */
    public function setLabel(string $label): CreatePayment
    {
        $this->label = $label;

        return $this;
    }


    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }


    /**
     * @param string $method
     * @return CreatePayment
     */
    public function setMethod(string $method): CreatePayment
    {
        $this->method = $method;

        return $this;
    }


    /**
     * @return string
     */
    public function getCurr(): string
    {
        return $this->curr;
    }


    /**
     * @param string $curr
     * @return CreatePayment
     */
    public function setCurr(string $curr): CreatePayment
    {
        $this->curr = $curr;

        return $this;
    }


    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }


    /**
     * @param string $country
     * @return CreatePayment
     */
    public function setCountry(string $country): CreatePayment
    {
        $this->country = $country;

        return $this;
    }


    /**
     * @return string
     */
    public function getPayerId(): string
    {
        return $this->payerId;
    }


    /**
     * @param string $payerId
     * @return CreatePayment
     */
    public function setPayerId(string $payerId): CreatePayment
    {
        $this->payerId = $payerId;

        return $this;
    }


    /**
     * @return string
     */
    public function getAccount(): string
    {
        return $this->account;
    }


    /**
     * @param string $account
     * @return CreatePayment
     */
    public function setAccount(string $account): CreatePayment
    {
        $this->account = $account;

        return $this;
    }


    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }


    /**
     * @param string $phone
     * @return CreatePayment
     */
    public function setPhone(string $phone): CreatePayment
    {
        $this->phone = $phone;

        return $this;
    }


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }


    /**
     * @param string $name
     * @return CreatePayment
     */
    public function setName(string $name): CreatePayment
    {
        $this->name = $name;

        return $this;
    }


    /**
     * @return string
     */
    public function getLang(): string
    {
        return $this->lang;
    }


    /**
     * @param string $lang
     * @return CreatePayment
     */
    public function setLang(string $lang): CreatePayment
    {
        $this->lang = $lang;

        return $this;
    }


    /**
     * @return bool
     */
    public function isPrepareOnly(): bool
    {
        return $this->prepareOnly;
    }


    /**
     * @param bool $prepareOnly
     * @return CreatePayment
     */
    public function setPrepareOnly(bool $prepareOnly): CreatePayment
    {
        $this->prepareOnly = $prepareOnly;

        return $this;
    }


    /**
     * @return bool
     */
    public function isPreauth(): bool
    {
        return $this->preauth;
    }


    /**
     * @param bool $preauth
     * @return CreatePayment
     */
    public function setPreauth(bool $preauth): CreatePayment
    {
        $this->preauth = $preauth;

        return $this;
    }


    /**
     * @return bool
     */
    public function isInitRecurring(): bool
    {
        return $this->initRecurring;
    }


    /**
     * @param bool $initRecurring
     * @return CreatePayment
     */
    public function setInitRecurring(bool $initRecurring): CreatePayment
    {
        $this->initRecurring = $initRecurring;

        return $this;
    }


    /**
     * @return bool
     */
    public function isVerification(): bool
    {
        return $this->verification;
    }


    /**
     * @param bool $verification
     * @return CreatePayment
     */
    public function setVerification(bool $verification): CreatePayment
    {
        $this->verification = $verification;

        return $this;
    }


    /**
     * @return bool
     */
    public function isEmbedded(): bool
    {
        return $this->embedded;
    }


    /**
     * @param bool $embedded
     * @return CreatePayment
     */
    public function setEmbedded(bool $embedded): CreatePayment
    {
        $this->embedded = $embedded;

        return $this;
    }


    /**
     * @return bool
     */
    public function isEetReport(): bool
    {
        return $this->eetReport;
    }


    /**
     * @param bool $eetReport
     * @return CreatePayment
     */
    public function setEetReport(bool $eetReport): CreatePayment
    {
        $this->eetReport = $eetReport;

        return $this;
    }


    /**
     * @return string
     */
    public function getEetData(): string
    {
        return $this->eetData;
    }


    /**
     * @param string $eetData
     * @return CreatePayment
     */
    public function setEetData(string $eetData): CreatePayment
    {
        $this->eetData = $eetData;

        return $this;
    }


    /**
     * @return array
     */
    public function getData()
    {
        $data = [
            'price' => $this->getPrice(),
            'refId' => $this->getRefId(),
            'email' => $this->getEmail(),
            'label' => $this->getLabel(),
            'method' => $this->getMethod(),
            'curr' => $this->getCurr()
        ];

        $fields = [
            'country',
            'payerId',
            'account',
            'phone',
            'name',
            'lang',
            'prepareOnly',
            'preauth',
            'initRecurring',
            'verification',
            'embedded',
            'eetReport',
            'eetData',
        ];

        foreach ($fields as $field) {
            if ($this->$field !== NULL) {
                $fields[$field] = $this->$field;
            }
        }

        return $data;
    }


    /**
     * @return bool
     */
    public function isPost()
    {
        return true;
    }


    /**
     * @return string
     */
    public function getEndPoint()
    {
        return '/create';
    }


    /**
     * @return string
     */
    public function getResponseClass()
    {
        return '/create';
    }

}