<?php

namespace App\Models;

use CodeIgniter\Model;

class KampusModel extends Model
{
	protected $table = 'tbl_kampus';
	protected $primaryKey = 'id_kampus';

	protected $returnType     = 'object';

	protected $allowedFields = ['id_kampus', 'nama_kampus', 'alamat_kampus', 'logo_kampus', 'upload_at'];

	public function simpan($data)
	{
		$this->db->table($this->table)->insert($data);
		$id = $this->db->insertId($this->table);
		return $id ?? false;
	}
}
