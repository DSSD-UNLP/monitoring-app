<?php 
session_start();


use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Cookie\SessionCookieJar;
use GuzzleHttp\Cookie\CookieJar;


class Login {
   
    public  function login_bonita(){
        $user = 'walter.bates';
        $password ='bpm';
        $base_uri = 'http://localhost:8080/bonita/';

        try {
            //Creo una cookie jar para almacenar las cookies que me va a devolver Bonita luego del request del loginservice
            $cookieJar = new SessionCookieJar('MiCookie', true);
            $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => $base_uri,
                // You can set any number of default request options.
                'timeout'  => 4.0,
                'cookies' => $cookieJar
            ]);
            $resp = $client->request('POST', 'loginservice', [
                'form_params' => [
                    'username' => $user,
                    'password' => $password,
                    'redirect' => 'false'
                ]
            ]);

            //Almaceno el token de Bonita en una variable de sesion para utilizarla en los requests futuros
            $token = $cookieJar->getCookieByName('X-Bonita-API-Token');
            $_SESSION['X-Bonita-API-Token'] = $token->getValue();
            //Luego de esto, tendr�as que ver la el archivo classes/Request.php
            //Ah� vas a ver que cuando se hace un request con POST se agrega un header con el token

            $_SESSION['user_bonita']= 'walter.bates';
            $_SESSION['password_bonita']= 'bpm';
            $_SESSION['base_uri_bonita']= 'http://localhost:8080/bonita/';
            $_SESSION['logged'] = true;

            return false;
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $error = Psr7\str($e->getResponse());
            } else {
                $error = "No se puede conectar al servidor de Bonita OS";
            }

            return $error;
        }
    }
    public static function getGuzzleClient(){
        $cookieJar = new SessionCookieJar('MiCookie', true);

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => $_SESSION['base_uri_bonita'],
            // You can set any number of default request options.
            'timeout'  => 1.0,
            'cookies' => $cookieJar
        ]);

        return $client;
    }
}