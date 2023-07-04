<?php

namespace App\Models;

use CodeIgniter\Model;

class BannerModel extends Model
{
	protected $table = 'tbl_banner';
	protected $primaryKey = 'id_banner';

	protected $returnType     = 'object';

	protected $allowedFields = ['id_banner', 'nama', 'file', 'upload_at'];

	public function simpan($data)
	{
		$this->db->table($this->table)->insert($data);
		$id = $this->db->insertId($this->table);
		return $id ?? false;
	}
}
