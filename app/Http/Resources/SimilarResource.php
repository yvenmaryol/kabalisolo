<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SimilarResource extends JsonResource
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
            'title' =>$this->title,
            'path' =>$this->path,
            'price' =>$this->price,
            'subcategory' =>$this->subcategory->name,
            'city' =>$this->city->name,
            'images' => new ImageResource($this->images),
            'created_at' =>$this->created_at->diffForHumans(),
        ];
    }
}
