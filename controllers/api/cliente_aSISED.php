
<?php
require('../../assets/vendor/autoload.php');
set_time_limit(0);
error_reporting(0);
//include('../../db/db.php');


//$link = connect();

//var_export(getData('SIDEC-8-18052020-27'));



/*var_export(register('Citlali', 'test@test2.com', '123456', '123456'));

$token = login('fontenaak@gmail.com', '123456');

$bitacoras = get($token,'SIDEC-6-05052020-13');
$bitacoras = get($token);
var_export($bitacoras);

var_export(post('SIDEC-6-05052020-13', 5, 0, $token));*/
class Cliente_aSISED
{
    function register($name, $email, $password, $c_password)
    {
        $client = new \GuzzleHttp\Client([
            'base_uri' => 'http://localhost:8000',
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
            ],
            'http_errors' => false
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
            'base_uri' => 'https://sire.zacatecas.gob.mx/api/',
            'defaults' => [
                'exceptions' => false
            ]
        ]);

        $request = $client->request('POST', 'auth/login', [
            'form_params' => [
                'email' => $email,
                'password' => $password,
                'recuerdame' => 0,
            ],
            'http_errors' => false
        ]);
        if ($request->getStatusCode() == 200) {
            $response = json_decode($request->getBody()->getContents(), true);
            $token = $response['access_token'];
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
            'base_uri' => 'http://localhost:8000',
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
            'Authorization' => 'Bearer ' . $token,
            'Accept'        => 'application/json',
        ];

        $data = $this->getData($folio, $link);
        $multipart = $this->CreateMultipartData($data);


        $client = new \GuzzleHttp\Client([
            //'verify' => false,
            'base_uri' => 'https://sire.zacatecas.gob.mx/api/',
            'defaults' => [
                'exceptions' => true
            ],
            'headers' => $headers
        ]);

        $request = $client->request('POST', 'denuncias_ext', [
            'multipart' => $multipart,
            'http_errors' => false
        ]);

