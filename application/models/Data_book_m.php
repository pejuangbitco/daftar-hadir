<?php 

class Data_book_m extends CI_Model {

	function __construct() {
		parent:: __construct();
	}

	public function insert($data) {
		$this->db->insert('data_book', $data);
	}

	public function getAll() {
		$query = $this->db->get('data_book');
		return $query->result();
	}

	public function select($pk) {
		$this->db->where('id', $pk);
		$query = $this->db->get('data_book');
		return $query;
	}

	public function update($pk, $data) {
		$this->db->where('id', $pk);
		$this->db->update('data_book', $data);
	}

	public function delete($pk) {
		$this->db->where('id', $pk);
		$this->db->delete('data_book');
	}

	public function cek_user($pk) {
		$this->db->where('email', $pk);
		$row = $this->db->get('data_book');
		if ($row->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function list($limit, $start) {
		$query = $this->db->get('data_book', $limit, $start);
		return $query->result();
	}

	public function getRow() {
		$query = $this->db->get('data_book');
		return $query->num_rows();
	}

	public function cekCaptcha($pk) {
		$this->db->where('time', $pk);
		$query = $this->db->get('captca');
		return $query->row();
	}

}


 ?>