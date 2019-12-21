<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public $api_ip, $data_login, $is_storetkn;
    public function __construct()
    {
        parent::__construct();
        $this->is_storetkn = $this->apilib->token['store'] != "" ? true : false;
    }
    
    public function getLogin()
    {
        return $this->apilib->me('GET')['data'][0]; 
    }
    
    public function getStoreSign()
    {
        if($this->is_storetkn){
            $data = $this->apilib->assignstore();

            if(!empty($data['data'])){
                $item   = $data['data'];
                $search = searchArray($_COOKIE['store_sign'], 'id', $item);
                
                return $item[$search];
            }
        }
    }

    public function getCompanySign()
    {
        if($this->is_storetkn){
            $data = $this->apilib->company('GET');

            if(!empty($data['data'])){
                $item   = $data['data'];
                $search = searchArray($_COOKIE['company_sign'], 'id', $item);
                
                return $item[$search];
            }
        }
    }
    
    public function view($content, $data = array())
    {
        if(!isset($_COOKIE['token_user'])){
            redirect(base_url().'mitra/PanelMitra');
        }else{
            if($this->uri->segment(1) !== $_COOKIE['type_login']){
                redirect(base_url().$this->uri->segment(1).'/Panel'.$_COOKIE['type_login']);
            }
        } 
        $data['content']        = $content;
        $data['storetkn']       = $this->is_storetkn;
        $data['login']          = $this->getLogin();
        $data['sign_store']     = $this->getStoreSign();
        $data['sign_company']   = $this->getCompanySign();

        if(!isset($data['menu'])){
            $data['menu']   = 'template/menu_pusat';
            $data['logout'] = 'pusat/PanelPusat/logout';
        }
        
        $this->load->view('template/template', $data, FALSE);
	}
	
	public function viewL($content, $data = array())
    {
        $data['content'] = $content;

        $this->load->view('template/template1', $data, FALSE);   
	}
	
	public function uploadimg($file)
    {
        $filename = date('Y-m-d_H-i').'-'.$_POST['name'].'.'.pathinfo($file['upload']['name'], PATHINFO_EXTENSION);

        $config['upload_path']          = './assets/img/products/';
        $config['allowed_types']        = 'jpg|png';
        $config['file_name']            = $filename;
        $config['overwrite']			= true;
        // $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('upload')){
			$error = array('error' => $this->upload->display_errors());
            
            return $error;
		}else{
			$data = array('upload_data' => $this->upload->data());
			return $data;
		} 
    }

}

/* End of file MY_Controller.php */
