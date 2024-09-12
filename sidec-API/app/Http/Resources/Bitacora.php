<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Bitacora extends JsonResource
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
            'id_bitacora' => $this->id_bitacora,
            'folio_denuncia' => $this->folio_denuncia,
            'id_clasificacion' => $this->id_clasificacion,
            'sistema_destino' => $this->sistema_destino,
            'estatus_denuncia' => $this->estatus_denuncia,
            'id_usuario' => $this->id_usuario,
            'fecha_registro' => $this->fecha_registro,
        ];
    }
}
