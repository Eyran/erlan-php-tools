<?php

namespace Tools\Algorithm;
/**
 * 单例模式
 * Trait instance
 */
 trait Instance {

     private static $instance = null;
     private function __construct(){}

     public static function instance()
     {
         if(is_null(self::$instance)){

             self::$instance = new self;
         }

         return self::$instance;
     }
 }