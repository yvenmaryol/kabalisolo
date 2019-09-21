<?php

namespace App\Http\Resources;

use App\Image;
use App\Http\Resources\ImageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AnnonceResource extends JsonResource
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
            // 'id' =>$this->id,
            'title' =>$this->title,
            // 'description' =>$this->description,
            'path' =>$this->path,
            'price' =>$this->price,
            'subcategory' =>$this->subcategory->name,
            'city' =>$this->city->name,
            'images' => new ImageResource($this->images),
            // 'object' =>$this->object,
            // 'pseudo' =>$this->user->pseudo,
            // 'user_id' =>$this->user->id,
            'created_at' =>$this->created_at->diffForHumans(),
        ];
    }
}
