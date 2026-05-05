<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

	public function index(){
		$this->template->display('_kelola');
		// echo "asdf";
        
	}

    function tambah(){
        $this->template->display('_kelola_tambah');
    }

    function edit($id=null){

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

            $this->template->display('_kelola_edit',['data'=>$cr['data']]);

        }

        
    }

    function simpan(){
        // echo "<pre>".json_encode($_POST,JSON_PRETTY_PRINT)."</pre>";
        // exit();

        $post=$_POST;

        $nama_resep=$post['nama_resep'];
        // $kategori=json_decode(base64_decode($post['kategori']),true);
        $durasi_masak=$post['durasi_masak'];
        $deskripsi=$post['deskripsi'];
        $bahan=$post['bahan'];
        $instruksi=$post['instruksi'];

        $arrBahan=[];

        foreach ($bahan as $value) {
            if (!empty($value)) {
                $arrBahan[]= ['description'=>$value];
            }
        }

        $arrInstruksi=[];

        $n=1;
        foreach ($instruksi as $value) {
            if (!empty($value)) {
                $arrInstruksi[]=['description'=>$value,'sort_number'=>(string)$n++];
            }
        }

        

        $dataa=[
            'name' => $nama_resep,
            'description' => $deskripsi,
            'cooking_duration' => $durasi_masak,
            'category_id' => (string)$post['kategori'],
            'ingredients' => $arrBahan,
            'recipes' => $arrInstruksi,
            'nutritions' => [
                'calory' => "99",
                "protein"=> "99",
                "carbohydrate"=> "99",
                "fat"=> "99"
            ],


        ];

        // echo "<pre>".json_encode($dataa,JSON_PRETTY_PRINT)."</pre>";
        // exit();

        

        $data=[
            'url'=> baseUrl().'menu',
            'method'=>'POST',
            'post' => $dataa,
            'header' => ["Content-Type:application/json"]
        ];

        $cr=json_decode($this->m_curl->get(json_encode($data)),true);

        
        // exit();


        if ($cr['status']=='error') {
            


            $this->session->set_flashdata(array(
                'message' => '<div class="alert alert-danger alert-dismissible" role="alert"><pre>'.json_encode($cr,JSON_PRETTY_PRINT).'</pre></div>'
            ));
            redirect(base_url('kelola/tambah'));
        }else{

            // echo "<pre>".json_encode($cr['data'],JSON_PRETTY_PRINT)."</pre>";

            // $this->load->view('_anjungan_cari',['data'=>$cr['data']]);

            // echo json_encode($cr['data'],JSON_PRETTY_PRINT);

            $this->session->set_flashdata(array(
                'message' => '<div class="alert alert-success alert-dismissible" role="alert">Data berhasil disimpan.</div>'
            ));
            redirect(base_url('kelola/tambah'));
        }

    }


    function hapus(){
        $id=(int)$_POST['id'];



        $data=[
            'url'=> baseUrl().'menu/delete/'.$id,
            'method'=>'DELETE',
            // 'post' => [],
            'header' => ["Content-Type:application/json"]
        ];

        // echo "<pre>".json_encode($data,JSON_PRETTY_PRINT)."</pre>";
        // exit();


        $cr=json_decode($this->m_curl->get(json_encode($data)),true);

        // var_dump(expression)

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

            // echo json_encode($cr['data'],JSON_PRETTY_PRINT);

            ?>
            <script type="text/javascript">
                swal('Success','Data berhasil dihapus','success')
                loadData();
            </script>
            <?
        }

    }




    function simpan_update(){
        // echo "<pre>".json_encode($_POST,JSON_PRETTY_PRINT)."</pre>";
        // exit();

        $post=$_POST;

        $idne=(int)$post['idne'];

        $nama_resep=$post['nama_resep'];
        // $kategori=json_decode(base64_decode($post['kategori']),true);
        $durasi_masak=$post['durasi_masak'];
        $deskripsi=$post['deskripsi'];
        $bahan=$post['bahan'];
        $instruksi=$post['instruksi'];

        $arrBahan=[];

        foreach ($bahan as $value) {
            if (!empty($value)) {
                $arrBahan[]= ['description'=>$value];
            }
        }

        $arrInstruksi=[];

        $n=1;
        foreach ($instruksi as $value) {
            if (!empty($value)) {
                $arrInstruksi[]=['description'=>$value,'sort_number'=>(string)$n++];
            }
        }

        

        $dataa=[
            'name' => $nama_resep,
            'description' => $deskripsi,
            'cooking_duration' => $durasi_masak,
            'category_id' => (string)$post['kategori'],
            'ingredients' => $arrBahan,
            'recipes' => $arrInstruksi,
            'nutritions' => [
                'calory' => "99",
                "protein"=> "99",
                "carbohydrate"=> "99",
                "fat"=> "99"
            ],


        ];

        // echo "<pre>".json_encode($dataa,JSON_PRETTY_PRINT)."</pre>";
        // exit();

        

        $data=[
            'url'=> baseUrl().'menu/update/'.$idne,
            'method'=>'PATCH',
            'post' => $dataa,
            'header' => ["Content-Type:application/json"]
        ];

        $cr=json_decode($this->m_curl->get(json_encode($data)),true);

        
        // exit();


        if ($cr['status']=='error') {
            


            $this->session->set_flashdata(array(
                'message' => '<div class="alert alert-danger alert-dismissible" role="alert">Gagal Update. <pre>'.json_encode($cr,JSON_PRETTY_PRINT).'</pre></div>'
            ));
            redirect(base_url('kelola'));
        }else{

            // echo "<pre>".json_encode($cr['data'],JSON_PRETTY_PRINT)."</pre>";

            // $this->load->view('_anjungan_cari',['data'=>$cr['data']]);

            // echo json_encode($cr['data'],JSON_PRETTY_PRINT);

            $this->session->set_flashdata(array(
                'message' => '<div class="alert alert-success alert-dismissible" role="alert">Data berhasil diupdate.</div>'
            ));
            redirect(base_url('kelola'));
        }

    }


}
