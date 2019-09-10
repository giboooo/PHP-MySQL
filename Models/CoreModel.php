<?php 
 
require 'SPDO.php';

 abstract class CoreModel extends SPDO{

  protected $_db;

// constructor
  public function __construct()
  {   
    $this->_db = parent::getInstance()->getDb();
  }
}
