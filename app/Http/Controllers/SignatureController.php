<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\models\Signature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class SignatureController extends Controller
{
    //

    public function upload_signature(Request $request){


        $validator = Validator::make($request->all(), [
            'signature_1' => 'required|image|mimes:jpeg,png,jpg',
            'signature_2' => 'required|image|mimes:jpeg,png,jpg',
            'signature_3' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $signature_1 = $request->file('signature_1');
        $signature_2 = $request->file('signature_2');
        $signature_3 = $request->file('signature_3');

        $user_signature = [
                    
            'signature_1' => file_get_contents($signature_1->getRealPath()),
            'signature_2' => file_get_contents($signature_2->getRealPath()),
            'signature_3' => file_get_contents($signature_3->getRealPath()),
            'user_id'=>auth()->id()

        ];
         
        $signature_model = new Signature($user_signature);
        $signature_model->save();   

        

        return view('dashboard',['SignatureUploaded'=>Signature::where('user_id', auth()->id())->exists()
                    ,'container' => 'get_image']);
       
    }
}
