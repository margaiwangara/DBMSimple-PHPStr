<?php

class Route
{

    private $_uri = array();
    private $_method = array();

    //build a collectio of internal uris to look for
    public function add($uri, $method = null){

      $this->_uri [] = "/" .trim($uri, "/");

      if($method != null){
        $this->_method [] = $method;
      }
    }

    //links uri to uri list
    public function submit(){

      $uriGetParams = isset($_GET['uri']) ? '/' .$_GET['uri'] : '/';

      foreach($this->_uri as $key=>$value){
        if(preg_match("#^$value$#", $uriGetParams)){

          if(is_string($this->_method[$key])){
            $useMethod = $this->_method[$key];
            new $useMethod();
          }
          else{
            call_user_func($this->_method[$key]);
          }



        }
      }
    }
}
