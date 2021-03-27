<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VoyageResource extends JsonResource
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
            'vessel_id' => $this->vessel_id,
            'code' => $this->code,
            'start' => $this->start ,
            'end' => $this->end,
            'status' => $this->status,
            'revenues' => $this->revenues,
            'expenses' => $this->expenses,
            'profit'    => $this->profit
        ];
    }
}
