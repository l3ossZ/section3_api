<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
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
            'id'=>$this->id,
            'first_name'=>$this->first_name,
            'family_name'=>$this->family_name,
            'date_of_birth'=>$this->date_of_birth,
            'date_of_death'=>$this->date_of_death,
            'name'=>$this->name,
            'lifespan'=>$this->lifespan,
            'url'=>$this->url,
            'books'=>BookResource::collection($this->whenLoaded('books'))
        ];
    }
}
