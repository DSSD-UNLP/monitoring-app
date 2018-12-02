<?php
use \Exception\RequestException;
use GuzzleHttp\Psr7;
use GuzzleHttp\Cookie\CookieJar;
class Request {

    public static function doTheRequest($method, $uri, $variable=null, $data=null, $dataType=null){
        $response = array();
		$client = Login::getGuzzleClient();
        try {
            //Si el m�todo es POST, hago el request con un header con la variable de sesion			
			if ($method == 'POST'){
                $jar = new \GuzzleHttp\Cookie\CookieJar();
                $request = $client->request($method, $uri,
                    ['headers' => [
                        'X-Bonita-API-Token' => $_SESSION['X-Bonita-API-Token']
                        ]
                    ]);
                $datos = $request->getBody();
                $response['success'] = true;
                $response['data'] = json_decode($datos);

            }
			else{
				if ($method == 'PUT'){
					$jar = new \GuzzleHttp\Cookie\CookieJar();
					$request = $client->request($method, $uri,
						['headers' => [
							'X-Bonita-API-Token' => $_SESSION['X-Bonita-API-Token']
							],
						 'json' => [
							'type' => $dataType,
							'value'=> $data
							]							
						]);
					$datos = $request->getBody();
					$response['success'] = true;
					$response['data'] = json_decode($datos);
				}
				else {
					$request = $client->request($method, $uri);
					$datos = $request->getBody();
					$response['success'] = true;
					$response['data'] = json_decode($datos);
				}
			}
            //Si el metodo es GET, lo hago directamente.
            


        } catch (RequestException $e) {
            $response['success'] = false;
            $response['message'] = $e->getResponse()->getStatusCode() . ' - ' . $e->getResponse()->getReasonPhrase();
            $response['data'] = [];
        }
        return $response;
    }

}