<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MemberResource extends JsonResource
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
            'jmeno' => $this->jmeno,
            'prijmeni' => $this->prijmeni,
            'email' => $this->email,
            'narozeni' => $this->narozeni
        ];
    }
}
