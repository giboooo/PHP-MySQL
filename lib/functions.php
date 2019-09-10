<?php 


// hydrate
class xxx__hydrate{
  public function __construct($data)
  {
    $this->hydrate($data);
  }

  public function hydrate($data)
  {
    foreach($data as $key => $value){

      // $methodName = 'set' . ucfirst( substr($key, 2, strlen($key)-2 ) );
      $methodName = 'set' . ucfirst( $key);
  
      if(method_exists($this, $methodName)){
      $this->$methodName($value);
      }
    }
  }
}

# AUTOLOAD class
  function loadClass($name){

    $file = 'classes/'.$name.'.php';
    if(file_exists($file)){
      require_once $file;
    }
  }
 

# autoload controllers
  function loadControllers($name){

    $file = 'Controllers/'.$name.'.php';
    if(file_exists($file)){
      require_once $file;
    }
  }
 

# autoload models
  function loadModels($name){

    $file = 'Models/'.$name.'.php';
    if(file_exists($file)){
      require_once $file;
    }
  }
  

## calling autoloader
  spl_autoload_register('loadClass');
  spl_autoload_register('loadControllers');
  spl_autoload_register('loadModels');







