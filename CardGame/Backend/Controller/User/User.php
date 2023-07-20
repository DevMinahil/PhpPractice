<?php

interface User
{
    public function create(string $username, string $email, string $password, string $phone, $is_admin);
    public function viewAll();
    public function viewUser($id);
    public function update($id, string $username, string $email, string $password, string $phone);
    public function delete($id);
    public function getUserByPhone($phone);
    public function getUserByEmail($email);
}
