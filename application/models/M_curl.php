<?php

class M_curl extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    function get($dbnp){

    	$data=[
    		'status' => 'error',
    		'data' => null
    	];

    	if (!$dbnp) {
    		return json_encode($data,JSON_PRETTY_PRINT);
    	}

    	$put=json_decode($dbnp,true);

    	// var_dump($put);
    	// var_dump(base64_decode($put['post']));

        if ($put['method']=='GET') {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $put['url'], 
                CURLOPT_RETURNTRANSFER => true, 
                CURLOPT_ENCODING => "", 
                CURLOPT_MAXREDIRS => 10, 
                CURLOPT_TIMEOUT => 10, 
                CURLOPT_FOLLOWLOCATION => true, 
                CURLOPT_HTTP_VERSION => 
                CURL_HTTP_VERSION_1_1, 
                CURLOPT_CUSTOMREQUEST => $put['method'], 
                CURLOPT_HTTPHEADER => $put['header'],
            ));
        }

        if ($put['method']=='POST') {

        	$curl = curl_init();
            curl_setopt_array($curl, array(
            	CURLOPT_URL => $put['url'], 
            	CURLOPT_RETURNTRANSFER => true, 
            	CURLOPT_ENCODING => "", 
            	CURLOPT_MAXREDIRS => 10, 
            	CURLOPT_TIMEOUT => 10, 
            	CURLOPT_FOLLOWLOCATION => true, 
            	CURLOPT_HTTP_VERSION => 
            	CURL_HTTP_VERSION_1_1, 
            	CURLOPT_CUSTOMREQUEST => $put['method'], 
            	CURLOPT_POSTFIELDS => json_encode($put['post'],JSON_PRETTY_PRINT), 
            	CURLOPT_HTTPHEADER => $put['header'],
            ));
        }



        $response = curl_exec($curl);
        $getinfo=curl_getinfo($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        	$data=[
        		'status' => 'error',
        		'data' => $err,
                'http_code' => $getinfo['http_code']
        	];
        }else{

            
            /*if ($getinfo['http_code']=='500') {

                $data=[
                    'status' => 'error',
                    'data' => 'Error 500',
                    'http_code' => $getinfo['http_code']
                ];

            }else{*/
             
            	$data_response=json_decode($response,true);

                // echo json_encode($data_response);
                // exit();

            	if ($data_response['code']=='200') {
                    // echo json_encode($data_response);
            		$data=[
    	        		'status' => 'success',
    	        		'data' => $data_response['data'],
                        'http_code' => $getinfo['http_code']
    	        	];
            	}else{

            		$data=[
    	        		'status' => 'error',
    	        		'data' => $data_response['message'],
                        'http_code' => $getinfo['http_code']
    	        	];
            	}

            // }

        	
        }

        return json_encode($data,JSON_PRETTY_PRINT);
        
    }

}