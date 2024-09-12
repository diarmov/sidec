<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Municipio extends JsonResource
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
            'idMunicipio' => $this->idMunicipio,
            'idEstado' => $this->idEstado,
            'nombre' => $this->nombre,
        ];
    }
}