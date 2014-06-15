<?php

class Bus {
  public $armed = false;
  public $exploded = false;
  public $speed = 20;
  
  function setSpeed($newSpeed) {
    $this->speed = $newSpeed;
    
    if ($newSpeed >= 50) {
      $this->armed = true;
    }
    
    if ($this->armed == true && $newSpeed <= 49) {
      $this->exploded = true;
    }
  }
  
  function getSpeed() {
    return $this->speed;
  }
  
  function trigger() {
    $this->exploded = true;
  }
};