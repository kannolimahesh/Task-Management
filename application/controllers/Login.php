<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('display_errors', 1);
class Login extends CI_Controller {
    
    public function __construct()
	{	
		parent::__construct();	

	}

	public function index()
	{

		if(get_cookie('cookie_user_id')!="")          
		{
		    //Logged in
		    redirect(base_url()."index.php/task/task_list");						
		}
		
		$this->load->helper(array("url","form"));
		$this->load->library("form_validation");
		$this->load->library("session");
		
		$this->form_validation->set_rules("email","Email","trim|required|valid_email");
		$this->form_validation->set_rules("password","password","required");		

		if($this->form_validation->run()==false)
		{
			
			$this->load->view('login');
		}
		else
		{			
			$email = $_POST["email"];
			$password = $_POST["password"];

			$this->load->model("Registration_model");
			$result = $this->Registration_model->login($email,md5($password));			
			
			$this->session->set_userdata("user_id",$result["user_id"]);
			$this->session->set_userdata("name",$result["user_id"]);
			$this->session->set_userdata("profilepic",$result["profilepic"]);
			$this->session->set_userdata("email",$result["email"]);
			$this->session->set_userdata("dob",$result["dob"]);

			if(!empty($result))
			{	
			    
			    set_cookie('cookie_user_id',$result["user_id"],'3600'); 
			    set_cookie('cookie_name',$result["name"],'3600'); 
                set_cookie('cookie_email',$result["email"],'3600'); 
			    
				$this->session->set_flashdata("success_msg","Successfully login.");				
				redirect(base_url()."index.php/task/task_list");
			}
			else
			{
				$this->session->set_flashdata("error_msg","Invalid Credential.");				
				redirect(base_url()."index.php/login?loginfailed");
			}		

		}		
		
	}


	public function signout()
	{
		
	    delete_cookie('cookie_user_id'); 		
        
		$this->session->set_flashdata("success_msg","Successfully Logout.");				

		redirect(base_url()."index.php/login?successfulllogout");
	}
}
