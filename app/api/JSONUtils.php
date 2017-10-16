<?php
/**
 * Created by PhpStorm.
 * User: Przemek
 * Date: 07.10.2017
 * Time: 19:47
 */

class JSONUtils
{
    public function convert_to_json($query_result, $code, $message){
        $json = array();
        $json['code'] = $code;
        $json['data'] = $query_result;
        if (isset($message))
            $json['message'] = $message;
        else {
            $json['message'] = null;
        }
        header('Content-Type: application/json');
        echo json_encode($json);
    }

    public function throwError($code, $message) {
        $json = array();
        if (isset($code))
            $json['code'] = $code;
        else {
            $json['code'] = 100;
        }
        if (isset($message))
            $json['message'] = $message;
        else {
            $json['message'] = null;
        }
        header('Content-Type: application/json');
        echo json_encode($json);
    }
}