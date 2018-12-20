<?php

class Item {

  private $value = '';
  private $status = '';

  public function __construct($val, $status = '') {
    $this->value = $val;
    return $this;
  }

  public function getValue() {
    return $this->value;
  }

  public function getStatus() {
    return $this->status;
  }

  public function changeStatus() {
    if (!$this->status) {
      $this->status = 'done';
    } else {
      $this->status = '';
    }

    return true;
  }
}
