<?php

class Mahasiswa_model {
    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO mahasiswa
                    VALUES
                  ('', :nama, :NIM, :email, :Prodi)";

                  $this->db->query($query);
                  $this->db->bind('nama', $data['nama']);
                  $this->db->bind('NIM', $data['NIM']);
                  $this->db->bind('email', $data['email']);
                  $this->db->bind('Prodi', $data['Prodi']);

                  $this->db->execute();

                  return $this->db->rowCount();
    }


public function hapusDataMahasiswa($id)
{
    $query = "DELETE FROM mahasiswa WHERE id = :id";
    $this->db->query($query);
    $this->db->bind('id', $id);

    $this->db->execute();

    return $this->db->rowCount();
}


public function ubahDataMahasiswa($data)
{
    $query = "UPDATE mahasiswa SET
                nama = :nama,
                NIM = :NIM,
                email = :email,
                Prodi = :Prodi
                WHERE id = :id";

    $this->db->query($query);
    $this->db->bind('nama', $data['nama']);
    $this->db->bind('NIM', $data['NIM']);
    $this->db->bind('email', $data['email']);
    $this->db->bind('Prodi', $data['Prodi']);
    $this->db->bind('id', $data['id']);

    $this->db->execute();

    return $this->db->rowCount(); // Mengembalikan jumlah baris yang diubah
}


public function cariDataMahasiswa()
{
    $keyword = $_POST['keyword'];
    $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
    $this->db->query($query);
    $this->db->bind('keyword', "%$keyword%");
    return $this->db->resultSet();
}

}

