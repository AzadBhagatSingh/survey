<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user/user_model','user');
    }

	public function index() {
		if(isset($this->session->userdata['UserName'])){
			$data['Questions'] = $this->db->order_by('QId', 'DESC')->get_where('questions', array('Status'=>1))->result_array();
			$data['ViewName'] = 'questionList';
			$this->load->view('template',$data);
		}else{
			$this->load->view('login');
		}

	}
	public function addQuestion() {
		if(isset($this->session->userdata['UserName'])){

			$data = array('UserId'=>$this->session->userdata['UserId'],'Question'=>$_POST['Question'],'Status'=>1);
			$this->db->insert('questions',$data);
			echo '<h5 style="color:green">Question Added Successfully!</h5>';
		}else{
			$this->load->view('login');
		}

	}
	public function editQuestion() {
		if(isset($this->session->userdata['UserName'])){

			// print_r($_POST);die;

			$this->db->set('Question', $_POST['Question']);
			$this->db->where('QId',$_POST['QId']);
			$this->db->update('questions');
			echo '<h5 style="color:green">Question Edit Successfully!</h5>';
		}else{
			$this->load->view('login');
		}
	}
	public function deleteQuestion(){
		$this->db->where('QId',$_POST['QId']);
		$this->db->delete('questions');
	}
}