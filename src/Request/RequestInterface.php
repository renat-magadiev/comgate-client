<?php
declare(strict_types=1);

namespace Comgate\Request;

interface RequestInterface
{

    /**
     * @return array
     */
    public function getData();


    /**
     * @return bool
     */
    public function isPost();


    /**
     * @return string
     */
    public function getEndPoint();


    /**
     * @return string
     */
    public function getResponseClass();
}