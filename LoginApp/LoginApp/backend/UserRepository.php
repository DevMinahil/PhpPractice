<?php
include('models/userQueries.php');
include('connection.php');
include('user.php');

class UserRepository implements user{
  public $conn;
  private $query;
  public function __construct()
  {
    $this->conn=$GLOBALS['conn'];
  

  }
  private function executeQuery($query,$paremeters)
  {  
    $stmt = $this->conn->prepare($query);
    if($paremeters!==[])
    {
    $stmt->bind_param(...$paremeters);
    }
    $stmt->execute();
    return $stmt;
  
  }
    public function create(string $username,string $email,string $password,string $phone){
      $this->query= $GLOBALS['add'];
      $parameters = ["ssss", $username, $email, $password, $phone];
      $this->executeQuery($this->query, $parameters);

    }
    public function viewAll() 
    { $this->query=$GLOBALS['view'];

      $stmt=$this->executeQuery($this->query,[]); 
      return $stmt;

    }
    public function viewId($id)
    {
      $this->query=$GLOBALS['viewId'];
      $parameters = ['s', $id];
      $this->executeQuery($this->query,$parameters);

    }
    public function update($email, $password, $phone, $username, $id)
    {
      $this->query=$GLOBALS['update'];
      $parameters = ['sssss',$email, $password, $phone, $username, $id];

      $result=$this->executeQuery($this->query,$parameters);  
      return $result;
        
    }
    public function delete($id)
    {
      $this->query=$GLOBALS['delete'];
      $parameters = ['s',$id];
      return $this->executeQuery($this->query,$parameters);
    }
    public function updatePassword($id,$password)
    { echo "In update Password function :";
      $this->query=$GLOBALS['updatePassword'];
      $parameters = ['ss',$password,$id];
      return $this->executeQuery($this->query,$parameters);
    }



}




?>