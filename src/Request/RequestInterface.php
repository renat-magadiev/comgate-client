<?php

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
}