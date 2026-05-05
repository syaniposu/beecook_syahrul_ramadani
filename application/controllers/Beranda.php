<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function index(){
		$this->template->display('_beranda');
	}

	function syarat_ketentuan(){
		$this->template->display('_syarat_ketentuan');
	}

	function kebijakan_privasi(){
		$this->template->display('_kebijakan_privasi');
	}

	function tentang_kami(){
		$this->template->display('_tentang_kami');
	}
}
