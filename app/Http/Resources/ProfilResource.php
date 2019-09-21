<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfilResource extends JsonResource
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
            'pseudo' => $this->pseudo,
            'phone' => $this->phone,
            'email' => $this->email,
            'country' => $this->country,

            'accept_watsapp' => $this->profil->whatsapp_me,
            'nom' => $this->profil->nom,
            'prenom' => $this->profil->prenom,
            'city_id' => $this->profil->city->name,
            'adress' => $this->profil->adress,
            'photo_profil' => $this->profil->photo_profil,
            'plan' => $this->profil->plan,
            'preferences' => $this->profil->preferences,
            'created_at' => $this->created_at->diffForHumans(),
            'updated_at' => $this->profil->updated_at->diffForHumans(),

        ];
    }
}
