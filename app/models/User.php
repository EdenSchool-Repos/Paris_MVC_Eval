<?php


class User
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function login($email, $password)
    {
        $this->db->query('SELECT * FROM tbl_users WHERE email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->fetch();
        $hashedPassword = $row->password;

        if(password_verify($password, $hashedPassword)){
            return $row;
        } else {
            return false;
        }
    }

    public function register($data)
    {
        $this->db->query('INSERT INTO tbl_users (firstname, lastname, email, password, avatar, bio, hobbies, newspaper_name, active) VALUES (:firstname, :lastname, :email, :password, :avatar, :bio, :hobbies, :newspaper_name, :active)');
        $this->db->bind(':firstname', $data['firstname']);
        $this->db->bind(':lastname', $data['lastname']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':avatar', $data['avatar']);
        $this->db->bind(':bio', $data['bio']);
        $this->db->bind(':hobbies', $data['hobbies']);
        $this->db->bind(':newspaper_name', $data['newspaperName']);
        $this->db->bind(':active', 1);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM tbl_users WHERE email = :email');
        $this->db->bind(':email', $email);

        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }
}