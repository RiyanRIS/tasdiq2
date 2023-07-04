<?php

namespace App\Models;

use CodeIgniter\Model;

class StrukturModel extends Model
{
	protected $table = 'tbl_struktur';
	protected $primaryKey = 'id_struktur';

	protected $returnType     = 'object';

	protected $allowedFields = ['id_struktur', 'nama', 'jabatan', 'file', 'upload_at'];

	public function simpan($data)
	{
		$this->db->table($this->table)->insert($data);
		$id = $this->db->insertId($this->table);
		return $id ?? false;
	}
}
