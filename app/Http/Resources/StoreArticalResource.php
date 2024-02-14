<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StoreArticalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id , 
            'name'=> $this->name,
            'image'=> $this->image ?? null ,
            'title'=> $this->title, 
            'description'=> $this->description,
            'comment'=> $this->comment ?? null 
        ]; 
    }
}
