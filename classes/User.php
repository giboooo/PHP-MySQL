<?php 

  class User extends Core{

    private $id;
    private $firstName;
    private $lastName;
    private $userName;
    private $country;
    private $email;
    private $role;
    private $pwd;


#### getter & setter
// id
  public function getId()
  {
    return $this->id;
  }
  public function setId($id)
  {
    $this->id = $id;
    return $this;
  }

// firstName
  public function getFirstName()
  {
    return $this->firstName;
  }
  public function setFirstName($firstName)
  {
    $this->firstName = $firstName;
    return $this;
  }
// lastName
  public function getLastName()
  {
    return $this->lastName;
  }
  public function setLastName($lastName)
  {
    $this->lastName = $lastName;
    return $this;
  }
// userName
  public function getUserName()
  {
    return $this->userName;
  }
  public function setUserName($userName)
  {
    $this->userName = $userName;
    return $this;
  }

// country
  public function getCountry()
  {
    return $this->country;
  }
  public function setCountry($country)
  {
    $this->country = $country;
    return $this;
  }
// email
  public function getEmail()
  {
    return $this->email;
  }
  public function setEmail($email)
  {
    $this->email = $email;
    return $this;
  }
// role
  public function getRole()
  {
    return $this->role;
  }
  public function setRole($role)
  {
    $this->role = $role;
    return $this;
  }

// pwd
  // public function getPwd()
  // {
  //   return $this->pwd;
  // }
  // public function setPwd($pwd)
  // {
  //   $this->pwd = $pwd;
  //   return $this;
  // }


}