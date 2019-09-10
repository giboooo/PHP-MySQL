<?php 
// session_start();

require_once('config/ini.php');
require_once('lib/functions.php');
require_once('Views/inc/navbar.php');


$ctrl = 'UserController';

if(isset($_GET['ctrl'])){
    $ctrl = ucfirst(strtolower($_GET['ctrl'])). 'Controller';
}

$method = 'index';

if(isset($_GET['action'])){
  $method = $_GET['action'];
}

try{

    if(class_exists($ctrl)){
      $controller = new $ctrl;

      if(!empty($_POST)){
        
        if(method_exists($controller, $method)){
          
          if(!empty($_GET['id'])){
            $controller->$method($_GET['id'], $_POST);    
          }else{
            $controller->$method($_POST);
          }
        }else{
          header('Location: 404');
          exit;
        }
      }else{

      if(method_exists($controller, $method)){
          if(!empty($_GET['id'])){
            $controller->$method($_GET['id']);            
          }else{ 
            $controller->$method();
          }
      }else{
        header('Location: 404');
        exit;
      }
    }

  }else{
    header('Location: 404');
    exit;
  }
    
}catch(PDOException $e){
  throw new Exception($e->getMessage(), 2 , $e);
}