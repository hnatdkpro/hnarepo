<!-- This is cys apanel -->

<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');  
 

 class cysapanel extends CI_Controller 
 {  
      //functions  
    public function index(){  
           $this->load->model("cysapanel_model");  
           $data["fetch_data"] = $this->cysapanel_model->fetch_data();  
            
           $this->load->view("cysadmindashboard_view", $data);  
      }  

          public function form_validation()  
    {  
        //echo 'OK';  
        $this->load->library('form_validation');  
        $this->form_validation->set_rules("itemname", "Item Name", 'required');  
        $this->form_validation->set_rules("price", "Price", 'required');  
        if($this->form_validation->run())  
            {  
              $product_image='';
              //true  
              $this->load->model("cysapanel_model");
                if($_POST["product_image"]["name"] != '')  
                {  
                     $product_image = $this->input->post("product_image");
                }  
                else 
                {  
                     $product_image = $this->input->post("product_old_image");  
                }   
                echo 'Test Outside=';
                echo $product_image;
                
                 $data = array(  
                  	"itemname"     	=>$this->input->post("itemname"),  
                  	"price"         =>$this->input->post("price") ,
                  	"image"         =>$product_image

                );  

                 echo $data;

                if($this->input->post("update"))  
              {  
                $this->cysapanel_model->update_data($data, $this->input->post("hidden_id"));  
                    redirect(base_url() . "cysapanel/updated");  
                }  
                if($this->input->post("insert"))  
                {  
                     $this->cysapanel_model->insert_data($data);  
                     redirect(base_url() . "cysapanel/inserted");  
                }  
           }  
           else  
           {   //false  
                $this->index();  
           }  
      }  


    public function inserted()  
    {  
        $this->index();  
    }  


      public function update_data(){  
           $user_id = $this->uri->segment(3);  
           $this->load->model("cysapanel_model");  
           $data["user_data"] = $this->cysapanel_model->fetch_single_data($user_id);  
           $data["fetch_data"] = $this->cysapanel_model->fetch_data();  
           $this->load->view("cysadmindashboard_view", $data);  
           $this->load->view("cysadmindashboard_view", $data);  
      } 

           public function updated()  
      {  
           $this->index();  
      }


     public function delete_data(){  
           $id = $this->uri->segment(3);  
           $this->load->model("cysapanel_model");  
           $this->cysapanel_model->delete_data($id);  
           redirect(base_url() . "cysapanel/deleted");  
      } 

                 public function deleted()  
      {  
           $this->index();  
      }

} 
?>