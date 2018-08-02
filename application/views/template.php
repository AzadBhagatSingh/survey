<?php
	$this->load->view('template_part/header');
	if($this->session->userdata['UserType'] == 1){
		$this->load->view('template_part/left');
	}else{
		$this->load->view('template_part/userLeft');
	}
	
	$this->load->view($ViewName);
	$this->load->view('template_part/footer');
?>