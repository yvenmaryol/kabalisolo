<?php

namespace App\Http\Controllers;

use App\Image;
use App\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ImageResource;
use App\Http\Resources\AnnonceResource;
use App\Http\Resources\DetailsResource;
use App\Repositories\AnnoncesRepository;
use Illuminate\Support\Facades\Validator;

class AnnonceController extends Controller
{   

    protected $repository;

    public function __construct(AnnoncesRepository $repository, Annonce $annonces)
    {
        $this->repository = $repository;
        $this->annonces = $annonces;
        $this->middleware('JWT', ['except' => ['offres', 'demandes', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function offres()
    {
        return AnnonceResource::collection(Annonce::where('object', '1')
                        ->where('status', 1)->latest()->get());
    }

    public function demandes()
    {
        return AnnonceResource::collection(Annonce::where('object', '0')
                        ->where('status', 1)->latest()->get());
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:50|min:4',
            'description' => 'required|string|min:10',
            'price' => 'required|numeric',
            // 'tags' => 'required|max:50',
            // 'object' => 'required|numeric|digits:1',
            'subcategory_id' => 'required|numeric',
            'city_id' => 'required|numeric',
            // 'images' => 'required|mimes:jpeg, png, bmp, gif'
        ]);

        // return Response($request->tags, 201);

        if ($validator->fails()) {

         return response()->json(['errors'=>$validator->errors()]);
        }
       
    //    $this->repository->store($request);
       $this->repository->store($request);
        
        return Response('Success', 201);
        // return Response(new DetailsResource($annonce), 201);
        // return Response( AnnonceResource::collection(Annonce::where('object', '1')
        //                 ->where('status', 1)->latest()->get()));
    }

 
    public function show(Annonce $annonce)
    {
        return  new DetailsResource($annonce);
    }


    public function update(Request $request, Annonce $annonce)
    {
        $this->repository->update($request, $annonce);
    //    $annonce->update($request->all());
        return Response('Updated', 202);
    }


    public function destroy(Annonce $annonce)
    {   
        // if ($annonce->trashed()) {
            
        //     return response()->json(['errors'=> " Cette annonce a été supprimer"]);
        // }

        Annonce::destroy($annonce->id);
        return Response('Deleted', 202);
    }
}
