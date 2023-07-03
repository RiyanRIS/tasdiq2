<?php

namespace App\Models;

use CodeIgniter\Model;

class BerkasModel extends Model
{
	protected $table = 'tbl_berkas';
	protected $primaryKey = 'id_berkas';

	protected $returnType     = 'object';

	protected $allowedFields = ['id_berkas', 'nama', 'file', 'upload_at'];

	public function simpan($data)
	{
		$this->db->table($this->table)->insert($data);
		$id = $this->db->insertId($this->table);
		return $id ?? false;
	}
}
