<?php 
	class User_model extends CI_Model{
		function __construct() {
        	parent::__construct();
    	}
    	public function addUser($data){
    		$this->db->insert('users', $data);
    	}
    	public function check_username_availablity(){
        	
        	$UserName = trim($_POST['UserName']);

        	$this->db->where('UserName', $UserName);  
           	$query = $this->db->get("users");
           	// print_r($query);die;  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
        }
        /*Get All User Data For Admin*/
        public function getAllUser(){
          $this->db->where(array('UserType'=> '2'));  
            return $query = $this->db->get("users")->result_array();
        }
        /*Get User Data for Perticuler User*/
        public function getUser(){
          $this->db->where(array('UserType'=> '2','Id'=>$this->session->userdata['UserId']));  
            return $query = $this->db->get("users")->row_array();
        }

        public function updateUser($data){
        	//print_r($data);die;
        	$this->db->set(array('Name'=>$data['Name'],'Email'=>$data['Email'],'Dob'=>$data['Dob']));
    			$this->db->where('UserName',$this->session->userdata['UserName']);
    			$this->db->update('users',$data);
    	}
	}