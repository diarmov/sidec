
<?php

//esta ruta debe apuntar a donde se instale el guzzle
require('../../assets/vendor/autoload.php');
set_time_limit(0);


class Cliente_aSidec
{

    /**
     * Funcion para crear un usuario para consumir la api de sidec
     */
    function register($name, $email, $password, $c_password)
    {
        $client = new \GuzzleHttp\Client([
            'base_uri' => 'https://sidec.zacatecas.gob.mx/sidec-API/public/',
            'defaults' => [
                'exceptions' => false
            ]
        ]);

        $request = $client->request('POST', 'api/register', [
            'form_params' => [
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'c_password' => $c_password,
                'debug' => true,
            ],
            'http_errors' => false
        ]);

        if ($request->getStatusCode() == 200) {
            return $response = json_decode($request->getBody()->getContents(), true);
        } else {
            return json_decode($request->getBody()->getContents(), true);
        }
    }

    /**
     * Funcion para iniciar sesion en la api de sidec
     */
    function login($email, $password)
    {
        $token = null;
        $client = new \GuzzleHttp\Client([
            'base_uri' => 'https://sidec.zacatecas.gob.mx/sidec-API/public/',
            'defaults' => [
                'exceptions' => false
            ]
        ]);

        $request = $client->request('POST', 'api/login', [
            'form_params' => [
                'email' => $email,
                'password' => $password,
            ],
            'http_errors' => false
        ]);

        if ($request->getStatusCode() == 200) {
            $response = json_decode($request->getBody()->getContents(), true);
            foreach ($response as $key => $val) {
                if ($key == 'data') {
                    foreach ($val as $key2 => $val2) {
                        if ($key2 == 'token') {
                            $token = $val2;
                        }
                    }
                }
            }
            return $token;
        } else {
            return json_decode($request->getBody()->getContents(), true);
        }
    }

    /**
     * Funcion con la que obtienes las denuncias de sidec, ***este no se utiliza
     */
    function get($token, $folio = '')
    {
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept'        => 'application/json',
        ];
        $client = new \GuzzleHttp\Client([
            'base_uri' => 'https://sidec.zacatecas.gob.mx/sidec-API/public/',
            'defaults' => [
                'exceptions' => false
            ],
            'headers' => $headers
        ]);

        $request = $client->request('GET', "api/bitacora/{$folio}", [
            'http_errors' => false
        ]);

        return json_decode($request->getBody()->getContents(), true);
    }

    /**
     * Funcion con la cual se envia las actualizaciones de estatus a sidec, para ser
     * mostradas al ciudadano
     */
    function post($folio, $estatus, $rechazo,$justificacion_rechazo, $token)
    {
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept'        => 'application/json',
        ];
        $client = new \GuzzleHttp\Client([
            'base_uri' => 'https://sidec.zacatecas.gob.mx/sidec-API/public/',
            'defaults' => [
                'exceptions' => false
            ],
            'headers' => $headers
        ]);

        $request = $client->request('POST', 'api/bitacora', [
            'form_params' => [
                'folio_denuncia' => $folio,
                'estatus_denuncia' => $estatus,
                'rechazo' => $rechazo,
                'justificacion_rechazo' => $justificacion_rechazo,
                'debug' => true,
            ],
            'http_errors' => false
        ]);

        return json_decode($request->getBody()->getContents(), true);
    }
}
?>