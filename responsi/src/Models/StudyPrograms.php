<?php

namespace App\Models;

use App\Core\Database;

class StudyPrograms {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

	public function getAll() {
		$this->db->query("SELECT id, name FROM study_programs");
		return $this->db->results();
	}

	public function getAllWithCount() {
		// TODO: study program is still 0
		$query = "SELECT sp.id, sp.name, 0 as total FROM study_programs sp";

		$this->db->query($query);
		return $this->db->results();
	}
}
