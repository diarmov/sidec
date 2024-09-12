<?php
//error_reporting(E_ALL);
require('../../assets/vendor/autoload.php');
set_time_limit(0);

class Cliente_aSAC
{
    function register($name, $email, $password, $c_password)
    {
        $client = new \GuzzleHttp\Client([
            'base_uri' => 'z',
            
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
            'http_errors' => true
        ]);

        if ($request->getStatusCode() == 200) {
            return $response = json_decode($request->getBody()->getContents(), true);
        } else {
            return json_decode($request->getBody()->getContents(), true);
        }
    }

    function login($email, $password)
    {
        $token = null;
        $client = new \GuzzleHttp\Client([
            'base_uri' => 'https://sidec.zacatecas.gob.mx/api-SAC/public/',
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

    function get($token, $folio = '')
    {
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept'        => 'application/json',
        ];
        $client = new \GuzzleHttp\Client([
            'base_uri' => 'https://sidec.zacatecas.gob.mx/api-SAC/public/',
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

    function post($token, $folio, $link)
    {

        $headers = [
            'Authorization' => "Bearer {$token}",
            'Accept'        => 'application/json',
        ];

        $params = $this->getData($folio, $link);
        $client = new \GuzzleHttp\Client([
            'base_uri' => 'https://sidec.zacatecas.gob.mx/api-SAC/public/',
            'defaults' => [
                'exceptions' => true
            ],
            'headers' => $headers
        ]);

        $request = $client->request('POST', 'api/asunto', [
            'form_params' => $params,
            'http_errors' => true
        ]);
        return json_decode($request->getBody()->getContents(), true);
    }

    function getData($folio, $link)
    {
        $query = "SELECT
        denuncia.*,
        denuncia.tipo_denuncia as tipo,
        cat_sexo.sexo,
        cat_estados.nombre as estado,
        cat_tipo_denuncia.tipo_denuncia
        FROM denuncia
        LEFT JOIN cat_tipo_denuncia ON denuncia.tipo_denuncia = cat_tipo_denuncia.id_cat_tipo_denuncia
        LEFT JOIN cat_sexo ON denuncia.id_sexo = cat_sexo.id_sexo
        LEFT JOIN cat_estados ON denuncia.id_estado = cat_estados.id
        WHERE folio = '$folio'";

        if (!$resultado = $link->query($query)) {
            echo $link->error . "<br>";
            exit;
        } else {
            if ($resultado->num_rows == 1) {
                $denuncia = $resultado->fetch_assoc();
                $funcionario = '';
                $dom = '';
                $puesto = 'Desconocido';
                $dependencia = 'Desconocido';
                
                if(isset($denuncia['puesto_funcionario'])){
                    $puesto = $denuncia['puesto_funcionario'];
                }

                if(isset($denuncia['dependencialibre'])){
                    $dependencia = $denuncia['dependencialibre'];
                }

                $dom = $denuncia['domicilio_notificaciones'];

                (!isset($denuncia['nombre_funcionario'])) && (!isset($denuncia['pa_funcionario'])) ? $funcionario = 'DESCONOCIDO' : $funcionario = $denuncia['nombre_funcionario'] . ' ' . $denuncia['pa_funcionario'] . ' ' . $denuncia['sa_funcionario'];

                if (!isset($denuncia['domicilio_notificaciones'])) {
                    $dom = 'VACIO';
                }

                (!isset($denuncia['nombre_funcionario'])) && (!isset($denuncia['pa_funcionario'])) ? $funcionario = 'DESCONOCIDO' : $funcionario = $denuncia['nombre_funcionario'] . ' ' . $denuncia['pa_funcionario'] . ' ' . $denuncia['sa_funcionario'];

                ($denuncia['sexo'] == 'HOMBRE' ? $sexo = 'H' : $sexo = 'M') && ($denuncia['sexo'] == 'DESCONOCIDO' ? $sexo = 'D' : '');

                $data = array(
                    'fechaRecepcion' => $denuncia['fechaRecepcion'] ?? 'DESCONOCIDO',
                    'funcionario' => $funcionario ?? 'DESCONOCIDO',
                    'descripcion' => $denuncia['narracion_hechos'] ?? 'DESCONOCIDO',
                    'puestoFuncionario' => $puesto ?? 'DESCONOCIDO',
                    'testigos' => $denuncia['testigos'] ?? 'DESCONOCIDO',
                    'documentos' => $denuncia['doctos_electronicos'] ?? 'DESCONOCIDO',
                    'programalibre' => $denuncia['programalibre'] ?? 'DESCONOCIDO',
                    'domicilio_notificacion' => $dom ?? 'DESCONOCIDO',
                    'folioSidec' => $denuncia['folio'] ?? 'DESCONOCIDO',
                    'dependencialibre' => $dependencia ?? 'DESCONOCIDO',
                    'idCasuntos' => $denuncia['tipo'] ?? '1',
                    'captacion' => 19,
                    //Se agregaron en el ultimo update
                    'tipo_denuncia' => $denuncia['tipo_denuncia'] ?? '',
                    'grado_estudio_denunciante' => $denuncia['grado_estudios_denunciante'] ?? '',
                    'ocupacion' => $denuncia['ocupacion'] ?? '',
                    'doctos_fisicos' => $denuncia['doctos_fisicos'] ?? '',
                    'rel_prog_des_soc' => $denuncia['rel_prog_des_soc'] ?? '',
                    'programalibre ' => $denuncia['programalibre'] ?? '',
                    'miembro_contraloria_social' => $denuncia['miembro_contraloria_social'] ?? '',
                    'nombre_comite' =>  $denuncia['nombre_comite'] ?? '',
                    'datos_personales' => $denuncia['datos_personales'] ?? '',
                    'edad' => $denuncia['edad'] ?? '',
                    'nombre_denunciante' => $denuncia['nombre_denunciante'] ?? 'DESCONOCIDO',
                    'pa_denunciante' => $denuncia['pa_denunciante'] ?? 'DESCONOCIDO',
                    'sa_denunciante' => $denuncia['sa_denunciante'] ?? 'DESCONOCIDO',
                    'id_municipio' => $denuncia['id_municipio'] ?? '',
                    'localidad' => $denuncia['localidad'] ?? '',
                    'sexo' => $sexo,
                    'descripcion_archivos' => $denuncia['descripcion_archivos'] ?? '',
                    'telefono_denunciante' => $denuncia['telefono_denunciante'] ?? '',
                    'otro_tipo_prueba' => $denuncia['otro_tipo_prueba'] ?? '',
                    'cp' => $denuncia['cp_denunciante'] ?? '98000',
                    'colonia' => $denuncia['colonia_denunciante'] ?? 'Vacio',
                    'calle' => $denuncia['calle_denunciante'] ?? 'Vacio',
                    'num_ext' => $denuncia['num_ext_denunciante'] ?? 'Vacio',
                    'doctos_electronicos' => $denuncia['doctos_electronicos'],
                );
                if ($denuncia['doctos_electronicos'] == 1) {
                    $data['rutas'] = $this->getFilesRoutes($denuncia['id_denuncia'], $link);
                }

                if (isset($denuncia['id_buzon']) && $denuncia['id_buzon'] != '') {
                    $data['id_buzon'] = $denuncia['id_buzon'];
                }
                return $data;
            }
        }
    }

    static function getFilesRoutes($idDenuncia, $link)
    {
        $routes = [];
        $query = "SELECT documentos_denuncia.rutaSAC, documentos_denuncia.ruta FROM documentos_denuncia WHERE id_denuncia = " . $idDenuncia;

        if (!$resultado = $link->query($query)) {
            echo $link->error . "<br>";
            exit;
        } else {
            if ($resultado->num_rows > 0) {
                $ftp_host = '10.118.11.9';
                $ftp_user_name = 'desarrollo';
                $ftp_user_pass = 'desarroll0';
                $connect_it = ftp_connect($ftp_host);
                ftp_login($connect_it, $ftp_user_name, $ftp_user_pass);
                ftp_pasv($connect_it, true);
                
                for ($i = 1; $i < $resultado->num_rows + 1; $i++) {
                    $denuncia = $resultado->fetch_assoc();
                    $routes['ruta-' . $i] = $denuncia['rutaSAC'];

                    ftp_put($connect_it, $denuncia['rutaSAC'], $denuncia['ruta'], FTP_ASCII);
                }
                ftp_close($connect_it);
                return $routes;
            }
        }
    }

    function getIdAsunto($folioSidec, $token)
    {
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept'        => 'application/json',
        ];
        $client = new \GuzzleHttp\Client([
            'base_uri' => 'https://sidec.zacatecas.gob.mx/api-SAC/public/',
            'defaults' => [
                'exceptions' => false
            ],
            'headers' => $headers
        ]);

        $request = $client->request('GET', "api/asunto/$folioSidec", [
            'http_errors' => false
        ]);
        return json_decode($request->getBody()->getContents(), true);
    }
}


?>