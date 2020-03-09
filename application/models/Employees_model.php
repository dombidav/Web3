<?php

class Employees_model extends CI_Model
{
	public function __construct(){
		parent::__construct();

		//ez a model db-re épül, ezért behivatkozom annak ref-jét
		$this->load->database(); //Innentől van egy $this->db mezőm
	}

	public function get_list(){
		// 1) megmondom, hogy milyen mezők kellenek
		$this->db->select('*');
		// 2) honnan akarom lekérdezni?
		$this->db->from('employees');
		// 3) where
		// 4) rendezés
		$this->db->order_by('name');
		// 5) generljuk a felépített lekérdezést
		$querry = $this->db->get();
		// 6) végrehajtjuk a lekérdezést
		$result = $querry->result();
		// 7) visszaadjuk az eredmény halmazt (ezek példányok listálya)
		return $result;
	}

	public function insert($name, $tin, $ssn){
		// 1) szervezzük az adatokat associatív tömbbe

		$record = ['name' => $name, 'tin' => $tin, 'ssn' => $ssn];
		// 2) Hívjuk meg az insert-et és adjuk vissza az értékét
		return $this->db->insert('employees', $record);
	}
}
