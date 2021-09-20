<?php
declare(strict_types=1);

namespace Comgate\Response;

use Comgate\Exception\InvalidArgumentException;

class GetMethodsResponse {

  /**
   * @var int
   */
  private $data;


  /**
   * @param string $rawData
   *
   * @throws InvalidArgumentException
   */
  public function __construct(string $rawData) {
    $parsed_data = $this->parseData($rawData);
    if (isset($parsed_data['error'])) {
      throw new InvalidArgumentException('Error');
    }
    else {
      $this->data = $parsed_data;
    }
  }

  /**
   * @param $rawData
   *
   * @return array
   */
  private function parseData(string $rawData) {
    $get_json = json_decode($rawData);
    $data = [];
    foreach ($get_json->methods as $value) {
      $data[$value->id] = $value->name . ' | ' . $value->description;
    }
    return $data;
  }

  /**
   * @return array
   */
  public function getData(): array {
    return $this->data;
  }

}