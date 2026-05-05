<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function index(){
		$this->template->display('_category');
		// echo "asdf";
	}

	function getCategory(){

		$data=[
            'url'=> baseUrl().'category',
            'method'=>'GET',
            // 'post' => [],
            'header' => ["Content-Type:application/json"]
        ];

        $cr=json_decode($this->m_curl->get(json_encode($data)),true);

        // echo "<pre>".json_encode($cr,JSON_PRETTY_PRINT)."</pre>";
        // exit();

        if ($cr['status']=='error') {
            ?>
            <script type="text/javascript">
                swal("<?=$cr['data']?>","","info");
            </script>
            <?
        }else{

        	// echo "<pre>".json_encode($cr['data'],JSON_PRETTY_PRINT)."</pre>";

            // $this->load->view('_anjungan_cari',['data'=>$cr['data']]);

            echo json_encode($cr['data'],JSON_PRETTY_PRINT);
        }
	}

	function getByCategory(){

		$id=(int)$_GET['id'];

		$idnew=$id==0?'':$id;
		
		// if ($id==0) {
		// 	// code...
		// }

		$data=[
            'url'=> baseUrl().'menu?page=1&limit=15&search=&category_id='.$idnew,
            'method'=>'GET',
            'header' => ["Content-Type:application/json"]
        ];

        $cr=json_decode($this->m_curl->get(json_encode($data)),true);

        // echo "<pre>".json_encode($cr,JSON_PRETTY_PRINT)."</pre>";
        // exit();

        if ($cr['status']=='error') {
            ?>
            <script type="text/javascript">
                swal("<?=$cr['data']?>","","info");
            </script>
            <?
        }else{

        	// echo "<pre>".json_encode($cr['data'],JSON_PRETTY_PRINT)."</pre>";

            // $this->load->view('_anjungan_cari',['data'=>$cr['data']]);

            echo json_encode($cr['data'],JSON_PRETTY_PRINT);
        }
	}


	function resep($id=null){
		if (is_null($id)) {
			redirect(base_url());
		}

		$idne=(int)$id;


		$data=[
            'url'=> baseUrl().'menu/find/'.$idne,
            'method'=>'GET',
            'header' => ["Content-Type:application/json"]
        ];

        $cr=json_decode($this->m_curl->get(json_encode($data)),true);

        // echo "<pre>".json_encode($cr,JSON_PRETTY_PRINT)."</pre>";
        // exit();

        if ($cr['status']=='error') {
            echo "<pre>".json_encode($cr,JSON_PRETTY_PRINT)."</pre>";
        }else{

        	// echo "<pre>".json_encode($cr['data'],JSON_PRETTY_PRINT)."</pre>";

            $this->template->display('_category_resep',['data'=>$cr['data']]);

        }



	}



















	function kebijakan_privasi(){
		$this->template->display('_kebijakan_privasi');
	}

	function tentang_kami(){
		$this->template->display('_tentang_kami');
	}
}
