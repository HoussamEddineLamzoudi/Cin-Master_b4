<?php

class users
{

    private $db;

    public function __construct()
    {
        $this->db = new database;
    }

    public function getUserByEmail($email)
    {

        $this->db->query("SELECT * from users WHERE email=:email");
        $this->db->bind(":email", $email);
        $this->db->execute();
        if ($this->db->rowCount()) return true;
        else return false;
    }

    public function register($firstName, $lastName, $userName, $email, $psw)
    {

        $this->db->query("INSERT INTO users (firstName, lastName, userName, email, motPasse) VALUES (:firstName, :lastName, :userName, :email, :psw)");

        $this->db->bind(":firstName", $firstName);
        $this->db->bind(":lastName", $lastName);
        $this->db->bind(":userName", $userName);
        $this->db->bind(":email", $email);
        $this->db->bind(":psw", $psw);

        if ($this->db->execute()) return true;
        else return false;
    }

    public function login($email, $psw)
    {

        $this->db->query("SELECT * FROM users WHERE email=:email");
        $this->db->bind(":email", $email);

        $row = $this->db->fetch();
        // print_r($row);

        $hashed_psw = $row->motPasse;
        // echo $hashed_psw;
        // print_r($row);

        if (password_verify($psw, $hashed_psw)) {

            print_r($row);
            return $row;
            // return true;
        } else {
            // echo "maka";
            return false;
        }
    }
}
