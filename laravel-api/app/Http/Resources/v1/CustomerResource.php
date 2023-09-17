<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\v1\InvoiceCollection;
use App\Http\Resources\v1\InvoiceResource;

class CustomerResource extends JsonResource
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
            'name' => $this->name,
            'type' => $this->type,
            'email' => $this->email,
            'postalCode' => $this->postal_code,
            'invoices' => InvoiceResource::collection($this->whenLoaded('invoices')),
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,

        ];
    }
}
