<?php
    function get($key, $arr){
        if( array_key_exists($key, $arr) ){
            return $arr[$key];
        } else {
            return "";
        }
    }
    function ajax($url, $data){
        $curl = curl_init();
        if($data){
           curl_setopt($curl, CURLOPT_POST, 1);
           curl_setopt($curl, CURLOPT_POSTFIELDS, $data); 
        }
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: '.strlen($data)));
        $data = curl_exec($curl);
        /**************************
        if(!$data){
            #echo "error:".curl_error($curl)."\r\n";
        }
        ***************************/
        curl_close($curl);
        return $data;
    }
    $url = get("url", $_GET);
    echo ajax($url, file_get_contents("php://input"));
?>
