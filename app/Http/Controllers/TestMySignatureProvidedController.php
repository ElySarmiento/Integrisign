<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Signature;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;



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

        $validator = Validator::make($request->all(), [
            'signature' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

    
        $SignatureImage = $this->getImages(auth()->id());


        if(isset($SignatureImage)){

            $test_signature_path =  'signatureImage/testSignature.png'; 
            $test_signature = Image::make($request->file('signature'))->save($test_signature_path);
            $sum = 0;  
            $test_results = array();
            $testImageContents = file_get_contents($request->file('signature')->getRealPath());      

            if(Result::where('test_image',$testImageContents)->exists()){
                $results = Result::where('test_image',$testImageContents)->get();
                
                foreach ($results as $result) {
                    if ($result->user_id == auth()->id()) {
                        return view('dashboard', [
                            'SignatureUploaded' => Signature::where('user_id', auth()->id())->exists(),
                            'container' => 'get_result',
                            'test_image' => base64_encode($testImageContents),
                            'fileName' => $request->file('signature')->getClientOriginalName(),
                            'test1_result' => $result->test1_result,
                            'test2_result' => $result->test2_result,
                            'test3_result' => $result->test3_result,
                            'overall_result' => $result->overall_result,
                            'result_history' => Result::where('user_id',auth()->id())->orderBy('created_at', 'desc')->get()
                        ]);
                    }
                }
                
                
            }
          
            
             for ($i=1; $i <= 3; $i++) {
                 
                $currentPath =  "signatureImage/signature_$i.png";   
                Image::make($SignatureImage["signature_$i"])->save($currentPath);

                $path = "python C:/xampp/htdocs/your-project-name/app/python/Orb.py {'$test_signature_path'} {'$currentPath'} 2>&1";
                $output = shell_exec($path); 
                $result = intval(trim($output));
                array_push($test_results,$result);   
                $sum = $sum + $result;
                

                }
               $average = $sum / 3; 
               $result_information = [
                'test_image' => file_get_contents($request->file('signature')->getRealPath()),
                'fileName' => $request->file('signature')->getClientOriginalName(),
                'test1_result' => $test_results[0],
                'test2_result' => $test_results[1],
                'test3_result' => $test_results[2],
                'overall_result' => (int)$average,
                'user_id' => auth()->id(),
                'date' => date("d M Y   g:i a", time())
    
                ];
    
                $result_model = new Result($result_information);
                $result_model->save();
                $container = 'get_result';
                $result_history = [];
                $result_history = Result::where('user_id',auth()->id())->orderBy('created_at', 'desc')->get();  

                return  view('dashboard',[
                    'SignatureUploaded' => Signature::where('user_id', auth()->id())->exists(),
                    'container' => $container,
                    'test_image' => base64_encode(file_get_contents($request->file('signature')->getRealPath())),
                    'fileName' => $request->file('signature')->getClientOriginalName(),
                    'test1_result' => $test_results[0],
                    'test2_result' => $test_results[1],
                    'test3_result' => $test_results[2],
                    'overall_result' => (int)$average,
                    'result_history' => $result_history
                ]);
            
        }



    }
}
