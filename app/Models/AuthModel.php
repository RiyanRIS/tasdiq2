<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
  protected $message = [];

  public function login(string $username, string $password, bool $remember = false): bool
  {
    if (empty($username) || empty($password)) {
      $this->setError("Username atau password masih ada yang kosong");
      return false;
    }

    $query = $this->db->table("tbl_admin")
      ->select('*')
      ->where('username', $username)
      ->limit(1)
      ->orderBy('id_admin', 'desc')
      ->get();

    $user = $query->getRow();

    if (isset($user)) {
      if (password_verify($password, $user->password)) {

        $this->setSession($user, true);
        $this->setMessage("Berhasil masuk");
        return true;
      } else {
        $this->setMessage("Password salah");
        return false;
      }
    } else {
      $this->setMessage("Username tidak ditemukan");
      return false;
    }
  }

  public function login_user(string $username, string $password, bool $remember = false): bool
  {
    if (empty($username) || empty($password)) {
      $this->setError("Username atau password masih ada yang kosong");
      return false;
    }

    $query = $this->db->table("tbl_anggota")
      ->select('*')
      ->where('username', $username)
      ->limit(1)
      ->get();

    $user = $query->getRow();

    if (isset($user)) {
      if (password_verify($password, $user->password)) {

        $this->setSession($user);
        $this->setMessage("Berhasil masuk");
        return true;
      } else {
        $this->setMessage("Password salah");
        return false;
      }
    } else {
      $this->setMessage("Username tidak ditemukan");
      return false;
    }
  }

  public function logout()
  {
    $sessionData = [
      'user_id'             => '',
      'user_nama'             => '',
      // 'user_role'             => '',
      'isLogin'             => false,
      'isAdmin'             => false,
    ];

    session()->set($sessionData);
    return true;
  }

  public function setSession(\stdClass $user, $isAdmin = false): bool
  {
    $sessionData = [
      'user_id'             => $user->id_admin ?? $user->id_anggota,
      'user_nama'             => $user->nama,
      // 'user_role'             => $user->role,
      'isLogin'             => true,
      'isAdmin'             => $isAdmin,
    ];

    session()->set($sessionData);

    return true;
  }

  public function setMessage(string $msg): string
  {
    $this->message[] = $msg;
    return $msg;
  }

  public function msg()
  {
    return $this->message;
  }
}
