<?php 
class UserModel extends CoreModel{

  private $_req;


# read
  public function read($id=null)
  {
    try{

      $query = 'SELECT `use_id` AS `id`,
            `use_lastname` AS `lastname`,  
            `use_firstname` AS `firstname`,  
            `use_username` AS `username`,  
            `use_email` AS `email`,  
            `use_country` AS `country`,    
            `rol_id` AS `role`,  
            `rol_power`,  
            `rol_label`,
            `rol_id_fk`,
            `aut_id_fk`,  
            `aut_id`,
            `aut_label` AS `auth`
            FROM `t_user`
            LEFT JOIN `t_role`
            ON `t_user`.`use_role_fk` = `t_role`.`rol_id`
            LEFT JOIN `r_rol_aut`
            ON `t_role`.`rol_id` = `r_rol_aut`.`rol_id_fk`
            LEFT JOIN `t_authorization`
            ON `r_rol_aut`.`aut_id_fk` = `t_authorization`.`aut_id`';

      
      if(empty($id)){
        if(($this->_req = $this->_db->prepare($query))) {
          if ($this->_req->execute()){
            $datas = $this->_req->fetchAll(PDO::FETCH_ASSOC);
            $this->_req->closeCursor();
          }
          return $datas;
        }
      } else {
        if(($this->_req = $this->_db->prepare($query.'WHERE `use_id` =:id'))) {
            if($this->_req->bindValue('id', $id, PDO::PARAM_INT)){
              if($this->_req->execute()){
                $datas = $this->_req->fetchAll(PDO::FETCH_ASSOC);
                $this->_req->closeCursor();
              }
            return $datas;
          }
        }
      }
      return false;

    }catch(PDOException $e){
      throw new Exception($e->getMessage(), 1 , $e);
    }
  }

# create 
  public function create($request)
  {
    try{

      $query = 'INSERT INTO `t_user`
                (`use_lastname`, `use_firstname`, `use_password`, `use_username` ,`use_email`, `use_country`, `use_role_fk`) 
                VALUES ( :lastname, :firstname, :pwd, :username, :email, :country, :role)';

      if(($this->_req = $this->_db->prepare($query))){

        if($this->_req->bindValue('lastname', $request['lastName']) 
          && $this->_req->bindValue('firstname', $request['firstName']) 
          && $this->_req->bindValue('pwd', $request['pwd'])
          && $this->_req->bindValue('username', $request['userName']) 
          && $this->_req->bindValue('email', $request['email'])
          && $this->_req->bindValue('country', $request['country'])
          && $this->_req->bindValue('role', intval($request['role']))){

          if($this->_req->execute()) {

            $res = $this->_db->lastInsertId();
            return $res;
          }
        }
      }
      return false;

    }catch(PDOException $e){
      throw new Exception($e->getMessage(), 1 , $e);
    }
  }

#### update (NOK)
  public function update($id, $request)
  {
    try{

      $query = 'UPDATE `t_user` 
                SET `use_firstname` = :firstname,
                  `use_lastname` = :lastname,
                  `use_username` = :username,
                  `use_email`= :email,
                  `use_country` = :country,
                  `use_role_fk` = :role,
                  `use_id` = :id,'
                  .(!empty($request['pwd']) ? ' `use_password` = :pwd' : '').
                'WHERE `use_id` = :id';

      if(($this->_req = $this->_db->prepare($query))){

        if($this->_req->bindValue('firstname', $request['firstName']) 
          && $this->_req->bindValue('lastname', $request['lastName'])
          && $this->_req->bindValue('username', $request['userName'])
          && $this->_req->bindValue('email', $request['email'])
          && $this->_req->bindValue('country', $request['country'])
          && $this->_req->bindValue('id', $request['id'])
          && $this->_req->bindValue('role', intval($request['role']))){

          $ctrl = true;
          if(!empty($request['pwd'])){
            $ctrl = $this->_req->bindValue('pwd', $request['pwd']);
          }

          if($ctrl){
            if($this->_req->execute()) {
              $res = $this->_db->rowCount();
              return $res;
            }
          }
        }
      }
      return false;

    }catch(PDOException $e){
      throw new Exception($e->getMessage(), 1 , $e);
    }
  }


# delete 
  public function delete($id)
  {
    try{

      $query = 'DELETE FROM `t_user` WHERE `use_id` = :id ';

      if(($this->_req = $this->_db->prepare($query))){

        if($this->_req->bindValue('id', $id, PDO::PARAM_INT) ){

          if($this->_req->execute()) {
            $res = $this->_req->rowCount();
            return $res;
          }
        }
      }
      return false;

    }catch(PDOException $e){
      throw new Exception($e->getMessage(), 1 , $e);
    }
  }
}