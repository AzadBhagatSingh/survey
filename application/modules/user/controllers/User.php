<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user/user_model','user');
        // $this->load->model('LoanAccount/Loan_model','LoanModel');
    }

	public function index()
	{
		if(isset($this->session->userdata['UserName'])){

			// User Data Fetch Into Databse
			if($this->session->userdata['UserType'] == 1){
				$UserId = $this->session->userdata['UserId'];
    			$data['UserData'] = $this->user->getAllUser();
				$data['ViewName'] = 'dashboard';
				$this->load->view('template',$data);
			}else{
				$UserId = $this->session->userdata['UserId'];
    			// $data['UserData'] = $this->user->getAllUser();
				$data['ViewName'] = 'userDashboard';
				$this->load->view('template',$data);
			}
    		
		}else{
			$this->load->view('login');
		}

	}
	public function login(){
		$this->form_validation->set_rules('UserName','User Name','required|min_length[1]');
		$this->form_validation->set_rules('Password','Password','required');
		if($this->form_validation->run() == FALSE){
			$this->load->view('login');
		}else{
			$UserName = $this->input->post('UserName');
			$Password = md5($this->input->post('Password'));
			// print_r($UserName);die;
			$getData = $this->db->get_where('users',array('UserName' => $UserName,'Password'=> $Password))->row_array();
				// print_r($getData);die;
			if(!$getData){
				$data['message'] = '<h5 style="color:red;">UserName & Password Invalid</h5>';
				$this->load->view('login',$data);
			}else{
				$this->session->set_userdata(array('UserId'=>$getData['Id'],'UserName'=>$getData['UserName'],'UserType'=>$getData['UserType'],'FullName'=>$getData['FullName']));
				redirect('/user');
			}
		}
	}
	public function logout()  
    {  
        //removing session  
        $this->session->unset_userdata('UserName');  
        redirect("user");  
    }
	public function createUser(){
		$data['ViewName'] = 'createUser';
			$this->load->view('template',$data);
		// $this->load->view('createUser');
	}
	public function userRegister(){
		// print_r($_POST);die;
		$this->form_validation->set_rules('FullName','Full Name','required');
		$this->form_validation->set_rules('UserName','User Name','required|min_length[1]|max_length[100]');
		$this->form_validation->set_rules('Password','Password','required');
		$this->form_validation->set_rules('confirmPassword','Confirm Password','required|matches[Password]');
		if($this->form_validation->run() == FALSE){
			$data['ViewName'] = 'createUser';
			$this->load->view('template',$data);
		}else{

			// get and ckeck username from model
			$get_result = $this->user->check_username_availablity();
			if($get_result)
			{
				$this->session->set_flashdata('message', '<h5 style="color:#f00">User Name Already Register!</h5>');
				redirect('/user/userRegister',$data);
			}else{
				$data = array(
						'FullName' => $this->input->post('FullName'),
						'UserName' => $this->input->post('UserName'),
						'Password' => md5($this->input->post('Password')),
						'UserType' => '2',
						'Status' => '1'
						);
				$this->user->addUser($data);
				// $data['message'] = '<h5 style="color:green">User Create Successfully!</h5>';
				$this->session->set_flashdata('message', '<h5 style="color:green">User Create Successfully!</h5>');
				redirect('/user',$data);
			}
		}
	}

    public function check_username_availablity(){
		$get_result = $this->user->check_username_availablity();
        if($get_result )
            echo '<h5 style="color:#f00">Username already in use. </h5>';
        else
            echo '<h5 style="color:#248aaf">Username Available</h5>';
    }

}