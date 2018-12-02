<?php

class Process {

    public static function getAllProcess(){
        $response = Request::doTheRequest('GET', 'API/bpm/process?p=0&c=1000');
        return $response['data'];
    }
}