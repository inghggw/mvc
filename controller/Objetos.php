<?php

class Controller{
  public $x=3;
  private $y=4;
  static protected $z=5;
  public $s=1;
  
  public function metodo1(){
    return "texto1";
  }
  
  private function metodo2(){
    return "texto2";
  }
  
  protected function metodo3(){
    return "texto3";
  }
  
  static function metodo4(){
    return "texto4";
  }
  
  static function hijo(){
    self::q();
  }
  
  static function q(){
    echo __CLASS__;
  }
}