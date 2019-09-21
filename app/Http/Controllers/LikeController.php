<?php

namespace App\Http\Controllers;

use App\Like;
use App\Annonce;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    public function likeIt(Annonce $annonce, $id)
    {  
        return Response($id);
        $annonce->like()->create([
            // 'user_id' => auth()->id,
            'user_id' => '1',
            'annonce_id' => "16",
            ]);
    }

    public function unLike(Annonce $annonce, $id)
    {   return Response('Annonce deleted like');
        $annonce->like()->where('user_id', '1')->first->delete();
        // $annonce->like()->where(['user_id', auth()->id])->first->delete();
    }
}
