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
     * @return bool
     */
    public function needParse();
  
    /**
     * @return string
     */
    public function getEndPoint();


    /**
     * @return string
     */
    public function getResponseClass();
}