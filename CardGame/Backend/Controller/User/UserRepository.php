
<?php
include('../../Model/User.php');
include('../../../Config/connection.php');
include('User.php');
class UserRepository implements User
{
    public $conn;
    private $query;
    public function __construct()
    {
        $this->conn=$GLOBALS['conn'];
    }
    private function executeQuery($query, $paremeters)
    {
        $stmt = $this->conn->prepare($query);
        if($paremeters!==[]) {
            $stmt->bind_param(...$paremeters);
        }
        $stmt->execute();
        return $stmt;

    }
    public function create(string $username, string $email, string $password, string $phone, $is_admin)
    {

        $this->query= $GLOBALS['add'];
        $parameters = ["ssssi", $username, $email, $password, $phone,$is_admin];
        return $this->executeQuery($this->query, $parameters);

    }
    public function viewAll()
    {
        $this->query=$GLOBALS['view'];
        $stmt=$this->executeQuery($this->query, []);
        return $stmt;

    }
    public function viewUser($id)
    {
        $this->query=$GLOBALS['viewUser'];
        $parameters = ['s', $id];
        return $this->executeQuery($this->query, $parameters);

    }
    public function update($email, $password, $phone, $username, $id)
    {
        $this->query=$GLOBALS['update'];
        $parameters = ['sssss',$email, $password, $phone, $username, $id];
        $result=$this->executeQuery($this->query, $parameters);
        return $result;

    }
    public function delete($id)
    {
        $this->query=$GLOBALS['delete'];
        $parameters = ['s',$id];
        return $this->executeQuery($this->query, $parameters);
    }
    public function updatePassword($id, $password)
    {
        echo "In update Password function :";
        $this->query=$GLOBALS['updatePassword'];
        $parameters = ['ss',$password,$id];
        return $this->executeQuery($this->query, $parameters);
    }
    public function getUserByEmail($email)
    {
        $this->query=$GLOBALS['getUserByEmail'];
        $parameters = ['s',$email];
        echo $email;
        return $this->executeQuery($this->query, $parameters);
    }
    public function getUserByPhone($phone)
    {
        $this->query=$GLOBALS['getUserByPhone'];
        $parameters = ['s',$phone];
        return $this->executeQuery($this->query, $parameters);
    }
    
    public function loginUser($email, $password)
    {
        $this->query=$GLOBALS['login'];
        $parameters = ['ss',$email,$password];
        return $this->executeQuery($this->query, $parameters);
    }


}
