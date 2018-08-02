<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user/user_model','user');
    }

	public function index() {
		if(isset($this->session->userdata['UserName']) && ($this->session->userdata['UserType'] == 1)){
			$data['Questions'] = $this->db->order_by('QId', 'DESC')->get_where('questions', array('Status'=>1))->result_array();
			//get All User
			$data['UserData'] = $this->user->getAllUser();

			$data['ViewName'] = 'addTest';
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

	public function createTest(){
		// print_r($_POST);die;
		$this->form_validation->set_rules('testName','Test Name','required');
		if($this->form_validation->run() == FALSE){
			$data['ViewName'] = 'addTest';
			$this->load->view('template',$data);
		}else{
			$queIds = implode(',', $_POST['questions']);
			// print_r($queIds);die;
			$data = array('TestName'=>$_POST['testName'],
							'CreatedForUser'=>$_POST['selectUser'],
							'QuestionIds'=>$queIds,
							'CreatedBy'=>$this->session->userdata['UserId'],
							'Status'=>1);
			$this->db->insert('survey_test',$data);

			$insert_id = $this->db->insert_id();

			for($i=0; $i<count($_POST['minMarks']);$i++){
				$data = array('TestId'=>$insert_id,
							'MinMarks'=>$_POST['minMarks'][$i],
							'MaxMarks'=>$_POST['maxMarks'][$i],
							'ResultUrl'=>$_POST['resultUrl'][$i],
							'Status'=>1);
				$this->db->insert('survey_result',$data);
			}
		}
	}

	public function createdTestList(){
		if(isset($this->session->userdata['UserName']) && ($this->session->userdata['UserType'] == 1)){

			$data['createdTestList'] = $this->db->query("SELECT *,S.Status as status FROM `survey_test` as S JOIN users as U WHERE S.CreatedForUser = U.Id ORDER BY S.Id DESC")->result_array();
			//get All User
			// $data['UserData'] = $this->user->getAllUser();
			// echo "<pre>";
			// print_r($data);die;
			$data['ViewName'] = 'createdTestList';
			$this->load->view('template',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function userTestList() {
		if(isset($this->session->userdata['UserName'])){
			$data['UserTestList'] = $this->db->order_by('Id', 'DESC')->get_where('survey_test', array('CreatedForUser'=>$this->session->userdata['UserId'],'Status'=>1))->result_array();
			// print_r($data);die;
			$data['ViewName'] = 'userTestList';
			$this->load->view('template',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function userTest() {
		if(isset($this->session->userdata['UserName'])){
			// print_r($this->uri->segment(3));die;
			$data['UserTestData'] = $this->db->get_where('survey_test', array('Id'=>$this->uri->segment(3),'Status'=>1))->row_array();
			$QIds = $this->db->select('QuestionIds')->get_where('survey_test', array('Id'=>$this->uri->segment(3),'Status'=>1))->row_array();
			// echo $QIds['QuestionIds'];die;
			$data['Questions'] =  $this->db->query("SELECT * FROM questions WHERE QId IN (".$QIds['QuestionIds'].")")->result_array();
			// echo "<pre>";
			// print_r($data['Questions']);die;
			$data['ViewName'] = 'userTest';
			$this->load->view('template',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function submitTest(){
		// print_r($_POST);die;

		$data = array('TestId'=>$_POST['TestId'],'UserId'=>$this->session->userdata['UserId'],'Status'=>1);
		$this->db->insert('user_test',$data);
		$insert_id = $this->db->insert_id();
		for($i=0; $i<count($_POST['QId']);$i++){
			$data = array('UserTestTableId'=>$insert_id,
						'TestId'=>$_POST['TestId'],
						'QId'=>$_POST['QId'][$i],
						'AnswerValue'=>$_POST['AnsId'][$i],
						'Status'=>1);
			$this->db->insert('user_test_answer',$data);
		}
		$this->db->set('Status', 0);
		$this->db->where('Id',$_POST['TestId']);
		$this->db->update('survey_test');
	}

	public function submittedTestList(){
		if(isset($this->session->userdata['UserName'])){
			// print_r($this->uri->segment(3));die;
			$data['UserTestList'] = $this->db->order_by('Id', 'DESC')->get_where('survey_test', array('CreatedForUser'=>$this->session->userdata['UserId'],'Status'=>0))->result_array();

			$data['ViewName'] = 'submittedTestList';
			$this->load->view('template',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function viewResult(){
		if(isset($this->session->userdata['UserName'])){
			// print_r($_POST);die;
			$TotalMarks = $this->db->select_sum('AnswerValue')->get_where('user_test_answer',array('TestId'=>$_POST['TestId']))->row('AnswerValue');
			// print_r($TotalMarks );

			$resultData = $this->db->get_where('survey_result',array('TestId'=>$_POST['TestId']))->result_array();
			// print_r($resultData);

			foreach($resultData as $result){
				if(($TotalMarks >= $result['MinMarks']) && ($TotalMarks<=$result['MaxMarks'])){
					$ResultUrl = $result['ResultUrl'];
					break;
				}
			}
			echo $ResultUrl;

		}else{
			$this->load->view('login');
		}
	}

}