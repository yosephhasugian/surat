<?php

class User_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function create($user)
    {
        $this->db->insert('users', $user);
        return $this->db->insert_id();
    }

    public function login($username, $password)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('users');

        if ($query->num_rows() == 1) {
            $user = $query->row();
            if (password_verify($password, $user->password)) {
                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
?>