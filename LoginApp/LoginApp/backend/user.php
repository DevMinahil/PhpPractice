<?php
interface user{
    public function create(string $username,string $email,string $password,string $phone);
    public function viewAll();
    public function viewId($id);
    public function update($id,string $username,string $email,string $password,string $phone);
    public function delete($id);
}
?>
