<?php

namespace App\Http\Controllers;

use App\User;
use App\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\ProfilResource;
use App\Repositories\ProfilRepository;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\UserAnnonceResource;
use App\Http\Resources\UserDetailsResource;

class UserController extends Controller
{   
    protected $repository;

    public function __construct(ProfilRepository $repository, User $user)
    {
        $this->repository = $repository;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function offres()
    {   
        // $user_id = Auth()->id; 
        return UserAnnonceResource::collection(Annonce::where('object', '1')
        ->where('user_id', 1)->where('status', 1)->latest()->get());
    }

    public function demandes()
    {
        // $user_id = Auth()->id; 
        return UserAnnonceResource::collection(Annonce::where('object', '0')
        ->where('user_id', 1)->where('status', 1)->latest()->get());
    }

    public function disabled()
    {
        // $user_id = Auth()->id; 
        return UserAnnonceResource::collection(Annonce::where('user_id', 1)
        ->where('status', 0)->latest()->get());
    }


    public function profil()
    {   
        // return ProfilResource::collection(User::where('id', auth()->user->id)
        return ProfilResource::collection(User::where('id', 1)
        ->where('status', 1)->where('type', 'Customer')->latest()->get());
    }
    

    public function show(Annonce $annonce)
    {
        return  new UserDetailsResource($annonce);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

 
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|max:50|min:3',
            'prenom' => 'required|string|min:3|max:50',
            'city_id' => 'required|numeric',
            'adress' => 'required|string|max:50',
            'preferences' => 'string',
            // 'images' => 'required|mimes:jpeg, png, bmp, gif'
            // |unique:posts
        ]);

        
        if ($validator->fails()) {

         return response()->json(['errors'=>$validator->errors()]);
        }
            $user = User::find(1);
        $this->repository->update($request, $user);
        return Response('Updated', 202);
    }

    public function updatePassword(Request $request)
    {
        $user = User::find(1);
        
        // if (!(Hash::check($request->get('hold_password'), Auth::user()->password))) {
            if (!(Hash::check($request->get('hold_password'), $user->password))) {
                // The passwords matches
                return response()->json(['errors' => "Votre ancien mot de passe n'est pas correct. Veuillez réessayer SVP!"]);
            }
            
            if(strcmp($request->get('hold_password'), $request->get('password')) == 0){
                //Current password and new password are same
               return response()->json(['errors' => "Votre ancien mot de passe ne peut pas être identique au nouveau"]);
            }
    
          $validator = Validator::make($request->all(), [
            'hold_password'=>'required|string|min:6',
            'password'=>'required|min:8|string|confirmed',
        ]);
    
          if ($validator->fails()) {
    
            return response()->json(['errors'=>$validator->errors()]);
           }
           
            // $user = Auth::user();
            $user->password = Hash::make($request->get('password'));
            $user->save();
            
        return Response('Updated', 202);
    }

    public function profilPicture(Request $request)
    {
        $user = User::find(1);

        $validator = Validator::make($request->all(), [
            'image'=>'required|mimes:jpeg, png, bmp, gif',
        ]);

        if ($validator->fails()) {
    
            return response()->json(['errors'=>$validator->errors()]);
           }

           $this->repository->picture($request, $user);
            return Response('Profil picture Updated', 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
