<?php
include('UserRepository.php');
class UserFactory{

    public function __construct()
    {

    }
    
    public static function create()
    {
        return new UserRepository();

    }

}
$userFactory=new UserFactory();
$user=$userFactory::create();



?>