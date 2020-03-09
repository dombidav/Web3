<?php

/**
 * @property  Employees_model Employees_model
 * @property  input
 * adatbázisban hoz létre egy táblát amiben adatokat tárolunk majd.
 * a kontroller a kezelő funkciókat biztosít böngészőn keresztül
 */
class Employees extends CI_Controller {

	public function __construct(){
		parent::__construct();

		//Ezután van egy emplyoees_model nevű mező, amiben van egy példánya a modelben
		$this->load->model('Employees_model');
		$records = $this->Employees_model->get_list();
		//felhelyezek egy nézetet és oda adom neki a listát megjelenítés céljából
		$view_data = [
			'employees' => $records
			//további adatok, ha kell
		];
		$this->load->helper('url');

	}

	public function list(){
        //Az adatbzisban van employees tábla
		//Listázzuk ki annak tartalmát
		$this->load->view('employees/list', $view_data);
    }
    
    public function add(){
        // 0) Rákattintott már a küldésre?
		if ($this->input->post('submit')){
			// Validálás
			$this->load->library('form_validation');
			// ...Szabályok...
			$this->form_validation->set_rules('name', 'Név', 'required');
			$this->form_validation->set_rules('ssn', 'SSN', 'required');
			$this->form_validation->set_rules('tin', 'TIN', 'required');
			if($this->form_validation->run()){
				//Minden validáció sikeresen lefutott
				if($this->employees_model->insert($this->input->post('name'),
					$this->input->post('tin'),
					$this->input->post('ssn'))){
					redirect(base_url('employees/list'));
				}
			}
		}
		// 1) Készítsük el a formot hozzá
		$this->load->helper('form'); //biztosítja a form kezeléshez a fügvényeket
		$this->load->view('employees/add');
    }
    
    public function edit(){
        echo "edit";
    }
    
    public function delete(){
        echo "delete";
    }
}
