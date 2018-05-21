<?php

require_once('controller/Controller.php');
//
//$obj = new Controller;
//
//$obj->x=9;
//$obj->z=9;
//
//echo $obj->x."<br>";
//echo $obj->y;
//echo $obj->z;
//var_dump($obj);
//
//echo $obj->metodo1();
//echo $obj->metodo2();
//echo $obj->metodo3();
//
//echo Controller::metodo4() . '<br>';
//echo Controller::$s . '<br>';
//echo $obj->metodo4() . '<br>';
//echo $obj->s . '<br>';

class Objetos extends Controller{
  static $a=100;
  
  static function ej(){
    return parent::metodo4();
  }
  
  static function ej2(){
    return parent::$z;
  }
  
  static function q(){
    echo __CLASS__;
  }
  
}

echo Objetos::ej() .'<br>';
echo Objetos::ej2() . '<br>';
Controller::hijo();