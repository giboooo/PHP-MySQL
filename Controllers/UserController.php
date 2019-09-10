<?php

class UserController {

  private $model;

// consructor
  public function __construct()
  {
    try{
     
      $this->model = new UserModel;
      
    }catch(PDOException $e){
      throw new Exception($e->getMessage(), 0 , $e);
    }
  }

// index (read all)
  public function index()
  {
    try{

      if(isset($_GET['adduser'])){
        if($_GET['adduser'] === 'success'){
          $msg = 'User added';
        }else{
          $msg = 'Problem while adding user';
        }
      }

      if(isset($_GET['updateuser'])){
        if($_GET['updateuser'] === 'success'){
          $msg = 'User changed';
        }else{
          $msg = 'Problem while editing user';
        }
      }

      if(isset($_GET['deleteuser'])){
        if($_GET['deleteuser'] === 'success'){
          $msg = 'User deleted';
        }else{
          $msg = 'Problem while deleting user';
        }
      }

      $datas = $this->model->read();

      $users = [];

      if(count($datas) > 0 ){
        foreach ($datas as $data) {
          $users[] = new User($data);
        }
      }

      include './Views/User/index.php';

    }catch(PDOException $e){
      throw new Exception($e->getMessage(), 0 , $e);
    }
  }

// show (read one)
  public function show($id)
  {
    try{

      $datas = $this->model->read($id);

      if(count($datas) > 0 ){
        foreach($datas as $data){
          $user = new User($data);
        }
      }
      
      include './Views/User/show.php';

    }catch(PDOException $e){
      throw new Exception($e->getMessage(), 0 , $e);
    }
  }

// create
  public function create()
  {
    include './Views/User/create.php';
  }
  
// store
  public function store($request)
  {
    $id = $this->model->create($request);

    if($id){
      header('Location: ./index.php?adduser=success');
    }else{
      header('Location: ./index.php?adduser=error');
    }
  }

// edit
  public function edit($id)
  {
    $datas = $this->model->read($id);

      if(count($datas) > 0 ){
        foreach($datas as $data){
        $user = new User($data);
        }
      }  
      include './Views/User/edit.php';
  }

// update
  public function update($id, $request)
  {
    $up = $this->model->update($id, $request);

    if($up){
      header('Location: ./index.php?updateuser=success');
    }else{
      header('Location: ./index.php?updateuser=error');
    }
  }

// delete
  public function delete($id)
  {
    $del = $this->model->delete($id);

    if($del){
        header('Location: ./index.php?deleteuser=success');
      }else{
        header('Location: ./index.php?deleteuser=error');
      }
  }
}