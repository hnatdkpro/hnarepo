<?php 

/**
 * 
 */
class cyshome extends CI_Controller
{
	public function index()
	{
		$this->load->model("home_model");  
        $data["fetch_member_data"] = $this->home_model->fetch_member_data();  
        $this->load->view("cyshome", $data);  
	}
	

	public function    construct()
		{
			parent::   Construct();
			$this->load->helper('url');
		}


//this is login validation

	public function login_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','required|alpha');
		$this->form_validation->set_rules('password','Password','required|alpha');
		if($this->form_validation->run())
	{
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$this->load->model('home_model');
		if($this->home_model->check_login($username,$password))
	{
		$session_data=array('username'=> $username);
		$this->session->set_userdata($session_data); 
		redirect(base_url().'cyshome/enterdashboard');
	}
		else
	{
		$this->session->set_flashdata('error','Invalid username and password');
		redirect(base_url().'cyshome/login');
	}
	}
		else
	{
		$this->index();
	}
	}

//this is form validation

	public function form_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules("name","Name","required|alpha");
		$this->form_validation->set_rules("address","Address","required|alpha");
		if($this->form_validation->run())
	{
		$this->load->model("home_model");
	}
		else
	{
		$this->index();
	}
	}

// This is enter dashboard

		public function enterdashboard()
	{
		if($this->session->userdata('username')!='')
	{
		redirect(base_url().'cysapanel/index');
		
		echo '<h2>Welcome - '.$this->session->userdata('username').'</h2>'; 
		echo '<label><a href="'.base_url().'cyshome/logout">Logout</a></label>';
	}
		else
	{
		redirect(base_url().'cyshome/login');
	}
	}


// this is login and logout

	public function login()
	{
		$this->load->view("cyshome");
	}

	function logout()
	{
		$this->session->unset_userdata('username');
		redirect(base_url().'cyshome/login');
	}

	public function go_insert()  
    {  
        //echo 'OK'; 
        $this->load->model("home_model");
        $membername = $this->input->post("membername");
        $address = $this->input->post("address");
        $phone = $this->input->post("phone");

 

    	echo $membername; 
    	echo $address;
    	echo $phone;

    	$data = array('membername' => $this->input->post("membername"),'address' =>$this->input->post("address"),'phone'=>$this->input->post("phone") );

    	echo $data;

    	$this->home_model->insert_data($data);  
                     redirect(base_url() . "cyshome/inserted");  
    	
    }  



    public function inserted()  
    {  
        $this->index();  
    }  

    public function delete_data(){  

    	$this->load->model("home_model");
        $id = $this->input->post("id");
        echo $id;
           $id = $this->input->post("id"); 
           $this->load->model("home_model");  
           $this->home_model->delete_data($id);  
           redirect(base_url() . "cyshome/deleted");  
      } 

       public function deleted()  
      {  
           $this->index();  
      }


 }
 ?>