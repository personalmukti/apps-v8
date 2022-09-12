<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ModtestResource extends JsonResource
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
            'id' => $this->id,
            'field_A' => $this->field_A,
            'field_B' => $this->field_B,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
