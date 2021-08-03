<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Conta extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'conta'=>$this->conta,
            'nome'=>$this->nome,
            'saldo'=>$this->saldo

        ];
    }
}
