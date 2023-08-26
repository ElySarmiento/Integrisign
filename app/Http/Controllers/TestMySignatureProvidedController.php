<?php

namespace App\Http\Controllers;

use App\Models\Signature;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;


class TestMySignatureProvidedController extends Controller
{
    //

    public function getImages($userId){

        $user = Signature::where('user_id',$userId)->first();

        $userSignature = [
            'signature_1' => $user->signature_1,
            'signature_2' => $user->signature_2,
            'signature_3' => $user->signature_3,
        ];

        return $userSignature;

    }


    public function TestMySignature(Request $request){

        $SignatureImage = $this->getImages(auth()->id());

        $image = Image::make($SignatureImage['signature_2']);

        //ORB algorithm

        
    }
}
