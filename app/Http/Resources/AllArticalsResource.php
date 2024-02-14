<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AllArticalsResource extends JsonResource
{
      /**
     * Transform the resource into an array.
     *
     */
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'name'        => $this->name,
            'image'       => $this->image,
            'title'       => $this->title,
            'comments'    => $this->comment,
            'description' => $this->description,
            'post_status' => $this->post_status
        ];
    }
}
