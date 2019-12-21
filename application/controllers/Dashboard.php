<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function index()
    {
        $this->viewL('dashboard_v',array());
    }

}

/* End of file Dashboard.php */