        return json_decode($request->getBody()->getContents(), true);
    }

    function getData($folio, $link)
    {

        global $link;
        $query = "SELECT
        denuncia.id_denuncia,
        denuncia.nombre_funcionario,
        denuncia.pa_funcionario,
        denuncia.sa_funcionario,
        denuncia.puesto_funcionario,
        denuncia.dependencialibre,
        denuncia.folio,
        denuncia.narracion_hechos,
        cat_tipo_denuncia.tipo_denuncia,
        denuncia.nombre_denunciante,
        denuncia.pa_denunciante,
        denuncia.sa_denunciante,
        cat_sexo.sexo,
        denuncia.edad,
        cat_estados.clave as estado,
        cat_municipios.clave as municipio,
        denuncia.localidad,
        denuncia.cp_denunciante,
        denuncia.colonia_denunciante,
        denuncia.calle_denunciante,
        denuncia.num_ext_denunciante,
        denuncia.num_int_denunciante,
        denuncia.doctos_electronicos,
        denuncia.datos_personales,
        denuncia.email_denunciante,
        denuncia.telefono_denunciante,
        denuncia.ocupacion,
        cat_grado_estudios.grado,
        denuncia.doctos_fisicos,
        denuncia.doctos_electronicos,
        denuncia.fecha_hechos,
        denuncia.hora_hechos,
        denuncia.testigos,
        denuncia.otro_tipo_prueba,
        denuncia.descripcion_archivos
        FROM denuncia
        LEFT JOIN cat_grado_estudios ON denuncia.grado_estudios_denunciante = cat_grado_estudios.id_grado_educacion
        LEFT JOIN cat_tipo_denuncia ON denuncia.tipo_denuncia = cat_tipo_denuncia.id_cat_tipo_denuncia
        LEFT JOIN cat_sexo ON denuncia.id_sexo = cat_sexo.id_sexo
        LEFT JOIN cat_estados ON denuncia.id_estado = cat_estados.id
        LEFT JOIN cat_municipios ON denuncia.id_municipio = cat_municipios.id 
        WHERE folio = '$folio'";

        if (!$resultado = $link->query($query)) {
            echo $link->error . "<br>";
            exit;
        } else {
            if ($resultado->num_rows == 1) {
                $denuncia = $resultado->fetch_assoc();
                $genero_denunciante = '';

                ($denuncia['sexo'] == 'HOMBRE' ? $genero_denunciante = 'H' : $genero_denunciante = 'M') && ($denuncia['sexo'] == 'DESCONOCIDO' ? $genero_denunciante = 'D' : '');


                $data = array(
                    'folio' => $denuncia['folio'],
                    'denuncia' => $denuncia['narracion_hechos'] ?? 'El ciudadano no agrego una descripción de la denuncia',
                    'presponsable-1' => 1,
                    //'tipo_denuncia' => $denuncia['tipo_denuncia'],
                    //Opcionales
                    'pr_nombre-1' => $denuncia['nombre_funcionario'] ?? 'desconocido',
                    'pr_ap_paterno-1' => $denuncia['pa_funcionario'] ?? 'desconocido',
                    'pr_ap_materno-1' => $denuncia['sa_funcionario'] ?? 'desconocido',
                    'pr_cargo-1' => $denuncia['puesto_funcionario'] ?? 'desconocido',
                    'pr_dependencia-1' => $denuncia['dependencialibre'] ?? 'desconocido',

                    'denunciante_nombre' => $denuncia['nombre_denunciante'] ?? 'Vacio',
                    'denunciante_ap_paterno' => $denuncia['pa_denunciante'] ?? 'Vacio',
                    'denunciante_ap_materno' => $denuncia['sa_denunciante'] ?? '',
                    'denunciante_genero' => $genero_denunciante ?? '',
                    'denunciante_edad' => $denuncia['edad'] ?? '',
                    'denunciante_estado' => $denuncia['estado'] ?? '32',
                    'denunciante_municipio' => $denuncia['municipio'] ?? '056',
                    'denunciante_localidad' => $denuncia['localidad'] ?? 'Vacio',
                    'denunciante_cp' => $denuncia['cp_denunciante'] ?? '98000',
                    'denunciante_colonia' => $denuncia['colonia_denunciante'] ?? 'Vacio',
                    'denunciante_calle' => $denuncia['calle_denunciante'] ?? 'Vacio',
                    'denunciante_num_ext' => $denuncia['num_ext_denunciante'] ?? 'Vacio',
                    'denunciante_num_int' => $denuncia['num_int_denunciante'] ?? '',
                    'email_contacto' => $denuncia['email_denunciante'] ?? '',
                    'info_complementaria' => [
                        'tipo_denuncia' => $denuncia['tipo_denuncia'] ?? '',
                        'telefono_denunciante' => $denuncia['telefono_denunciante'] ?? '',
                        'grado_estudio_denunciante' => $denuncia['grado'] ?? '',
                        'ocupacion' => $denuncia['ocupacion'] ?? '',
                        'doctos_fisicos' => $denuncia['doctos_fisicos'] ?? '',
                        'doctos_electronicos' => $denuncia['doctos_electronicos'] ?? '',
                        'fecha_hechos' =>  $denuncia['fecha_hechos'] ?? '',
                        'hora_hechos' => $denuncia['hora_hechos'] ?? '',
                        'testigos' => $denuncia['testigos'] ?? '',
                        'otro_tipo_prueba' => $denuncia['otro_tipo_prueba'] ?? '',
                        'descripcion_archivos' => $denuncia['descripcion_archivos'] ?? '',
                    ],
                );
                if ($denuncia['doctos_electronicos'] == 1) {
                    $data['archivos_evidencia'] = $this->getFilesRoutes($denuncia['id_denuncia'], $link);
                }
                return $data;
            }
        }
    }

    function CreateMultipartData(array $array, string $prefix = '', string $suffix = '')
    {

        $result = [];

        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result = array_merge($result, $this->CreateMultipartData($value, $prefix . $key . $suffix . '[', ']'));
            } else {
                $result[] = [
                    'name' => $prefix . $key . $suffix,
                    'contents' => $value,
                ];
            }
        }

        return $result;
        /*$keys = array_keys($arrayData);
        $values = array_values($arrayData);

        for ($i = 0; $i < sizeof($arrayData); $i++) {
            if ($keys[$i] == 'archivos_evidencia') {
                $rutas_values = array_values($values[$i]);
                if (isset($arrayData['archivos_evidencia'])) {
                    for ($j = 0; $j < sizeof($rutas_values); $j++) {
                        $index = $i++;
                        $multipart[$index]['name'] = 'archivos_evidencia[]';
                        $multipart[$index]['contents'] = fopen($rutas_values[$j], 'r');
                        //$multipart[$index]['contents'] = $rutas_values[$j];
                    }
                }
            } else {
                $multipart[$i]['name'] = $keys[$i];
                $multipart[$i]['contents'] = $values[$i];
            }
        }
        //var_dump($multipart);
        return $multipart;*/
    }

    function getFilesRoutes($idDenuncia, $link)
    {
        $routes = [];
        $query = "SELECT documentos_denuncia.ruta FROM documentos_denuncia WHERE id_denuncia = " . $idDenuncia;

        if (!$resultado = $link->query($query)) {
            echo $link->error . "<br>";
            exit;
        } else {
            if ($resultado->num_rows > 0) {
                for ($i = 1; $i < $resultado->num_rows + 1; $i++) {
                    $denuncia = $resultado->fetch_assoc();
                    //$routes['ruta-' . $i] = $denuncia['ruta'];
                    $routes['ruta-' . $i] = fopen($denuncia['ruta'], 'r');
                }
                return $routes;
            }
        }
    }
}
?>