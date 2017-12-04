<?php

namespace Comgate\Response;

use Comgate\Enum\ResponseCode;
use Comgate\Exception\InvalidArgumentException;

class CreatePaymentResponse
{
    /**
     * @var int
     */
    private $code;

    /**
     * @var string
     */
    private $message;

    /**
     * @var string
     */
    private $transId;

    /**
     * @var string
     */
    private $redirect;


    /**
     * @param array $rawData
     * @throws InvalidArgumentException
     */
    public function __construct(array $rawData)
    {
        if (isset($rawData['code'])) {
            $this->code = (int)$rawData['code'];
        } else {
            throw new InvalidArgumentException('Missing "code" in response');
        }

        if (isset($rawData['message'])) {
            $this->message = $rawData['message'];
        } else {
            throw new InvalidArgumentException('Missing "message" in response');
        }

        if (isset($rawData['transId'])) {
            $this->transId = $rawData['transId'];
        } else {
            throw new InvalidArgumentException('Missing "transId" in response');
        }

        if (isset($rawData['redirect'])) {
            $this->redirect = $rawData['redirect'];
        } else {
            throw new InvalidArgumentException('Missing "redirect" in response');
        }
    }


    /**
     * @return bool
     */
    public function isOk(): bool
    {
        return $this->code === ResponseCode::CODE_OK;
    }


    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }


    /**
     * @return string
     */
    public function getTransId(): string
    {
        return $this->transId;
    }


    /**
     * @return string
     */
    public function getRedirectUrl(): string
    {
        return $this->redirect;
    }
}