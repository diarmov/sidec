<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Asunto;
use App\Models\AsuntoBuzon;
use App\Models\Datospersonalesjefe;
use App\Models\OtrasPrueba;
use App\Models\Pruebaasunto as PruebaAsunto;
use Validator;
use App\Http\Resources\Asunto as AsuntoResource;
use Illuminate\Support\Facades\DB;

class AsuntoController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asunto = Asunto::all();

        return $this->sendResponse(AsuntoResource::collection($asunto), 'Asunto retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'folioSidec' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        DB::beginTransaction();
        try{
            
            if(isset($input['id_buzon'])){
                $asunto_buzon = new AsuntoBuzon();
                $asunto_buzon->id_buzon = $input['id_buzon'];
                $asunto_buzon->tipo = 1;
                unset($input['id_buzon']);
                $asunto = Asunto::create($input);
    
                $asunto_buzon->idAsunto = $asunto->idAsunto;
                $asunto_buzon->save();
            }else{
                unset($input['id_buzon']);
                $asunto = Asunto::create($input);
            }

            
            
            if($asunto && isset($input['rutas'])){
                $sizeRutas = sizeof($input['rutas']);
                for ($i=1; $i <$sizeRutas + 1; $i++) {
                    $pruebaAsunto = new PruebaAsunto();
                    $pruebaAsunto->idAsunto = $asunto->idAsunto;
                    $pruebaAsunto->archivo = $input['rutas']['ruta-'.$i];
                    $pruebaAsunto->save();
                }
            }

            if($request->input('datos_personales') == 1){
                Datospersonalesjefe::create([
                    'edad' => $request->input('edad',0) ?? 0,
                    'nombre' => $request->input('nombre_denunciante').' '.$request->input('pa_denunciante').' '.$request->input('sa_denunciante'),
                    'telefono' => $request->input('telefono_denunciante','0123456789'),
                    'domicilio' => $request->input('colonia','colonia').', '.$request->input('calle','calle').', '.$request->input('num_ext','01').', '. $request->input('cp','98000'),
                    'localidad' => $request->input('localidad', '') ?? ' ',
                    'idAsunto' => $asunto->idAsunto,
                    'idMunicipio' => $request->input('id_municipio', 0) ?? 0,
                    'idGrado' => $request->input('grado_estudio_denunciante', 0) ?? 0,
                    'ocupacion' => $request->input('ocupacion', '') ?? ' ',
                    'sexo' => $request->input('sexo','D') ?? 'D',
                ]);

            }

            if($request->filled('otro_tipo_prueba')){
                OtrasPrueba::create([
                    'idAsunto' => $asunto->idAsunto,
                    'descripcion' => $request->input('otro_tipo_prueba') ?? ' '
                ]);
            }

            DB::commit();
            return $this->sendResponse(new AsuntoResource($asunto), 'Asunto created successfully.');
        }catch(\Exception $e){
            //echo $e;
            DB::rollback();
            return $this->sendError('Saving error.', $e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asunto  $asunto
     * @return \Illuminate\Http\Response
     */
    //public function show(Asunto $asunto)
    public function show(String $folioSidec)
    {
        if (is_null($folioSidec)) {
            return $this->sendError('Asunto not found.');
        }

        $asunto = Asunto::select("idAsunto")->where('folioSidec', $folioSidec)->get();
        return response()->json($asunto, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asunto  $asunto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asunto $asunto)
    {
        $asunto->delete();

        return $this->sendResponse([], 'Asunto deleted successfully.');
    }
}
