<?php


class Cases {

    public static function getCases(){
        return Request::doTheRequest('GET', 'API/bpm/case?p=0&c=1000');
    }

    public static function getArchivedCases(){
        return Request::doTheRequest('GET', 'API/bpm/archivedCase?p=0&c=1000');
    }

    public static function getCountCases(){
        $response = Request::doTheRequest('GET', 'API/bpm/case?p=0&c=1000');
        return count($response['data']);
    }

    public static function getDataArchivedCase($idCase){
        //http://localhost:8080/bonita/API/bpm/archivedCase/15061/context
        $context = Request::doTheRequest('GET', 'API/bpm/archivedCase/'.$idCase.'/context');
        $data = $context['data'];
        $key = key($data);
        $link = $data->$key->link;
        $variables = Request::doTheRequest('GET', $link);
        return $variables;
    }
}