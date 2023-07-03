<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleriModel extends Model
{
	protected $table = 'tbl_galeri';
	protected $primaryKey = 'id_galeri';

	protected $returnType     = 'object';

	protected $allowedFields = ['id_galeri', 'nama', 'file', 'upload_at'];

	public function simpan($data)
	{
		$this->db->table($this->table)->insert($data);
		$id = $this->db->insertId($this->table);
		return $id ?? false;
	}
}
