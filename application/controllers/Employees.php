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
		$view_data = $this->Employees_model->get_list();
		$this->load->view('employees/list', $view_data);
    }
    
    public function add(){
		$this->load->helper('url');
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
				if($this->Employees_model->insert($this->input->post('name'),
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
    
    public function delete($id){
        $this->load->helper('url');
        // Valós a törlés?

		// jogos-e a törlés, és csak akkor engedélyezem, ha biztos vagy benne
		if($this->Employees_model->delete($id)){
			redirect(base_url('employees/list'));
		}else{
			show_error('A rekord törlése nem sikerült');
		}
    }
}
