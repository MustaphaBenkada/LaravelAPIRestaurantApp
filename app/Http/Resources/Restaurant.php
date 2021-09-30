<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Restaurant extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
       return [
        'name'=>         $this->name,
        'phone_number'=> $this->phone_number,
        'description' => $this->description,
        'address' =>     $this->address,
        'type' =>        $this->type,
        'image' =>       $this->image,
    ];
    }
}
