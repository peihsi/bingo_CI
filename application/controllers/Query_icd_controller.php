<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Query_icd_controller extends CI_Controller {
	public function index(){
		$this->load->view('query_icd');
	}

	public function search(){
		$keywords = $this->input->post('keywords');		
		//$keywords = trim($keywords);
		//$words = preg_split("/\s+/", $keywords);
		log_message("debug", "input=".$keywords);
		//log_message("debug", "parts=".print_r($words, true));

		//load model for SQL query
		$this->load->model('icd_model');
		//$this->icd_model->search($words);
		//$data = $this->icd_model->search_simple($words);
		$data = $this->icd_model->search_simple($keywords);
		//return 
		// $data= ['year' => '2016',
		// 'month' => '10',
		// 'message' => 'hello'];
		log_message("debug", "data=".print_r($data, true));

		echo json_encode($data);
	}

	public function row(){
		$keywords = $this->input->post('row_id');		
		
		//log_message("debug", "input=".$keywords);
		//log_message("debug", "parts=".print_r($words, true));

		//load model for SQL query
		$this->load->model('icd_model');
		//$this->icd_model->search($words);
		//$data = $this->icd_model->search_simple($words);
		$data = $this->icd_model->search_row($keywords);
		//return 
		// $data= ['year' => '2016',
		// 'month' => '10',
		// 'message' => 'hello'];
		log_message("debug", "data=".print_r($data, true));

		echo json_encode($data);
	}
}

