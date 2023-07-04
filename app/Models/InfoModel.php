<?php

namespace App\Models;

use CodeIgniter\Model;

class InfoModel extends Model
{
	protected $table = 'tbl_info';
	protected $primaryKey = 'id_info';

	protected $returnType     = 'object';

	protected $allowedFields = ['id_info', 'visi', 'misi'];

	public function simpan($data)
	{
		$this->db->table($this->table)->insert($data);
		$id = $this->db->insertId($this->table);
		return $id ?? false;
	}
}
