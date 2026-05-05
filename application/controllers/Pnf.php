<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
*   author by Syahrul Ramadani
*   onamada.id
*/

class Pnf extends CI_Controller {

    function __construct() {
        parent::__construct();
        
    }

    public function index() {

            $this->template->display('_pnf');
        
        
    }




}
