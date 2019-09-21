<?php

namespace App\Http\Resources;

use App\Image;
use App\Annonce;
use App\Http\Resources\SimilarResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailsResource extends JsonResource
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
            'id' =>$this->id,
            'slug' =>$this->slug,
            'title' =>$this->title,
            'description' =>$this->description,
            'price' =>$this->price,
            'subcategory' =>$this->subcategory->name,
            'city' =>$this->city->name,
            'images' => ImageResource::collection(Image::where('annonce_id', $this->id)->get()),
            'pseudo' =>$this->user->pseudo,
            'user_annonces_count' => count($this->user->annonces),
            'user_annonces_path' =>$this->user->path,
            'user_id' =>$this->user->id,
            'created_at' =>$this->created_at->diffForHumans(),
            'similar' => SimilarResource::collection(Annonce::where('subcategory_id', $this->subcategory->id)
            ->where('status', 1)->where('object', $this->object)
            ->where('id', '!=', $this->id)->take(4)
            ->where('deleted_at', null)->inRandomOrder()->latest()->get()),  
        ];
    }
}
