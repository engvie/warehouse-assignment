<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductComponentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'amount_of' => $this->amount_of,
            'name' => $this->inventory->name,
            'stock' => $this->inventory->stock,
            'available' => $this->available,
            'isAvailable' => $this->available >= 1,
        ];
    }
}
