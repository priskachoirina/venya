<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PanelMitra extends MY_Controller {

	public $data;
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
        $this->data['title'] = 'Login Mitra';
        $this->data['form']  = base_url().'mitra/PanelMitra/login_process'; 
		$this->viewL('login_v',$this->data);
    }
    
    public function login_process()
    {
        $user_token     = $this->apilib->login($_POST);
       
        if ($user_token['success']) { 
            $cookie_name = "token_user";
            $cookie_value = $user_token['data'][0]['token'];
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");       
            setcookie('type_login', 'mitra', time() + (86400 * 30), "/");   
            
            redirect(base_url().'mitra/DashboardMitra');
        }else{
            $this->data = array(
                            "alert"     => "alert-danger",
                            "title_c"   => "Failed",
                            "caption"   => $user_token['message']
                            );
            $this->viewL('login_v',$this->data);
        }
    }

    public function logout()
    {
        if(isset($_COOKIE['token_user'])){ 
            unset($_COOKIE['token_user']); 
            unset($_COOKIE['token_company']); 
            unset($_COOKIE['company_sign']); 
            unset($_COOKIE['type_login']);

            setcookie('token_user', null, -1, '/'); 
            setcookie('token_company', null, -1, '/'); 
            setcookie('company_sign', null, -1, '/'); 
            setcookie('type_login', null, -1, '/'); 

            if(isset($_COOKIE['token_store'])){
                unset($_COOKIE['token_store']); 
                setcookie('token_store', null, -1, '/'); 

                unset($_COOKIE['store_sign']); 
                setcookie('store_sign', null, -1, '/'); 
            } 

            redirect(base_url());
        }else{
            redirect(base_url().'mitra/DashboardMitra');
        }

    }

}
