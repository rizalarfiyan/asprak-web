<?php

namespace App\Models;

use App\Core\Database;

class Users {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

	public function getByEmail($email)
	{
		$this->db->query("SELECT id, name, email, password FROM users WHERE email = :email LIMIT 1");
		$this->db->bind('email', $email);
		return $this->db->single();
	}
}
