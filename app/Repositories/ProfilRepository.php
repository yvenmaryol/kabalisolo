<?php

namespace App\Repositories;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image as InterventionImage;

class ProfilRepository
{

    public function update($request, $user)
    {   
        $user->update([
            'pseudo' => $request->pseudo,
            'slug' => str_slug($request->pseudo),
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        $user->profil->update([
            'whatsapp_me' => $request->whatsapp_me,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'city_id' => $request->city_id,
            'adress' => $request->adress,
            'photo_profil' => $request->photo_profil,
            'preferences' => $request->preferences,
        ]);
    }

     public function picture($request, $user)
    {

            $photo = request()->file('image'); 

               $file_ext = $photo->getClientOriginalExtension();
               $file_name = uniqid();
               $photo_name = $file_name. '.' . $file_ext;
               $path = public_path('photo_profil/' . $photo_name);
               $tof = InterventionImage::make($photo)->resize(500, null, function ($constraint) {
                   $constraint->aspectRatio();
               });
               $tof->orientate()->save($path);

               $user->profil->photo_profil = $photo_name;
               $user->profil->save();
       
    }

}