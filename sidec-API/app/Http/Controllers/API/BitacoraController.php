<?php
   
namespace App\Http\Controllers\API;

date_default_timezone_set('America/Mexico_City');
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Bitacora;
use App\Models\Denuncium as Denuncia;
use Validator;
use App\Http\Resources\Bitacora as BitacoraResource;
use App\Mail\DenunciaUpdated;
use Illuminate\Support\Facades\DB;
   
class BitacoraController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bitacora = Bitacora::all();
    
        return $this->sendResponse(BitacoraResource::collection($bitacora), 'Bitacora retrieved successfully.');
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
                'folio_denuncia' => 'required',
                'estatus_denuncia' => 'required',
                'rechazo' => 'required'
        ]);
       
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        try{
                $search_folio = DB::select("SELECT folio, email_denunciante, domicilio_notificaciones FROM denuncia WHERE folio  =  :folio", ['folio' => $request->folio_denuncia]);
                    
                $search_folio  = json_encode($search_folio, FALSE);
                $search_folio  = json_decode($search_folio, TRUE);

                $db_folio = '';
                $email = '';
                foreach ($search_folio as $key) {
                        $db_folio = $key['folio'];
                        if($key['email_denunciante'] !== ''){
                            $email = $key['email_denunciante'];
                        }
                        if($key['domicilio_notificaciones'] !== ''){
                            $email = $key['domicilio_notificaciones'];
                        }
                    }
            if($request->folio_denuncia === $db_folio){
                if($request->rechazo == 0 && $request->estatus_denuncia >= 4){
                    $search_bitacora = DB::select("SELECT id_clasificacion, sistema_destino, id_usuario FROM bitacora WHERE fechaRegistro  = (SELECT MAX(fechaRegistro) FROM bitacora WHERE folio_denuncia = :folio )", ['folio' => $request->folio_denuncia]);
                    
                    $search_bitacora  = json_encode($search_bitacora, FALSE);
                    $search_bitacora  = json_decode($search_bitacora, TRUE);
                    
                    foreach ($search_bitacora as $value) {
                        $bitacora = new Bitacora($value);
                    }

                    $bitacora->folio_denuncia = $request->folio_denuncia;
                    $bitacora->estatus_denuncia = $request->estatus_denuncia;
                    if($request->filled('motivo_improcedente')){
                        $denunciaImprocedente = Denuncia::where('folio',$request->folio_denuncia)->get();
                        $denunciaImprocedente->motivo_improcedente = $request->motivo_improcedente;
                        $denunciaImprocedente->save();
                    }
                    
                    DB::update("UPDATE denuncia SET estatus = :estatus, justificacion_rechazo = '' WHERE folio = :folio", ['estatus'=> $request->estatus_denuncia,'folio' => $request->folio_denuncia]);
                    $bitacora->save();
                    if(strpos($email, '@') !== false && $email != ''){
                        $email = trim($email);
                        Mail::to($email)->queue(new DenunciaUpdated($bitacora));
                    }

                    return $this->sendResponse(new BitacoraResource($bitacora), 'Denuncia updated successfully.');
                }else if ($request->rechazo == 1 && $request->estatus_denuncia == 3 && $request->justificacion_rechazo != ''){
                    $bitacora = new Bitacora();
                    $bitacora->folio_denuncia = $request->folio_denuncia;
                    $bitacora->estatus_denuncia = $request->estatus_denuncia;

                    DB::update("UPDATE denuncia SET estatus = 3, justificacion_rechazo = :justificacion_rechazo WHERE folio = :folio", ['justificacion_rechazo'=> $request->justificacion_rechazo,'folio' => $request->folio_denuncia]);
                    $bitacora->save();
                    return $this->sendResponse(new BitacoraResource($bitacora), 'Denuncia rejected successfully.');
                }else{
                    return $this->sendError('If you want to reject a complaint you must send the status in 3, the rejection in 1 and the justification of rejection not null, if you want to update a complaint you must send the status >= 4 and the rejection in 0.');
                }
            }else{
                return $this->sendError('The folio you sent does not exist.');
            }
        }catch(\Exception $e){
            return $this->sendError('Saving error.'.$e, $e);
        }
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Bitacora $bitacora)
    {
        //$bitacora = Bitacora::find($id);
  
        if (is_null($bitacora)) {
            return $this->sendError('Bitacora not found.');
        }
   
        return $this->sendResponse(new BitacoraResource($bitacora), 'Bitacora retrieved successfully.');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request, Bitacora $bitacora)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'estatus_denuncia' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $bitacora->name = $input['name'];
        $bitacora->detail = $input['detail'];
        $bitacora->save();
   
        return $this->sendResponse(new BitacoraResource($bitacora), 'Bitacora updated successfully.');
    }*/
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bitacora $bitacora)
    {
        $bitacora->delete();
   
        return $this->sendResponse([], 'Bitacora deleted successfully.');
    }
}