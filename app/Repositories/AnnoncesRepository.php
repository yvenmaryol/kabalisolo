<?php

namespace App\Repositories;
use App\Image;
use App\Annonce;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;

class AnnoncesRepository
{

    public function store($request)
    {   
        $annonces = new Annonce;
        $annonces->title = $request->title;
        $annonces->slug = str_slug($request->title. '-'.uniqid());
        $annonces->description = $request->description;
        $annonces->price = $request->price;
        $annonces->tags = serialize($request->tags);
        // $annonces->object = $request->object;
        $annonces->object = '1';
        $annonces->user_id = auth()->user()->id;
        $annonces->subcategory_id = $request->subcategory_id;
        $annonces->city_id = $request->city_id;
        $annonces->save();

        if (request()->file('images') > 0 ) {

            $photos = request()->file('images'); 
           foreach ($photos as $photo){
               $file_ext = $photo->getClientOriginalExtension();
               $file_name = uniqid();
               $photo_name = $file_name. '.' . $file_ext;
               $path = public_path('thumbs/' . $photo_name);
               $tof = InterventionImage::make($photo)->resize(900, null, function ($constraint) {
                   $constraint->aspectRatio();
               });
               $tof->orientate()->save($path);

               $product_image = new Image;
               $product_image->name = $photo_name; 
               $annonces->images()->save($product_image);
           }
       
             }
             else{
       
             $product_image = new Image;
               $product_image->name = "no_image.png"; 
               $annonces->images()->save($product_image);
               }
    }

    public function update($request, $annonce)
    {   
        $annonce->update([
            'title' => $request->title,
            'slug' =>  str_slug($request->title. '-'.uniqid()),
            'description' => $request->description,
            'price' => $request->price,
            'tags' => $request->tags,
            'object' => $request->object,
            'subcategory_id' => $request->subcategory_id,
            'city_id' => $request->city_id,
        ]);
    }

}