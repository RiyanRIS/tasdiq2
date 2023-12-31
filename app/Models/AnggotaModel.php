<?php

namespace App\Models;

use CodeIgniter\Model;
// use \App\Models\AngkatanModel;

class AnggotaModel extends Model
{
	protected $table = 'tbl_anggota';
	protected $primaryKey = 'id_anggota';

	protected $returnType     = 'object';

	protected $allowedFields = ['id_anggota', 'nama', 'tmpt_lahir', 'tgl_lahir', 'jenis_kelamin', 'agama', 'alamat', 'alamat_asal', 'kampus', 'no_tlpn', 'email', 'angkatan', 'jurusan', 'username', 'password'];

	public $rules_tambah_ubah = [
		'nama' => [
			'label'  => 'Nama',
			'rules'  => 'required',
			'errors' => [],
		],
		'tmpt_lahir' => [
			'label'  => 'Tempat Lahir',
			'rules'  => 'required',
			'errors' => [],
		],
		'tgl_lahir' => [
			'label'  => 'Tanggal Lahir',
			'rules'  => 'required',
			'errors' => [],
		],
		'jenis_kelamin' => [
			'label'  => 'Jenis Kelamin',
			'rules'  => 'required',
			'errors' => [],
		],
		'agama' => [
			'label'  => 'Agama',
			'rules'  => 'required',
			'errors' => [],
		],
		'alamat' => [
			'label'  => 'Alamat',
			'rules'  => 'required',
			'errors' => [],
		],

		'kampus' => [
			'label'  => 'Kampus',
			'rules'  => 'required',
			'errors' => [],
		],
		'no_tlpn' => [
			'label'  => 'No Telepon',
			'rules'  => 'required',
			'errors' => [],
		],
		'email' => [
			'label'  => 'Email',
			'rules'  => 'required',
			'errors' => [],
		],
		'angkatan' => [
			'label'  => 'Angkatan',
			'rules'  => 'required',
			'errors' => [],
		],
		'jurusan' => [
			'label'  => 'Jurusan',
			'rules'  => 'required',
			'errors' => [],
		],
		'username' => [
			'label'  => 'Username',
			'rules'  => 'required',
			'errors' => [],
		],
	];

	public function simpan($data)
	{
		$this->db->table($this->table)->insert($data);
		$id = $this->db->insertId($this->table);
		return $id ?? false;
	}

	public function getByUsername(string $username)
	{
		return $this->db->table($this->table)
			->where('username', $username)
			->limit(1)
			->get()
			->getRow();
	}

	function isValidUsername(string $username, $isUpdate = null): bool
	{
		$data = $this->getByUsername($username);

		if ($data == null) {
			return true;
		} else {
			if ($isUpdate == null) {
				return false;
			} else {
				if ($data->id_anggota == $isUpdate) {
					return true;
				} else {
					return false;
				}
			}
		}
	}
}
