<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Asunto extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'fechaRecepcion' => $this->fechaRecepcion,
            'fechaCaptacion' => $this->fechaCaptacion,
            'funcionario' => $this->funcionario,
            'descripcion' => $this->descripcion,
            'idCasuntos' => $this->idCasuntos,
            'idDependencia' => $this->idDependencia,
            'estatus' => $this->estatus,
            'captacion' => $this->captacion,
            'idPrograma' => $this->idPrograma,
            'conforme' => $this->conforme,
            'testigos' => $this->testigos,
            'documentos' => $this->documentos,
            'idAtendio' => $this->idAtendio,
            'idReviso' => $this->idReviso,
            'id_motivo' => $this->id_motivo,
            'clave' => $this->clave,
            'programalibre' => $this->programalibre,
            'miembroCS' => $this->miembroCS,
            'dependencialibre' => $this->dependencialibre,
            'domicilionotificacion' => $this->domicilionotificacion,
            'idClasificacion' => $this->idClasificacion,
            'observaciones' => $this->observaciones,
            'baja' => $this->baja,
            'folioSidec' => $this->folioSidec,
            'rutas' => $this->rutas,


        ];
    }
}