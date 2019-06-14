<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	
	public function index($page='admin')
	{
		if(!file_exists(APPPATH.'views/'.$page.'.php')){
				show_404();
				}
		$this->load->view($page);
    }
    public function sendmail(){
                 $this->email->initialize(array("mailtype" => "html"));
                 $this->email->from("adityavadityav@gmail,",'My name');
                 $this->email->to('adityavadityav@gmail.com');
                 $this->email->subject('Website Enquiry');
                 $this->email->message("My name is: {$_POST["first_name"]}.My email address is: {$_POST["email"]}.The enquiry is regarding. 
                {$_POST["subject"]}.
                 Enquiry: {$_POST["phone_1"]}");
                 $from="adityavadityav@gmail.com";
                    $email="vishnuvc1@gmail.com";
                    $subject="Website enquiry";
                    $msg= "My name is: {$_POST["first_name"]}.{$_POST["last_name"]}.My email address is: {$_POST["email"]}.The enquiry is regarding: 
                    {$_POST["subject"]}.Phone: {$_POST["phone_1"]}.Tel:{$_POST["phone_2"]}"; 
                    mail($email, $subject, $msg, 'From:' . $from); 
                    

                     //If the email is sent
                    if($this->email->send())
                    {
                         $msg_2 = "Your response have been noted.We will reach you in a while.Thank You!";
                         mail($_POST['email'], $subject, $msg_2, 'From:' . $from); 
                        echo "Your response have been recorded.Please go back!";

                    }
                    else
                    {
                        echo "Failed to send message.Please try again!";
                    }
      }
    public function login(){

        $username=$_POST['username'];
        $password=$_POST['password'];
        $data['username']=$username;
        if($username=='oasisiot' && $password=='iotoasis'){
            $this->session->set_userdata('user',$data);
            redirect(base_url('index.php/Admin/admin_panel'));
        }else{redirect(base_url('index.php/Admin'));
            }
        }
        public function admin_panel($page='admin_panel'){
            $query=$this->db->query("SELECT * FROM records");
            $data['result']=$query->result_array();
            $validity=$this->session->userdata['user']['username'];
            If($validity!=NULL){
                $this->load->view($page,$data);

            }
            else{
                $this->load->view('admin');
            }
         
        }
        public function logout(){
            $this->session->unset_userdata('user');
            redirect(base_url('index.php/Admin'));
        }
        public function add_student(){
            $this->db->insert('records',$_POST);
            redirect(base_url('index.php/Admin/admin_panel
            '));
        }
        public function check(){
            $data['year']=$_POST['year'];
            $data['class']=$_POST['class'];
            $data['reg']=$_POST['reg'];
           $query= $this->db->query("SELECT * FROM records WHERE class ='{$data['class']}' AND reg = '{$data['reg']}' AND year = '{$data['year']}'");
            $result=$query->result_array();
            if($result==NULL){
                echo"<script LANGUAGE='JavaScript'>
    				window.alert('No such certificate is active');
    				window.location.href='../../';
                        </script>";
                }else{
                  foreach($result as $results){
                     $Name = $results['Name'];
                     $Id=$results['Id'];
                     $class=$results['class'];
                    $reg=$results['reg'];
                    $year=$results['year'];                  }
                    }
                    echo "<script LANGUAGE='JavaScript'>
                    var name='".$Name."';
                    
    				window.alert('Your certificate is valid in the name of '+ name+'');
    				window.location.href='../../';
                        </script>";
                }
                        
            }
