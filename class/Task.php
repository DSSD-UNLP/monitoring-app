<?php


class Task{

    public static function getTasks(){
        return Request::doTheRequest('GET', 'API/bpm/task?p=0&c=1000');
    }

    public static function getArchivedTasks(){
        return Request::doTheRequest('GET', 'API/bpm/archivedTask?p=0&c=1000');
    }

   
}