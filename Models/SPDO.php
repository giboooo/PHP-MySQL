<?php 

class SPDO{
  
  private $_engine = DB_ENGINE;
  private $_host = DB_HOST;
  private $_dbname = DB_NAME;
  private $_charset = DB_CHARSET;
  private $_user = DB_USER;
  private $_pwd = DB_PWD;

  private static $_instance;
  private $_db;

// construct
  private function __construct()
  {
    try{
        $dsn = $this->_engine.':host='.$this->_host.';dbname='.$this->_dbname.';charset='.$this->_charset;
        $this->_db = new PDO($dsn , $this->_user, $this->_pwd, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
      } catch(PDOException $e){
        die($e->getMessage());
      }
  }

// clone
  private function __clone(){}

// getInstance
  public static function getInstance($engine=null, $host=null, $dbname=null, $charset=null, $username=null, $pwd=null)
  {
    if(!isset(self::$_instance)){
      self::$_instance = new self;
    }
    return self::$_instance;
  }

  public function getDb()
  {
    return $this->_db;
  }
}