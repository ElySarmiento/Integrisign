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

        if(isset($SignatureImage)){

            $test_signature_path =  'signatureImage/testSignature.png'; 
            $test_signature = Image::make($request->file('testSignature'))->save($test_signature_path);
            $sum = 0;  
            for ($i=1; $i <= 3; $i++) {
                 
                $currentPath =  "signatureImage/signature_$i.png";   
                Image::make($SignatureImage["signature_$i"])->save($currentPath);

                $path = "python C:/xampp/htdocs/your-project-name/app/python/Orb.py {'$test_signature_path'} {'$currentPath'} 2>&1";
                $output = shell_exec($path); 
                $result = intval(trim($output));

                echo 'test '. $i .": ".$result.' ';    
                $sum = $sum + $result;
               

            }
               $average = $sum / 3; 
               echo '  average result : '. $average; 
        }

        //$path = "python C:/xampp/htdocs/your-project-name/app/python/Orb.py {'$savePath'} 2>&1";
        //$output = shell_exec($path);
        //echo $output;

        // Generate the HTML img tag with the base64 encoded image data
        //$imgTag = '<img src="data:image/jpeg;base64,' . $base64Image . '" alt="Image">';

        // Output the HTML img tag
        //echo $imgTag;
    
        //ORB algorithm

        
    }
}
