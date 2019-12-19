<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->page = 'User';
        $this->dataapi = $this->apilib->stores('GET');

        $this->data['title'] = 'User';
        $this->data['key']   = 'user';
    }

    public function generateTable()
    {
        $table      = $this->dataapi;
        
        $data = $table['data'];
 
        foreach ($data as $key => $value) {                        
            $data[$key]['date_created']     = getDateIndo($value['date_created']);
            $data[$key]['date_modified']    = getDateIndo($value['date_modified']);
        }

        return $data; 
    }
    
    public function index()
    {                 
        $this->data['form']  = base_url().'pusat/'. $this->page.'/addData';
        // $this->data['table'] = $this->generateTable();

        if(isset($_SESSION[$this->data['key']])){
            $this->data = array_merge($this->data, $_SESSION[$this->data['key']]);
            unset($_SESSION[$this->data['key']]);
        } 

		$this->view('pusat/user_v',$this->data);
    } 

    public function addData()
    { 
        $save = $this->apilib->register($_POST );

        if(strpos($save['message'], 'Succes') !== false ){
            $this->session->set_userdata($this->data['key'], array(
            "alert"     => "alert-success",
            "title_c"   => "Success",
            "caption"   => $save['message']
            ));
        }else{
            $this->session->set_userdata($this->data['key'], array(
            "alert"     => "alert-danger",
            "title_c"   => "Error",
            "caption"   => $save['message']
            ));
        }

        redirect(base_url().'pusat/'.$this->page);
    }
}

/* End of file Kloter.php */
